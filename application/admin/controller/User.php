<?php
namespace app\admin\controller;

use app\admin\model\Admin;

class User extends Base
{
 //   protected $admin;
//    public function __construct()
//    {
//        parent::
//    }

    public function index()
    {
        $admin=new Admin();
        if(request()->isAjax()){

            $params=input('param.');

            $limit=$params['pageSize'];
            $offest=($params['pageNumber']-1)*$limit;

            $where=[];
            $resultData=$admin->getUsersByWhere($where,$offest,$limit);

            $status=config('user_status');
            $status_style=config('status_style');

            foreach($resultData as $k=>$v){

                if($v['last_login_time']){
                    $resultData[$k]['last_login_time']=formatTime($v['last_login_time']);
                }

                if(isset($v['status'])){
                    $resultData[$k]['status']='<span class="label label-'.$status_style[$v['status']].'">'.$status[$v['status']].'</span>';
                }

                $operate=[
                    '编辑'=>url('user/editUser',['id'=>$v['id']]),
                    '删除'=>'javascript:deluser("'.$v['id'].'")'
                ];

                $resultData[$k]['operate']=showOperate($operate);

                if(1==$v['id']){$resultData[$k]['operate']='';}

            }
            $returnData['total']=$admin->getAllUsersCount($where);
            $returnData['rows']=$resultData;

            return json($returnData);
        }
        return $this->fetch('index');
    }
    public function addUser(){}
    public function editUser(){}
    public function delUser(){}
}
