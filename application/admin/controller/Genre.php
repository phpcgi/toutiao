<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use PHPExcel_IOFactory;
/**
 * 分类录入
 *
 * @icon fa fa-circle-o
 */
class Genre extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Genre');
    }
    public function add()
    {
        if ($this->request->isPost())
        {

            $params = $this->request->post("row/a");
            if ($params)
            {
                /*if ($params['tid']){
                    $this->model->create($params);
                    $this->code = 1;
                    return;
                }*/
                if($params['tid']){
                    $this->model->create($params);
                    $this->code = 1;
                    return;
                }
                $row = $this->model->get(['id' => '1']);
                $params['status'] = 'hidden';
                $params['createtime'] = rand(1,200);
                $admin =   $row->save($params);
                if($admin) {
                    $row = $this->model->get(['id' => '1']);
                    $file = $row->attachfile;
                    Vendor("PHPExcel.IOFactory");
                    $objPHPExcel = \PHPExcel_IOFactory::load('.' . $file);
                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $json = json_encode($sheetData, true);
                    $jsondecode =    \GuzzleHttp\json_decode($json,true);
                    foreach ($jsondecode as $old){
                        if(!$old['A']){
                            continue;
                        }
                        if(!$old['B']){
                            continue;
                        }
                        if(!$old['C']){
                            continue;
                        }
                        $new['name'] = $old['A'];
                        $new['tid'] = $old['B'];
                        $jsonc =  \GuzzleHttp\json_decode($old['C'],true);
                        $type = array_keys($jsonc,max($jsonc))[0];
                        $new['type'] = $type;
                        $row = $this->model->get(['tid' => $old['B']]);
                        if(!$row){
                            $this->model->create($new);
                        }
                    }
                    $this->code = 1;
                }
            }
            return;
        }
        return $this->view->fetch();
    }
    public function index()
    {
        $search = $this->request->get("search");
        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->where('status', '=', "normal")
                ->order($sort, $order)
                ->count();
            $list = $this->model
                ->where($where)
                ->where('status', '=', "normal")
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();
            $result = array("total" => $total, "rows" => $list);

            return json($result);

        }
        return $this->view->fetch();
    }

}
