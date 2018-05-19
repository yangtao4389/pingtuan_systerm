<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:64:"D:\www\pingtuan_systerm/application/admin\view\diytag\index.html";i:1515482330;s:63:"D:\www\pingtuan_systerm/application/admin\view\public\base.html";i:1526737469;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\header.html";i:1512358709;s:68:"D:\www\pingtuan_systerm/application/admin\view\public\searchbar.html";i:1511492374;s:65:"D:\www\pingtuan_systerm/application/admin\view\public\footer.html";i:1514966627;}*/ ?>
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
    <div class=" col-lg-12 col-sm-12">

        <div class="pull-right">

            <a class="btn btn-primary openwin" href="<?php echo url('admin/diytag/add'); ?>" w="700px" h="800px" title="添加标签">添加标签</a>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
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
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>标签名</th>
                        <th>标签描述</th>

                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>

                        <td>
                            <a href="#" class="editable editable-click" data-id="<?php echo $item['id']; ?>"
                               data-name="tagname" data-type="text"
                               data-pk="<?php echo $item['id']; ?>" data-url="<?php echo url('edittag'); ?>">    <?php echo $item['tagname']; ?>
                            </a>
                        </td>
                        <td><?php echo $item['tagdescript']; ?></td>

                         <td>
                            <a href="#" data-type="select" data-pk="<?php echo $item['id']; ?>"
                               data-url="<?php echo url('edittag'); ?>" select-val="<?php echo $item['status']; ?>" data-name="status" data-title="审核"
                               class="edit_status" >
                            </a>

                        </td>
                        <td>
                            <a href="<?php echo url('admin/diytag/add?id='.$item['id']); ?>" class="openwin"   w="700px" h="800px">编辑</a>
                            <a href="<?php echo url('deltag?id='.$item['id']); ?>" class="ajax-get confirm">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                    </tbody>
                </table>
                <?php echo $page; ?>
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
        $('.edit_status').each(function (index,element) {
            $(this).editable({
                value:$(this).attr('select-val'),
                source: [
                    {value: 0, text: '未审核'},
                    {value: 1, text: '已审核'}
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



