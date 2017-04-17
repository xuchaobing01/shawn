<?php
namespace app\admin\validate;

use think\Validate;
class AdminValidated extends Validate
{
    protected $rule = [
        'username'  =>  'unique:admin|require|max:25',
        'real_name' =>  'require|max:25',
        'password'=>'require',
        'roleid'=>'require|number',
        'status'=>'require|number',
    ];

    protected $message = [
        'username.unique'  =>  '用户名已存在',
        'username.require'  =>  '用户名是必须的',
        'username.max' =>  '用户名最大只能是25位',
        'real_name.require' =>  '真实名是必须的',
        'real_name.max' =>  '真实名最大只能是25位',
        'password.require' =>  '密码是必须的',
        'roleid.require' =>  '请选择管理员角色',
        'roleid.number' =>  '管理员角色错误',
        'status.require' =>  '请选择管理员状态',
        'status.number' =>  '管理员状态错误',
    ];

    protected $scene = [
        'add'   =>  ['username'=>'unique:admin|require|max:25','real_name','password','roleid','status'],
        'edit'  =>  ['username'=>'require|max:25','real_name','roleid','status'],
    ];
}