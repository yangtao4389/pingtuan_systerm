<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\www\pingtuan_systerm/application/admin\view\config\index.html";i:1511858224;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1513221665;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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




<div class="row">
    <div class="col-md-12 col-lg-12">

        <ul class="breadcrumb">
            <li><a href="/admin/index/main"><i class="icon icon-home"></i> 首页</a></li>
            <li><a href="javascript:;"><?php echo $meta_title; ?></a></li>
        </ul>

    </div>
</div>


<div class="row">
<header class="col-lg-12">

    <div class="pull-right">
        <a href="<?php echo url('Config/group'); ?>" class="btn btn-primary">
            <i class="icon icon-list"></i>
            配置管理
        </a>
        <a href="<?php echo url('Config/add'); ?>" class="btn btn-danger">
            <i class="icon icon-plus"></i>
            添加配置
        </a>
    </div>
</header>
</div>
<div class="row">

    <div class="col-lg-12">
         <section class="panel general">
             <div class="panel-heading tab-bg-dark-navy-blue">
                 <ul class="nav nav-tabs">
                     <li <?php if(!$group_id): ?>class="active"<?php endif; ?>><a href="<?php echo url('index'); ?>">全部</a></li>
                     <?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                     <li <?php if($group_id == $key): ?>class="active"<?php endif; ?>>
                     <a href="<?php echo url('index?group='.$key); ?>"><?php echo $item; ?></a>
                     </li>
                     <?php endforeach; endif; else: echo "" ;endif; ?>
                 </ul>
             </div>

             <div class="panel-body">
                 <div class="tab-content">
                     <div class="tab-pane fade in active">
                         <div class="table-responsive clearfix">
                             <table class="table table-hover">
                                 <thead>
                                 <tr>
                                     <th class="row-selected">
                                         <input class="checkbox check-all" type="checkbox">
                                     </th>
                                     <th>ID</th>
                                     <th>名称</th>
                                     <th>标题</th>
                                     <th>分组</th>
                                     <th>类型</th>
                                     <th>操作</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$config): $mod = ($i % 2 );++$i;?>
                                 <tr>
                                     <td><input class="ids row-selected" type="checkbox" name="id[]" value="<?php echo $config['id']; ?>"></td>
                                     <td><?php echo $config['id']; ?></td>
                                     <td><a href="<?php echo url('edit?id='.$config['id']); ?>"><?php echo $config['name']; ?></a></td>
                                     <td><?php echo $config['title']; ?></td>
                                     <td><?php echo (isset($group[$config['group']]) && ($group[$config['group']] !== '')?$group[$config['group']]:''); ?></td>
                                     <td><?php echo $config['type_text']; ?></td>
                                     <td>
                                         <a title="编辑" href="<?php echo url('edit?id='.$config['id']); ?>">编辑</a>
                                         <a class="confirm ajax-get" title="删除" href="<?php echo url('del?id='.$config['id']); ?>">删除</a>
                                     </td>
                                 </tr>
                                 <?php endforeach; endif; else: echo "" ;endif; else: ?>
                                 <td colspan="7" class="text-center"> aOh! 暂时还没有内容!</td>
                                 <?php endif; ?>
                                 </tbody>
                             </table>
                         </div>
                         <?php echo $page; ?>
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



