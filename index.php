<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 检测是否是新安装
if(file_exists(__DIR__ . '/install/') && !file_exists(__DIR__ . '/install/install.lock')){
    // 组装安装url
    $url=$_SERVER['HTTP_HOST'].trim($_SERVER['SCRIPT_NAME'],'index.php').'install.php';
    // 使用http://域名方式访问；避免./Public/install 路径方式的兼容性和其他出错问题
    header("Location:http://$url");
    exit;
}

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('app_debug',true);
// 加载框架引导文件
require './thinkphp/start.php';
