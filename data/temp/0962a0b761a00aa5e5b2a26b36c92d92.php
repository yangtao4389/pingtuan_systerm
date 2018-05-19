<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:63:"D:\www\zhiyunzhushou/application/index\view\index\download.html";i:1514963844;s:60:"D:\www\zhiyunzhushou/application/index\view\public\base.html";i:1512351638;s:62:"D:\www\zhiyunzhushou/application/index\view\public\header.html";i:1513221553;s:62:"D:\www\zhiyunzhushou/application/index\view\public\footer.html";i:1514342717;}*/ ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $meta_title; ?>-微信版，手机APP版</title>
    <meta name="keywords" content="开源多商户拼团系统,微信拼团系统,手机APP拼团系统">
    <meta name="description" content="智云多商户开源拼团系统,开源拼团系统,微信拼团系统开源,App端开源拼团系统，开源拼团系统">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/bootstrap.min.css">
    <!--For Plugins external css-->
    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/plugins.css" />
    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/roboto-webfont.css" />
    <!--Theme custom css -->
    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/style.css">
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/responsive.css" />

    <script src="__PUBLIC__/home/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>



<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="__PUBLIC__/home/assets/images/logo.png" alt="Logo" />
            </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li <?php if($pageflag=="index"): ?> class="active" <?php endif; ?>><a href="/">首页</a></li>
                <li ><a href="/#business">核心亮点</a></li>
                <li <?php if($pageflag=="func"): ?> class="active" <?php endif; ?>><a href="/func">功能列表</a></li>
                <li <?php if($pageflag=="download"): ?> class="active" <?php endif; ?>><a href="/download">源码下载</a></li>

                <li class="login"><a href="#">QQ:304455977</a></li>
            </ul>

        </div>
    </div>
</nav>




<div class="container">
<div class="row">
    <div class="col-lg-12 col-sm-12 ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    下载须知
                </h3>
            </div>
                 <ul class="list-group">
                     <li class="list-group-item">
                             所有源码全部开源(包括微信端、安卓版、IOS版、总后台、商户后台)！不进行任何混淆和加密
                    </li>
                     <li  class="list-group-item"> 微信端和App端演示请扫首页二维码查看，后台演示<a href="http://v.youku.com/v_show/id_XMzIzMDgzNTkyMA==.html" target="_blank">点击查看视频</a> </li>
                    <li class="list-group-item">后台及微信采用HTML5+CSS3+VUE 开发，响应式页面。APP采用APICloud混合式开发</li>
                    <li class="list-group-item">要二次传播，请联系QQ授权，否则终止提供技术支持、情况严重者追究法律责任!</li>
                    <li class="list-group-item">
                       提供一年免费技术支持;永久版本更新。工作时间：周一到周五 9点-18点
                    </li>
                     <li class="list-group-item">价格说明：
                         <h5>全套源码：(【微信端】、【安卓版】、【IOS版】、【总后台】、【商户后台】)：
                             <span style="color: #e02e24">2800元！</span></h5>
                     </li>
                     <li  class="list-group-item">下步转型培训：课程1月底陆续发布包括
                          <p>PHP、Linux、Python、Mysql数据库优化、系统架构设计(包括:千万级用户系统及支付系统、日志中心搭建等)</p>
                         <p>Hadoop+Hbase大数据日志分析</p>
                         有兴趣同学可联系<b>QQ: 304455977</b>预约报名！

                     </li>

                    <li class="list-group-item text-center">
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=304455977&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:304455977:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                    </li>
                </ul>

        </div>
    </div>
</div>
</div>




<!--Footer-->
<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-wrapper">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-brand">
                        <img src="__PUBLIC__/home/assets/images/logo.png" alt="logo" />
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="copyright">

                        <p>联系方式:QQ <b>304455977</b>(备注智云拼团),电话:<b>15853332556</b>

                        </p>
                        <p>   备案号：<?php echo config('web_site_icp'); ?></p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>





<script src="__PUBLIC__/home/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="__PUBLIC__/home/assets/js/vendor/bootstrap.min.js"></script>

</body>
</html>
