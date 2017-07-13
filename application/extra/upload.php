<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/11-18:50
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/
return [
    // 允许上传的文件MiMe类型
    'mimes'        => [],
    // 上传的文件大小限制 (0-不做限制)
    'maxSize'      => 0,
    // 允许上传的文件后缀
    'exts'         => [],
    // 自动子目录保存文件
    'autoSub'      => true,
    // 子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
    'subName'      => ['date', 'Y-m-d'],
    //保存根路径
    'rootPath'     => ROOT_PATH.'/public/uploads/',
    // 保存路径
    'savePath'     => '',
    // 上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
    'saveName'     => ['uniqid', ''],
    // 文件保存后缀，空则使用原后缀
    'saveExt'      => '',
    // 存在同名是否覆盖
    'replace'      => false,
    // 是否生成hash编码
    'hash'         => true,
    // 检测文件是否存在回调，如果存在返回文件信息数组
    'callback'     => false,
    // 文件上传驱动e,
    'driver'       => 'local',
    // 上传驱动配置
    'driverConfig' => [],
];