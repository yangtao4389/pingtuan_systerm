<?php
function datefmt($fmt,$time)
{
    if(!$time)return '-';
    return date($fmt,$time);
}
function getFieldMap($mod,$mapname,$field,$val)
{
    $modobj = model($mod);
    $fieldmap = $modobj->$mapname;

    $txt =  $fieldmap[$field]['option'][$val];
    return $txt;
}


/**
+----------------------------------------------------------
 * 产生随机字串，可用来自动生成密码 默认长度6位 字母和数字混合
+----------------------------------------------------------
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
+----------------------------------------------------------
 * @return string
+----------------------------------------------------------
 */
function rand_string($len = 6, $type = '', $addChars = '') {
	$str = '';
	switch ($type) {
	case 0:
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars;
		break;
	case 1:
		$chars = str_repeat('0123456789', 3);
		break;
	case 2:
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . $addChars;
		break;
	case 3:
		$chars = 'abcdefghijklmnopqrstuvwxyz' . $addChars;
		break;
	case 4:
		$chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距触星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借" . $addChars;
		break;
	default:
		// 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
		$chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789' . $addChars;
		break;
	}
	if ($len > 10) {
		//位数过长重复字符串一定次数
		$chars = $type == 1 ? str_repeat($chars, $len) : str_repeat($chars, 5);
	}
	if ($type != 4) {
		$chars = str_shuffle($chars);
		$str   = substr($chars, 0, $len);
	} else {
		// 中文随机字
		for ($i = 0; $i < $len; $i++) {
			$str .= msubstr($chars, floor(mt_rand(0, mb_strlen($chars, 'utf-8') - 1)), 1);
		}
	}
	return $str;
}





function getImageById($id)
{

    return get_cover($id, 'url');
}

function get_cover($cover_id, $field = null) {
	if (empty($cover_id)) {
		return '';
 	}
	$picture = db('Picture')->where(array('status' => 1, 'id' => $cover_id))->find();
	if ($field == 'path') {
		if (!empty($picture['url'])) {
			$picture['path'] = $picture['url'] ? BASE_PATH . $picture['url'] : BASE_PATH . '/public/images/default.png';
		} else {
			$picture['path'] = $picture['path'] ? BASE_PATH . $picture['path'] : BASE_PATH . '/public/images/default.png';
		}
	}


    if($field){
        $imgpath = empty($field) ? $picture : $picture[$field];
        return config("imgdomain").$imgpath;
    }else{
        return $picture;
    }

}

function get_file($file_id, $field = null) {
	if (empty($file_id)) {
		return '';
	}
	$file = db('File')->where(array('id' => $file_id))->find();
	if ($field == 'path') {
		return $file['savepath'];
	} elseif ($field == 'time') {
		return date('Y-m-d H:i:s', $file['create_time']);
	}
	return empty($field) ? $file : $file[$field];
}



/**
 * 字符串命名风格转换
 * type 0 将Java风格转换为C的风格 1 将C风格转换为Java的风格
 * @param string $name 字符串
 * @param integer $type 转换类型
 * @return string
 */
function parse_name($name, $type = 0) {
	if ($type) {
		return ucfirst(preg_replace_callback('/_([a-zA-Z])/', function ($match) {return strtoupper($match[1]);}, $name));
	} else {
		return strtolower(trim(preg_replace("/[A-Z]/", "_\\0", $name), "_"));
	}
}

// 不区分大小写的in_array实现
function in_array_case($value, $array) {
	return in_array(strtolower($value), array_map('strtolower', $array));
}





/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
 * @return mixed
 */
