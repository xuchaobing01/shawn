<?php
namespace app\admin\model;

use think\Model;

class NodeMoldel extends Model
{
    protected $table = 'shawn_node';

    public function getNodesByWhere($where, $offest, $limit)
    {

        return $this->where($where)->limit($offest, $limit)->order('id desc')->select();

    }

    public function getAllNodesCount($where='1'){

        return $this->where($where)->count();

    }
}