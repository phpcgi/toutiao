<?php

namespace app\admin\controller\userad;

use app\common\controller\Backend;
use app\apiweb\controller\Sms;
use fast\Random;
use think\Controller;
use think\Request;
use app\admin\model\AdminLog;

/**
 * 广告主
 *
 * @icon fa fa-circle-o
 */
class Ad extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('UserAd');
    }

    public function detail($ids)
    {
        $row = $this->model->all(['uid' => $ids]);
        if (!$row)
            $this->error(__('No Results were found'));
        $this->view->assign("row", $row);
        return $this->view->fetch();
    }

    public function update()
    {

        if ($this->request->isPost())
        {
            foreach ($_REQUEST['radio'] as $k=>$old){
                $params1['status'] =$old;
                model('UserAd')->where('uid',$k)->update($params1);

                if ($params1['status']==2){
                    $row = $this->model->get(['uid' => $k]);
                        Sms::sendAudit($row->phone);

                }
            }
            $this->success('成功');
        }
        return;
    }
    public function edit($ids = NULL)
    {
        $row = $this->model->get(['uid' => $ids]);
        if (!$row)
            $this->error(__('No Results were found'));
        // 状态为locked时不允许编辑
        if ($this->request->isPost())
        {
            $this->code = -1;
            $params = $this->request->post("row/a");
            if ($params)
            {
                $this->code = -1;
                $params = $this->request->post("row/a");
                if ($params)
                {
                    $row->save($params);
                    AdminLog::record(__('Edit'), $ids);
                    $this->code = 1;
                }
                return;
            }

            return;
        }
        $this->view->assign("row", $row);
        return $this->view->fetch();
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $this->code = -1;
            $params = $this->request->post("row/a");
            if ($params)
            {
                if (!$params['phone']){
                    $this->code = -1;
                    $this->msg = '手机号不能为空';
                    return;
                }
                $info = $this->model->get(['phone'=>$params['phone']]);
                if($info){
                    $this->code = -1;
                    $this->msg = '手机号存在';
                    return;
                }
                $salt =  Random::alnum();
                $params['password'] = md5(md5( $params['password']) . $salt);
                $time = date('Y-m-d H:i:s');
                $params['salt'] = $salt;
                $params['logintime'] = $time;
                $params['token'] =Random::uuid();
                $params['jointime'] =$time;

                $add = $this->model->create($params);
                $this->code = 1;
            }
            return;
        }
        return $this->view->fetch();
    }
}
