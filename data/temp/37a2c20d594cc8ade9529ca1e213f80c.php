<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"D:\www\pingtuan_systerm/application/admin\view\diycontent\index.html";i:1512352301;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1526737469;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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


<div class="row">

	<div class="col-lg-12">

		<section class="panel general">
			<div class="panel-heading tab-bg-dark-navy-blue">
				<ul class="nav nav-tabs">
					<?php if(is_array($placegroup) || $placegroup instanceof \think\Collection || $placegroup instanceof \think\Paginator): $i = 0; $__LIST__ = $placegroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<li <?php if($group_title == $key): ?>class="active"<?php endif; ?>>
					<a href="<?php echo url('index',array('group_title'=>$key)); ?>"><?php echo $item; ?></a>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active">

					<div class="row">
						<div class="col-lg-10 col-sm-10">
							<?php if(is_array($placelist) || $placelist instanceof \think\Collection || $placelist instanceof \think\Paginator): $i = 0; $__LIST__ = $placelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<a href="<?php echo url('index?placeid='.$item['id']); ?>" style="display: inline-block;padding: 2px;">

							<span class="label  <?php if($item['id']==$placeid): ?>label-primary<?php else: ?>label-default<?php endif; ?>">
						<?php echo $item['title']; ?>
							 </span> </a>
							&nbsp;

							<?php endforeach; endif; else: echo "" ;endif; ?>

						</div>


						<div class="pull-right">
							<a  title="新增位置" w="800px" h="500px" class=" btn btn-primary  openwin" href="<?php echo url('addplace?group_title='.$group_title); ?>">
								新增位置	 </a>
							<a  title="新增内容"  w="800px" h="500px"  class=" btn btn-primary  openwin" href="<?php echo url('addcontent?placeid='.$placeid); ?>">
								新增内容	 </a>
						</div>
					</div>
					<div class="table-responsive clearfix">
						<div class="table-responsive clearfix">
							<table class="table table-hover">
								<thead>
								<tr>
									<th>ID</th>
									<th>标题</th>
									<th>链接地址</th>
									<th>排序</th>
									<th>操作</th>
								</tr>
								</thead>
								<tbody>
								<?php if(is_array($contentlist) || $contentlist instanceof \think\Collection || $contentlist instanceof \think\Paginator): $i = 0; $__LIST__ = $contentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
								<tr>
									<td><?php echo $item['id']; ?></td>
									<td><?php echo $item['title']; ?></td>
									<td><?php echo $item['gourl']; ?></td>
									<td><?php echo $item['sort_num']; ?></td>
									<td>
										<a href="<?php echo url('addcontent?id='.$item['id']); ?>"  class="table-link openwin">编辑</a>
										<a href="<?php echo url('delcontent?id='.$item['id']); ?>" class="ajax-get confirm">删除</a>
									</td>
								</tr>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</div>
						<?php echo $page; if($placeid>0): ?>
						<div   class="pull-right">
							<a href="<?php echo url('addplace?id='.$placeid); ?>" class="btn btn-default  openwin"  w="800px" h="500px" >编辑此位置</a>
							<a href="<?php echo url('delplace?id='.$placeid); ?>" class="btn btn-default  ajax-get confirm">删除此位置</a>
						</div>
						<?php endif; ?>
					</div>
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



