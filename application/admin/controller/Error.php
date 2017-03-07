<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
class Error extends Controller
{
    //访问不存在的控制器
    public function index(Request $request){
        $controllername=$request->controller();
        $this->error('控制器'.$controllername.'不存在');
    }
}