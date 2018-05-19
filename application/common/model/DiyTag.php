<?php
/**
 * Created by PhpStorm.
 * User:jiayongwei
 * Date: 2018/1/9
 * Time: 13:41
 */

namespace app\common\model;


class DiyTag extends Base
{

    public $addfield = array(
        array('name'=>'id', 'title'=>'ID', 'type'=>'hidden', 'help'=>'', 'option'=>''),
        array('name'=>'tagname', 'title'=>'标签名','type'=>'text','help'=>'','option'=>''),
        array('name'=>'tagdescript', 'title'=>'标签描述','type'=>'text','help'=>'','option'=>''),
        array('name'=>'status', 'title'=>'状态','type'=>'select', 'option'=>array(0=>'无效',1=>'有效'))
    );
public $searchbar = array(
    array('name'=>'tagname','title'=>'标签名','help'=>'','type'=>'text','option'=>array()),
    array('name'=>'status', 'title'=>'状态','type'=>'select', 'option'=>array('-1'=>'全部',0=>'无效',1=>'有效'))
);
}