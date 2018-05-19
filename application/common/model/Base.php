<?php
namespace app\common\model;
use think\Db;
/**
* 模型基类
*/
class Base extends \think\Model{

	protected $param;
	protected $type = array(
		'id'  => 'integer',
		'cover_id'  => 'integer',
	);

	public function initialize(){
		parent::initialize();
		$this->param = \think\Request::instance()->param();
	}

	public function autosave($tbname,$data,$pkid='id')
    {
         if (isset($data['id']) && $data['id']) {
             $where[$pkid] = $data[$pkid];
             return Db::name($tbname)->where($where)->update($data);
        }else{
           return Db::name($tbname)->insertGetId($data);
        }
    }
 	/**
	 * 数据修改
	 * @return [bool] [是否成功]
	 */
	public function change(){
		$data = \think\Request::instance()->post();
		if (isset($data['id']) && $data['id']) {
			return $this->save($data, array('id'=>$data['id']));
		}else{
			return $this->save($data);
		}
	}
}