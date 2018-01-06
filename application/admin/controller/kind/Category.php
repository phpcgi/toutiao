<?php

namespace app\admin\controller\kind;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 分类
 *
 * @icon fa fa-circle-o
 */
class Category extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('KindCategory');
    }
}
