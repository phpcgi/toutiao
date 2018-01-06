<?php

namespace app\apiweb\controller\Userad;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use think\Request;
use think\Db;
use app\apiweb\controller\Sms;
class Reg extends Api
{
    /*ad 广告主
     $username = Request::instance()->session('userinfo');
    */
    public function index(){
        $data['username'] = Request::instance()->request('username');
        $data['url'] = Request::instance()->request('url');
        $data['email'] = Request::instance()->request('email');
        $data['phone'] = Request::instance()->request('phone');
        $data['password'] = Request::instance()->request('password');

        $code = Request::instance()->request('code');
        if(!$code){
            return Rjson('',-1,'验证码错误');
        }
        $ret =   self::verify($data['phone'],$code);
        if($ret['code']!=200){
            return Rjson('',$ret['code'],$ret['message']);
        }

        $add =  $this->reg($data['phone'],$data);
        return $add;
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
