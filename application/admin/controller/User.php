<?php

namespace app\admin\controller;
use think\Db;

class User extends Base {

	public function index() {
		$username      = input('username');
		$user_type = input('user_type', 'admin');
        $uid = input('uid', 0);
		$where['user_type'] = $user_type;
		if($username){
		    $where['username'] = ['like',"%$username%"];
        }
        if($uid>0){
		    $where['uid'] = $uid;
        }
        $mod = model('Member');
        $searchbar = $mod->searchbar;
		$list  = Db::name('member')->where($where)->order("uid desc")->paginate(15);
 		$data = array(
		    'user_type'=>$user_type,
			'list' => $list,
			'page' => $list->render(),
            'searchbar'=>$searchbar,
		);
		$this->assign($data);
		$this->setMeta('用户列表');
		return $this->fetch();
	}

	public function add() {

        $user_type = input('user_type', 'admin');
        $data = input('param.');
        $uid = input('uid', 0);
        $model =  model('Member');
        $model->addfield['user_type']['option'] = $model->editfield['user_type']['option'] = config('USER_GROUP_TYPE');
		if (IS_POST) {
//		        if($data['username']=="admin" && $this->loginuid!=1){
//		            return $this->error('不允许修改管理员账号');
//                }
 		        if(!$data['username']){
		            return $this->error('用户名不能为空');
                }
                if($data['user_type']=='shoper' && !$uid){
 		            $shopinarr = array(
 		                'uid'=>$uid,

                    );
 		            Db::name('shop')->insertGetId($shopinarr);
                }
             $model->saveuser($data);
			return $this->success('保存成功','','parent_reload');
		}
        $info['user_type'] = $user_type;
	        $keylist = array();
			if($uid>0){
		    $info = Db::name('member')->where('uid', $uid)->field("uid,username,nickname,mobile,signature,user_type,status")->find();
		    $keylist = $model->editfield;
          }else{
			    $keylist = $model->addfield;
            }
 			$data = array(
                'info'    => $info,
				'keyList' => $keylist,
			);
			$this->assign($data);
			$this->setMeta("添加/编辑用户");
			return $this->fetch('public/popedit');

	}

	public function auth() {
		$access = model('AuthGroupAccess');
		$group  = model('AuthGroup');
		if (IS_POST) {
			$uid = input('uid', '', 'trim,intval');
			$access->where(array('uid' => $uid))->delete();
			$group_type = config('user_group_type');
			foreach ($group_type as $key => $value) {
				$group_id = input($key, '', 'trim,intval');
				if ($group_id) {
					$add = array(
						'uid'      => $uid,
						'group_id' => $group_id,
					);
					$access->save($add);
				}
			}
			return $this->success("设置成功！",'','parent_reload');
		} else {
			$uid  = input('id', '', 'trim,intval');
			$row  = $group::select();
			$auth = $access::where(array('uid' => $uid))->select();

			$auth_list = array();
			foreach ($auth as $key => $value) {
				$auth_list[] = $value['group_id'];
			}
			foreach ($row as $key => $value) {
				$list[$value['module']][] = $value;
			}
			$data = array(
				'uid'       => $uid,
				'auth_list' => $auth_list,
				'list'      => $list,
			);
			$this->assign($data);
			$this->setMeta("用户分组");
			return $this->fetch();
		}
	}

    public function editpwd()
    {
        $mod = model('Member');
        $password = input('password', '');
        $repassword = input('repassword', '');
         if(IS_POST){
            $uid= session('user_auth.uid');
            if(!$password){
                return $this->error('密码不能为空');
            }
            if($password !=$repassword){
                return $this->error('确认密码不一致！请重新输入');
            }
            $isok = $mod->checkPassword($uid,$password);
            if(!$isok){
                return $this->error('密码错误');
            }
            $data['uid'] = $uid;
            $data['password'] = $password;
            $mod->saveuser($data);
            return $this->success('修改成功!');
        }
        $this->setMeta('修改密码');
        return $this->fetch();

    }
	public function del()
    {
        $uid = input('uid', 0);
        if($uid==config('user_administrator')){
            return $this->error('管理员不允许删除！');
        }
        Db::name('member')->where('uid', $uid)->delete();
        return $this->success('删除成功');
    }

}