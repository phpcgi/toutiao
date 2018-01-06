<?php

namespace app\admin\controller\userflux;

use app\admin\model\AdminLog;
use app\common\controller\Backend;

use app\apiweb\controller\Sms;
use app\common\model\Genre;
use app\common\model\KindAct;
use app\common\model\KindForm;
use app\common\model\UserFlux;
use app\common\model\UserFluxtid;
use fast\Random;
use think\Controller;
use think\Request;

/**
 * 流量主
 *
 * @icon fa fa-circle-o
 */
class Flux extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('UserFlux');
        $this->modeltid = model('UserFluxtid');
        $this->modelmonth = model('DataMonth');
    }
    public function detail($ids)
    {
        $row = $this->modeltid->all(['uid' => $ids]);
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
                if($old==1){
                    $info =    $this->modeltid->where('id',$k)->find();
                    $uid = $info->uid;
                    if($uid){
                        $par['status'] =1;
                        $this->model->where('uid',$uid)->update($par);

//                        if ($par['status']==1){
//                        }
                    }
                    /*审核通过添加到分类目录*/
/*
                    $genreInfo = Genre::get(['tid'=>$info->kol_id]);
                    if(!$genreInfo){

                        $genreAdd = Genre::create();
                    }
*/
                }
                model('UserFluxtid')->where('id',$k)->update($params1);


            }
            if(isset($uid)){
                $row = $this->model->get(['uid' => $uid]);
                Sms::sendAudit($row->phone);
            }

            $this->success('成功');
        }
        return;
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
                    self::ext($params,$info['uid']);
                    $this->code = 1;
                    return;
                }
                $salt =   Random::alnum();
                $params['password'] = md5(md5( $params['password']) . $salt);
                $time = date('Y-m-d H:i:s');
                $params['salt'] = $salt;
                $params['logintime'] = $time;
                $params['token'] =Random::uuid();
                $params['jointime'] =$time;

                $add = $this->model->create($params);

                if($add){
                    self::ext($params,$add['uid']);
                }

                $this->code = 1;
            }
            return;
        }
        return $this->view->fetch();
    }

    public  function ext($data,$uid){
        $dataext['uid'] = $uid;
        $dataext['link'] = $data['link'];
        $dataext['pic'] = $data['pic'];
        $dataext['username'] = $data['username'];
        $dataext['is_dg'] = $data['is_dg'];
        $dataext['kol_id'] = $data['kol_id'];
        $add = $this->modeltid->save($dataext);
        if ($add){
            return 1;
        }
    }

    public function selectpage()
    {
        return parent::selectpage();
    }

    public function index()
    {
        $json1 = $this->request->get("search");


        $json = $this->request->get("filter");
        $array =json_decode($json,true);

        if($json=='{}'){
            $username ='';
            $from ='';
        }else{
            if(isset($array['username'])){
                $username = $array['username'];
            }
            if (isset($array['from'])){
                $from = $array['from'];
            }
        }
        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();


//            if(isset($username) || isset($from)){
                $total = $this->model
                    ->order($sort, $order)
                    ->count();
                $listtid = $this->modeltid
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->group('uid')
                    ->select();
//            }

            if(!$listtid){
                $result = array("total" => $total, "rows" => []);
                return json($result);
            }
            if($listtid){
                $list = array();
                foreach ($listtid as $old){
                    $new = $this->model
                        ->where('uid',$old['uid'])
                        ->find();
                    if (!$new){
                        continue;
                    }
                    array_push($list,$new);
                }
            }



            /*

            $list = $this->model
                ->where('username', 'like', "%{$username}%")
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();*/
            foreach ($list as $old){
                $counttid = UserFluxtid::getUidcount($old['uid']);
                $old['num'] = $counttid;
                $old['id'] = $old['uid'];
                $listc[] =$old;
            }


            $result = array("total" => $total, "rows" => $list);

            return json($result);

        }
        return $this->view->fetch();
    }

    public function getfrom(){
        $search = $_REQUEST['search'];
        if($search==1){
            $list  = KindForm::all();
            foreach ($list as $old){
                $new[] = $old['name'];
            }
        }elseif($search==2){
            $listc  = KindAct::all();
            foreach ($listc as $old){
                $new[] = $old['name'];
            }
        }
        return $new;
    }

    public function del($ids = "")
    {
        $this->code = -1;
        if ($ids)
        {
            $count = $this->model->where('uid', $ids)->delete();
            $this->modeltid->where('uid', $ids)->delete();
            if ($count)
            {
                AdminLog::record(__('Del'), $ids);
                $this->code = 1;
            }
        }

        return;
    }
}
