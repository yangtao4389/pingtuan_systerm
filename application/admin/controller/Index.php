<?php
namespace app\admin\controller;
use think\Db;

class Index extends Base {
    public function test()
    {
     return $this->fetch();
    }

	public function index() {
		$this->setMeta('后台首页');
		$this->setMenu();
		return $this->fetch();
	}
    private function setMenu()
    {
        $top_menu = $this->getSubList(0);
        $sub_menu = [];
        foreach ($top_menu as $t){
            $sub_menu[$t['id']] =  $this->getMainList($t['id']);
        }

        $this->assign('top_menu', $top_menu);
        $this->assign('sub_menu', $sub_menu);
    }
    private function getMainList($id)
    {
        $result = [];
        $sublist = $this->getSubList($id);
        foreach ($sublist as $val){
            $result[$val['group']][]=$val;
        }
        return $result;
    }
    private function getSubList($pid)
    {
        $menuarr  = Db::name('menu')->where('hide',0)->where("pid", $pid)->order("sort asc")->select();
        return $menuarr;
    }
    public function main()
    {

        $this->setMeta('系统首页');
        return $this->fetch();
     }

	public function login($username = '', $password = '', $verify = '') {
		if (IS_POST) {
			if (!$username || !$password) {
				return $this->error('用户名或者密码不能为空！', '');
			}
 			//验证码验证
			$this->checkVerify($verify);

			$user = model('Member');
			$result  = $user->login($username, $password,'admin');
			if ($result) {
				return $this->success('登录成功！', url('admin/index/index'));
			}
			    return $this->error($user->errmsg,'');

		}
			return $this->fetch();

	}
    public function logout()
    {
        $mod = model('Member');
        $mod->logout();
        $this->redirect('admin/index/login');
    }

	public function clear() {
		if (IS_POST) {
			$clear = input('post.clear/a', array());
			foreach ($clear as $key => $value) {
				if ($value == 'cache') {
					\think\Cache::clear(); // 清空缓存数据
				} elseif ($value == 'log') {
					\think\Log::clear();
				}
			}
			return $this->success("更新成功！", url('admin/index/clear'));
		} else {
			$keylist = array(
				array('name' => 'clear', 'title' => '更新缓存', 'type' => 'checkbox', 'help' => '', 'option' => array(
					'cache' => '缓存数据',
					'log'   => '日志数据',
				),
				),
			);
			$data = array(
				'keyList' => $keylist,
			);
			$this->assign($data);
			$this->setMeta("更新缓存");
			return $this->fetch('public/edit');
		}
	}
}