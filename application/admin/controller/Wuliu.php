<?php

namespace app\admin\controller;

use think\Db;

class Wuliu extends Base
{
    /*
     * 物流公司
     * */
    public function index()
    {
        $company = Db::name('wuliu_company')->order('id asc')->select();


        $this->setMeta('物流公司');
        $this->assign('company', $company);
        return $this->fetch();
    }


    public function addcompany()
    {

        $data = input('param.');
        $id = input('id', 0);
        $mod = model('WuliuCompany');
        if (IS_POST) {
            if (!$data['companyname']) {
                return $this->error('公司名不能为空');
            }
            $mod->autosave('wuliu_company', $data);
            return $this->success('添加成功', '/admin/wuliu/index');
        }
        $info = [];
        if ($id > 0) {
            $info = Db::name('wuliu_company')->where('id', $id)->find();
        }
        $data = array(
            'keyList' => $mod->companykey,
            'info' => $info,
        );

        $this->assign($data);
        $this->setMeta('添加物流公司');
        return $this->fetch('public/edit');
    }

    public function delcompany()
    {
        $id = input('id', 0);
        Db::name('wuliu_company')->where('id', $id)->delete();
        return $this->success('删除成功');
    }

    public function delorder()
    {
        $id = input('id', 0);
        Db::name('wuliu_order')->where('id', $id)->delete();
        return $this->success('删除成功');
    }

    /*
     *  添加物流订单
     *
     * */
    public function addWuliuOrder()
    {
        $data = input('param.');
        $id = input('id', 0);
        $orderid = input('orderid', 0);//若传递了订单号
        $mod = model('WuliuOrder');
        if (IS_POST) {
            if (!$data['companyid'] || !$data['wuliu_num']) {
                return $this->error('请填写单号');
            }

            $mod->autosave('wuliu_order', $data);
            Db::name('order_product')->where('id', $data['orderid'])->setField('wuliu_status', $data['status']);
            return $this->success('保存成功', '/admin/wuliu/orders');
        }
        $keylist = $mod->addfield;
        $companys = Db::name('wuliu_company')->order('id asc')->select();
        foreach ($companys as $val) {
            $keylist['companyid']['option'][$val['id']] = $val['companyname'];
        }
        $info['orderid'] = $orderid;

        if ($orderid > 0) {//有订单号
            $orderinfo = Db::name('order_product')->where('id', $orderid)->field("shop_id,product_title")->find();
            $info['shop_id'] = $orderinfo['shop_id'];
            $info['product_title'] = $orderinfo['product_title'];
        }
        if ($id > 0) {
            $info = Db::name('wuliu_order')->where('id', $id)->find();
        }
        $data = array(
            'keyList' => $keylist,
            'info' => $info,
        );
        $this->setMeta('编辑物流订单');
        $this->assign($data);
        return $this->fetch('public/edit');
    }

    public function flows()
    {
        $id = input('id', 0);
        $ordermod = new \app\logic\Order();
        $orderdetail = $ordermod->getWuliu($id);

        if ($orderdetail) {
            $orderdetail['create_time'] = date("Y-m-d H:i:s", $orderdetail['create_time']);
        }
        $this->assign('orderdetail', $orderdetail);
        return $this->fetch();
    }

    /*
     * 物流订单
     * */
    public function orders()
    {
        $recv_mobile = input('recv_mobile', '');
        $wuliu_num = input('wuliu_num', 0);
        $companyid = input('companyid', 0);
        $where = [];
        if ($recv_mobile) {
            $where['recv_mobile'] = $recv_mobile;
        }
        if ($wuliu_num) {
            $where['wuliu_num'] = $wuliu_num;
        }
        if ($companyid > 0) {
            $where['companyid'] = $companyid;
        }
        $mod = model('WuliuOrder');
        $searchbar = $mod->searchbar;

        $companys = Db::name('wuliu_company')->order('id asc')->select();
        foreach ($companys as $val) {
            $searchbar['companyid']['option'][$val['id']] = $val['companyname'];
        }


        $list = Db::name('wuliu_order')
            ->where($where)->order('id desc')->paginate(15);
        $data = array(
            'searchbar' => $searchbar,
            'list' => $list,
            'page' => $list->render(),
        );
        $this->setMeta('快递订单');
        $this->assign($data);
        return $this->fetch();
    }

    public function getprintinfo()
    {
        $id = input('id', 0);
        $one = Db::name('wuliu_order')->alias('wo')
            ->join("shop s", "wo.shop_id=s.id")->where('wo.id', 'in', $id)
            ->field("wo.*,s.title as shop_title,s.contact_name as shop_contact_name,s.mobile as shop_mobile,s.address as shop_address")
            ->find();
        $shoptpl = Db::name('print_tpl_wuliu')
            ->where('shop_id', $one['shop_id'])
            ->where('companyid', $one['companyid'])
            ->order('isdefault desc')
            ->find();
         if ($shoptpl['tpl_param']) {
            $paramlist = parse_config_attr($shoptpl['tpl_param']);
            foreach ($one as $k => $v) {
                if (isset($paramlist[$k])) {
                    $one[$k] = $paramlist[$k];
                }
            }
        }
        $tplinfo = Db::name('print_tpl')->where('id', $shoptpl['tpl_id'])->find();
         $one['tpl_flag'] = $tplinfo['tpl_flag'];
        return $one;
     }


}