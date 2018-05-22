<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/22
 * Time: 11:58
 */

namespace think;
class Loader{
    public static function register($autoload = '')
    {
        spl_autoload_register($autoload ?: 'think\\Loader::autoload', true, true);
    }

    // 自动加载
    public static function autoload($class)
    {
        echo 'enter autoload<br>';
        echo $class[0].'<br>';
        var_dump($class);
    }
}