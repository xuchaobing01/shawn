<?php
namespace app\admin\model;

use think\exception\PDOException;
use think\Model;

class RoleModel extends Model
{
    protected $table = "shawn_role";

    public function getRolesByWhere($where, $offest, $limit)
    {

        return $this->where($where)->limit($offest, $limit)->order('id asc')->select();

    }

    public function getAllRolesCount($where = '1')
    {

        return $this->where($where)->count();

    }

    public function insertRole($param)
    {
        try {

            $result = $this->validate('RoleValidate')->save($param);

            if (false === $result) {

                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];

            } else {

                return ['code' => 1, 'data' => '', 'msg' => '添加角色成功'];

            }

        } catch (PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e - getMessage()];

        }


    }

    public function editRole($param)
    {
        try{

            $result = $this->validate('RoleValidate.edit')->save($param,['id'=>$param['id']]);

            if (false === $result) {

                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];

            } else {

                return ['code' => 1, 'data' => '', 'msg' => '编辑角色成功'];

            }

        }catch(PDOException $e){

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];

        }

    }

    public function delRole($id)
    {

        try {

            $result = $this->where('id', $id)->delete();

            if (false === $result) {

                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];

            } else {

                return ['code' => 1, 'data' => '', 'msg' => '删除角色成功'];

            }

        } catch (PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];

        }

    }

}