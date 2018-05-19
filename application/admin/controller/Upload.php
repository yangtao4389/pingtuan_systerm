<?php

namespace app\admin\controller;


class Upload extends Base {

	public function _empty() {
		$controller = controller('common/Upload');
		$action     = ACTION_NAME;
		return $controller->$action();
	}
}