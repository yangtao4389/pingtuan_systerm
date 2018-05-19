<?php

if(version_compare(PHP_VERSION,'5.4.0','<'))  die('require PHP > 5.4.0 !');


define('APP_PATH', __DIR__ . '/application/');//常量
 define('BASE_PATH', substr($_SERVER['SCRIPT_NAME'], 0, -10));

define('ROOT_PATH', dirname(APP_PATH) . DIRECTORY_SEPARATOR);
define('EXTEND_PATH', ROOT_PATH . 'core' . DIRECTORY_SEPARATOR . 'extend' . DIRECTORY_SEPARATOR);
//第三方安装包目录
define('VENDOR_PATH', ROOT_PATH . 'core' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR);

define ( 'RUNTIME_PATH', __DIR__ . '/data/' );

// 加载框架引导文件
require __DIR__ . '/core/start.php';