<?php

namespace app\admin\controller\userad;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 公告
 *
 * @icon fa fa-circle-o
 */
class Msg extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Msg');
    }

    public function index()
    {

        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where('type',2)
                ->count();
            $list = $this->model
                ->where('type',2)
                ->limit($offset, $limit)
                ->select();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
