<?php
/**
 * Created by PhpStorm.
 * User:jiayongwei
 * Date: 2017/11/23
 * Time: 9:22
 */

namespace app\admin\controller;
use app\common\controller\Base as CommonBase;
use think\Db;

class Base extends CommonBase
{
    public $logininfo = [];
    public $loginuid = 0;
    public function _initialize()
    {
        parent::_initialize();

        $this->logininfo = session("user_auth");
        if($this->logininfo){
            $this->loginuid = $this->logininfo['uid'];
        }
        //检查权限
        $nocheck = ['admin/index/login', 'admin/index/logout', 'admin/index/verify'];

        if (!$this->loginuid && !in_array($this->url, $nocheck)) {
           return  $this->redirect('admin/index/login');
        }
        if($this->loginuid>0){

             $supergroup = config('super_admingroup');
            $usergroup = $this->getUserGroup($this->loginuid);
            if(in_array($supergroup, $usergroup)){ //超级管理员
                return;
            }
            if(!$this->checkRule($this->url)){
                return   $this->error('您没有权限操作!');
            }
        }
       //注意一个问题


    }




    final protected function checkRule($url) {
        static $Auth = null;
        if (!$Auth) {
            $Auth = new \com\Auth();
        }
        if (!$Auth->check($url, session('user_auth.uid'), 1, 'url')) {
            return false;
        }
        return true;
    }
    public function getUserGroup($uid)
    {
        $groupids = [];
        $list = Db::name('auth_group_access')->where('uid', $uid)->select();
        foreach ($list as $val){
            $groupids[] = $val['group_id'];
        }
        return $groupids;
    }

}