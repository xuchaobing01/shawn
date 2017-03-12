<?php
return [
    //模板参数替换
    'view_replace_str' => array(
        '__CSS__' => '/static/admin/css',
        '__JS__'  => '/static/admin/js',
        '__IMG__' => '/static/admin/images',
    ),
    'app_trace'=>false,
    'user_status'=>array(
        '1'=>"正常",
        '0'=>'禁止登录'
    ),
    'operate_style'=>array(
        '编辑'=>['color'=>'btn btn-primary btn-sm','style'=>'fa fa-pencil'],
        '删除'=>['color'=>'btn btn-danger btn-sm','style'=>'fa fa-trash-o'],
    ),
    'status_style'=>array(
        '1'=>'success',
        '0'=>'danger'
    )

];