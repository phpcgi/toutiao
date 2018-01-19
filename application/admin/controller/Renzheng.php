<?php

namespace app\admin\controller;

use think\Session;
use app\admin\model\AdminLog;
use app\common\controller\Backend1;
use fast\Random;

/**
 * 数据
 *
 * @icon fa fa-circle-o
 */
class Renzheng extends Backend1
{
    public function index(){

        return $this->view->fetch();
    }

    public function details($id){
        echo $id;
    }
    
}
