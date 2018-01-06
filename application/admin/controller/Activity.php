<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use app\common\model\Activity as ActivityModel;
use think\Controller;
use fast\Tree;
use think\Request;

/**
 * 活动
 *
 * @icon fa fa-circle-o
 */
class Activity extends Backend
{

    protected $model = null;
    protected $categorylist = [];

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Activity');

        $tree = Tree::instance();
        $tree->init(ActivityModel::getCategoryArray(), 'pid');
        $this->categorylist = $tree->getTreeList($tree->getTreeArray(0), 'title');
        $categorydata = [0 => __('None')];
        foreach ($this->categorylist as $k => $v)
        {
            $categorydata[$v['id']] = $v['title'];
        }
        $this->view->assign("parentlist", $categorydata);
    }
    public function index()
    {
        if ($this->request->isAjax())
        {

            //构造父类select列表选项数据
            $list = $this->categorylist;
            $total = count($list);
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
