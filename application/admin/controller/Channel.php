<?php
/**
 * Created by PhpStorm.
 * User:jiayongwei
 * Date: 2017/11/28
 * Time: 10:52
 */

namespace app\admin\controller;
use think\Db;

class Channel extends  Base
{
    public function _initialize() {
        parent::_initialize();
    }

    public function index() {
        $list  = Db::name("channel")->field(true)->order('sort_num asc,id asc')->column('*', 'id');
         if (!empty($list)) {
            $tree = new \com\Tree();
            $list = $tree->toFormatTree($list,'title','id','parent_id');
        }

        $this->setMeta('频道列表');
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function editable($name = null, $value = null, $pk = null) {
        if ($name && ($value != null || $value != '') && $pk) {
            db('channel')->where(array('id' => $pk))->setField($name, $value);
        }
    }

    public function add() {
        if (IS_POST) {
            $mod = model('Channel');
            $data = input('post.');
            $mod->save($data);
            return $this->success('新增成功', '/admin/channel/index');
        } else {
            $this->assign('info', array('parent_id' => input('pid')));
            $menus = Db::name('channel')->select();
            $tree  = new \com\Tree();
            $menus = $tree->toFormatTree($menus,'title','id','parent_id');
            if (!empty($menus)) {
                $menus = array_merge(array(0 => array('id' => 0, 'title_show' => '顶级类别')), $menus);
            } else {
                $menus = array(0 => array('id' => 0, 'title_show' => '顶级菜单'));
            }

            $this->assign('Menus', $menus);
            $this->setMeta('新增类别');
            return $this->fetch('edit');
        }
    }


    public function edit($id = 0) {
        if (IS_POST) {
            $mod = model('Channel');
            $data = input('post.');
            if ($mod->save($data, array('id' => $data['id'])) !== false) {
                return $this->success('更新成功', '/admin/channel/index');
            } else {
                return $this->error('更新失败');
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info  = Db::name('channel')->field(true)->find($id);
            $menus = Db::name('channel')->field(true)->select();
            $tree  = new \com\Tree();
            $menus = $tree->toFormatTree($menus,'title','id','parent_id');
             $menus = array_merge(array(0 => array('id' => 0, 'title_show' => '顶级类别')), $menus);

            $this->assign('Menus', $menus);
            if (false === $info) {
                return $this->error('获取类别信息错误');
            }
            $this->assign('pageheight',700);
            $this->assign('info', $info);
            $this->setMeta('编辑类别');
            return $this->fetch();
        }
    }

    public function del() {
        $id = input('id',0);
        Db::name('channel')->where('id|parent_id', $id)->delete();
        return $this->success('删除成功');
    }
    /*
     * 内容列表
     * */
    public function contentlist()
    {
        $title = input('title', '');
        $type_id = input('type_id', 0);

        if($type_id>0){//读出所有子分类
            $tidlist = Db::name('channel')->where('id|parent_id', $type_id)->select();
            $tidarr = [];
            foreach ($tidlist as $val){
                $tidarr[] = $val['id'];
            }
            if($tidarr){
                $where['cont.type_id'] = ['in', $tidarr];
            }
        }
        $where = [];
        if($title){
            $where['cont.title'] = ['like',"%$title%"];
        }
        $mod = model('ChannelContent');
        $searchbar = $mod->searchbar;
        $types = Db::name('channel')->field(true)->select();
        $tree  = new \com\Tree();
        $types = $tree->toFormatTree($types,'title','id','parent_id');

        foreach ($types as $val){
            $searchbar['type_id']['option'][$val['id']] = $val['title_show'];
        }

        $list =Db::name('channel_content')->alias('cont')
                ->join("channel t","cont.type_id=t.id")
                ->field("cont.*,t.title as channel_name")
                ->where($where)->order('cont.create_time desc')->paginate(15);
        $data = array(
            'searchbar'=>$searchbar,
            'list'=>$list,
            'page'=>$list->render()
        );

        $this->setMeta('内容列表');
        $this->assign($data);
        return $this->fetch();
    }
    public function addcontent()
    {
        $id = input('id', 0);
        $data = input('param.');
        $mod = model('ChannelContent');
        if (IS_POST) {
            if(!$data['title'])return $this->error('标题不能为空!');
            if(!$id){
                $data['create_time'] = time();
            }
            $data['publish_time'] = strtotime($data['publish_time']);
            $mod->autosave('channel_content',$data);
            return $this->success("保存成功！", '/admin/channel/contentlist');
        }
        $info = [];
        if($id>0){
            $info = Db::name('channel_content')->where('id', $id)->find();
        }
            $keylist = $mod->addfield;
        $types = Db::name('channel')->field(true)->select();
        $tree  = new \com\Tree();
        $types = $tree->toFormatTree($types,'title','id','parent_id');

        foreach ($types as $val){
            $keylist['type_id']['option'][$val['id']] = $val['title_show'];
        }
            $data             = array(
                'info'    => $info,
                 'keyList' => $keylist,
            );
            $this->assign($data);
            $this->setMeta("添加/编辑内容");
            return $this->fetch('public/edit');

    }
    public function delcontent()
    {
        $id = input('id',0);
        Db::name('channel_content')->where('id', $id)->delete();
        return $this->success('删除成功');
    }
    public function editcontent($name = null, $value = null, $pk = null) {
        if ($name && ($value != null || $value != '') && $pk) {
            db('channel_content')->where(array('id' => $pk))->setField($name, $value);
        }
    }

}