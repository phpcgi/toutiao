<?php

namespace app\admin\controller\cp;

use app\common\controller\Backend;

use app\common\model\CpType;
use think\Controller;
use think\Request;

/**
 * 内容
 *
 * @icon fa fa-circle-o
 */
class Content extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('CpContent');
        
        $list = CpType::all();
        $categorydata = array();
        foreach ($list as $k => $v)
        {
            $categorydata[$v['id']] = $v['title'];
        }
        $this->view->assign("typelist", $categorydata);
    }
    public function index()
    {
        if ($this->request->isAjax()) {

            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order($sort, $order)
                ->count();

            $listc = $this->model
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            $list = [];
            foreach ($listc as $k => $v) {
                $data = CpType::get($v->type);

                if ($data->title) {
                    $name = $data->title;
                } else {
                    $name = '';
                }
                $v->type = $name;
                $list[] = $v;
            }

            $result = array("total" => $total, "rows" => $list);

            return json($result);

        }
        return $this->view->fetch();
    }
}
