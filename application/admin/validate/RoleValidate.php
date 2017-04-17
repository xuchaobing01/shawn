<?php
namespace app\admin\validate;

use think\validate;

class RoleValidate extends validate
{

    protected $rule = [
        'rolename' => 'unique:role|require|max:25',
    ];

    protected $message=[
        'rolename.unique'=>'角色名已存在',
        'rolename.require'=>'角色名不能为空',
        'rolename.max'=>'角色名不能超过25个字符',
    ];

    protected $scene=[
        'add'=>['rolename'],
        'edit'=>['rolename'=>'require|max:25']
    ];

}