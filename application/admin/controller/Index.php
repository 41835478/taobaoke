<?php
namespace app\admin\controller;
use app\admin\common\Base;

/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/8-23:06
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/
class Index extends Base
{
    /**
     * @description 后台首页
     * @return mixed
     */
    public function index(){
        return $this->fetch();
    }

    /**
     * @description 欢迎页面模板输出
     * @return mixed
     */
    public function welcome()
    {
        return $this->fetch();
    }
}