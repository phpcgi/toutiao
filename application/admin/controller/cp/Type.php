<?php

namespace app\admin\controller\cp;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 类别
 *
 * @icon fa fa-circle-o
 */
class Type extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('CpType');
    }
}
