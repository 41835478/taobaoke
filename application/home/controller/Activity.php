<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/22-3:50
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\home\controller;


use app\home\common\Base;
use think\Config;
use think\Db;

class Activity extends Base
{

    public function index()
    {
        $page = $this->request->param('page',1,'intval');
        $cid = $this->request->param('cid','all','htmlspecialchars');
        $sort = $this->request->param('sort','','htmlspecialchars');
        $aid = $this->request->param('aid', '', 'intval');
        $urlInfo = [];
        $where = [];
        if (is_numeric($cid)) {
            $cid = intval($cid);
            $where['cate_id'] =$cid;
            $urlInfo['cid'] = $cid;

        }else{
            $urlInfo['cid'] = 'all';
        }
        if(!empty($aid)){
            $where['activity_id'] = $aid;
            $activityName = $this->getActivityName($aid);
            $this->assign('activityName',$activityName);
            $urlInfo['aid'] = $aid;
        }else{
            $this->error('没找到该活动');
        }
        if (!empty($sort)){
            $urlInfo['sort'] = $sort;
            switch ($sort) {
                //按照综合排序
                case ' multiple':
                    $order = 'volume DESC,tk_rate ASC';
                    break;
                case 'latest':
                    $order ='update_time DESC';
                    break;
                case 'volume':
                    $order = 'volume DESC';
                    break;
                case 'quan':
                    $order='coupon_total_count-coupon_remain_count DESC';
                    break;
                case 'price':
                    $order = 'zk_final_price ASC';
                    break;
                default:
                    $order = 'volume DESC,tk_rate ASC';
                    $urlInfo['sort'] = 'multiple';
                    break;
            }
        }else{
            $order = 'volume DESC,tk_rate ASC';
            $urlInfo['sort'] = 'multiple';
        }

        $count = $this->getCount($where);
        $totalPage = ceil($count/Config::get('paginate.list_rows'));
        if ($page > $totalPage){
            $page = $totalPage;
        }
        if($page<1){
            $page = 1;
        }
        //$urlInfo['cid'] = $cid;

        $baseData = $this->assignData();
        $quan = $this->getProductsData($page,$order,$where);
        $cate = $this->getcateInfo(['activity_id'=>$aid]);

        $baseData['quan'] = $quan;
        $baseData['cate'] = $cate;
        $this->assign('baseData', $baseData);
        $this->assign('pageInfo',['cur'=>$page,'totalPage'=>$totalPage]);
        $this->assign('urlInfo',$urlInfo);
        return $this->fetch();
    }

    private function getActivityName($aid)
    {
        $res = Db::name('activity')->field('id,activity_name')->where(['id'=>$aid])->find();
        if (!$res) {
            return '领券活动';

        }
        return $res['activity_name'];
    }

    public function _empty()
    {
        $this->redirect('index');
    }


}