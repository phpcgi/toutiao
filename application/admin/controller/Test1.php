<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;
use think\db;

/**
 * 测试1
 *
 * @icon fa fa-circle-o
 */
class Test1 extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $a = Db::table('fa_test1')->select();

        $this->model = model('Test1');

        $categorydata='';
        foreach ($a as $k => $v)
        {
            $categorydata[$v['id']] = $v['title'];
        }
        $this->view->assign("parentlist", $categorydata);
    }



}
