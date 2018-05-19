<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:60:"D:\www\zhiyunzhushou/application/index\view\index\index.html";i:1514969609;s:60:"D:\www\zhiyunzhushou/application/index\view\public\base.html";i:1512351638;s:62:"D:\www\zhiyunzhushou/application/index\view\public\header.html";i:1513221553;s:62:"D:\www\zhiyunzhushou/application/index\view\public\footer.html";i:1514342717;}*/ ?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $meta_title; ?>-微信版，手机APP版</title>
    <meta name="keywords" content="开源多商户拼团系统,微信拼团系统,手机APP拼团系统">
    <meta name="description" content="智云多商户开源拼团系统,开源拼团系统,微信拼团系统开源,App端开源拼团系统，开源拼团系统">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/bootstrap.min.css">
    <!--For Plugins external css-->
    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/plugins.css" />
    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/roboto-webfont.css" />
    <!--Theme custom css -->
    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/style.css">
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="__PUBLIC__/home/assets/css/responsive.css" />

    <script src="__PUBLIC__/home/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>



<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="__PUBLIC__/home/assets/images/logo.png" alt="Logo" />
            </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li <?php if($pageflag=="index"): ?> class="active" <?php endif; ?>><a href="/">首页</a></li>
                <li ><a href="/#business">核心亮点</a></li>
                <li <?php if($pageflag=="func"): ?> class="active" <?php endif; ?>><a href="/func">功能列表</a></li>
                <li <?php if($pageflag=="download"): ?> class="active" <?php endif; ?>><a href="/download">源码下载</a></li>

                <li class="login"><a href="#">QQ:304455977</a></li>
            </ul>

        </div>
    </div>
</nav>




        <!--Home page style-->
        <header id="home" class="home">
            <div class="overlay-fluid-block">
                <div class="container text-center">
                    <div class="row">
                        <div class="home-wrapper">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="home-content">
                                     <div class="row">
                                        <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                            <div class="home-contact">
                                                <div class="btn btn-default">
                                                    <a href="/download" style="color:#fff">下载源码</a>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>			
            </div>
        </header>



        <section id="service" class="service2 sections lightbg" style="background-color: #fff">
            <div class="container">
                <div class="row">
                    <div class="main_service2">
                        <div class="head_title text-center">
                            <h2>扫码体验</h2>
                            <p>微信端、APP端、商户后台、总后台</p>
                        </div>

                        <div class="service_content">
                            <div class="col-md-6 col-sm-6">
                                <img src="__PUBLIC__/images/wechat.jpg" width="200" height="200" />

                                    <div class="single_service_right">

                                        <h2>微信端</h2>
                                        <p>扫码看演示</p>
                                    </div>

                            </div>
                            <div class="col-md-6 col-sm-6">
                                <img src="__PUBLIC__/images/apk.png"    width="200" height="200" />

                                    <div class="single_service_right">
                                        <h2>APP端</h2>
                                        <p>二维码为安卓版</p>
                                    </div>

                            </div>
                            <!--<div class="col-md-6 col-sm-6">-->
                                <!--<div class="single_service2">-->
                                    <!--<div class="single_service_left">-->
                                        <!--<img src="__PUBLIC__/home/assets/images/shop_manage.png"  >-->
                                    <!--</div>-->
                                    <!--<div class="single_service_right">-->
                                        <!--<h2>商户后台</h2>-->
                                        <!--<p>对商品进行上下架，快递单打印，报名活动，统计分析等</p>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="col-md-6 col-sm-6">-->
                                <!--<div class="single_service2">-->
                                    <!--<div class="single_service_left">-->
                                        <!--<img src="__PUBLIC__/home/assets/images/super_admin.png" alt="" />-->
                                    <!--</div>-->
                                    <!--<div class="single_service_right">-->
                                        <!--<h2>总后台</h2>-->
                                        <!--<p>一个后台对所有终端进行管理，审批店铺，商品管理，报表统计等</p>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- End of Service2 Section -->



        <!-- Sections -->
        <section id="business" class="portfolio sections" >
            <div class="container">
                <div class="head_title text-center">
                    <h1>核心亮点</h1>
                    <p>十年技术积累、高可用的技术架构，流畅的用体验，全方面保证系统的可靠稳定性</p>

                </div>

                <div class="row">
                    <div class="portfolio-wrapper text-center">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="community-edition">
                                <i class="fa fa-book"></i>
                                <div class="separator"></div>
                                <h4>玩法多样</h4>
                                <p>
                                    支持秒杀、团长免单、折扣团、抽奖、品牌街等，可自定义活动。

                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="community-edition">
                                <i class="fa fa-dollar"></i>
                                <div class="separator"></div>
                                <h4>自动结算</h4>
                                <p>
                                    当用户拼团成功后，系统自动结算，未成团的自动原路退款；
                                    无需人工干预。
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="community-edition">
                                <i class="fa fa-gears"></i>
                                <div class="separator"></div>
                                <h4>高可用技术架构</h4>
                                <p>采用最前沿的HTML5+CSS3+Vue开发，响应式系统、模块化开发、图片延迟加载、自动适配微信端等各种浏览器
                                     </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="community-edition">
                                <i class="fa fa-external-link"></i>
                                <div class="separator"></div>
                                <h4>强大的营销功能</h4>
                                <p>
                                    分享到微信圈；优惠券发放支持指定全终端通用，或只App可用等各种组合，自定义活动多端自动同步，后续功能继续增加中
                                 </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Example row of columns -->
                <div class="row">
                    <div class="portfolio-wrapper2 text-center">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="community-edition">
                                <i class="fa fa-coffee"></i>
                                <div class="separator"></div>
                                <h4>流畅的用户体验</h4>
                                <p>不管用户端还是后台，整体采用响应式设计，使操作更加高效和自然</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="community-edition">
                                <i class="fa fa-area-chart"></i>
                                <div class="separator"></div>
                                <h4>完善的报表统计</h4>
                                <p>每日新增用户、收入汇总、订单汇总、销售排行。让您随时知道系统状况</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="community-edition">
                                <i class="fa fa-print"></i>
                                <div class="separator"></div>
                                <h4>快递单套打</h4>
                                <p>支持快递单选中后批量打印，无需手写！提高发货速度,智云更贴心。</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="community-edition">
                                <i class="fa fa-folder-open"></i>
                                <div class="separator"></div>
                                <h4>功能模块丰富</h4>
                                <p>目前有物流查询、收藏商品与店铺、地址管理、评论功能且带评价标签、订单模块、商品属性自定义价格等</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- /container -->       
        </section>




<!--Footer-->
<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-wrapper">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer-brand">
                        <img src="__PUBLIC__/home/assets/images/logo.png" alt="logo" />
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="copyright">

                        <p>联系方式:QQ <b>304455977</b>(备注智云拼团),电话:<b>15853332556</b>

                        </p>
                        <p>   备案号：<?php echo config('web_site_icp'); ?></p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>





<script src="__PUBLIC__/home/assets/js/vendor/jquery-1.11.2.min.js"></script>
<script src="__PUBLIC__/home/assets/js/vendor/bootstrap.min.js"></script>

</body>
</html>
