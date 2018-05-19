<?php
namespace app\admin\controller;
use think\Db;

class Menu extends Base {

	public function _initialize() {
		parent::_initialize();
	}

	public function index() {
		$map   = array();
 		$list  = db("Menu")->where($map)->field(true)->order('sort asc,id asc')->column('*', 'id');
 		if (!empty($list)) {
			$tree = new \com\Tree();
			$list = $tree->toFormatTree($list);
		}
		// 记录当前列表页的cookie
		Cookie('__forward__', $_SERVER['REQUEST_URI']);

		$this->setMeta('菜单列表');
		$this->assign('list', $list);
		return $this->fetch();
	}

	public function editable($name = null, $value = null, $pk = null) {
		if ($name && ($value != null || $value != '') && $pk) {
			db('Menu')->where(array('id' => $pk))->setField($name, $value);
		}
	}


	public function add() {
		if (IS_POST) {
			$Menu = model('Menu');
			$data = input('post.');
			$id   = $Menu->save($data);
			if ($id) {
 				return $this->success('新增成功','/admin/menu/index');
			} else {
				return $this->error('新增失败');
			}
		} else {
			$this->assign('info', array('pid' => input('pid')));
			$menus = db('Menu')->select();
			$tree  = new \com\Tree();
			$menus = $tree->toFormatTree($menus);
			if (!empty($menus)) {
				$menus = array_merge(array(0 => array('id' => 0, 'title_show' => '顶级菜单')), $menus);
			} else {
				$menus = array(0 => array('id' => 0, 'title_show' => '顶级菜单'));
			}

			$this->assign('Menus', $menus);
			$this->setMeta('新增菜单');
			return $this->fetch('edit');
		}
	}


	public function edit($id = 0) {
		if (IS_POST) {
			$Menu = model('Menu');
			$data = input('post.');
			if ($Menu->save($data, array('id' => $data['id'])) !== false) {
 				return $this->success('保存成功','/admin/menu/index');
			}
			return $this->error('更新失败');

		}

			$info  = db('Menu')->field(true)->find($id);
			$menus = db('Menu')->field(true)->select();
			$tree  = new \com\Tree();
			$menus = $tree->toFormatTree($menus);

			$menus = array_merge(array(0 => array('id' => 0, 'title_show' => '顶级菜单')), $menus);
			$this->assign('Menus', $menus);
 			$this->assign('info', $info);
			$this->setMeta('编辑后台菜单');
			return $this->fetch();

	}


	public function del() {
		$id = input('id',0);
        Db::name('menu')->where('id|pid', $id)->delete();

  		return $this->success('删除成功');

	}






}