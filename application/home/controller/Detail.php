<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/25-10:15
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\home\controller;

use app\home\common\Base;
use think\Db;

class Detail extends Base
{

    public function index()
    {
        $id = $this->request->param('id', '', 'intval');
        if (empty($id)) {
            $this->error('参数传递错误');
        }
        $productData = $this->getProductDetail($id);

        //大家都在抢数据获取输出
        $moreField = 'id,num_iid,title,pict_url,coupon_info,zk_final_price,category';
        if (!empty($productData)) {
            //$cateId = $productData['cate_id'];
            $category = $productData['category'];
            $more = $this->getMore(6, $category,$moreField);
            if (empty($more)) {
                $more = $this->getMore(6,'',$moreField);
            } elseif (count($more) < 6) {
                $num = count($more);
                $limit = 6 - $num;
                $else = $this->getMore($limit,'',$moreField);
                $more =array_merge($more,$else);

            }
        } else {
            $more = $this->getMore(6,'',$moreField);

        }

        //猜你喜欢的数据获取与输出
        $favoritesField = 'id,title,pict_url,reserve_price,zk_final_price,user_type,nick,volume,coupon_end_time,coupon_info,coupon_total_count,coupon_remain_count,coupon_click_url,click_url';
        if (!empty($productData)) {
            //$cateId = $productData['cate_id'];
            $category = $productData['category'];
            $favoritesData = $this->getMore('60',$category,$favoritesField,'commission_rate DESC,volume DESC');
            if (empty($favoritesData)) {
                $favoritesData = $this->getMore(60,'',$favoritesField,'commission_rate DESC,volume DESC');

            } elseif (count($favoritesData) <60) {
                $total = count($favoritesData);
                $limit = 60 - $total;
                $else = $this->getMore($limit,'',$favoritesField,'commission_rate DESC,volume DESC');
                $favoritesData =array_merge($favoritesData,$else);
            }
        }else{
            $favoritesData = $this->getMore(60,'',$favoritesField,'commission_rate DESC,volume DESC');
        }

        $favoritesData = $this->randProducts($favoritesData);

        $baseData = $this->assignData();
        $baseData['favorites'] = $favoritesData;
        $baseData['more'] = $more;
        $baseData['detail'] = $productData;
        $this->assign('baseData', $baseData);

        return $this->fetch();
    }

    private function getProductDetail($id)
    {
        $data = Db::name('products')
            ->where(['id' => $id])
            ->field('id,num_iid,title,pict_url,zk_final_price,user_type,coupon_info,cate_id,coupon_click_url,coupon_end_time,volume,coupon_total_count,coupon_remain_count,item_description,category')
            ->find();
        return $data;
    }

    private function getMore($limit, $category = '', $field='',$order = 'volume DESC,commission_rate DESC')
    {

        $where = empty($category) ? [] : ['category' => $category];
        $field = empty($field) ? '' : $field;
        $time = date('Y-m-d H:i:s', time() - 24 * 3600);
        $data = Db::name('products')
            ->where('coupon_end_time', 'egt', $time)
            ->where($where)
            ->field($field)
            ->limit($limit)
            ->order($order)
            ->select();
        return $data;
    }

    private function randProducts($products)
    {
        $num = count($products);
        $arr = [];
        if (intval($num) > 0) {
            $num_req = ($num >= 20 ) ? 20 : $num;
            $tmp = array_rand($products, $num_req);

            foreach ($tmp as $value) {
                $arr[] = $products[$value];
            }
        }
        return $arr;
    }
    public function _empty()
    {
        $this->redirect('index');
    }
}