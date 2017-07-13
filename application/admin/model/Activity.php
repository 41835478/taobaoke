<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/17-12:43
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\model;


use think\Db;
use think\Model;

class Activity extends Model
{

    /**
     * @param $data
     * @return int|string
     * cate插入一条新数据
     */
    public function insertActivity($data)
    {
        return Db::name('activity')->insert($data);
    }

    /**
     * @param string $where
     * @return int|string
     * 返回总条数
     */
    public function activityCount($where='')
    {
        return Db::name('activity')->where($where)->count();
    }


    public function getActivity($where='',$page=1,$order='status DESC')
    {
        return Db::name('activity')->where($where)->order($order)->page($page,config('paginate.list_rows'))->select();
    }

    public function setStatus($data)
    {
        return Db::name('activity')->update($data);
    }

    public function updateActivity($data)
    {
        return Db::name('activity')->update($data);
    }
}