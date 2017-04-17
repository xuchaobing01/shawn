<?php
namespace app\admin\controller;

use app\admin\model\RoleModel;

class Role extends Base
{
    protected $roleModel;

    public function _initialize()
    {
        $this->roleModel = new RoleModel();
    }

    public function index()
    {

        if (request()->isAjax()) {

            $params = input('param.');

            $limit = $params['pageSize'];
            $offest = ($params['pageNumber'] - 1) * $limit;

            $where = [];
            $resultData = $this->roleModel->getRolesByWhere($where, $offest, $limit);

            foreach ($resultData as $k => $v) {

                $operate = [
                    '编辑' => url('role/editRole', ['id' => $v['id']]),
                    '删除' => "javascript:delRole('" . $v['id'] . "')",
                    '分配权限' => "javascript:delRole('" . $v['id'] . "')"
                ];

                $resultData[$k]['operate'] = showOperate($operate);

                if (1 == $v['id']) {
                    $resultData[$k]['operate'] = '';
                }

            }
            $returnData['total'] = $this->roleModel->getAllRolesCount($where);
            $returnData['rows'] = $resultData;

            return json($returnData);
        }
        return $this->fetch('index');
    }

    public function addRole()
    {

        if (request()->isPost()) {

            $param = input('param.');

            $param = parseParams($param['data']);

            $flag = $this->roleModel->insertRole($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);

        }
        return $this->fetch('addrole');
    }

    public function editRole()
    {
        if (request()->isPost()) {

            $param = input('param.');

            $param = parseParams($param['data']);

            $hasuser = $this->roleModel->where('rolename', 'eq', $param['rolename'])
                ->where('id', 'neq', $param['id'])
                ->find();

            if ($hasuser) {

                return json(['code' => -3, 'data' => '', 'msg' => '用户名已存在']);

            }

            $flag = $this->roleModel->editRole($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);

        }

        $id = input("param.id");

        $role = RoleModel::get($id);

        $this->assign('role', $role);
        return $this->fetch('editrole');

    }

    public function delRole()
    {

        $id = input("param.id");

        $flag = $this->roleModel->delRole($id);

        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);

    }
}
