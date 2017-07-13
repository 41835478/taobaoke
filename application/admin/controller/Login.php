<?php
/** .-------------------------------------------------------------------
 * |    Software: []
 * | Description:
 * |        Site: www.jechorn.cn
 * |-------------------------------------------------------------------
 * |      Author: 王志传
 * |      Email : <jechorn@163.com>
 * |  CreateTime: 2017/7/10-15:30
 * | Copyright (c) 2016-2019, www.jechorn.cn. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace app\admin\controller;


use think\captcha\Captcha;
use think\Controller;
use think\Db;
use think\Validate;

class Login extends Controller
{
    //返回信息
    private $_msg;

    public function index()
    {
        if (session('?username') && session('?session_id')) {
            $this->success('你已经登录成功正在跳转至首页', url('index/index'));
            exit;
        }
        return $this->fetch();
    }

    public function login()
    {
        $data = $this->request->param('', '', 'htmlspecialchars');
        $rules = [
            'verify|验证码' => 'require|captcha',
            'user|用户名或邮箱' => 'require|length:4,30',
            'password|密码' => 'require|length:6,30',

        ];

        $validate = new Validate($rules);
        if (!$validate->check($data)) {
            $state = 3;
            if (strpos($validate->getError(),'验证码') === false) {
                $state = 2;
            }
            return json([
                'state' => $state,
                'msg' => $validate->getError()
            ]);
        }
        $where_1['username'] = $data['user'];
        $where_2['email'] = $data['user'];

        $info = Db::name('admin')->where($where_1)->whereOr($where_2)->find();
        if (!$info) {
            return json([
                'state' => 2,
                'msg' => '不存在此用户'
            ]);
        }else{
            if ($info['password'] != md5($data['password'])) {
                return json([
                    'state' => 2,
                    'msg' => '账户名或密码不正确'
                ]);
            } else {
                $dataInfo['last_time']  = $info['now_time'];
                $dataInfo['last_ip'] = $info['now_ip'];

                $dataInfo['now_time'] = time();
                $dataInfo['now_ip'] = getIp();
                $loginIp = md5AuthCode($dataInfo['now_ip'], 5, 8);
                $unique = md5AuthCode(session_id() . time(), 8, 12);
                $dataInfo['session_id'] = md5($loginIp . $unique);
                Db::name('admin')->where($where_1)->whereOr($where_2)->update($dataInfo);
                session('username', $info['username']);
                session('session_id', $dataInfo['session_id']);
                session('last_time', $dataInfo['last_time']);
                session('last_ip', $dataInfo['last_ip']);
                return json([
                    'state' => 1,
                    'msg' => $info
                ]);

            }

        }


    }

    //退出登录
    public function logout()
    {
        session('username',null);
        session('session_id', null);
        $this->success('退出登录成功', url('login/index'));
    }

    //生成验证码
    public function createVerify()
    {
        $captcha = new Captcha();
        return $captcha->entry();

    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串，$id多个验证码标识
    function check_verify($code, $id = '')
    {
        $captcha = new Captcha();
        return $captcha->check($code, $id);
    }
}