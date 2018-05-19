<?php
/**
 * Created by PhpStorm.
 * User: 304455977@qq.com
 * Date: 2017/11/15
 * Time: 15:39
 */

namespace app\admin\controller;

use think\Db;


class Diycontent extends Base
{
    public function index()
    {
        $group_title = input('group_title', 'index');
        $placeid  = input('placeid', 0);


        $where = [];
        $where['placeid'] = $placeid;
        if($placeid>0){
             $group_title = Db::name('diy_place')->where('id', $placeid)->value('group_title');
        }
        $placelist = Db::name('diy_place')->where('group_title', $group_title)->order('sort_num asc')->select();

        $mod = model('DiyContent');
        $contentlist = Db::name('diy_content')->where($where)->order("sort_num asc")->paginate(15);
        $placegroup=$mod->placefield['group_title']['option'];
        $this->assign('placelist', $placelist);
        $this->assign('placegroup', $placegroup);
        $this->assign('page',$contentlist->render());
        $this->assign('group_title',$group_title);
        $this->assign('placeid', $placeid);
        $this->assign('contentlist', $contentlist);
        $this->setMeta('自定义内容');
        return $this->fetch();
    }
    public function addPlace()
    {
        $id = input('id', 0);
        $data = input('param.');
        $group_title = input('group_title', '');
         $mod = model('DiyContent');
        if (IS_POST) {
            if(!$data['title'] || !$data['group_title'])return $this->error('位置和标题不能为空!');
            $mod->autosave('diy_place',$data);
            return $this->success("保存成功！", '','parent_reload');
        } else {
            $info['group_title']=$group_title;
            if($id>0)$info = Db::name('diy_place')->where('id', $id)->find();
            $keylist = $mod->placefield;
            $data             = array(
                'info'    => $info,

                'keyList' => $keylist,
            );
            $this->assign($data);
            $this->setMeta("添加/编辑位置");
            return $this->fetch('public/popedit');
        }
    }
    public function addContent()
    {
        $id = input('id', 0);
        $data = input('param.');
        $placeid = input('placeid', '');
        $mod = model('DiyContent');
        if (IS_POST) {
            if(!$placeid ||!$data['title'])return $this->error('位置和标题不能为空!');
            $mod->autosave('diy_content',$data);
            return $this->success("保存成功！", '','parent_reload');
        } else {
            $info['placeid']=$placeid;
            if($id>0)$info = Db::name('diy_content')->where('id', $id)->find();
            $keylist = $mod->contentfield;
             $data             = array(
                'info'    => $info,
                'keyList' => $keylist,
            );
            $this->assign($data);
            $this->setMeta("添加/编辑内容");
            return $this->fetch('public/popedit');
        }

    }
    public function delplace()
    {
        $id = input('id', 0);
        $group_title = Db::name('diy_place')->where('id', $id)->value('group_title');
        Db::name('diy_place')->where('id',$id)->delete();
        Db::name('diy_content')->where('placeid',$id)->delete();

        return $this->success('删除成功','/admin/diycontent/index?group_title='.$group_title);
    }
    public function delcontent()
    {
        $id = input('id', 0);
        Db::name('diy_content')->where('id',$id)->delete();
        return $this->success('删除成功');
    }


}