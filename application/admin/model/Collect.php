<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/13-23:28
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\model;
use think\Db;
use think\Model;

class Collect extends Model
{

    /**
     * @param $data
     * @return int|string
     * Collect插入一条新数据
     */
    public function insertCollect($data)
    {
        return Db::name('collect')->insert($data);
    }

    /**
     * @param string $where
     * @return int|string
     * 返回总条数
     */
    public function collectCount($where='')
    {
        return Db::name('collect')->where($where)->count();
    }


    public function getCollect($where='',$page=1,$order='create_time DESC')
    {
        return Db::table(config('database.prefix').'collect')
            ->alias('co')
            ->where($where)
            ->order($order)
            ->page($page,config('paginate.list_rows'))
            ->join(config('database.prefix').'cate ca','co.cate_id=ca.id')
            ->join(config('database.prefix').'activity ac','co.activity_id=ac.id','LEFT')
            ->field('co.*,ca.cate_name,ac.activity_name')->select();
    }

    public function setStatus($data)
    {
        return Db::name('collect')->update($data);
    }

    public function updateCollect($data)
    {
        return Db::name('collect')->update($data);
    }
}