<?php

namespace app\home\common;

use think\Config;
use think\Controller;
use think\Db;

/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/18-2:56
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/
class Base extends Controller
{

    /**
     * @return mixed获取系统的信息
     *
     */
    protected function getSystemData()
    {
        $systemData = Config::get('system');
        return $systemData;

    }

    /**
     * @param string $limit
     * @return 返回活动数据
     */

    protected function getActivityData($limit = '')
    {
        $time = date('Y-m-d H:i:s', time());
        $activityData = Db::name('activity')
            ->field('id,activity_name')
            ->where('start_time', 'elt', $time)
            ->where('end_time', 'egt', $time)
            ->where(['status' => 1,'is_qiang'=>0])
            ->limit($limit)
            ->order('sort ASC')
            ->select();
        return $activityData;
    }

    protected function assignData()
    {
        $systemData = $this->getSystemData();
        $activityData = $this->getActivityData(2);
        $baseData = [
            'systemData' => $systemData,
            'activityData' => $activityData
        ];
        return $baseData;

    }

    /**
     * @param $limit 返回分类数据的条数
     * @return 返回分类
     */
    protected function getCate($limit = '')
    {
        $cate = Db::name('cate')->field('id,cate_name,icon')->order('sort ASC')->limit($limit)->select();
        return $cate;
    }

    /**
     * @param $where
     * @return 返回每个分类的商品数目
     */
    protected function getCateNum($where='')
    {
        $time = date('Y-m-d H:i:s', time() - 24 * 3600);
        //获取优惠券没过期的商品
        $subQuery_1 = Db::name('products')
            ->where('coupon_end_time', 'egt', $time)
            ->where($where)
            ->buildSql();
        //根据分类名称进行分组并统计总数
        $subQuery = Db::table($subQuery_1.' s')
            ->field('cate_id,count(*) as total')
            ->group('cate_id')
            ->buildSql();
        //链接查询获取左右分类名称
        $cateInfo = Db::table(config('database.prefix').'cate')
            ->alias('c')
            ->field('c.id,c.cate_name,a.total')
            ->order('sort ASC')
            ->join($subQuery . ' a', 'a.cate_id=c.id', 'left')
            ->select();
        //对查询出数据如何total为空的时候进行赋值为0
        foreach ($cateInfo as $key => $v) {
            if (empty($v['total'])) {
                $cateInfo[$key]['total'] = 0;
            }
        }
        $data = Db::query($subQuery);
        if(!empty($data)){
            foreach ($data as $v) {
                if($v['cate_id'] == 0){
                    $cateInfo[] = [
                        'id'=> 0,
                        'cate_name' => '其他',
                        'total' =>$v['total']
                    ];
                }

            }
        }

        return $cateInfo;

    }

    /**
     * @param $page
     * @param $where
     * @param $order
     * @return false|
     * 获取商品的详细信息
     */
    protected function getProductsData($page,$order,$where='')
    {
        $time = date('Y-m-d H:i:s',time()-24*3600);
        $quan = Db::name('products')
            ->where('coupon_end_time','egt',$time)
            ->where($where)
            ->field('id,title,pict_url,reserve_price,zk_final_price,user_type,nick,volume,coupon_end_time,coupon_info,coupon_total_count,coupon_remain_count,coupon_click_url,click_url')
            ->order($order)
            ->page($page,Config::get('paginate.list_rows'))
            ->select();
        return $quan;

    }

    /**
     * @param string $where 查询的条件
     * @return int|string 获取符合要求的商品总数量
     */
    protected function getCount($where='')
    {
        $time = date('Y-m-d H:i:s',time()-24*3600);
        $count = Db::name('products')
            ->where('coupon_end_time','egt',$time)
            ->where($where)
            ->count();
        return $count;
    }

    protected function getcateInfo($where = '')
    {
        $cateInfo = $this->getCateNum($where);
        $totalNum = 0;
        foreach ($cateInfo as $value) {
            $totalNum = $totalNum + $value['total'];
        }
        return $cate = [
            'totalNum'=>$totalNum,
            'cateInfo' =>$cateInfo
        ];
    }


}