<?php

namespace app\apiweb\controller;

use app\common\controller\Api;
use think\Request;
class Info extends Api
{
    /*
     $username = Request::instance()->session('userinfo');
    */
    public function index(){
        $username = Request::instance()->session('userinfo');
        if($username){
            if(isset($username->kol_id)){
                $data['kol']=$username->kol_id;
            }else{
                $data['kol']='';
            }
            $data['name']=$username->username;
        }else{
            $data['name']='';
            $data['kol']='';
        }
        return Rjson($data);
    }
}
