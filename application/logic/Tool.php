<?php
/**
 * Created by PhpStorm.
 * User: 304455977@qq.com
 * Date: 2017/9/30
 * Time: 10:00
 */

namespace app\logic;


class Tool
{
    static function cutstr($string, $length, $dot = '...',$charset="utf-8")
    {/*{{{*/
        if(strlen($string)<= $length)
        {
            return $string;
        }
        $string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
        $strcut = '';
        if(strtolower($charset) == 'utf-8')
        {
            $n = $tn = $noc = 0;
            while($n < strlen($string))
            {
                $t = ord($string[$n]);
                if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                    $tn = 1; $n++; $noc++;
                } elseif(194 <= $t && $t <= 223) {
                    $tn = 2; $n += 2; $noc += 2;
                } elseif(224 <= $t && $t <= 239) {
                    $tn = 3; $n += 3; $noc += 2;
                } elseif(240 <= $t && $t <= 247) {
                    $tn = 4; $n += 4; $noc += 2;
                } elseif(248 <= $t && $t <= 251) {
                    $tn = 5; $n += 5; $noc += 2;
                } elseif($t == 252 || $t == 253) {
                    $tn = 6; $n += 6; $noc += 2;
                } else {
                    $n++;
                }

                if($noc >= $length) {
                    break;
                }
            }
            if($noc > $length)
            {
                $n -= $tn;
            }
            $strcut = substr($string, 0, $n);
        }
        else
        {
            for($i = 0; $i < $length; $i++) {
                $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
            }
        }
        $strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);
        return $strcut.$dot;
    }/*}}}*/
    static function dhtmlspecialchars($string)
    {/*{{{*/
        if(is_array($string)) {
            foreach($string as $key => $val) {
                $string[$key] = self::dhtmlspecialchars($val);
            }
        } else {
            $string = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string);
        }
        return $string;
    }/*}}}*/
    static public function encrypt($data, $version='10'){
        if(!$version) {
            return self::encryptByBase64($data);
        }
        if(is_array($data)) {
            $data = json_encode($data);
        }
        try {
            $re = self::authcode($data, 'ENCODE');
        } catch(\Exception $e) {
            $re = "";
        }
        return $re;
    }

    public static function decrypt($data, $version='10'){
        if(!$version) {
            return self::decryptByBase64($data);
        }
        try {
            $re = self::authcode($data, 'DECODE');
            $re = json_decode($re, true);
        } catch(Exception $e) {
            $re = '';
        }
        return $re;
    }
    public static function encryptByBase64($data){
        return base64_encode(json_encode($data));
    }
    public static function decryptByBase64($data){
        return json_decode(base64_decode($data), true);
    }
    /**
     * 字符串解密加密
     * @param string $string  原文或者加密后的密文

     * @param string $operation 默认DECODE 为解密，其他加密

     * @param string $key  密钥

     * @param  int $expiry 加密有效期 0为永不过期  单位秒

     * @return string 加密的密文 或者解密的原文

     */
    public static function authcode($string, $operation = 'DECODE', $key = '&(#jlJOG!~_(*()', $expiry = 0)
    {
        $ckey_length = 4;   // 随机密钥长度 取值 0-32;
        // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
        // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
        // 当此值为 0 时，则不产生随机密钥
        $key = md5($key);
        $keya = md5(substr($key, 0, 16));
        $keyb = md5(substr($key, 16, 16));
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
        $cryptkey = $keya.md5($keya.$keyc);
        $key_length = strlen($cryptkey);
        $string = $operation == 'DECODE' ? self::hex2bin(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
        $string_length = strlen($string);
        $result = '';
        $box = range(0, 255);
        $rndkey = array();
        for($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }
        for($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }
        for($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }
        if($operation == 'DECODE') {
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            return $keyc.str_replace('=', '', bin2hex($result));
        }
    }
    public static function hex2bin($str) {
        return @pack('H' . strlen($str), $str);
    }
    public static function checkPhone($phone){
         $pattern = "/^13[0-9]{1}[0-9]{8}$|17[0123456789]{1}[0-9]{8}$|15[0123456789]{1}[0-9]{8}$|18[0123456789]{1}[0-9]{8}$|14[57]{1}[0-9]{8}$/";
        return preg_match($pattern,$phone);
    }
    public static function checkEmail($email){
        $pattern ="/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        return preg_match($pattern,$email);

    }

    public static  function buildUrl($arr){
        $str='';
        foreach($arr as $key=>$val){
            $str.="$key=$val&";
        }
        return substr($str,0,-1);
    }
   public static  function getnowurl(){
        if(!isset($_SERVER['REQUEST_URI'])) {//获得当前url
            $_SERVER['REQUEST_URI'] = $_SERVER['PHP_SELF'];
            if(isset($_SERVER['QUERY_STRING'])) $_SERVER['REQUEST_URI'] .= '?'.$_SERVER['QUERY_STRING'];
        }
        return $_SERVER['REQUEST_URI'];
    }
   public static function get_extension($file)
    {
        return substr($file, strrpos($file, '.')+1);
    }
    public static function getHumanTime($secs)
    {
        $msg = '';
        $hour = 60*60;
        $day = $hour*24;
        if($secs<60){
            $msg =$secs.'秒前';
        }else if($secs<$hour){
            $msg = ceil($secs/60) . '分钟前';
        }else if($secs<$day){
            $msg = ceil($secs/$hour) . '小时前';
        }else{
            $msg = ceil($secs/$day) . '天前';
        }
        return $msg;
    }
    public static function get_randstr($random_length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $random_string = '';
        for ($i = 0; $i < $random_length; $i++) {
            $random_string .= $chars [mt_rand(0, strlen($chars) - 1)];
        }
        return $random_string;
    }
}