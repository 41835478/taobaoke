<?php

namespace app\admin\controller;

/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/17-16:18
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

use app\admin\common\Base;
use think\Db;

class Product extends Base
{

    /**
     * @return mixed
     * 商品管理模板渲染
     */
    public function index()
    {

        $activityData = Db::name('activity')->field('id,activity_name')->order('end_time DESC')->select();
        $categoryData = Db::name('cate')->field('id,cate_name')->order('sort ASC')->select();
        $this->assign('activityData', $activityData);
        $this->assign('categoryData', $categoryData);
        return $this->fetch();
    }

    /**
     * 删除所有商品
     */
    public function deleteAll()
    {
        $this->jump();
        $sql = 'truncate table `taobao_products`';
        $info = Db::connect()->query($sql);
        if (is_array($info) && empty($info)) {
            return json([
                'status' => 'ok',
                'errorMsg' => '清空商品成功'
            ]);
        } else {
            return json([
                'status' => 'error',
                'errorMsg' => '清空商品失败'
            ]);
        }

    }

    public function deleteExpired()
    {
        $this->jump();
        $time = date('Y-m-d H:i:s', time() - 24 * 3600);
        $info = Db::name('products')
            ->where('coupon_end_time', 'elt', $time)
            ->delete();
        if ($info) {
            return json([
                'status' => 'ok',
                'errorMsg' => "商品删除成功，共删除{$info}个商品"
            ]);
        } else {
            return json([
                'status' => 'error',
                'errorMsg' => '没有删除商品'
            ]);
        }

    }

    public function deleteCondition()
    {
        $this->jump();
        $end_min = $this->request->param('end_min', '', 'htmlspecialchars');
        $end_max = $this->request->param('end_max', '', 'htmlspecialchars');
        $keyword = $this->request->param('keyword', '', 'htmlspecialchars');
        $activity_id = $this->request->param('activity_id', '', 'htmlspecialchars');
        $cate_id = $this->request->param('cate_id', '', 'htmlspecialchars');
        $volume_min = $this->request->param('volume_min', '', 'htmlspecialchars');
        $volume_max = $this->request->param('volume_max', '', 'htmlspecialchars');

        if (($end_min ==='') && ($end_max ==='') && ($keyword === '') && ($activity_id ==='') && ($cate_id ==='') && ($volume_min ==='') && ($volume_max ==='')) {
            return json([
                'status' => 'error',
                'errorMsg' => "没有条件不会执行删除操作"
            ]);
        }
        $where = [];
        if(!empty($end_min) && !empty($end_max)){
            $where['coupon_end_time'] = ['between',"{$end_min},{$end_max}"];
        }else if(!empty($end_min) && empty($end_max)){
            $where['coupon_end_time'] = ['egt', $end_min];
        }else if(!empty($end_max) && empty($end_min)){
            $where['coupon_end_time'] = ['elt', $end_max];
        }
        if (!empty($keyword)) {
            $where['title'] = ['like', "%{$keyword}%"];
        }
        if (!empty($activity_id)) {
            $where['activity_id'] = $activity_id;
        }
        if (!empty($cate_id)) {
            $where['cate_id'] = $cate_id;
        }
        if(($volume_min !== '') && ($volume_max !== '')){
            $where['volume'] = ['between',"{$volume_min},{$volume_max}"];
        }else if(($volume_min !== '') && ($volume_max ==='')){
            $where['volume'] = ['egt', $volume_min];
        }else if(($volume_max !=='') && ($volume_min =='')){
            $where['volume'] = ['elt', $volume_max];

        }

        $info = Db::name('products')
            ->where($where)
            ->delete();
        if ($info) {
            return json([
                'status' => 'ok',
                'errorMsg' => "商品删除成功，共删除{$info}个商品"
            ]);
        } else {
            return json([
                'status' => 'error',
                'errorMsg' => '没有删除商品'
            ]);
        }

    }

}