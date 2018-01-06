<?php

namespace app\apiweb\controller\Ad;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\CollectorAd;
use app\common\model\Data;
use app\apiweb\controller\Sms;
use app\common\model\Phoneurl;
use app\common\model\DataMonth;
use app\common\model\OrderAd;
use app\common\model\OrderextAd;
use app\common\model\OrderextAdurl;
use app\common\model\UserFlux;
use app\common\model\UserFluxtid;
use traits\controller\Jump;
use think\Request;
use app\common\model\UserAd;
use think\Cookie;
use think\Session;
class Order extends Api
{
    /*ad 订单
     $username = Request::instance()->session('userinfo');
    */
    public function index($start='',$type=''){
        $page =13;
        $user = Request::instance()->session('userinfo');
        $list = OrderAd::getpage($user->uid,$start,$page,$type);
        $count = count(OrderAd::getpagecount($user->uid,$type));
        $array = array();
        foreach ($list as $old){
            $new['id'] = $old['id'];
            $new['title'] = $old['name'];
            $new['createtime'] = $old['createtime'];
            $new['time'] = $old['time'];
            $new['status'] = $old['status'];
            $new['attachfile'] = self::attacfile($old['attachfile']);
            $new['content'] = self::_getorderext($old['id']);
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
            $new['status'] = $old['status'];
            $new['puttime'] = is_null($old['puttime'])?'':$old['puttime'];
            array_push($array,$new);
        }
        return $array;
    }

    public function getorderext($id){
        $list =  OrderextAd::all(['id'=>$id]);
        $array = array();
        foreach ($list as $old){
            $new['url_other'] = $old['url_other'];
            array_push($array,$new);
        }

        return Rjson($array);
    }
    public function urlotheredit($id,$url){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        if($url){
            $data['url_other'] = $url;
        }
        $update =   OrderextAd::update($data,['id' => $id]);
        if($update){
            return Rjson('',200,'成功');
        }
    }
    /*
     * $ids='1,2';
     * */
    public function orderadd($ids,$title){
        $username = Request::instance()->session('userinfo');
        $info['name'] = $title;
        $info['time'] = Request::instance()->request('time');//投放时间
        $info['newtime'] = Request::instance()->request('time');//投放时间
        $info['desc'] = Request::instance()->request('desc');
        $info['createtime'] = date('Y-m-d H:i:s',time());
        $info['endtime'] = Request::instance()->request('endtime');
        $info['attachfile'] = Request::instance()->request('file');
        $info['uid'] = $username->uid;

        $add = OrderAd::create($info);
        if ($add){
            $data['orderid'] = $add->getLastInsID();
            OrderextAd::update($data,['id' => ['in',$ids]]);
            return Rjson('',200,'添加成功');
        }
    }
    public function orderextadd($id){
        $username = Request::instance()->session('userinfo');
        $id = Request::instance()->request('id');
        $info = self::getinfo($id);
        $info['uid'] = $username->uid;
        $add = OrderextAd::create($info);
        if ($add){
            return Rjson('',200,'添加成功');
        }
    }

    public function nobuy($id){
        $username = Request::instance()->session('userinfo');
        if(!$username){
            return Rjson('',200,'未登录');
        }
        $del =   OrderextAd::destroy(['DataMonthid'=>$id,'uid'=>$username->uid]);
        if ($del){
            return Rjson('',200,'删除成功');
        }
    }
    public function orderdel($id){
        $data['del'] = 0;
        $up =   OrderAd::update($data,['id' =>$id]);
        if($up){
            return Rjson('',200,'删除成功');
        }
    }
    public function orderextdel($id){
        $username = Request::instance()->session('userinfo');
        if(!$username){
            return Rjson('',200,'未登录');
        }
        $del =   OrderextAd::destroy($id);
        if ($del){
            return Rjson('',200,'删除成功');
        }
    }
    public function orderuser($uid){
        $username = Request::instance()->session('userinfo');
        $list = OrderextAd::all(['uid'=>$username->uid,'orderid'=>'0']);

        $new = [];
        foreach ($list as $old){
            $old['is_coll'] =self::iscollector($old['tid']);
            $new[] = $old;
        }
        return Rjson($list,200,'成功');
    }
    public function iscollector($id){
        $username = Request::instance()->session('userinfo');
        $info = CollectorAd::get(['uid'=>$username->uid,'tid'=>$id,'status'=>1]);
        if($info){
            return 1;
        }else{
            return 0;
        }
    }

    public function getinfo($id){
        $old =  DataMonth::get($id);
        $new['DataMonthid'] = $old['id'];
        $new['tid'] = $old['tid'];
        $new['name'] = $old['name'];
        $new['type'] = $old['type'];
        $new['avatar_url'] = $old['avatar_url'];
        $new['A4'] = $old['A4'];
        $new['R'] = $old['R'];
        $new['worth'] = $old['worth'];
        $new['cost'] = round($old['R']/1000*50,0);

        return $new;
    }

