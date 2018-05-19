<?php
/**
 * Created by PhpStorm.
 * User: 304455977@qq.com
 * Date: 2017/9/27
 * Time: 16:56
 */

namespace app\common\model;
use app\logic\Error;
use think\Db;
use app\logic\Tool;
class Member extends Base
{

    public $editfield = array(
        array('name'=>'uid','type'=>'hidden'),
        array('name'=>'username','title'=>'用户名','type'=>'readonly','help'=>''),
        'user_type'=>array('name'=>'user_type','title'=>'用户类型','type'=>'select','help'=>'','option'=>array()),
        array('name'=>'nickname','title'=>'昵称','type'=>'text','help'=>''),
         array('name'=>'password','title'=>'密码','type'=>'password','help'=>'为空时则不修改'),
        array('name'=>'mobile','title'=>'手机号','type'=>'text','help'=>''),
        array('name'=>'signature','title'=>'用户签名','type'=>'textarea','help'=>''),
        array('name'=>'status','title'=>'状态','type'=>'select','option'=>array('0'=>'禁用','1'=>'启用'),'help'=>''),
    );

    public $addfield = array(
        'user_type'=>array('name'=>'user_type','title'=>'用户类型','type'=>'select','help'=>'','option'=>array()),
        array('name'=>'username','title'=>'用户名','type'=>'text','help'=>'用户名会作为默认的昵称'),
        array('name'=>'password','title'=>'密码','type'=>'password','help'=>'用户密码不能少于6位'),
         array('name'=>'mobile','title'=>'手机号','type'=>'text','help'=>''),
        array('name'=>'status','title'=>'状态','type'=>'select','option'=>array('0'=>'禁用','1'=>'启用'),'help'=>''),

    );
    public $searchbar = array(
        array('name'=>'uid', 'title'=>'用户名', 'type'=>'autoselect', 'help'=>'', 'option'=>'/admin/autoinfo/getuserlist'),
    );
    public $errmsg = '';
    public function login($username, $password, $user_type='member')
    {
        $userinfo = Db::name("member")->where("username", $username)->where("user_type", $user_type)->where("status",1)->find();
        if(!$userinfo){
           $this->errmsg = '用户不存在 ';
           return false;
        }
        $dbpwd = $this->getPassword($password, $userinfo['salt']);
        if($dbpwd != $userinfo['password']){
            $this->errmsg = '密码错误';
            return false;
         }
        //写入session
       $this->authlogin($userinfo);
        return $userinfo;
     }
     public function reg($username, $password, $user_type='member')
     {
         $minfo = Db::name('member')->where('username',$username)->where('user_type',$user_type)->find();
         if($minfo){
             $this->errmsg = '用户已存在';
             return false;
         }
         $salt = rand_string(6);
         $password = $this->getPassword($password, $salt);
         $mobile = '';
         if(Tool::checkPhone($username)){
             $mobile = $username;
         }
         $inarr = array(
             'username'=>$username,
             'password'=>$password,
             'reg_time'=>time(),
             'nickname'=>$username,
             'mobile'=>$mobile,
             'salt'=>$salt,
             'user_type'=>$user_type,
             'status'=>1
         );
         $inarr['uid'] = Db::name('member')->insertGetId($inarr);
         $this->authlogin($inarr);
         return $inarr;
     }
     public function authlogin($data)
     {
         $authinfo = [
         'uid'=>$data['uid'],
         'username'=>$data['username'],
         'user_type'=>$data['user_type'],
         ];
         session("user_auth", $authinfo);
         return true;
     }

     public function saveuser($data)
     {
         if(isset($data['password']) &&$data['password']){
             $salt = rand_string(6);
             $password = $this->getPassword($data['password'],$salt);
             $data['password']=$password;
             $data['salt'] = $salt;
         }
         if(!isset($data['uid'])){
             $data['reg_time'] = time();
         }
         if(isset($data['uid']) && $data['uid']>0){
             Db::name('member')->where('uid', $data['uid'])->update($data);
         }else{
             Db::name('member')->insertGetId($data);
         }
          return true;
     }
    public function logout(){
        session('user_auth', null);
     }
    public function getPassword($password, $salt)
    {
        $dbpwd = md5($password.$salt);
        return $dbpwd;
    }
    public function checkPassword($uid,$password){
        if (!$uid || !$password) {
            $this->error = '原始用户UID和密码不能为空';
            return false;
        }

        $user = $this->where(array('uid'=>$uid))->find();
        if (md5($password.$user['salt']) === $user['password']) {
            return true;
        }else{
            $this->error = '原始密码错误！';
            return false;
        }
    }
    public function getInfo($uid)
    {
        $userinfo = Db::name("member")->where("uid", $uid)->find();
        if($userinfo){
            $userinfo['logo_url'] = get_cover($userinfo['logo'], 'url');
        }

        return $userinfo;
    }
    /*
     * 收藏
     * id,uid,data_id,group_flag,create_time
     * */
    public function addfav($product_id, $uid, $group_flag='fav')
    {
        $ishave = Db::name("history")->where("uid", $uid)->where("data_id", $product_id)->where("group_flag", $group_flag)->find();
        if($ishave){
            return;
        }
        $inarr = [
            'uid'=>$uid,
            'data_id'=>$product_id,
            'group_flag'=>$group_flag,
            'create_time'=>time()
        ];
        $id = Db::name("history")->insertGetId($inarr);
        return $id;
    }




}