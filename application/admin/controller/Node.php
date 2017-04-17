<?php
/**
 * Created by PhpStorm.
 * User: xuchaobing
 * Date: 2017/4/17
 * Time: 15:34
 */

namespace app\admin\controller;

use app\admin\model\NodeMoldel;
use think\Controller;

class Node extends Controller
{

    protected $nodeMode;

    protected function _initialize()
    {

        $this->nodeMode = new NodeMoldel();

    }

    public function index()
    {

        if (request()->isAjax()) {

            $param = input("param.");

            $limit = $param['pageSize'];
            $offest = ($param['pageNumber'] - 1) * $limit;

            $where = [];
            $resultData = $this->nodeMode->getNodesByWhere($where, $offest, $limit);

            foreach ($resultData as $k => $v) {

                $operate = [
                    '编辑' => url('Node/editNode', ['id' => $v['id']]),
                    '删除' => 'javascript:delNode("' . $v['id'] . '")'
                ];

                $resultData[$k]['operate'] = showOperate($operate);

            }

            $returnData['total'] = $this->nodeMode->getAllNodesCount($where);
            $returnData['row'] = $resultData;
        }

        return $this->fetch('index');

    }

}