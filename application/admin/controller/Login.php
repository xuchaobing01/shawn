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

        //接收数据
        $username=input('param.username');
        $password=input('param.password');
        $code=input('param.code');

        //校验数据
        $result=$this->validate(compact('username','password','code'),"AdminValidate");
        if(true!==$result){
            return json(['code'=>-1,'data'=>'','msg'=>$result]);
        }

        //校验验证码
        //查询管理员
        //管理员不存在
        //管理员密码错误
        //管理员未启用
        //登录成功
        //return json(['code'=>-1,'data'=>url('index/idnex'),'msg'=>'密码错误']);
    }

    //退出操作
    public function loginOut(){
        //清空session

    }
}