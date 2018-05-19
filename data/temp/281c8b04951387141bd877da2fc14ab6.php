<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\www\pingtuan_systerm/application/admin\view\group\access.html";i:1511860166;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1526737469;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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


<header class="row">
	<div class="col-lg-12 col-sm-12">

		<div class="pull-right">
			<a href="<?php echo url('group/addnode',array('type'=>$type)); ?>" class="btn btn-danger">
				<i class="icon icon-plus"></i>
				添加节点
			</a>
		</div>
	</div>
</header>

<div class="row">

	<div class="col-lg-12">

		<section class="panel general">

				<div class="panel-heading tab-bg-dark-navy-blue">
					<ul class="nav nav-tabs">
						<?php $_result=config('user_group_type');if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
						<li <?php if($key == $type): ?>class="active"<?php endif; ?>>
						<a href="<?php echo url('Group/access',array('type'=>$key)); ?>"><?php echo $item; ?></a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			<table class="table   table-hover">
				<thead>
				<tr>
					<th width="30"><input class="checkbox check-all" type="checkbox"></th>
					<th width="60">ID</th>
					<th>组名</th>
					<th>标识</th>
					<th>分组</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
				<tr>
					<th width="30"><input class="ids row-selected" type="checkbox" name="id[]" value="<?php echo $item['id']; ?>"></th>
					<td><?php echo $item['id']; ?></td>
					<td><?php echo $item['title']; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td><?php echo $item['group']; ?></td>
					<td>
						<?php if($item['status'] == '0'): ?>
						<span class="label label-danger">禁用</span>
						<?php elseif($item['status'] == '1'): ?>
						<span class="label label-primary">启用</span>
						<?php endif; ?>
					</td>
					<td>
						<a href="<?php echo url('Group/editnode',array('id'=>$item['id'])); ?>">编辑</a>
						<a href="<?php echo url('Group/delnode',array('id'=>$item['id'])); ?>" class="confirm ajax-get">删除</a>
					</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
				<?php echo $page; ?>

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



