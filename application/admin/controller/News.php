<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use app\common\model\Category as CategoryModel;
use think\Controller;
use think\Request;

/**
 * 新闻
 *
 * @icon fa fa-circle-o
 */
class News extends Backend
{

    protected $model = null;
    protected $typemodel = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('News');
        $this->typemodel = model('Category');

        $list = CategoryModel::getCategoryPidArray(11,'normal');
        $categorydata = array();
        foreach ($list as $k => $v)
        {
            $categorydata[$v['id']] = $v['name'];
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
                $data = $this->typemodel->get($v->type);

                if ($data->name) {
                    $name = $data->name;
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
