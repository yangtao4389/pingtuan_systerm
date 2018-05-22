<?php

return array(

    // 调试模式
    'app_debug' => true,

    'charset' => 'UTF-8',
    'lang_switch_on' => true, // 开启语言包功能
    'lang_list' => ['zh-cn'], // 支持的语言列表

    'data_auth_key' => 'pin',
    'imgdomain' => '',
    'base_url' => BASE_PATH,
    'url_route_on' => true,
    'url_common_param' => false,

    'template' => array(
        'taglib_build_in' => 'cx',
    ),

    // 'dispatch_success_tmpl'  => APP_PATH . 'common/view/default/jump.html',
    // 'dispatch_error_tmpl'    => APP_PATH . 'common/view/default/jump.html',

    'attachment_upload' => array(
        // 允许上传的文件MiMe类型
        'mimes' => [],
        // 上传的文件大小限制 (0-不做限制)
        'maxSize' => 0,
        // 允许上传的文件后缀
        'exts' => [],
        // 子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'subName' => ['date', 'Ymd'],
        //保存根路径
        'rootPath' => './uploads/attachment',
        // 保存路径
        'savePath' => '',
        // 上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveName' => ['uniqid', ''],
        // 文件上传驱动e,
        'driver' => 'Local',
    ),

    'editor_upload' => array(
        // 允许上传的文件MiMe类型
        'mimes' => [],
        // 上传的文件大小限制 (0-不做限制)
        'maxSize' => 0,
        // 允许上传的文件后缀
        'exts' => [],
        // 子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'subName' => ['date', 'Ymd'],
        //保存根路径
        'rootPath' => './uploads/editor',
        // 保存路径
        'savePath' => '',
        // 上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveName' => ['uniqid', ''],
        // 文件上传驱动e,
        'driver' => 'Local',
    ),

    'picture_upload' => array(
        // 允许上传的文件MiMe类型
        'mimes' => [],
        // 上传的文件大小限制 (0-不做限制)
        'maxSize' => 0,
        // 允许上传的文件后缀
        'exts' => [],
        // 子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'subName' => ['date', 'Ymd'],
        //保存根路径
        'rootPath' => './uploads/picture',
        // 保存路径
        'savePath' => '',
        // 上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveName' => ['uniqid', ''],
        // 文件上传驱动e,
        'driver' => 'Local',
    ),
    'session' => array(
        'prefix' => 'pintuan',
        'type' => '',
        'auto_start' => true,
    ),

    'log' => array(
        // 日志记录方式，支持 file sae
        'type' => 'file',
        // 日志保存目录
        'path' => LOG_PATH,
    ),
    'app_trace' => false,
    // 页面Trace信息
    'trace' => array(
        //支持Html,Console 设为false则不显示
        'type' => 'Console',
    ),

    'view_replace_str' => array(
        '__ADDONS__' => BASE_PATH . '/addons',
        '__PUBLIC__' => BASE_PATH . '/public',
        '__STATIC__' => BASE_PATH . '/application/admin/static',
        '__IMG__' => BASE_PATH . '/application/admin/static/images',
        '__CSS__' => BASE_PATH . '/application/admin/static/css',
        '__JS__' => BASE_PATH . '/application/admin/static/js',
    ),

    'easywechat' => [  //微信配置
        /**
         * Debug 模式，bool 值：true/false
         *
         * 当值为 false 时，所有的日志都不会记录
         */
        'debug' => true,
        /**
         * 账号基本信息，请从微信公众平台/开放平台获取
         */
        'app_id' => 'your-app-id',         // AppID
        'secret' => 'your-app-secret',     // AppSecret
        'token' => 'your-token',          // Token
        'aes_key' => '',                    // EncodingAESKey，安全模式下请一定要填写！！！
        /**
         * 日志配置
         *
         * level: 日志级别, 可选为：
         *         debug/info/notice/warning/error/critical/alert/emergency
         * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
         * file：日志文件位置(绝对路径!!!)，要求可写权限
         */
        'log' => [
            'level' => 'debug',
            'permission' => 0777,
            'file' => ROOT_PATH . '/data/easywechat.log',
        ],
        /**
         * OAuth 配置
         *
         * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
         * callback：OAuth授权完成后的回调页地址
         */
        'oauth' => [
            'scopes' => ['snsapi_userinfo'],
            'callback' => '/mobile/callback/index',
        ],
        /**
         * 微信支付
         */
        'payment' => [
            'merchant_id' => 'your-mch-id',
            'key' => 'key-for-signature',
            'cert_path' => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
            'key_path' => 'path/to/your/key',      // XXX: 绝对路径！！！！
            'notify_url' => '默认的订单回调地址',       // 你也可以在下单时单独设置来想覆盖它
            // 'device_info'     => '013467007045764',
            // 'sub_app_id'      => '',
            // 'sub_merchant_id' => '',
            // ...
        ],

    ],
    'gatewayworker' => [
        'register_address' => '127.0.0.1:1238',
        'gateway_address' => 'ws://192.168.1.102:8282',

    ],


);