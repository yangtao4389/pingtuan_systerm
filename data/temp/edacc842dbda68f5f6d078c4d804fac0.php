<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:62:"D:\www\pingtuan_systerm/application/admin\view\index\main.html";i:1514975624;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1526737469;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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




<!-- 导航 -->
<div class="row">
    <div class="col-md-12 col-lg-12">

        <ul class="breadcrumb">
            <li><a href="/admin/index/main"><i class="icon icon-home"></i> 首页</a></li>
            <li><a href="javascript:;"><?php echo $meta_title; ?></a></li>
        </ul>

    </div>
</div>


<script src="__PUBLIC__/plugs/echart/echarts.min.js"></script>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">

            <div class="panel-body">


                <div class="row">


                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                服务器信息
                            </header>
                            <div class="panel-body" id="noti-box">

                                <table class="table">

                                    <tr>
                                        <th>服务器操作系统</th>
                                        <td><?php echo PHP_OS; ?></td>
                                    </tr>
                                    <tr>
                                        <th>运行环境</th>
                                        <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>MYSQL版本</th>
                                        <?php $system_info_mysql = \think\Db::query("select version() as v;"); ?>
                                        <td><?php echo $system_info_mysql['0']['v']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>上传限制</th>
                                        <td><?php echo ini_get('upload_max_filesize'); ?></td>
                                    </tr>

                                </table>





                            </div>
                        </section>
                    </div>


                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                系统特点
                            </header>
                            <div class="panel-body">
                                 <table class="table">
                                     <tr>
                                         <td style="color:#ff2222">下载：交流群号： 616405640（群内还有自己开发的几套系统）</td>
                                     </tr>
                                     <tr>
                                         <td style="color:#ff2222">为了数据安全已屏蔽删除功能，会提示成功！但不会真正删除</td>
                                     </tr>
                                     <tr>
                                         <td>所用技术：bootstrap+layer弹窗</td>
                                     </tr>
                                     <tr>
                                         <td>简化查询条件列表，查询表单组件化。各种复杂搜索条件，几行代码搞定</td>
                                    </tr>
                                     <tr>
                                         <td>内置百度Echart柱状图折线图等图表功能，也已经封装成了组件,调用So Easy!</td>
                                     </tr>
                                     <tr>
                                         <td>输入自动提示，列表内文本编辑，下拉框编辑等功能也已经封装!</td>
                                     </tr>
                                     <tr>
                                         <td>弹出层和父窗口自动刷新，加个class即可搞定</td>
                                     </tr>



                                </table>





                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>




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



