<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 广告主
 *
 * @icon fa fa-circle-o
 */
class Userad1 extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('UserAd');
    }
}
