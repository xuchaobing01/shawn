<?php
namespace app\admin\controller;

use app\admin\model\Admin;

class Role extends Base
{
    protected $admin;

    public function _initialize()
    {
        $this->admin = new Admin();
    }

    public function index()
    {

        if (request()->isAjax()) {

            $params = input('param.');

            $limit = $params['pageSize'];
            $offest = ($params['pageNumber'] - 1) * $limit;

            $where = [];
            $resultData = $this->admin->getUsersByWhere($where, $offest, $limit);

            $status = config('user_status');
            $status_style = config('status_style');

            foreach ($resultData as $k => $v) {

                if ('0' !== $v['last_login_time']) {
                    $resultData[$k]['last_login_time'] = formatTime($v['last_login_time']);
                }

                if (isset($v['status'])) {
                    $resultData[$k]['status'] = '<span class="label label-' . $status_style[$v['status']] . '">' . $status[$v['status']] . '</span>';
                }

                $operate = [
                    '编辑' => url('user/editUser', ['id' => $v['id']]),
                    '删除' => "javascript:deluser('" . $v['id'] . "')"
                ];

                $resultData[$k]['operate'] = showOperate($operate);

                if (1 == $v['id']) {
                    $resultData[$k]['operate'] = '';
                }

            }
            $returnData['total'] = $this->admin->getAllUsersCount($where);
            $returnData['rows'] = $resultData;

            return json($returnData);
        }
        return $this->fetch('index');
    }

    public function addUser()
    {

        if (request()->isPost()) {

            $param = input('param.');

            $param = parseParams($param['data']);

            $param['password'] = md5($param['password']);

            $flag = $this->admin->insertUser($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);

        }

        //$rolelist=User::all();

        //管理员状态 启用停用
        $user_status = config('user_status');

        $this->assign('user_status', $user_status);
        return $this->fetch('useradd');
    }

    public function editUser()
    {
        if (request()->isPost()) {

            $param = input('param.');

            $param = parseParams($param['data']);

            $hasuser = $this->admin->where('username', 'eq', $param['username'])
                ->where('id', 'neq', $param['id'])
                ->find();

            if ($hasuser) {

                return json(['code' => -3, 'data' => '', 'msg' => '用户名已存在']);

            }

            if (empty($param['password'])) {

                unset($param['password']);

            } else {

                $param['password'] = md5($param['password']);

            }

            $flag = $this->admin->editUser($param);

            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);

        }

        $id = input("param.id");

        $user = Admin::get($id);

        //管理员状态 启用停用
        $user_status = config('user_status');

        $this->assign('user_status', $user_status);
        $this->assign('user', $user);
        return $this->fetch('useredit');

    }

    public function delUser()
    {

        $id = input("param.id");

        $flag = $this->admin->delUser($id);

        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);

    }
}
