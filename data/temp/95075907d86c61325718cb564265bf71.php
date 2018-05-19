<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:62:"D:\www\pingtuan_systerm/application/admin\view\menu\index.html";i:1511867865;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1513221665;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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




<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/bootstrap-editable.css">

<div class="row">
    <div class="col-md-12 col-lg-12">

        <ul class="breadcrumb">
            <li><a href="/admin/index/main"><i class="icon icon-home"></i> 首页</a></li>
            <li><a href="javascript:;"><?php echo $meta_title; ?></a></li>
        </ul>

    </div>
</div>


<div class="row">
<div class="col-lg-12 col-sm-12">

    <div class="pull-right">

        <a class="btn btn-primary" href="<?php echo url('add',array('pid'=>input('get.pid',0))); ?>">新 增</a>

    </div>
</div>
</div>
<div class="row">

    <div class="col-lg-12">
        <section class="panel">

            <div class="panel-body">
                <form class="ids">
                    <div class="table-responsive clearfix">
                        <table class="table table-hover">
                            <thead>
                            <tr>

                                <th>ID</th>
                                <th>名称</th>

                                <th>分组</th>
                                <th>URL</th>
                                <th>排序</th>
                                <th>隐藏</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo $menu['id']; ?></td>
                                <td>
                                    <?php echo $menu['level_show']; ?>
                                    <a href="#" class="editable editable-click" data-id="<?php echo $menu['id']; ?>" data-name="title" data-type="text"
                                       data-pk="<?php echo $menu['id']; ?>" data-url="<?php echo url('editable'); ?>"><?php echo $menu['title']; ?></a>
                                    <a class="add-sub-cate" title="添加子分类" href="<?php echo url('add?pid='.$menu['id']); ?>">
                                        <i class="icon icon-plus"></i>
                                    </a>
                                </td>

                                <td><?php echo $menu['group']; ?></td>
                                <td><?php echo $menu['url']; ?></td>
                                <td><a href="#" class="editable editable-click" data-id="<?php echo $menu['id']; ?>" data-name="sort" data-type="text" data-pk="<?php echo $menu['id']; ?>" data-url="<?php echo url('editable'); ?>"><?php echo $menu['sort']; ?></a></td>

                                <td>
                                    <a href="#" data-type="select" data-pk="<?php echo $menu['id']; ?>"
                                       data-url="<?php echo url('edittable'); ?>" select-val="<?php echo $menu['hide']; ?>" data-name="hide" data-title="隐藏"
                                       class="edit_hide" >
                                    </a>


                                </td>
                                <td>
                                    <a title="编辑" href="<?php echo url('edit?id='.$menu['id']); ?>">编辑</a>
                                    <a class="confirm ajax-get" title="删除" href="<?php echo url('del?id='.$menu['id']); ?>">删除</a>
                                </td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; else: ?>
                            <td colspan="10" class="text-center"> aOh! 暂时还没有内容!</td>
                            <?php endif; ?>
                            </tbody>
                        </table>
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

<script type="text/javascript" src="__PUBLIC__/js/bootstrap-editable.min.js"></script>
<script type="text/javascript">
$(function () {
     $('.editable').editable();
    $('.edit_hide').each(function (index,element) {
        $(this).editable({
            value:$(this).attr('select-val'),
            source: [
                {value: 0, text: '否'},
                {value: 1, text: '是'}
            ],
            validate: function (value) {
                if(value==null){
                    return '请选择';
                }

            }
        });
    });

});

</script>



