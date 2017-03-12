<?php
namespace app\admin\model;

use think\Model;
class Admin extends Model
{
    protected $table='shawn_admin';
    public function getUsersByWhere($where,$offest,$limit){
        return $this->where($where)
            ->limit($offest,$limit)
            ->order('id desc')
            ->select();
    }
    public function getAllUsersCount($where){
        return $this->where($where)->count();
    }
    public function insertUser($param){}
    public function editUser($param){}
    public function getOneUser($id){}
    public function DelUser($id){}

}