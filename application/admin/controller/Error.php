<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/7/10-21:54
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\controller;


use think\Controller;

class Error extends Controller
{

    public function index()
    {
        $this->error('找不到该控制器', url('index/index'));
    }
}