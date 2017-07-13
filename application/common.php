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


// +-----------------------------------------------------------------------
// | created by Jechorn
// | time 2017-06-10
// +-----------------------------------------------------------------------
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

/**
 * @param $str 需要加密的字符串
 * @param $start 字符串截取开始的位置
 * @param $end  字符串截取结束的位置
 * @return string 返回加密后的字符串
 */
function md5AuthCode($str,$start,$end){
    $str = substr(md5($str), $start, $end);
    return $str;
}



/**
 * @return string 返回IP地址
 */
function getIp(){
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "";
    }
    return ($ip);
}
