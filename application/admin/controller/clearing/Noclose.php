<?php

namespace app\admin\controller\clearing;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 项目
 *
 * @icon fa fa-circle-o
 */
class Noclose extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('OrderextAd');
        $this->modelad = model('OrderAd');
    }
    public function index()
    {
        if ($this->request->isAjax()) {

            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where(['status'=>8])
                ->order($sort, $order)
                ->count();
            $listc = $this->model
                ->where(['status'=>8])
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            $list = [];
            foreach ($listc as $k => $v) {
                $data = $this->modelad->get($v->orderid);

                if ($data->name) {
                    $name = $data->name;
                } else {
                    $name = '';
                }
                $v->ordername = $name;
                $list[] = $v;
            }


            $result = array("total" => $total, "rows" => $list);

            return json($result);

        }
        return $this->view->fetch();
    }

}
