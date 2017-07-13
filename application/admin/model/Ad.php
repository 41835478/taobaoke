<?php
namespace app\admin\model;
use think\Db;
use think\Model;

/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/12-12:58
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/
class Ad extends Model
{

    /**
     * @param $data 需要添加的数据
     * @return int|string返回操作是否成功信息
     */
    public function saveAd($data)
    {
        $info = Db::name('ad')->insert($data);
        return $info;
    }

    public function getAd($where='',$page = 1,$order='status DESC')
    {

        return Db::name('ad')->where($where)->order($order)->page($page,config('paginate.list_rows'))->select();
    }

    public function setStatus($data)
    {

        return Db::name('ad')->update($data);
    }

    public function adCount($where='')
    {
        return Db::name('ad')->where($where)->count();
    }
}