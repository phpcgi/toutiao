<?php

namespace app\admin\controller\weeklist;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 周榜单
 *
 * @icon fa fa-circle-o
 */
class Nr extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('DataWeek');
    }
    public function index()
    {

        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order('A2', $order)
                ->count();
            $list = $this->model
                ->where($where)
                ->order('A2', $order)
                ->limit($offset, $limit)
                ->select();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
