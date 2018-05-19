<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:62:"D:\www\pingtuan_systerm/application/admin\view\user\index.html";i:1514965983;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1526737469;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:66:"D:\www\pingtuan_systerm/application/admin\view\public\editcss.html";i:1512009968;s:68:"D:\www\pingtuan_systerm/application/admin\view\public\searchbar.html";i:1511492374;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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



<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugs/webuploader/webuploader.css">
<script type="text/javascript" src="__PUBLIC__/plugs/webuploader/webuploader.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugs/webuploader/webuploader.custom.js"></script>
<!-- 配置文件 -->


<!-- 编辑器源码文件 -->
<script type="text/javascript" src="__PUBLIC__/plugs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugs/ueditor/ueditor.all.min.js"></script>
<!-- datepicker statr -->
<link href="__PUBLIC__/plugs/datepicker/css/foundation-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/plugs/datepicker/js/foundation-datepicker.js"></script>
<script src="__PUBLIC__/plugs/datepicker/js/foundation-datepicker.zh-CN.js"></script>

<!-- datepicker end -->

<!--taginput-->
<link rel="stylesheet" href="__PUBLIC__/admin/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="__PUBLIC__/plugs/tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="__PUBLIC__/plugs/tagsinput/app.css">
<script src="__PUBLIC__/plugs/tagsinput/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugs/typeahead.js/dist/typeahead.bundle.js"></script>

<!--taginput end-->

<!-- autocomplete statr -->
<link rel="stylesheet" href="__PUBLIC__/plugs/autocomplete/css/jquery-ui.css">
<link rel="stylesheet" href="__PUBLIC__/plugs/autocomplete/css/style.css">
<script src="__PUBLIC__/plugs/autocomplete/js/jquery.ui.datepicker-zh-CN.min.js"></script>
<script src="__PUBLIC__/plugs/autocomplete/js/jquery-ui.js"></script>
<!-- autocomplete end -->

<div class="row">
<header class="col-lg-12">
 	<div class="pull-right">
		<a href="<?php echo url('add?user_type='.$user_type); ?>" class="btn btn-primary pull-right openwin"> <i class="icon icon-plus "></i> 新增用户</a>
	</div>
</header>
</div>
<div class="row">

	<div class="col-lg-12">

		<section class="panel general">
			<div class="panel-heading tab-bg-dark-navy-blue">
				<ul class="nav nav-tabs">
					<?php $_result=config('USER_GROUP_TYPE');if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<li <?php if($key == $user_type): ?>class="active"<?php endif; ?>>
					<a href="<?php echo url('user/index',array('user_type'=>$key)); ?>"><?php echo $item; ?></a>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="panel-body">
				<div class="tab-content">
					<div class="tab-pane fade in active">

						<div class="form-inline">
    <form method="get"  role="form">

        <?php if(is_array($searchbar) || $searchbar instanceof \think\Collection || $searchbar instanceof \think\Paginator): $i = 0; $__LIST__ = $searchbar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;if($field['type'] == 'hidden'): ?>
        <input type="hidden" name="<?php echo $field['name']; ?>" value="<?php echo (isset($param[$field['name']]) && ($param[$field['name']] !== '')?$param[$field['name']]:''); ?>"/>
        <?php else: ?>
        <div class="form-group">
            <!--<label class="control-label"><?php echo htmlspecialchars($field['title']); ?></label>-->
            <?php echo widget('common/Form/show',array($field,$param)); ?>
        </div>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">搜索</button>
        </div>

    </form>
</div>
							<table class="table user-list table-hover">
								<thead>
								<tr>
									<th>
										<span>用户</span>
									</th>
									<th>
										<span>手机号码</span>
									</th>
									<th>
										<span>注册时间</span>
									</th>
									<th class="text-center">
										<span>状态</span>
									</th>
									<th>操作</th>
								</tr>
								</thead>
								<tbody>
								<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
								<tr>
									<td>
										<img src="<?php echo avatar($item['uid']); ?>" alt=""/>
										<span class="user-subhead"><?php echo $item['username']; ?></span>
									</td>
									<td>
										<span ><?php echo $item['mobile']; ?></span>
									</td>

									<td><?php echo date('Y-m-d H:i:s',$item['reg_time']); ?></td>
									<td class="text-center">
										<?php if($item['status']): ?>
										<span class="label label-primary">启用</span>
										<?php else: ?>
										<span class="label label-danger">禁用</span>
										<?php endif; ?>
									</td>
									<td>
										<a href="<?php echo url('User/add',array('uid'=>$item['uid'])); ?>" class="table-link openwin"
										   w="800px" h="700px" title="编辑用户">
											编辑
										</a>
										<?php if($user_type=='admin'): ?>
										<a href="<?php echo url('User/auth',array('id'=>$item['uid'])); ?>" class="table-link openwin" title="用户授权">
											授权
										</a>
										<?php endif; ?>
										<a href="<?php echo url('User/del',array('uid'=>$item['uid'])); ?>" class="table-link confirm ajax-get">
											删除
										</a>
									</td>
								</tr>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
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



