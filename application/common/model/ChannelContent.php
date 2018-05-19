<?php
/**
 * Created by PhpStorm.
 * User:304455977@qq.com
 * Date: 2017/11/28
 * Time: 12:02
 */

namespace app\common\model;


class ChannelContent extends Base
{
    public $searchbar = array(
        'type_id'=>array('name'=>'type_id','title'=>'类别','type'=>'select','option'=>array()),
        array('name'=>'title','title'=>'标题','help'=>'','type'=>'text','option'=>array()),

    );


    public $addfield = array(
        array('name'=>'id', 'title'=>'ID', 'type'=>'hidden', 'help'=>'', 'option'=>''),
        'type_id'=>array('name'=>'type_id','title'=>'类别','type'=>'select','option'=>array(),'help'=>'文章类别'),
        array('name'=>'title','title'=>'标题','help'=>'','type'=>'text','option'=>array()),
        array('name'=>'short_description','title'=>'简短描述','type'=>'textarea','option'=>array()),
        array('name'=>'content','title'=>'内容','help'=>'','type'=>'editor','option'=>array()),
        array('name'=>'publish_time','title'=>'发布时间','help'=>'','type'=>'datetime','option'=>array()),
    );


}