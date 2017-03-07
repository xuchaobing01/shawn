<?php
namespace app\admin\controller;


use think\Controller;

class Login extends Controller
{
    //登录页面
    public function index(){
        return $this->fetch('/login');
    }

    //登录操作
    public function doLogin(){
        return json(['code'=>-1,'data'=>url('index/idnex'),'msg'=>'密码错误']);
    }

    //退出操作
    public function loginOut(){

    }
}