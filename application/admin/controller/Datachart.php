<?php
/**
 * Created by PhpStorm.
 * User:jiayongwei
 * Date: 2018/1/9
 * Time: 13:16
 */

namespace app\admin\controller;
use think\Db;

class Datachart extends Base
{
    public  function index()
    {

    }
    public function member()
    {
        $startdt = input('startdt', date('Y-m-d',strtotime("-7 days")));
        $enddt = input('enddt', date('Y-m-d',strtotime("+1 days")));

        $this->param['startdt'] = $startdt;
        $this->param['enddt'] = $enddt;
        $where['reg_time'] = ['between time',[$startdt,$enddt]];
        $users = Db::name('member')->where($where)
             ->field("FROM_UNIXTIME(reg_time, '%Y-%m-%d')as chartdate,count(uid)as tcount")
            ->group("chartdate")->select();
        $chartdata = [];
        $searchbar = array(
            array('name'=>'startdt','title'=>'开始日期','type'=>'date','help'=>'','option'=>''),
            array('name'=>'enddt','title'=>'结束日期','type'=>'date','help'=>'','option'=>''),
        );

        foreach ($users as $val){
          $chartdata[$val['chartdate']] = $val['tcount'];
        }
        $this->setMeta('每日新增');
        $this->assign('searchbar', $searchbar);
        $this->assign('chartdata', $chartdata);
        $this->assign('list', $users);
       return $this->fetch("datachart/bartickalign");
    }

}