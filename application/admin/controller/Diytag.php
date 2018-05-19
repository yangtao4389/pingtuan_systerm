<?php
/**
 * Created by PhpStorm.
 * User:jiayongwei
 * Date: 2018/1/9
 * Time: 13:38
 */

namespace app\admin\controller;
use think\Db;

class Diytag extends  Base
{

   public function  index()
   {
       $tagname = input('tagname', '');
       $status = input('status', -1);
       $where = [];  // where这个为thinkphp自带的一个查询筛选
       if($tagname){
           $where['tagname'] = ['like', "%$tagname%"];
       }
       if($status !=-1){
           $where['status'] = $status;
       }
       $list = Db::name('diytag')->where($where)->order("id desc")->paginate(10);  //paginate是thinkphp自带的分页
       $mod = model("DiyTag");
       $searchbar = $mod->searchbar;
       $data = array(
           'list'=>$list,
       'searchbar'=>$searchbar,
       'page'=>$list->render()
       );
       $this->assign($data);
       $this->setMeta('标签列表');
       return $this->fetch();
   }
    public function edittag($name = null, $value = null, $pk = null) {
        if ($name && ($value != null || $value != '') && $pk) {
            Db::name('diytag')->where(array('id' => $pk))->setField($name, $value);
        }
    }
    public function add()
    {
        $data = input('param.');// $_REQUEST  类似于$_REQUEST
        $id = input('id', 0);
        $mod = model("DiyTag");  // 取model的数据
        if(IS_POST){
            if(!$data['tagname']){
                return $this->error('标签名不能为空');
            }
            $mod->autosave('diytag', $data);
            return $this->success('保存成功','','parent_reload');  // 第二个参数为跳转链接 如果在当前页面跳转 就不用 

        }
        $keylist = $mod->addfield;
        $info=[];
        if($id>0){
            $info = Db::name('diytag')->where('id', $id)->find();  // find() 加上就不是直接一个对象
        }
        $data = array(
            'info'=>$info,
            'keyList'=>$keylist,
        );
        $this->setMeta('添加编辑标签');
        $this->assign($data);
        return $this->fetch("public/popedit");
    }
    public function deltag()
    {
        $id = input('id', 0);
        if($id>0){
            Db::name('diytag')->where('id', $id)->delete();
            return $this->success('删除成功');
        }
    }
}