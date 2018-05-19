<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"D:\www\pingtuan_systerm/application/admin\view\index\login.html";i:1512358668;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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



<section class="content">

	<div class="row">

		<div class="panel-body" style="margin: 0 auto;width: 500px;margin-top: 10%">
			<section class="panel">
				<header class="panel-heading  text-center">
					智云拼团后台
				</header>
				<div class="panel-body">
					<form class="form-horizontal"  action="/admin/login">
						<div class="form-group">
							<label   class="col-lg-2 col-sm-2 control-label">用户名</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="username"   placeholder="请输入用户名"  style="width: 80%">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-lg-2 col-sm-2 control-label" >密码</label>
							<div class="col-lg-10">
								<input type="password" class="form-control"  name="password"  placeholder="请输入密码"  style="width: 80%">
							</div>
						</div>
						<div class="form-group">
							<label   class="col-lg-2 col-sm-2 control-label">验证码</label>
							<div class="col-lg-10 col-sm-10">
								<input type="text" name="verify" class="form-control" style="width: 60%;display: inline-block" placeholder="验证码">
								<span class="reloadverify">
                                            <img src="<?php echo url('admin/index/verify'); ?>" class="verifyimg" alt="验证码" height="40"  style="display: inline-block"
											>
                                        </span>
							</div>

						</div>

						<div class="form-group">
							<div class="col-lg-offset-4 col-lg-10 col-sm-offset-4 col-sm-10">
								<button type="submit" class="btn btn-danger">登 录</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>


	</div>

	<!-- row end -->
</section>
<script type="text/javascript">
    $(function(){

        $("form").submit(function(){
            var self = $(this);
            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;

            function success(data){
                if(data.code){
                    $.messager.show(data.msg, {placement: 'center',type:'success'});
                    setTimeout(function(){
                        window.location.href = data.url;
                    },2000);
                } else {
                    $.messager.show(data.msg, {placement: 'center',type:'success'});
                    //刷新验证码
                    $(".reloadverify").click();
                }
            }
        });

        //刷新验证码
        var verifyimg = $(".verifyimg").attr("src");
        $(".reloadverify").click(function(){
            if( verifyimg.indexOf('?')>0){
                $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
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
