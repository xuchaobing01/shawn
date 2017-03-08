<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
class Login extends Controller
{
    //登录页面
    public function index()
    {
        return $this->fetch('/login');
    }

    //登录操作
    public function doLogin()
    {
        //接收数据
        $username = input('param.username');
        $password = input('param.password');
        $code = input('param.code');

        //校验数据
        $result = $this->validate(compact('username', 'password', 'code'), "AdminValidate");
        if (true !== $result) {
            //验证失败
            return json(['code' => -1, 'data' => '', 'msg' => $result]);
        }

        //校验验证码
        if (!captcha_check($code)) {
            //验证失败
            return json(['code' => -2, 'data' => '', 'msg' => '验证码错误']);
        }

        //查询管理员
        $admin = db('admin')->where('username', $username)->find();

        //管理员不存在
        if (empty($admin)) {
            return json(['code' => -3, 'data' => '', 'msg' => '管理员不存在']);
        }

        //管理员密码错误
        if (md5($password) != $admin['password']) {
            return json(['code' => -4, 'data' => '', 'msg' => '密码错误']);
        }

        //管理员未启用
        if (1 != $admin['status']) {
            return json(['code' => -4, 'data' => '', 'msg' => '管理员被禁用']);
        }

        //设置session
        session('id', $admin['id']);
        session('username', $username);

        //更新管理员状态
        $param = [
            'loginnum' => $admin['loginnum'] + 1,
            'last_login_ip' => request()->ip(),
            'last_login_time' => time()
        ];
        db('admin')->where('id', $admin['id'])->update($param);

        //登录成功
        return json(['code' => 1, 'data' => url('index/index'), 'msg' => '登录成功']);
    }

    //退出操作
    public function loginOut()
    {
        //清空session
        session('id',null);
        session('username',null);

        $this->redirect(url('index'));
    }
}