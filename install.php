<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/7/11-15:54
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/
// [ 应用入口文件 ]

if(!file_exists(__DIR__ . '/install/') || file_exists(__DIR__ . '/install/install.lock')){
    // 组装安装url
    $url=$_SERVER['HTTP_HOST'].trim($_SERVER['SCRIPT_NAME'],'install.php').'index.php';
    // 使用http://域名方式访问；避免./Public/install 路径方式的兼容性和其他出错问题
    header("Location:http://$url");
    exit;
}

// 定义应用目录
define('APP_PATH', __DIR__ . '/install/');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('app_debug',true);
// 加载框架引导文件
require './thinkphp/start.php';
