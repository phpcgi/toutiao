<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use app\admin\model\AdminLog;
use think\Controller;
use think\Request;
use PHPExcel_IOFactory;
use PHPExcel;

/**
 * 党员录入
 *
 * @icon fa fa-circle-o
 */
class Alluser extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Alluser');
    }
    public function add()
    {
        if ($this->request->isPost())
        {
            $this->code = -1;
            $params = $this->request->post("row/a");
            if ($params)
            {
                if ($params['name']){
                    $new['department'] = '';
                    $this->model->create($params);
                    $this->code = 1;
                    return;
                }
                $row = $this->model->get(['id' => '46']);
                $params['status'] = 'hidden';
                $admin =   $row->save($params);
                if($admin==0) {
                    $row = $this->model->get(['id' => '46']);
                    $file = $row->attachfile;
                    Vendor("PHPExcel.IOFactory");
                    $objPHPExcel = \PHPExcel_IOFactory::load('.' . $file);
                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $json = json_encode($sheetData, true);
                    $jsondecode =    \GuzzleHttp\json_decode($json,true);
                    foreach ($jsondecode as $old){
                        $new['name'] = $old['A'];
                        $new['idcard'] = $old['B'];
                        $new['phone'] = $old['C'];
                        $new['department'] = $old['D'];

                        $row = $this->model->get(['idcard' => $old['B']]);
                        if(!$row){
                            $this->model->create($new);
                        }
                    }
                    AdminLog::record(__('Add'), $this->model->getLastInsID());
                    $this->code = 1;
                }
            }
            return;
        }
        return $this->view->fetch();
    }
}
