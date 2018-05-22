<?php
namespace app\common\controller;

class Base extends \think\Controller {

	protected $url;
	protected $request;
	protected $module;
	protected $controller;
	protected $action;

	public function _initialize() {
 		/* 读取数据库中的配置 */
		$config = cache('db_config_data');

		if (!$config) {
			$config = model('Config')->lists();
			cache('db_config_data', $config);
		}
		config($config);

		//获取request信息
		$this->requestInfo();
		$this->setMeta(ACTION_NAME);
	}

	public function verify($id = 1) {
		$verify = new \org\Verify(array('length' => 4));
		$verify->entry($id);
	}

	public function checkVerify($code, $id = 1) {
		if ($code) {
			$verify = new \org\Verify();
			$result = $verify->check($code, $id);
			if (!$result) {
				return $this->error("验证码错误！", "");
			}
		} else {
			return $this->error("验证码为空！", "");
		}
	}

	protected function setMeta($title = '') {
		$this->assign('meta_title', $title);
	}

	protected function requestInfo() {
		$this->param = $this->request->param();
		defined('MODULE_NAME') or define('MODULE_NAME', $this->request->module());
		defined('CONTROLLER_NAME') or define('CONTROLLER_NAME', $this->request->controller());
		defined('ACTION_NAME') or define('ACTION_NAME', $this->request->action());
		defined('IS_POST') or define('IS_POST', $this->request->isPost());
		defined('IS_GET') or define('IS_GET', $this->request->isGet());
		$this->url = strtolower($this->request->module() . '/' . $this->request->controller() . '/' . $this->request->action());
		$this->assign('request', $this->request);
		$this->assign('param', $this->param);
	}




}
