<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"D:\www\pingtuan_systerm/application/admin\view\index\index.html";i:1526737114;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>智云多商户拼团-总后台</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 -->
    <link href="__PUBLIC__/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="__PUBLIC__/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="__PUBLIC__/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- iCheck for checkboxes and radio inputs -->
    <link href="__PUBLIC__/admin/css/iCheck/all.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="__PUBLIC__/admin/css/style.css" rel="stylesheet" type="text/css" />

     <!--[if lt IE 9]>
    <script src="__PUBLIC__/js/html5shiv.js"></script>
    <script src="__PUBLIC__/js/respond.min.js"></script>

    <![endif]-->
    <script src="__PUBLIC__/js/jquery.js"></script>
    <script src="__PUBLIC__/plugs/layer/layer.js"></script>
    <script type="text/javascript">
        var BASE_URL = "<?php echo config('base_url'); ?>"; //根目录地址
        var UPLOAD_URL="/admin/upload/";
    </script>
<body class="skin-black">



<style>
    .topactive {
        color: #fff;
        /*background-color: #333333;*/
    }

</style>

<header class="header">
    <a href="index.html" class="logo">
        智云拼团
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <ul class="nav navbar-nav">
            <?php if(is_array($top_menu) || $top_menu instanceof \think\Collection || $top_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
            <li menu-id="<?php echo $item['id']; ?>" class="topnav-item">
                <a href="javascript:;">
                    <i class="icon icon-<?php echo (isset($item['icon']) && ($item['icon'] !== '')?$item['icon']:'circle-blank'); ?>"></i>
                    <span><?php echo $item['title']; ?></span>
                </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>

        <div class="navbar-right">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon icon-user"></i>
                        <span> <?php echo session('user_auth.username'); ?><i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li class="dropdown-header text-center">账户</li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo url('admin/user/editpwd'); ?>" target="main">
                                <i class="icon  icon-user icon-fw pull-right"></i>
                                修改密码
                            </a>
                            <a href="<?php echo url('admin/index/logout'); ?>">
                                <i class="icon icon-ban-circle  pull-right"></i>
                                退出后台
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>


<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">

                    <img src="__PUBLIC__/admin/img/avatar2.png"
                         onerror="this.src='__PUBLIC__/mobile/image/logo_default.png'" class="img-circle" alt="头像"/>

                </div>
                <div class="pull-left info">
                    <p><a href="javascript:;"> <?php echo session('user_auth.username'); ?></a></p>
                </div>
            </div>
            <!-- search form -->
            <!--<form action="/admin/product/index/" method="get" target="main" class="sidebar-form">-->
            <!--<div class="input-group">-->
            <!--<input type="text" name="title" class="form-control" placeholder="输入商品名"/>-->
            <!--<span class="input-group-btn">-->
            <!--<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="icon icon-search"></i></button>-->
            <!--</span>-->
            <!--</div>-->
            <!--</form>-->
            <?php if(is_array($sub_menu) || $sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
            <ul class="sidebar-menu" id="sub-<?php echo $key; ?>" <?php if($i!=1): ?>style="display:none"<?php endif; ?>>
                <?php if(is_array($item) || $item instanceof \think\Collection || $item instanceof \think\Paginator): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sitem): $mod = ($i % 2 );++$i;?>
                <li class="nav-header" style=" color: #76829e;
		 margin-left: 5px;">
                    <?php echo $key; ?>
                </li>
                <?php if(is_array($sitem) || $sitem instanceof \think\Collection || $sitem instanceof \think\Paginator): $i = 0; $__LIST__ = $sitem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mitem): $mod = ($i % 2 );++$i;?>
                <li class="sub-item">
                    <a href="<?php echo url($mitem['url']); ?>" target="main">
                        <i class="icon icon-<?php echo (isset($mitem['icon']) && ($mitem['icon'] !== '')?$mitem['icon']:'file'); ?>"></i>
                        <span><?php echo $mitem['title']; ?></span>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>


        </section>
        <!-- /.sidebar -->
    </aside>

    <aside class="right-side">

        <!-- Main content -->
        <section class="content">

            <iframe src="/admin/index/main" id="contentframe" name="main" width="100%" height="100%" scrolling="yes"
                    frameborder="no"></iframe>
            <!-- row end -->
        </section><!-- /.content -->

    </aside><!-- /.right-side -->

</div>

<script>
    $(document).ready(function () {
        $(".topnav-item").click(function () {
            $(this).addClass('topactive').siblings('li').removeClass('topactive');
            var mid = $(this).attr('menu-id');
            console.log('---' + mid);
            $("#sub-" + mid).show().siblings("ul").hide();
            return false;
        });
        $(".sub-item").click(function () {
            $(this).addClass('active');
            $(this).siblings('li').removeClass('active');
        });
    });
</script>
<script>

    function resizewin() {
             if ($(window).parent != $(window)) {
                var thisheight = $("body").height();
                console.log(thisheight);
                var main = $(window.parent.document).find("#contentframe");
                if(thisheight<700)thisheight=700;

                if(typeof  ue !=="undefined"){
                    thisheight +=320;
                }
                main.height(thisheight);

            }
     }
    $(document).ready(function() {
        resizewin();
    });
</script>

<!-- Bootstrap -->
<script src="__PUBLIC__/admin/js/bootstrap.min.js" type="text/javascript"></script>

<!-- iCheck -->
<script src="__PUBLIC__/admin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- Director App -->
<script src="__PUBLIC__/admin/js/Director/app.js" type="text/javascript"></script>

<script src="__PUBLIC__/js/messager.js"></script>


<script src="__PUBLIC__/js/core.js"></script>


</body>
</html>
