<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:63:"D:\www\pingtuan_systerm/application/admin\view\public\edit.html";i:1511859798;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1513221665;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:66:"D:\www\pingtuan_systerm/application/admin\view\public\editcss.html";i:1512009968;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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

 <div class="row">
	 <div class="col-lg-12">
		 <div class="panel">
			 <header class="panel-heading">
				 <?php echo $meta_title; ?>
			 </header>
			 <div class="panel-body">


				 <form method="post" class="form form-horizontal">
					 <?php if(!isset($info)): $info = ''; endif; if(!empty($fieldGroup)): ?>
					 <div class="panel-heading tab-bg-dark-navy-blue">
						 <ul class="nav nav-tabs">
							 <?php if(is_array($fieldGroup) || $fieldGroup instanceof \think\Collection || $fieldGroup instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldGroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vGroup): $mod = ($i % 2 );++$i;?>
							 <li <?php if($i == 1): ?>class="active"<?php endif; ?>><a href="#tab<?php echo $key; ?>" data-toggle="tab"><?php echo $key; ?></a></li>
 							 <?php endforeach; endif; else: echo "" ;endif; ?>
						 </ul>
					 </div>
					 <div class="panel-body">
 						 <div class="tab-content ">
 						 <?php if(is_array($fieldGroup) || $fieldGroup instanceof \think\Collection || $fieldGroup instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldGroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vGroup): $mod = ($i % 2 );++$i;?>
							<div class="tab-pane fade <?php if($i == 1): ?> in active<?php endif; ?>" id="tab<?php echo $key; ?>" >
							 	 <?php if(is_array($vGroup) || $vGroup instanceof \think\Collection || $vGroup instanceof \think\Paginator): $i = 0; $__LIST__ = $vGroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;if($field['type'] == 'hidden'): ?>
							 			<input type="hidden" name="<?php echo $field['name']; ?>" value="<?php echo (isset($info[$field['name']]) && ($info[$field['name']] !== '')?$info[$field['name']]:''); ?>"/>
							 		<?php else: ?>
										 <div class="form-group">
								 <label class="col-lg-2 col-sm-2 control-label"><?php echo htmlspecialchars($field['title']); ?></label>
								 <div class="col-lg-10 col-sm-10">
									 <?php echo widget('common/Form/show',array($field,$info)); ?>
									 <div class="help-block"><?php echo (isset($field['help']) && ($field['help'] !== '')?$field['help']:''); ?></div>
								 </div>
							 </div>
							 		<?php endif; endforeach; endif; else: echo "" ;endif; ?>
						   	 </div>

						 <?php endforeach; endif; else: echo "" ;endif; ?>
					     </div>
		              </div>
			 <?php elseif(isset($keyList)): if(is_array($keyList) || $keyList instanceof \think\Collection || $keyList instanceof \think\Paginator): $i = 0; $__LIST__ = $keyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;if($field['type'] == 'hidden'): ?>
			 <input type="hidden" name="<?php echo $field['name']; ?>" value="<?php echo (isset($info[$field['name']]) && ($info[$field['name']] !== '')?$info[$field['name']]:''); ?>"/>
			 <?php else: ?>
			 <div class="form-group">
				 <label class="col-lg-2 col-sm-2 control-label"><?php echo htmlspecialchars($field['title']); ?></label>
				 <div class="col-lg-10 col-sm-10">
					 <?php echo widget('common/Form/show',array($field,$info)); ?>
					 <div class="help-block"><?php echo (isset($field['help']) && ($field['help'] !== '')?$field['help']:''); ?></div>
				 </div>
			 </div>
			 <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
			 <div class="form-group">
				 <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
					 <input type="hidden" name="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:''); ?>">
					 <button class="btn btn-success submit-btn ajax-post" type="submit" target-form="form-horizontal">确 定</button>
					 <button class="btn btn-danger btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
				 </div>
			 </div>
			 </form>
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



