<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\model\OrderextAd;
use app\common\model\Phoneurl;
use think\Request;

use think\Route;
use think\Db;
class Phone extends Frontend
{

// 注册路由到index模块的News控制器的read操作

    public function index($id='')
    {
        if(!$id){
            return;
        }
        $phone =  Phoneurl::get(['urlhash'=>$id]);
        if(!$phone) {
            return;
        }
        $phone->toArray();
        Db::table('fa_phoneurl')
            ->where('id', $phone['id'])
            ->setInc('click');

        $orderextinfo = OrderextAd::get($phone['orderextid'])->toArray();
        if ($orderextinfo['attachfile']){
            $orderextinfo['attachfile']=IMG_URL.$orderextinfo['attachfile'];
        }else{
            $orderextinfo['attachfile']= '';
        }

        $this->assign('info',$orderextinfo);
        $this->assign('phone',$phone);
        return $this->view->fetch();
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        if(!$id){
            return;
        }
        $data['desc'] = $_REQUEST['desc'];
        $data['status'] = $_REQUEST['status'];
        $data['updatetime'] = date("Y-m-d H:i:s",time());
        $update = OrderextAd::update($data,['id'=>$id]);
        return $this->view->fetch();
    }

    public function add(){

        //  $key = "toutiaoyiakc";
        $key = rand(100,9999);
        $phone = '18710236891';
        $orderextid = '123';

        $urlhash = md5($key.$phone.$orderextid);
        $urlhash_piece = substr($urlhash,0,6);
        $url='/phone/'.$urlhash_piece;

        $data['url']=$url;
        $data['urlhash']=$urlhash_piece;
        $data['orderextid']=$orderextid;
        $data['phone'] = $phone;
        $data['key'] = $key;
        Phoneurl::create($data);
        print_r($url);
        exit();
    }
}