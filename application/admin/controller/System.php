<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/6/10-4:13
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\controller;
use app\admin\common\Base;
use think\Config;
use think\Validate;

class System extends Base
{

    /**
     * 系统设置设置页面渲染
     * @return mixed
     */

    public function index()
    {
        $displayType = $this->request->param('type','','intval');
        $displayType = ($displayType > 4 || $displayType <=0) ? 1: $displayType;
        $url = $this->request->param('url','0','intval');
        if(intval($url)===2){
            $this->assign('urlVisitType',$url);
        }
        //当前模块名
        $module =$this->request->module();
        //当前控制器名称
        $controller = $this->request->controller();
        switch ($displayType){
            case 1:
                $method = url($module.'/'.$controller.'/updateSystem');
                break;
            case 2:
                $method = url($module.'/'.$controller.'/updateApi');
                break;
            case 3:
                $method = url($module.'/'.$controller.'/clearCache');
                break;
            case 4:
                $method = url($module.'/'.$controller.'/else');
                break;

        }
        $data = [
            'method'=>$method,
            'type' => $displayType
        ];
        $this->assign('data',$data);
        return $this->fetch();
    }

    /**
     * @return array
     * 网站基本信息设置
     */
    public function updateSystem(){
        $this->jump();
        $data = $this->request->param('','','');

        $validate = new Validate([
            'website_title|网站标题' =>'require|min:2|max:6',
            'website_Keywords|网站关键词'=>'require|max:80',
            'website_description|网站描述' =>'require|max:160',
            'website_copyright|网站版权信息' =>'require|max:120',
            'qq_number|QQ群号' =>'length:5,20|integer|gt:0'
        ]);
        if(!$validate->check($data)){
            return $res = [
                'status' => 'error',
                'errorMsg' => $validate->getError(),
                'result'=> ''
            ];
        }
        $path = CONF_PATH.'/extra/';
        $system = include(CONF_PATH.'/extra/system.php');
        $system = is_array($system) ? $system: [];
        $data = array_merge($system,$data);
        $info = set_config($path,'system.php',$data);
        if(true === $info){
            return $res = [
                'status' => 'ok',
                'errorMsg' => '',
            ];
        }else{
            return $res = [
                'status' => 'error',
                'errorMsg' => $info,
            ];
        }
    }

    /**
     * @return array
     * 淘宝api更新
     */
    public function updateApi()
    {

        $this->jump();
        $data = $this->request->post('','','htmlspecialchars');
        $validate = new Validate([
            'app_key' =>'require|integer',
            'app_secret' =>'require',
            'adzone_id' =>'require|integer'
        ]);
        if (!$validate->check($data)){
            return $res = [
                'status' => 'error',
                'errorMsg' => $validate->getError(),
                'result'=> ''
            ];
        }
        $system = include(CONF_PATH.'/extra/system.php');
        $system = is_array($system) ? $system: [];
        $system = array_merge($system,$data);
        $path = CONF_PATH.'/extra/';
        $info = set_config($path,'system.php',$system);
        if(true === $info){
            return $res = [
                'status' => 'ok',
                'errorMsg' => '',
            ];
        }else{
            return $res = [
                'status' => 'error',
                'errorMsg' => $info,
            ];
        }

    }


}