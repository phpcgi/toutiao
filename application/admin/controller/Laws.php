<?php

namespace app\admin\controller;


use think\Session;
use app\admin\model\AdminLog;
use app\common\controller\Backend;
use fast\Random;
use think\db;
/**
 * 党内法规
 *
 * @icon fa fa-circle-o
 */
class Laws extends Backend
{

    protected $model = null;

    public function index()
    {
        if ($this->request->isAjax())
        {
            $model = model('AdminLog');
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();

            $total = $model
                ->where($where)
                ->order($sort, $order)
                ->count();

            $list = $model
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
    public function update()
    {
        if ($this->request->isPost())
        {
            $this->code = -1;
            $params = $this->request->post("row/a");
            $params = array_filter(array_intersect_key($params, array_flip(array('email', 'nickname', 'password'))));
            unset($v);
            if (isset($params['password']))
            {
                $params['salt'] = Random::alnum();
                $params['password'] = md5(md5($params['password']) . $params['salt']);
            }
            if ($params)
            {
                model('admin')->where('id', $this->auth->id)->update($params);
                AdminLog::record(__('Update'), $params);
                //因为个人资料面板读取的Session显示，修改自己资料后同时更新Session
                $admin = Session::get('admin');
                $admin_id = $admin ? $admin->id : 0;
                if($this->auth->id==$admin_id){
                    $admin = model('admin')->get(['id' => $admin_id]);
                    Session::set("admin", $admin);
                }
                $this->code = 1;
            }
        }
        return;
    }
}
