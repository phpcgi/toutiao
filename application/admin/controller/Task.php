<?php

namespace app\admin\controller;

use app\apiweb\controller\Sms;
use app\common\controller\Backend;

use app\common\model\OrderAd;
use app\common\model\Phoneurl;
use app\common\model\UserAd;
use app\common\model\UserFlux;
use app\common\model\UserFluxtid;
use think\Controller;
use think\Request;

/**
 * 订单详情（任务）
 *
 * @icon fa fa-circle-o
 */
class Task extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('OrderextAd');
    }
    public function index()
    {
        if ($this->request->isAjax()) {

            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where([$where,'del'=>1])
                ->order($sort, $order)
                ->count();
            $listc = $this->model
                ->where([$where,'del'=>1])
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();
            $list = [];
            foreach ($listc as $k => $v) {
                //  $data = $this->typemodel->get($v->type);
                $v->adname = self::orderad($v['orderid']);
                $status = OrderAd::get(['id'=>$v['orderid']]);
                /*if($status['status']==1){
                    continue;
                }*/
                if ($v->status==1) {
                    $v->status = '待流量主上传';
                }elseif ($v->status==2)  {
                    $v->status = '待流量主修改';
                }elseif ($v->status==4)  {
                    $v->status = '待流量主发布';
                }elseif ($v->status==3)  {
                    $v->status = '待文案审核';
                }elseif ($v->status==5)  {
                    $v->status = '待文案修改';
                }elseif ($v->status==6)  {
                    $v->status = '待文案上传';
                }elseif ($v->status==7)  {
                    $v->status = '待广告主审核';
                }elseif ($v->status==8)  {
                    $v->status = '待结算';
                }elseif ($v->status==9)  {
                    $v->status = '已结算';
                }
                $list[] = $v;
            }

//            $totalc = count($list);
            $result = array("total" => $total, "rows" => $list);
            return json($result);

        }
        return $this->view->fetch();
    }

    public function orderad($id){
        $info = OrderAd::get($id);
        return $info['name'];
    }

    /**
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get(['id' => $ids]);
        if (!$row)
            $this->error(__('No Results were found'));

        $orderextinfo = $this->model->get(['id' => $ids]);
        $orderinfo = OrderAd::get(['id'=>$orderextinfo['orderid']]);

        if ($this->request->isPost())
        {
            $this->code = -1;
            $params = $this->request->post("row/a");

            $phone = $this->request->post("phone/a");

            if ($params)
            {
                $row->save($params);

                if ($params['status']==7){
                    if ($phone['adphone']){
                        $type ='待审核';
                        $title = $orderinfo['name'];
                        $tid = $orderextinfo['name'];
                        $url = self::_url($phone['adphone'],$orderextinfo['id'],1);
                        Sms::sendVerify($phone['adphone'],$type,$title,$tid,$url);
                    }
                }

                if ($params['status']==2){
                    if ($phone['fluxphone']){
                        $type1 ='待修改';
                        $title1 = $orderinfo['name'];
                        $tid1 = $orderextinfo['name'];
                        $url1 = self::_url($phone['fluxphone'],$orderextinfo['id'],2);
                        Sms::sendVerify($phone['fluxphone'],$type1,$title1,$tid1,$url1);
                    }
                }


                $this->code = 1;
            }

            return;
        }
        $grouplist = $this->auth->getGroups($row['id']);
        $groupids = [];
        foreach ($grouplist as $k => $v)
        {
            $groupids[] = $v['id'];
        }

        $adinfo = UserAd::get(['uid'=>$row['uid']]);
        $fluxextinfo = UserFluxtid::get(['kol_id'=>$row['tid']]);
        $fluxinfo = UserFlux::get(['uid'=>$fluxextinfo['uid']]);
        $this->view->assign("row", $row);
        $this->view->assign("adinfo", $adinfo);
        $this->view->assign("fluxinfo", $fluxinfo);
        return $this->view->fetch();
    }

    public function _url($phone,$extid,$for){
        $key = rand(100,9999);
        $urlhash = md5($key.$phone.$extid);
        $urlhash_piece = substr($urlhash,0,6);
        $url='/phone/'.$urlhash_piece;

        $data['url']=$url;
        $data['urlhash']=$urlhash_piece;
        $data['orderextid']=$extid;
        $data['phone'] = $phone;
        $data['createtime'] = date("Y-m-d H:i:s",time());
        $data['key'] = $key;
        $data['for'] = $for;
        Phoneurl::create($data);

        return WEB_URL.$url;
    }
}
