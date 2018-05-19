<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"D:\www\zhiyunzhushou/application/index\view\index\func.html";i:1513216996;s:60:"D:\www\zhiyunzhushou/application/index\view\public\base.html";i:1512351638;s:62:"D:\www\zhiyunzhushou/application/index\view\public\header.html";i:1513221553;s:62:"D:\www\zhiyunzhushou/application/index\view\public\footer.html";i:1514342717;}*/ ?>
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


<style>
   .table .title{
       background-color: #d0e9c6;
   }
</style>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:10px;">
    <table class="table table-bordered">
         <thead>
        <tr>
            <th width="200">功能</th>
            <th>微信端</th>
            <th>安卓</th>
            <th>IOS</th>
         </tr>
        </thead>
        <tbody>
        <?php if(is_array($funlist) || $funlist instanceof \think\Collection || $funlist instanceof \think\Paginator): $i = 0; $__LIST__ = $funlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <tr class="title">
            <td colspan="4"><?php echo $key; ?></td>
         </tr>
        <?php if(is_array($item) || $item instanceof \think\Collection || $item instanceof \think\Paginator): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sitem): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $sitem; ?></td>
            <td><img src="__PUBLIC__/home/assets/images/ok.png"> </td>
            <td><img src="__PUBLIC__/home/assets/images/ok.png"> </td>
            <td><img src="__PUBLIC__/home/assets/images/ok.png"> </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
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
