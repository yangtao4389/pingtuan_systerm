<?php
/**
 * Created by PhpStorm.
 * User:jiayongwei
 * Date: 2017/11/29
 * Time: 14:34
 */

namespace app\index\controller;
use think\Db;


class Index extends Base
{
    public function index()
    {
//        $config = model('Config')->lists();  //这个会自动去调用model下面的Config.php  具体是哪个model，都可以自己去定义，因为thinkphp是自动去搜寻然后加载的类名
//        echo var_dump($config);
//        print_r(config("view_replace_str")["__PUBLIC__"]);
        $this->setMeta('拼团系统');
        $this->assign('pageflag','index');
        return $this->fetch();
    }
     public function lesson($id1,$id2)
     {
         var_dump($id1,$id2);
         return;
     }
    public function func()
    {
        $funlist = array(
            '首页'=>array('顶部导航','自定义图标','商品列表','正在拼团','最近拼团（发现）'),
            '商品相关'=>array('分类列表','子分类图标','搜索页面','秒杀、折扣、抽奖、品牌街','活动自定义',
                '商品相册','正在拼团','最近开团','商品详情','几人团提示','简短描述','活动标识','店铺信息',
                '店铺推荐','最近评论','服务标签','购买数量','商品属性组合（最多2组）','自定义属性组合价格',
                '单独购买','拼团购买','参团购买','收藏'
            ),
            '商家店铺'=>array('店铺基础信息','店铺商品列表','联系商家','收藏店铺'),
            '支付相关'=>array('订单核对页','商品数量可更改','自动使用优惠券','微信支付','收货地址'),
            '个人中心'=>array('头像','个人信息','订单列表','已发货订单','待发货订单','待付款订单','待收货订单','待拼单订单',
                '收藏的店铺','收藏的商品','我的优惠券','已使用优惠券','未使用优惠券','收货地址管理','默认收货地址',
                '添加修改收货地址','帮助中心'),
            '订单列表'=>array('订单缩略图','订单商品数量','订单进度及状态','下拉自动加载'),
            '订单详情'=>array('收货地址展示','分享到朋友圈','联系商家','商品信息展示','快递信息查询','活动详情查询','拼团进度提示','拼团人数展示',
                '联系商家','发表评论','评论带标签','再次付款(支付失败后)')
        );
        $this->setMeta('开源拼团系统-功能列表');
        $this->assign('funlist', $funlist);
        $this->assign('pageflag', 'func');
        return $this->fetch();
    }
    //下载
    public function download()
    {
        $this->setMeta('开源拼团系统-源码下载');
        $this->assign('pageflag', 'download');
        return $this->fetch();
    }

}