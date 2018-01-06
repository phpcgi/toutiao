<?php

namespace app\apiweb\controller\Flux;
/**
 * @title 订单管理
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\OrderAd;
use app\common\model\OrderextAd;
use think\Request;
class Order extends Api
{
    /*ad 订单
     $username = Request::instance()->session('userinfo');
    */
    public function index($tid,$start=''){
        $page =10;

        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
//        $info = UserFluxtid::get(['uid'=>$username->uid,'kol_id'=>$tid]);

        $order = OrderextAd::OrderPage($tid,$start,$page);
        $count = count(OrderextAd::OrderPageNum($tid));
        $array = array();
        foreach ($order as $old){
            $info = OrderAd::getId($old['orderid']);
            $new['title'] =$info;
            $new['content'] = self::_getorderexttid($tid,$old['orderid']);
            array_push($array,$new);
        }

        $ret['data'] = $array;
        $ret['count'] = $count;
        $ret['page'] = $page;
        $ret['code'] = 200;
        $ret['msg'] = '成功';
        return json($ret);
    }

    public function attacfile($attachfile){
        $file = is_null($attachfile)?'':$attachfile;
        if($file){
            $att =   IMG_URL.$file;
        }else{
            $att='';
        }
        return $att;
    }
    public function order($tid){
        $order = OrderextAd::getGroupOrderid($tid);

        $array = array();
        foreach ($order as $old){
            $info = OrderAd::getId($old['orderid'])[0];
            $new['title'] =$info;
            $new['content'] = self::_getorderext($old['orderid']);
            array_push($array,$new);
        }
        return Rjson($array);
    }

    public function _getorderexttid($tid,$orderid){
        $list =  OrderextAd::all(['tid'=>$tid,'orderid'=>$orderid]);
        $array = array();
        foreach ($list as $old){

            $info = OrderAd::getId($old['orderid']);
            if($info) {
                $info = $info[0];
                $nettime =$info['newtime'];
            }else{
                $nettime ='';
            }
            $new['id'] = $old['id'];
            $new['name'] = $old['name'];
            $new['type'] = $old['type'];
            $new['avatar_url'] = $old['avatar_url'];
            $new['title'] = is_null($old['title'])?'':$old['title'];
            $new['url'] = is_null($old['url'])?'':$old['url'];
            $new['url_other'] = $old['url_other'];
            $new['puttime'] = is_null($nettime)?'':$nettime;//计划投放时间
            $new['newtime'] = is_null($old['puttime'])?'':$old['puttime'];//实际投放时间
            array_push($array,$new);
        }
        return $array;
    }
    public function _getorderext($id){
        $list =  OrderextAd::all(['orderid'=>$id]);
        $array = array();
        foreach ($list as $old){
            $new['id'] = $old['id'];
            $new['name'] = $old['name'];
            $new['type'] = $old['type'];
            $new['avatar_url'] = $old['avatar_url'];
            $new['title'] = is_null($old['title'])?'':$old['title'];
            $new['url'] = is_null($old['url'])?'':$old['url'];
            $new['url_other'] = $old['url_other'];
            $new['puttime'] = is_null($old['puttime'])?'':$old['puttime'];
            array_push($array,$new);
        }
        return $array;
    }
    public function orderedit($id,$title='',$url=''){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        if($title){
            $data['title'] = $title;
        }
        if($url){
            $data['url'] = $url;
        }
        $update =   OrderextAd::update($data,['id' => $id]);
        if($update){
            return Rjson('',200,'成功');
        }

    }

    /*任务*/
    /*待上传  待修改  待发文 */
    public function orders($tid='',$start=''){
/*
        $order =OrderAd::all();
        return Rjson($order);*/

        $page =1000;
        $order = OrderextAd::getGroupOrderidpage($tid,$start,$page);
        $count = count(OrderextAd::getGroupOrderidpagecount($tid));


        $orderext = [];
        foreach ($order as $old){
            $info = OrderAd::getId($old['orderid']);
            if($info){
                $info = $info[0];
                if($info['status']==1){
                    continue;
                }
                $old['attachfile'] = is_null($old['attachfile'])?'':$old['attachfile'];
                if($old['attachfile']){
                    $old['attachfile'] = IMG_URL.$old['attachfile'];
                }else{
                    $old['attachfile'] ='' ;
                }
                $old['title'] =$info['name'];
            }

            $orderext[] = $old;
        }

        $ret['data'] = $orderext;
        $ret['count'] = $count;
        $ret['page'] = $page;
        $ret['code'] = 200;
        $ret['msg'] = '成功';
        return json($ret);
    }
    public function updatefile($id,$file='',$desc=''){

        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        if($file){
            $data['attachfile'] = $file;
        }
        if($desc){
            $data['desc'] = $desc;
        }
        $data['status'] = 3;
        $update =   OrderextAd::update($data,['id' => $id]);
        if($update){
            return Rjson('',200,'成功');
        }
    }
}
