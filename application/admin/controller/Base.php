<?php
namespace app\admin\controller;

use think\Controller;
class Base extends Controller
{
    //访问不存在的方法
    public function _empty($action){
        $this->error("方法".$action."不存在");
    }

}