<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 单页管理
 *
 * @icon fa fa-circle-o
 */
class Page extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Page');
    }
    public function add($id='5'){
        if ($this->request->isAjax()) {

            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order($sort, $order)
                ->count();

            $list = $this->model
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, 1)
                ->select();


            $result = array("total" => $total, "rows" => $list);
            $this->code = 1;
            return ;
        }
        return $this->view->fetch();
    }
}
