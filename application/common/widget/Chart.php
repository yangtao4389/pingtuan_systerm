<?php
/**
 * Created by PhpStorm.
 * User:304455977@qq.com
 * Date: 2017/11/21
 * Time: 19:48
 */

namespace app\common\widget;


class Chart
{
    /*
     * http://echarts.baidu.com/demo.html#bar-tick-align
    普通柱状图
     * $data=['2017'=>33,,'2016'=>33,,..]
     */
    public function bartickalign($el,$data=array(),$name='')
    {
        $view   = new \think\View();
        $title =$value=[];

        foreach ($data as $date=>$val){
            $title[] =$date;
            $value[]=$val;
        }
        $data = array(
            'el'=>$el,
            'xtitle'=>json_encode($title),
            'data'=>json_encode($value),
            'name'=>$name,
        );
        $view->assign($data);
         return $view->fetch('common@default/chart/bartickalign');
    }
    /*
     * 多组折线在一个图
     *  $data=array(
     *    '订单'=>array('2017-11'=>12,'2017-12'=>33,...),
     *    ...
     * );
     * */
    public function linestack($el,$datearr,$data,$title)
    {
        $legend_data = [];//订单数，用户数...

        $xAxis_data = $datearr;
        /*
         *   {
            name:'邮件营销',
            type:'line',
            stack: '总量',
            data:[120, 132, 101, 134, 90, 230, 210]
        },
         * */
        $series = [];//[订单=>[x,x,x,x],用户=>[x,x,x],
        foreach ($data as $groupname=>$val){
            $legend_data[] = $groupname;
            $one=[];
            $one['name'] = $groupname;
            $one['type'] = 'line';
            $one['stack'] = '数量';
            foreach ($datearr as $date){
                if(isset($val[$date])){
                    $one['data'][] = $val[$date];
                 }else{
                    $one['data'][] = 0;
                }
            }
            $series[]=$one;
        }

        $data = array(
            'el'=>$el,
            'legend_data'=>json_encode($legend_data),
            'xAxis_data'=>json_encode($xAxis_data),
             'title'=>$title,
            'series'=>json_encode($series),
        );
        $view   = new \think\View();
        $view->assign($data);
        return $view->fetch('common@default/chart/linestack');
     }



}