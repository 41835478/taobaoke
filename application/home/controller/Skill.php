<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/7/12-23:21
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\home\controller;


use app\home\common\Base;
use think\Db;

class Skill extends Base
{

    public function index()
    {
        $time = $this->request->param('time','','');
        if ($time ==='') {
            $hour = date('G', time());
            $info = $this->setArgument($hour);
            if ($info) {
                $page = $info['page'];
                $time = $info['time'];
            }else{
                $page = 1;
                $time = 0;
            }

        }else{
            $time = intval($time);
            switch ($time) {
                case 0:
                    $page = 1;
                    $time = 0;
                    break;
                case 8:
                    $page = 2;
                    $time = 8;
                    break;
                case 12:
                    $page = 3;
                    $time = 12;
                    break;
                case 16:
                    $page = 4;
                    $time = 16;
                    break;
                case 20:
                    $page = 5;
                    $time = 20;
                    break;
                default:
                    $info = $this->setArgument($time);
                    if ($info) {
                        $page = $info['page'];
                        $time = $info['time'];
                    }else{
                        $page = 1;
                        $time = 0;
                    }


            }
        }
        $this->assign('time', $time);

        $baseData = $this->assignData();
        $activity = $this->getActivityData();
        $skillData = $this->getSkillData($page);
        $baseData['activity'] = $activity;
        $baseData['skill'] = $skillData;
        $this->assign('baseData', $baseData);
        return $this->fetch();
    }


    private function setArgument($hour)
    {
        if (!is_numeric($hour)) {
            return false;
        }
        if ($hour >24 ||$hour < 0) {
            return false;
        }
        if ($hour < 8) {
            $page = 1;
            $time = 0;
        }elseif (8 <= $hour && $hour < 12){
            $page = 2;
            $time = 8;
        }elseif (12 <= $hour && $hour < 16){
            $page = 3;
            $time = 12;
        }elseif (16 <= $hour && $hour < 20){
            $page = 4;
            $time = 16;
        }else{
            $page = 5;
            $time = 20;
        }
        return ['page'=>$page, 'time' => $time];
    }

    private function getSkillData($page = 1)
    {
        $time = date('Y-m-d H:i:s',time()-24*3600);
        $skill = Db::name('products')
            ->where('coupon_end_time', 'egt', $time)
            ->where('qiang_end_time', 'egt', $time)
            ->where('qiang_start_time', 'elt', $time)
            ->where(['is_qiang' => 1])
            ->field('id,title,pict_url,reserve_price,zk_final_price,user_type,nick,volume,coupon_end_time,coupon_info,coupon_total_count,coupon_remain_count,coupon_click_url,click_url')
            ->order('coupon_info DESC,volume DESC')
            ->page($page,20)
            ->select();
        return $skill;

    }
    public function _empty()
    {
        $this->redirect('index');
    }
}