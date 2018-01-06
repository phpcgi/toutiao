<?php

namespace app\apiweb\controller\Userflux;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use think\Request;
use app\apiweb\library\Userflux;
use think\Db;
use app\apiweb\controller\Sms;
class Reg extends Api
{
    /*ad 广告主
     flow 流量主
     $username = Request::instance()->session('userinfo');
    */
    public function index($phone,$password,$username,$link){
        $data['username'] = Request::instance()->request('username');
        $data['link'] = Request::instance()->request('link');
        $data['pic'] = Request::instance()->request('pic');//流量主截图
        $data['is_dg'] = Request::instance()->request('is_dg');//是否支持撰稿
        $data['email'] = Request::instance()->request('email');
        $data['phone'] = Request::instance()->request('phone');
        $data['password'] = Request::instance()->request('password');

        $code = Request::instance()->request('code');
        if(!$code){
            return Rjson('',-1,'验证码错误');
        }
        $ret =   self::verify($phone,$code);
        if($ret['code']!=200){
            return Rjson('',$ret['code'],$ret['message']);
        }

      //  preg_match('/\d+/',$data['link'],$arr);
        $arr = explode('mid=',$data['link']);

        if(count($arr)==2){
            $data['kol_id'] = $arr[1]; //头条号
        }else{
            return Rjson('',-1,'主页连接错误');
        }
        $add =  Userflux::reg($data['phone'],$data);
        return $add;
    }

    public function url(){
        $data['link'] = 'http://www.toutiao.com/c/user/4891111951/#mid=5858633914';

        $arr = explode('mid=',$data['link']);

//        preg_match('/\d+/',$data['link'],$arr);

        if($arr){
            $data['kol_id'] = $arr[1]; //头条号
        }else{
            return Rjson('',-1,'主页连接错误');
        }
        print_r($data);
        exit();
    }

    public  function verify($phone,$code){
        if(!$phone) {
            return;
        }
        $ret = Sms::verify($phone,$code);
        if(!$ret) {
            $new['code'] = '-1';
            $new['message'] = '验证码不正确';
            return $new;
        }
        $ret = $ret[0];
        $ctime = strtotime($ret['ctime']);
        if($ret['code'] == $code && (time() - $ctime <= 600)) {
            if($ret['verify'] == 1) {
                $new['code'] = '-1';
                $new['message'] = '验证码已使用';
                return $new;
            }
            $update['verify'] = 1;
            $update['vtime'] = date('Y-m-d H:i:s',time());
            $id = $ret['id'];
            Db::table('fa_verify_phone')->where('id',$id)->update($update);
            $new['code'] = '200';
            $new['message'] = '使用成功';
            return $new;
        } else {
            $new['code'] = '-1';
            $new['message'] = '验证码不正确';
            return $new;
        }
    }

}
