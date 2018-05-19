<?php
/**
 * Created by PhpStorm.
 * User: 304455977@qq.com
 * Date: 2017/9/30
 * Time: 10:03
 */

namespace app\logic;


class Error
{
    const SUCCESS = 1000;
   const LOGIN_EXPRISE = 1001;
   const LOGIN_ERROR = 1002;
    const MOBILE_ERROR = 1003;
    const SAFECODE_EXPRISE = 1004;
    const PARAM_ERROR  = 1005;

    const MEMBER_AUTH_FAILD = 2001;
    const ORDER_REPAY = 3001;


   const UNKWON = 9999;
   public  static function getMessage($errno)
   {
       static $map = [
           self::UNKWON  =>'未知错误',
           self::SUCCESS=>'成功',

           self::MEMBER_AUTH_FAILD=>'授权失败',
           self::LOGIN_EXPRISE=>'登录超时',
           self::LOGIN_ERROR => '用户名或密码错误',
           self::MOBILE_ERROR => '手机号码格式错误',
           self::SAFECODE_EXPRISE => '验证码错误或已过期',
           self::PARAM_ERROR =>'请填写完整内容',
           self::ORDER_REPAY=>'错误：订单已支付！请勿重新支付！',

       ];
       if(isset($map[$errno])){
           return  $map[$errno];
       }
       return $map[self::UNKWON];
    }

}