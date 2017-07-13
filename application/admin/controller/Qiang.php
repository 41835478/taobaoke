<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/17-16:33
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\controller;


use api\taobao\top\domain\TopItemQuery;
use api\taobao\top\request\JuItemsSearchRequest;
use api\taobao\top\TopClient;
use app\admin\common\Api;
use think\Config;

class Qiang extends Api
{

    public function index()
    {
        $c = new TopClient();
        $c->appkey = Config::get('system.app_key');
        $c->secretKey = Config::get('system.app_secret');
        $c->format = 'json';
        $req = new JuItemsSearchRequest();
        $param_top_item_query = new TopItemQuery();
        $param_top_item_query->current_page="1";
        $param_top_item_query->page_size="20";
        $param_top_item_query->pid="mm_29855628_4314356_106056248";
        $param_top_item_query->postage="true";
        $param_top_item_query->status="2";

        $param_top_item_query->word="女装";
        $req->setParamTopItemQuery(json_encode($param_top_item_query));
        $resp = $c->execute($req);
        print_r($resp);
    }
}