<?php

namespace app\admin\controller\monthlist;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 月榜单
 *
 * @icon fa fa-circle-o
 */
class Zongbang extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('DataMonth');
    }
    public function index()
    {

        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order('worth', $order)
                ->count();
            $list = $this->model
                ->where($where)
                ->order('worth', $order)
                ->limit($offset, $limit)
                ->select();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