function get_client_ip($type = 0, $adv = false) {
	$type      = $type ? 1 : 0;
	static $ip = NULL;
	if ($ip !== NULL) {
		return $ip[$type];
	}

	if ($adv) {
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			$pos = array_search('unknown', $arr);
			if (false !== $pos) {
				unset($arr[$pos]);
			}

			$ip = trim($arr[0]);
		} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (isset($_SERVER['REMOTE_ADDR'])) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
	} elseif (isset($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	// IP地址合法验证
	$long = sprintf("%u", ip2long($ip));
	$ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
	return $ip[$type];
}



// 分析枚举类型字段值 格式 a:名称1,b:名称2
// 暂时和 parse_config_attr功能相同
// 但请不要互相使用，后期会调整
function parse_field_attr($string) {
	if (0 === strpos($string, ':')) {
		// 采用函数定义
		return eval('return ' . substr($string, 1) . ';');
	} elseif (0 === strpos($string, '[')) {
		// 支持读取配置参数（必须是数组类型）
		return \think\Config::get(substr($string, 1, -1));
	}

	$array = preg_split('/[,;\r\n]+/', trim($string, ",;\r\n"));
	if (strpos($string, ':')) {
		$value = array();
		foreach ($array as $val) {
			list($k, $v) = explode(':', $val);
			$value[$k]   = $v;
		}
	} else {
		$value = $array;
	}
	return $value;
}

function parse_field_bind($table, $selected = '', $model = 0) {
	$list = array();
	if ($table) {
		$select = db($table);
		$res    = $select->select();
		foreach ($res as $key => $value) {
			if ($model && $value['model']) {
				$models = explode(',', $value['model']);
				if (in_array($model, $models)) {
					$list[] = $value;
				}
			} else {
				$list[] = $value;
			}
		}
		if (!empty($list)) {
			$tree = new \com\Tree();
			$list = $tree->toFormatTree($list);
		}
	}
	return $list;
}

// 分析枚举类型配置值 格式 a:名称1,b:名称2
function parse_config_attr($string) {
	$array = preg_split('/[,;\r\n]+/', trim($string, ",;\r\n"));
	if (strpos($string, ':')) {
		$value = array();
		foreach ($array as $val) {
			list($k, $v) = explode(':', $val);
			$value[$k]   = $v;
		}
	} else {
		$value = $array;
	}
	return $value;
}




function avatar($uid, $size = 'middle') {
	$size = in_array($size, array('big', 'middle', 'small', 'real')) ? $size : 'middle';
	$dir  = setavatardir($uid);
	$file = BASE_PATH . '/uploads/avatar/' . $dir . 'avatar_' . $size . '.png';
	if (!file_exists('.' . $file)) {
		$file = BASE_PATH . '/public/images/default_avatar_' . $size . '.jpg';
	}
	return $file;
}

function setavatardir($uid) {
	$uid  = abs(intval($uid));
	$uid  = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	$dir4 = substr($uid, 7, 2);
	$dir  = $dir1 . '/' . $dir2 . '/' . $dir3 . '/' . $dir4 . '/';
	if (!is_dir("./uploads/avatar/$dir")) {
		mk_dir("./uploads/avatar/" . $dir);
	}
	return $dir;
}

function mk_dir($dir, $mode = 0755) {
	if (is_dir($dir) || @mkdir($dir, $mode, true)) {
		return true;
	}

	if (!mk_dir(dirname($dir), $mode, true)) {
		return false;
	}

	return @mkdir($dir, $mode, true);
}



//php获取中文字符拼音首字母
function getFirstCharter($s0) {
	$fchar = ord($s0{0});
	if ($fchar >= ord("A") and $fchar <= ord("z")) {
		return strtoupper($s0{0});
	}

	$s1 = \iconv("UTF-8", "gb2312", $s0);
	$s2 = \iconv("gb2312", "UTF-8", $s1);
	if ($s2 == $s0) {$s = $s1;} else { $s = $s0;}
	$asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
	if ($asc >= -20319 and $asc <= -20284) {
		return "A";
	}

	if ($asc >= -20283 and $asc <= -19776) {
		return "B";
	}

	if ($asc >= -19775 and $asc <= -19219) {
		return "C";
	}

	if ($asc >= -19218 and $asc <= -18711) {
		return "D";
	}

	if ($asc >= -18710 and $asc <= -18527) {
		return "E";
	}

	if ($asc >= -18526 and $asc <= -18240) {
		return "F";
	}

	if ($asc >= -18239 and $asc <= -17923) {
		return "G";
	}

	if ($asc >= -17922 and $asc <= -17418) {
		return "H";
	}

	if ($asc >= -17417 and $asc <= -16475) {
		return "J";
	}

	if ($asc >= -16474 and $asc <= -16213) {
		return "K";
	}

	if ($asc >= -16212 and $asc <= -15641) {
		return "L";
	}

	if ($asc >= -15640 and $asc <= -15166) {
		return "M";
	}

	if ($asc >= -15165 and $asc <= -14923) {
		return "N";
	}

	if ($asc >= -14922 and $asc <= -14915) {
		return "O";
	}

	if ($asc >= -14914 and $asc <= -14631) {
		return "P";
	}

	if ($asc >= -14630 and $asc <= -14150) {
		return "Q";
	}

	if ($asc >= -14149 and $asc <= -14091) {
		return "R";
	}

	if ($asc >= -14090 and $asc <= -13319) {
		return "S";
	}

	if ($asc >= -13318 and $asc <= -12839) {
		return "T";
	}

	if ($asc >= -12838 and $asc <= -12557) {
		return "W";
	}

	if ($asc >= -12556 and $asc <= -11848) {
		return "X";
	}

	if ($asc >= -11847 and $asc <= -11056) {
		return "Y";
	}

	if ($asc >= -11055 and $asc <= -10247) {
		return "Z";
	}

	return null;
}

function PyFirst($zh) {
	$ret = "";
	$s1  = \iconv("UTF-8", "gb2312", $zh);
	$s2  = \iconv("gb2312", "UTF-8", $s1);
	if ($s2 == $zh) {$zh = $s1;}
	for ($i = 0; $i < strlen($zh); $i++) {
		$s1 = substr($zh, $i, 1);
		$p  = ord($s1);
		if ($p > 160) {
			$s2 = substr($zh, $i++, 2);
			$ret .= getFirstCharter($s2);
		} else {
			$ret .= $s1;
		}
	}
	return $ret;
}

if (!function_exists('getallheaders')) {
	function getallheaders() {
		$headers = [];
		foreach ($_SERVER as $name => $value) {
			if (substr($name, 0, 5) == 'HTTP_') {
				$headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
			}
		}
		return $headers;
	}
}