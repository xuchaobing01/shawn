<?php
namespace app\admin\model;

use think\exception\PDOException;
use think\Model;

class Admin extends Model
{
    protected $table = 'shawn_admin';

    public function getUsersByWhere($where, $offest, $limit)
    {
        return $this->where($where)
            ->limit($offest, $limit)
            ->order('id desc')
            ->select();
    }

    public function getAllUsersCount($where = '1')
    {
        return $this->where($where)->count();
    }

    public function insertUser($param)
    {

        try {

            $res = $this->validate('AdminValidated')->save($param);

            if (false === $res) {

                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];

            } else {

                return ['code' => 1, 'data' => '', 'msg' => '添加管理员成功！'];

            }

        } catch (PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];

        }

    }

    public function editUser($param)
    {

        try {

            $result = $this->validate('AdminValidated.edit')->save($param, ['id' => $param['id']]);

            if (false === $result) {

                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];

            } else {

                return ['code' => 1, 'data' => '', 'msg' => '编辑管理员成功'];

            }

        } catch (PDOException $e) {

            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];

        }

    }

    public function getOneUser($id)
    {
    }

    public function delUser($id)
    {
        try {

            $result = $this->where('id', $id)->delete();

            if (false === $result) {

                return ['code' => -1, 'data' => '', 'msg' => '删除管理员失败'];

            } else {

                return ['code' => 1, 'data' => '', 'msg' => '删除管理员成功'];
            }

        } catch (PDOException $e) {

            return ['code' => -1, 'data' => '', 'msg' => $e->getMessage()];

        }

    }

}