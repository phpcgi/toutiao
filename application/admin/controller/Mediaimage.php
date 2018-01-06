<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 新媒体
 *
 * @icon fa fa-circle-o
 */
class Mediaimage extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('MediaImage');
    }
}
