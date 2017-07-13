<?php

namespace app\home\controller;

/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/16-5:49
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

use app\home\common\Base;
use think\Db;


class Index extends Base
{


    public function index()
    {

        $baseData = $this->assignData();
        $cate = $this->getCate(8);
        $skill = $this->getSkill();
        $quan = $this->getQuan();
        $ad = $this->getPcAd();
        $baseData['ad'] = $ad;
        $baseData['cate'] = $cate;
        $baseData['skill'] = $skill;
        $baseData['quan'] = $quan;
        $this->assign('baseData',$baseData);
        return $this->fetch();
    }


    private function getSkill()
    {
        $time = date('Y-m-d H:i:s',time());
        $skill = Db::name('products')
            ->where('coupon_end_time','egt',$time)
            ->field('id,title,pict_url,reserve_price,zk_final_price,user_type,volume,coupon_end_time,coupon_info,coupon_total_count,coupon_remain_count,coupon_click_url')
            ->order('coupon_end_time ASC,volume DESC,coupon_info ASC')
            ->limit(0,10)
            ->select();
        return $skill;
    }


    private function getQuan()
    {
        $time = date('Y-m-d H:i:s',time());
        $quan = Db::name('products')
            ->where('coupon_end_time','egt',$time)
            ->field('id,title,pict_url,reserve_price,zk_final_price,user_type,volume,coupon_end_time,coupon_info,coupon_total_count,coupon_remain_count,coupon_click_url')
            ->order('volume DESC,tk_rate ASC')
            ->limit(0,60)
            ->select();
        return $quan;
    }

    private function getPcAd()
    {
        $time = date('Y-m-d H:i:s',time());
        $ad = Db::name('ad')
            ->where('start_time','elt',$time)
            ->where('end_time','egt',$time)
            ->where(['status'=>1])
            ->where('type','lt',4)
            ->field('id,ad_name,ad_description,image_url,link_url,type')
            ->order('sort ASC')
            ->select();
        $arr = [
            'carousel'=>[],
            'activity_1'=>[],
            'activity_2' =>[]
        ];
        if (!empty($ad)){
            foreach ($ad as $v) {
                if($v['type'] ==1){
                    $arr['carousel'][] = $v;
                }elseif ($v['type'] == 2){
                    $arr['activity_1'][] = $v;
                }else{
                    $arr['activity_2'][] = $v;
                }
            }

        }
        return $arr;

    }

    public function _empty()
    {

        $this->redirect('index');
    }


}