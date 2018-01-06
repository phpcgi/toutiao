<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 流量主
 *
 * @icon fa fa-circle-o
 */
class Fluxupdate extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('UserFlux');
        $this->modeltid = model('UserFluxtid');
    }
    public function update()
    {
        if ($this->request->isPost())
        {

            foreach ($_REQUEST['radio'] as $k=>$old){
                $params1['status'] =$old;
                model('UserFluxtid')->where('id',$k)->update($params1);
            }
            $this->success('成功');
        }
        return;
    }
}
