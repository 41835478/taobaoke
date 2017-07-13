<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/28-19:03
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\model;

use think\Db;
use think\Model;

class Quan extends Model
{

    /**
     * @param $data
     * @return int|string
     * Collect插入一条新数据
     */
    public function insertQuan($data)
    {
        return Db::name('quan')->insert($data);
    }

    /**
     * @param string $where
     * @return int|string
     * 返回总条数
     */
    public function quanCount($where='')
    {
        return Db::name('quan')->where($where)->count();
    }


    public function getQuan($where='',$page=1,$order='create_time DESC')
    {
        return Db::table(config('database.prefix').'quan')
            ->alias('co')
            ->where($where)
            ->order($order)
            ->page($page,config('paginate.list_rows'))
            ->join(config('database.prefix').'cate ca','co.cate_id=ca.id')
            ->field('co.*,ca.cate_name')->select();
    }

    public function setStatus($data)
    {
        return Db::name('collect')->update($data);
    }

    public function updateQuan($data)
    {
        return Db::name('collect')->update($data);
    }
}