    public function info($id){
        $user = Request::instance()->session('userinfo');
        $old = OrderAd::get(['uid'=>$user->uid,'id'=>$id]);
        $new['id'] = $old['id'];
        $new['title'] = $old['name'];
        $new['time'] = $old['time'];
        $new['endtime'] = $old['endtime'];
        $new['desc'] = $old['desc'];
        $new['attachfile'] = $old['attachfile'];
        return Rjson($new);
    }
    public function update($id){
        $data['name'] = Request::instance()->request('name');
        $data['time'] = Request::instance()->request('time');
        $data['endtime'] = Request::instance()->request('endtime');
        $data['desc'] = Request::instance()->request('desc');
        $data['attachfile'] = Request::instance()->request('attachfile');
        $update =   OrderAd::update($data,['id' => $id]);
        if($update){
            return Rjson('',200,'成功');
        }
    }



    /*任务*/
    public function task($start=''){
        $user = Request::instance()->session('userinfo');
        if(!$user){
            return Rjson('',200,'未登录');
        }
        $page =12   ;
        $list =  OrderextAd::getTaskArray($user->uid,$start,$page);
        $count = count(OrderextAd::getTastcount($user->uid));
        $array = array();
        foreach ($list as $old){
            $name = OrderAd::get(['id'=>$old['orderid']]);
            if ($name){
               $name = $name->toArray();
            }
            $new['id'] = $old['id'];
            $new['ntitle'] = $name['name'];
            $new['name'] = $old['name'];
            $new['type'] = $old['type'];
            $new['avatar_url'] = $old['avatar_url'];
            $new['title'] = is_null($old['title'])?'':$old['title'];
            $new['url'] = is_null($old['url'])?'':$old['url'];
            $new['url_other'] = $old['url_other'];
            $new['status'] = $old['status'];
            $new['puttime'] = is_null($old['puttime'])?'':$old['puttime'];
            array_push($array,$new);
        }
        
        $ret['data'] = $array;
        $ret['count'] = $count;
        $ret['page'] = $page;
        $ret['code'] = 200;
        $ret['msg'] = '成功';
        return json($ret);

    }

    public function getext($id){
        $user = Request::instance()->session('userinfo');
        if(!$user){
            return Rjson('',200,'未登录');
        }
        $info = OrderextAd::get($id);
        if($info['attachfile']){
            $info['attachfile'] = IMG_URL.$info['attachfile'];
        }else{
            $info['attachfile'] ='' ;
        }
        $info['size'] =21859;
        return Rjson($info);
    }
    public function updateext($id,$status='3',$desc=''){
        $user = Request::instance()->session('userinfo');
        if(!$user){
            return Rjson('',200,'未登录');
        }
        $data['status'] = $status;
        if($desc){
            $data['desc'] = $desc;
        }
        $update =   OrderextAd::update($data,['id' => $id]);
        if($update){
            $info = OrderextAd::get($id);
            $in = OrderAd::get($info->orderid);
            if($info){
                $fluxtid = UserFluxtid::get(['kol_id'=>$info->tid]);
                $flux = UserFlux::get($fluxtid->uid);
//                Sms::sendAudit($flux->phone);

                $type ='待上传';
                $title = $in['name'];
                $tid = $info->name;
                $url = self::_url($flux->phone,$info->id,1);
                Sms::sendVerify($flux->phone,$type,$title,$tid,$url);
            }
            return Rjson('',200,'成功');
        }
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

    public function addurl($extid){
        if(!$extid){
            return Rjson('',-1,'extid不能为空');
        }
        $user = Request::instance()->session('userinfo');
        if(!$user){
            return Rjson('',-1,'未登录');
        }
        $data['orderextid'] = $extid;
        $data['uid'] = $user->uid;
        $data['url'] = $_REQUEST['url'];
        $add = OrderextAdurl::create($data);
        if($add){
            $info = OrderextAdurl::all(['uid'=>$user->uid,'orderextid'=>$extid]);
            foreach ($info as $old){
                $new[] = $old['url'];
            }
            $url=   implode($new,'{@@@}');
            if($url){
                $dataurl['url_other'] = $url;
            }
            OrderextAd::update($dataurl,['id' => $extid]);
            return Rjson('',200,'成功');
        }
    }

    public function infourl($extid){
        $user = Request::instance()->session('userinfo');
        if(!$user){
            return Rjson('',-1,'未登录');
        }
        if(!$extid){
            return Rjson('',-1,'extid不能为空');
        }
        $info = OrderextAdurl::all(['uid'=>$user->uid,'orderextid'=>$extid]);
        return Rjson($info,200,'成功');
    }
    
    public function delurl($exturlid){
        $user = Request::instance()->session('userinfo');
        if(!$user){
            return Rjson('',-1,'未登录');
        }
        if(!$exturlid){
            return Rjson('',-1,'extid不能为空');
        }
        $urlid =OrderextAdurl::get($exturlid);
        $del= OrderextAdurl::destroy(['id'=>$exturlid,'uid'=>$user->uid]);

        $extid = $urlid->orderextid;
        $info = OrderextAdurl::all(['uid'=>$user->uid,'orderextid'=>$extid]);
        if ($info){
            foreach ($info as $old){
                $new[] = $old['url'];
            }
            if(count($new)>2){
                $url=   implode($new,'{@@@}');
            }else{
                $url = $new;
            }
            if($url){
                $dataurl['url_other'] = $url;
            }
            OrderextAd::update($dataurl,['id' => $extid]);
        }else{
            $dataurl['url_other'] = '';
            OrderextAd::update($dataurl,['id' => $extid]);
        }
        if($del){

            return Rjson('',200,'成功');
        }
    }
}
