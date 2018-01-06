<?php

namespace app\api\controller\User;
/**
 * @title 短信验证
 * @description 接口说明
 */
use app\common\controller\Api;
use think\Controller;
use think\Db;
class Verify extends Api
{


    static $statusStr = array(
        "0" => "短信发送成功",
        "-1" => "参数不全",
        "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
        "30" => "密码错误",
        "40" => "账号不存在",
        "41" => "余额不足",
        "42" => "帐户已过期",
        "43" => "IP地址限制",
        "50" => "内容含有敏感词"
    );
    /**
     * @title 发送短信
     * @description 短信发送接口
     * @author yingmuhuadao
     * @url /api/user/verify
     * @remark  get
     * @param name:mobile type:int require:1 default: other: desc:手机号
     **/
    public static function index($mobile) {

        if(!$mobile) {
            return;
        }/*
        $info = model('user')->where('mobile',$mobile)->find();
        if($info){
            $ret['code'] = '400';
            $ret['message'] = '账号已注册';
//            $ret['id'] = $info->id;
            return  json($ret);
        }*/
        $smsapi = "http://api.smsbao.com/";
        $user = "zycm"; //短信平台帐号
        $pass = md5("zycm12345"); //短信平台密码
        $code = self::newSmsCode($mobile);
        if($code==1){
//            $ret['Verify'] = $code;
            $ret['code'] = '400';
            $ret['message'] = '请勿重复发送验证码';
            return json($ret);
        }else{
            $content="【党建】您的验证码为".$code."，在10分钟内生效。";//要发送的短信内容
            $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$mobile."&c=".urlencode($content);
            $result =file_get_contents($sendurl) ;
            $ret['rc'] = $result;
            $ret['msg'] = self::$statusStr[$result];
        }
        $ret['Verify'] = $code;
        $ret['code'] = '200';
        return json($ret);
    }

    /**
     * @title 短信验证
     * @description 短信验证接口
     * @author yingmuhuadao
     * @url /api/user/verify/verify
     * @remark  get
     * @param name:mobile type:int require:1 default: other: desc:手机号
     * @param name:code type:int require:1 default: other: desc:验证码
     **/
    public static function verify($mobile,$code){
        if(!$mobile) {
            return;
        }
        /*$info = model('user')->where('mobile',$mobile)->find();
        if($info){
            $ret['code'] = '400';
            $ret['message'] = '账号已注册';
//            $ret['id'] = $info->id;
            return  json($ret);
        }*/
        $ret =  Db::table('verify_phone')->where('phone',$mobile)->order('ctime','desc')->limit(1)->select()[0];

        if(!$ret) {
            $new['code'] = '400';
            $new['message'] = '验证码不正确';
            return json($new);
        }
        $ctime = strtotime($ret['ctime']);
        if($ret['code'] == $code && (time() - $ctime <= 600)) {
            if($ret['verify'] == 1) {
                $new['code'] = '400';
                $new['message'] = '验证码已使用';
                return json($new);
            }
            $update['verify'] = 1;
            $update['vtime'] = date('Y-m-d H:i:s',time());
            Db::table('verify_phone')->where('id',$ret['id'])->update($update);
            $new['code'] = '200';
            $new['message'] = '使用成功';
            return json($new);
        } else {
            $new['code'] = '400';
            $new['message'] = '验证码不正确';
            return json($new);
        }
    }

    public static function newSmsCode($phone) {

        $ret1 =  Db::table('verify_phone')->where('phone',$phone)->order('ctime','desc')->limit(1)->find();
        $ctime = strtotime($ret1['ctime']);
        if($ret1 && (time() - $ctime <= 600)){
            return 1;
        }
        $code = rand(1000,9999);
        $data['phone'] = $phone;
        $data['code'] = $code;
        $data['verify'] = 0; //未使用
        $data['title'] = '注册';
        $data['ctime'] =date('Y-m-d H:i:s',time());
        $ret =  Db::table('verify_phone')->insert($data);
        if($ret) {
            return $code;
        }
    }
    
}
