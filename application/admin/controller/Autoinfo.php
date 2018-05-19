<?php
/**
 * Created by PhpStorm.
 * User: 304455977@qq.com
 * Date: 2017/11/14
 * Time: 15:50
 */

namespace app\admin\controller;

use think\Db;

class Autoinfo extends Base
{
    public function formatTaginput($value,$text)
    {
        return ['text'=>$text,'value'=>$value];
    }
    public function getDiyTag()
    {
        $groupname=input('groupname', '');//product,comment,service
        $op = input('op', '');//setinfo   getinfo
        $key = input('key', ''); //关键词  或1,2,3
        $result = [];
        $list = [];
        if($op=="setinfo"){
            $list = Db::name('diytag')->where('groupname',$groupname)->where('id','in',$key)->select();
        }else{
            $list = Db::name('diytag')->where('groupname', $groupname)->where('tagname','like',"%$key%")->select();

        }
        foreach ($list as $val){
            $result[] = $this->formatTaginput($val['id'], $val['tagname']);
        }
        return $result;
    }
    public function formatRow($id,$value)
    {
        return ['id'=>$id,'label'=>$value,'value'=>$value];
    }
    public function getProduct()
    {
        $key = input('term', '');
        $id= input('id', '');
        if($id){
            $product = Db::name('product')->where('id', $id)->field('id,title')->find();
            return $this->formatRow($product['id'],$product['title']);
        }
        $product = Db::name('product')->where('title','like',"%$key%")->limit(10)->select();
        $result = [];
        foreach ($product as $val){
            $result[]=$this->formatRow($val['id'],$val['title']);
        }
        return $result;
    }
    public function getAutoSelect_Shop()
    {
        $key = input('term', '');
        $id= input('id', '');
        if($id){
            $shop = Db::name('shop')->where('id', $id)->field('id,title')->find();
            return $this->formatRow($shop['id'],$shop['title']);
        }
        $shop = Db::name('shop')->where('title','like',"%$key%")->limit(10)->select();
        $result = [];
        foreach ($shop as $val){
            $result[]=$this->formatRow($val['id'],$val['title']);
        }
        return $result;
    }
    public function getUserlist()
    {
        $key = input('term', '');
        $id= input('id', '');
        if($id){
            $uinfo = Db::name('member')->where('uid', $id)->find();
            return $this->formatRow($uinfo['uid'],$uinfo['username']);
        }
        $ulist = Db::name('member')->where('username|mobile','like',"%$key%")->limit(10)->select();
        $result = [];
        foreach ($ulist as $val){
            $result[]=$this->formatRow($val['uid'],$val['username']);
        }
        return $result;
    }
}