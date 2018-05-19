<?php
namespace app\common\controller;

class Upload {

	/**
	 * 上传控制器
	 */
	public function upload() {
		$upload_type = input('get.filename', 'images', 'trim');
		$config      = $this->$upload_type();
		// 获取表单上传文件 例如上传了001.jpg
		$file = request()->file('file');
		$info = $file->move($config['rootPath'], true, false);

		if ($info) {
			$return['status'] = 1;
			$return['info']   = $this->save($config, $upload_type, $info);
		} else {
			$return['status'] = 0;
			$return['info']   = $file->getError();
		}

		echo json_encode($return);
	}

	protected function images() {
		return config('picture_upload');
	}

	protected function attachment() {
		return config('attachment_upload');
	}

    /**
     * 百度编辑器使用
     * @var view
     * @access public
     */
    public function ueditor() {
        $data = new \com\Ueditor(session('auth_user.uid'));
        echo $data->output();
    }


	public function delete() {
		$data = array(
			'status' => 1,
		);
		echo json_encode($data);exit();
	}

	public function save($config, $type, $file) {
		$file           = $this->parseFile($file);
		$file['status'] = 1;
		$dbname         = ($type == 'images') ? 'picture' : 'file';
		$id             = db($dbname)->insertGetId($file);

		if ($id) {
			$data = db($dbname)->where(array('id' => $id))->find();
			return $data;
		} else {
			return false;
		}
	}


	protected function parseFile($info) {
		$data['create_time'] = $info->getATime(); //最后访问时间
		$data['savename']    = $info->getBasename(); //获取无路径的basename
		$data['c_time']      = $info->getCTime(); //获取inode修改时间
		$data['ext']         = $info->getExtension(); //文件扩展名
		$data['name']        = $info->getFilename(); //获取文件名
		$data['m_time']      = $info->getMTime(); //获取最后修改时间
		$data['owner']       = $info->getOwner(); //文件拥有者
		$data['savepath']    = $info->getPath(); //不带文件名的文件路径
		$data['url']         = $data['path']         = str_replace("\\", '/', substr($info->getPathname(), 1)); //全路径
		$data['size']        = $info->getSize(); //文件大小，单位字节
		$data['is_file']     = $info->isFile(); //是否是文件
		$data['is_execut']   = $info->isExecutable(); //是否可执行
		$data['is_readable'] = $info->isReadable(); //是否可读
		$data['is_writable'] = $info->isWritable(); //是否可写
		$data['md5']         = md5_file($info->getPathname());
		$data['sha1']        = sha1_file($info->getPathname());
		return $data;
	}
}