<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use app\admin\model\AdminLog;
use think\Controller;
use fast\Random;
use PHPExcel_IOFactory;
use PHPExcel;

/**
 * 题库
 *
 * @icon fa fa-circle-o
 */
class Ti extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Ti');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $this->code = -1;
            $params = $this->request->post("row/a");
            if ($params)
            {
                $params['status'] = 'hidden';
                $admin =$this->model->create($params);

                if($admin->id){
                    $row = $this->model->get(['id' => $admin->id]);
                    $file = $row->attachfile;
                    Vendor("PHPExcel.IOFactory");
                    $objPHPExcel = \PHPExcel_IOFactory::load('.'.$file);
                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

                    $json = json_encode($sheetData,true);
                    $params['json'] = $json;
                    $params['status'] = 'normal';
                    $row->save($params);
                    AdminLog::record(__('Add'), $this->model->getLastInsID());
                    $this->code = 1;

                }
            }
            return;
        }
        return $this->view->fetch();
    }

    public function edit($ids='')
    {
        $row = $this->model->get(['id' => $ids]);

        if (!$row)
            $this->error(__('No Results were found'));
        $file = $row->attachfile;
        Vendor("PHPExcel.IOFactory");
        $objPHPExcel = \PHPExcel_IOFactory::load('.'.$file);
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

        $array = array();
        foreach ($sheetData as $old){
            $new['biaoti'] = $old['A'];
            $new['correct'] = $old['B'];
            $new['A'] = $old['C'];
            $new['B'] = $old['D'];
            $new['C'] = $old['E'];
            $new['D'] = $old['F'];
            array_push($array,$new);
        }
        $json = json_encode($array);
        print_r($json);
        exit();
        $json = json_encode($sheetData,true);
        $params['json'] = $json;
        $params['status'] = 'normal';
        $row->save($params);
        $this->code = 1;
        return $this->view->fetch();

    }

}
