<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * @param $path 例如 www/data/
 * @param $name
 * @param $value
 * @return bool|string
 */
function set_config($path,$name,$value){
    $file = $path.$name;
    if(!is_writeable($file)){
        return "目录 {$path} 不可写！请手动创建文件";
    }
    if (!is_array($value)){
        return '值必须是数组类型';
    }
    $data  = '<?php return '.var_export($value,true).';';
    file_put_contents($file,$data);
    return true;

}
