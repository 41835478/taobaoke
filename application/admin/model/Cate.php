<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/13-19:04
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\model;


use think\Db;
use think\Model;

class Cate extends  Model
{
    /**
     * @param $data
     * @return int|string
     * cate插入一条新数据
     */
    public function insertCate($data)
    {
        return Db::name('cate')->insert($data);
    }

    /**
     * @param string $where
     * @return int|string
     * 返回总条数
     */
    public function cateCount($where='')
    {
        return Db::name('cate')->where($where)->count();
    }


    public function getCate($where='',$page=1,$order='status DESC')
    {
        return Db::name('cate')->where($where)->order($order)->page($page,config('paginate.list_rows'))->select();
    }

    public function setStatus($data)
    {
        return Db::name('cate')->update($data);
    }

    public function updateCate($data)
    {
        return Db::name('cate')->update($data);
    }
}