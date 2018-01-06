<?php

namespace app\admin\controller\assess;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 支部考核管理
 *
 * @icon fa fa-circle-o
 */
class Dang extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('AssessRadical');
    }
    public function add()
    {
        if ($this->request->isPost())
        {

            return;
        }
        return $this->view->fetch();
    }
}
