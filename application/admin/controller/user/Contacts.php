<?php

namespace app\admin\controller\user;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 党员录入
 *
 * @icon fa fa-circle-o
 */
class Contacts extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('UserContacts');
    }
}
