<?php
/**
 * Created by PhpStorm.
 * User: 304455977@qq.com
 * Date: 2017/11/15
 * Time: 16:09
 */

namespace app\common\model;


class DiyContent extends Base
{
    public  $placefield = array(
        array('name'=>'id', 'title'=>'ID', 'type'=>'hidden', 'help'=>'', 'option'=>''),
        'group_title'=>array('name'=>'group_title','title'=>'分组','type'=>'select','option'=>array('index'=>'首页','list'=>'列表')),
        array('name'=>'title','title'=>'位置名','type'=>'text','option'=>array()),
        array('name'=>'sort_num','title'=>'排序','type'=>'num','option'=>array()),
     );


    public $contentfield = array(
        array('name'=>'id', 'title'=>'ID', 'type'=>'hidden', 'help'=>'', 'option'=>''),
        array('name'=>'placeid', 'title'=>'placeID', 'type'=>'hidden', 'help'=>'', 'option'=>''),
         array('name'=>'title','title'=>'标题','type'=>'text','option'=>''),
        array('name'=>'pic','title'=>'图片','type'=>'image','option'=>''),
        array('name'=>'content','title'=>'内容','type'=>'textarea','option'=>''),
        array('name'=>'gourl','title'=>'地址','type'=>'text','option'=>''),
        array('name'=>'sort_num','title'=>'排序','type'=>'num','option'=>array()),
    );

}