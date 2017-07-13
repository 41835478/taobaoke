<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/14-17:48
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\common;


use api\taobao\top\request\TbkUatmFavoritesGetRequest;
use api\taobao\top\TopClient;
use think\Config;
use think\exception\PDOException;

class Api extends Base
{
    protected $errorMsg='';
    protected $updateSql = ' ON DUPLICATE KEY UPDATE `coupon_start_time`=VALUES(`coupon_start_time`),`coupon_end_time`=VALUES(`coupon_end_time`),`coupon_click_url`=VALUES(`coupon_click_url`),`coupon_total_count`=VALUES(`coupon_total_count`),`coupon_remain_count`=VALUES(`coupon_remain_count`),`coupon_info`=VALUES(`coupon_info`),`volume`=VALUES(`volume`),`zk_final_price`=VALUES(`zk_final_price`),`tk_rate`=VALUES(`tk_rate`),`commission_rate`=VALUES(`commission_rate`)';

    /**
     * 判断淘宝API是否设置
     */
    protected function issetApi()
    {
        if (!Config::has('system.app_key') || !Config::has('system.app_secret') ||!Config::has('system.adzone_id') || empty(Config::get('system.app_key')) || empty(Config::get('system.app_secret')) || empty(Config::get('system.adzone_id'))) {
            $this->errorMsg = '淘宝api不能为空';
            return false;
        }
        return true;
    }

    /**
     * @param $url_type 回调地址的类型
     * @return bool
     * 阿里妈妈选库表获取并且入库
     */
    protected function setAliSelection($url_type='')
    {
        if(!$this->issetApi()){
            $this->error($this->errorMsg,url('system/home',['type'=>2,'url'=>$url_type]));
        }
        include EXTEND_PATH . DS . 'api/taobao/TopSdk.php';
        $c = new TopClient();
        $c->appkey = Config::get('system.app_key');
        $c->secretKey = Config::get('system.app_secret');
        $c->format = 'json';
        $req = new TbkUatmFavoritesGetRequest();
        $req->setPageNo("1");
        $req->setPageSize("200");
        $req->setFields("favorites_title,favorites_id,type");
        $resp = $c->execute($req);
        $resp = json_decode(json_encode($resp, JSON_UNESCAPED_UNICODE), true);

        if (isset($resp['error_response']) || isset($resp['code']) || intval($resp['total_results']) === 0) {
            $this->errorMsg = '无法获取选库表';
            return false;

        } else {
            return $resp['results']['tbk_favorites'];

//            $path = ROOT_PATH . 'public/data/';
//            $data['create_time'] = time();
//            $data['tbk_favorites'] = $resp['results']['tbk_favorites'];
//            $info = set_config($path, 'data.php', $data);
//            if (!$info === true) {
//                $this->errorMsg = '选库表本地写入失败';
//                return false;
//
//            }
//            return true;

        }
    }

    //获取失败信息
    protected function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * @return mixed
     * 获取淘宝淘宝类目入库规则
     */
    protected function getCategory()
    {
        $fileData = include(ROOT_PATH . 'public/data/category.php');
        return $fileData;

    }

    /**
     * @return 返回一个pdo对象
     */
    protected function pdoConnect()
    {
        $type = Config::get('database.type');         //数据库类型
        $hostname = Config::get('database.hostname');  //数据库主机名
        $port = Config::get('database.hostport');      //数据库端口
        $database = Config::get('database.database');     //使用的数据库
        $username= Config::get('database.username');      //数据库连接用户名
        $password = Config::get('database.password');          //对应的密码
        $dsn = "$type:host=$hostname;port=$port;dbname=$database";
        try {
            $pdo = new \PDO($dsn, $username, $password); //初始化一个PDO对象
            $pdo->exec('set names utf8');

        } catch (PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
        return $pdo;

    }





}