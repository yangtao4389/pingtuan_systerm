<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:64:"D:\www\pingtuan_systerm/application/admin\view\config\group.html";i:1511857738;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1513221665;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:66:"D:\www\pingtuan_systerm/application/admin\view\public\editcss.html";i:1512009968;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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

<header class="row">
	<div class="col-lg-12 col-sm-12">

		<div class="pull-right">
			<a href="<?php echo url('Config/index'); ?>" class="btn btn-primary">
				<i class="icon icon-list"></i>
				配置列表
			</a>
			<a href="<?php echo url('Config/add'); ?>" class="btn btn-danger">
				<i class="icon icon-plus"></i>
				添加配置
			</a>
		</div>
	</div>
</header>
<div class="row">

	<div class="col-lg-12">

		<section class="panel general">

			<div class="panel-heading tab-bg-dark-navy-blue">
				<ul class="nav nav-tabs">
					<?php $_result=config('config_group_list');if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<li <?php if($key == $id): ?>class="active"<?php endif; ?>>
					<a href="<?php echo url('Config/group',array('id'=>$key)); ?>"><?php echo $item; ?></a>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="panel-body">

				<div class="tab-content">
					<div class="tab-pane fade in active" id="tab-home">
						<form method="post" class="form form-horizontal" role="form">
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>


							<div class="form-group">
								<label  class="col-lg-2 col-sm-2 control-label"><?php echo $item['title']; ?></label>
								<div class="col-lg-10 col-sm-10">
									<?php switch($item['type']): case "text": ?>
									<input type="text" class="form-control" name="config[<?php echo $item['name']; ?>]" id="config[<?php echo $item['name']; ?>]" value="<?php echo $item['value']; ?>" placeholder="<?php echo $item['title']; ?>" style="width:50%;">
									<?php break; case "num": ?>
									<input type="text" class="form-control" name="config[<?php echo $item['name']; ?>]" id="config[<?php echo $item['name']; ?>]" value="<?php echo $item['value']; ?>" placeholder="<?php echo $item['title']; ?>" style="width:30%;">
									<?php break; case "string": ?>
									<input type="text" class="form-control" name="config[<?php echo $item['name']; ?>]" id="config[<?php echo $item['name']; ?>]" value="<?php echo $item['value']; ?>" placeholder="<?php echo $item['title']; ?>" style="width:80%;">
									<?php break; case "textarea": ?>
									<textarea class="form-control" name="config[<?php echo $item['name']; ?>]" id="config[<?php echo $item['name']; ?>]" style="width:80%; height:120px;"><?php echo $item['value']; ?></textarea>
									<?php break; case "select": ?>
									<select class="form-control" name="config[<?php echo $item['name']; ?>]" id="config[<?php echo $item['name']; ?>]" style="width:auto;">
										<?php $_result=parse_config_attr($item['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo $key; ?>" <?php if($item['value'] == $key): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<?php break; case "bool": ?>
									<select class="form-control" name="config[<?php echo $item['name']; ?>]" id="config[<?php echo $item['name']; ?>]" style="width:auto;">
										<?php $_result=parse_config_attr($item['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
										<option value="<?php echo $key; ?>" <?php if($item['value'] == $key): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									<?php break; endswitch; if(in_array($item['type'],["image","images","datetime","tags"])): 
									$fieldarr = array(
									'name'=>'config['.$item['name'].']',
									'title'=>$item['title'],
									'type'=>$item['type'],
									'option'=>$item['extra'],
									);
									$_cfginfo = array(
									'config['.$item['name'].']'=>$item['value']
									);
									 ?>
									<?php echo widget('common/Form/show',array($fieldarr,$_cfginfo)); endif; if($item['remark']): ?>
									<span class="help-block">（<?php echo $item['remark']; ?>）</span>
									<?php endif; ?>
								</div>
							</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							<div class="form-group">
								<div class="col-lg-offset-4 col-sm-offset-4 col-lg-8 col-sm-8">
									<button type="submit" class="btn btn-success submit-btn ajax-post" target-form="form">确认提交</button>

								</div>
							</div>
						</form>
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



