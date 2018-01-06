<?php

namespace app\apiweb\controller;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\VerifyPhone;
use think\Db;
class Sms extends Api
{
    static $statusStr = array(
        "1" => "短信发送成功",
        "1001" => "参数不全",
        "1002" => "用户名为空",
        "1005" => "密码错误",
        "1004" => "用户名错误",
        "1111" => "余额不足",
        "2107" => "帐户已过期",
        "2105" => "内容太长",
        "9999" => "系统内部错误"
    );

    public static function sendAudit($phone)
    {
        $msg = "【头条易】恭喜您在头条易平台的申请已通过审核！请登录www.toutiaoeasy.cn了解最新动态。";
        return self::sendSms($phone, $msg,1);
    }
    public static function sendVerify($phone,$type,$title,$tid,$url)
    {

       // 【头条易】您有'.待审核.'文稿（'.项目1.'-'.陈翔六点半.'），请点击链接查看：'./index/phone/e9b379.'。或PC端登录头条易官网进行查看。
        //$ad =   '【头条易】您有@文稿（@-@），请点击链接查看：@@@@。或PC端登录头条易官网进行查看。';
        $msg = "【头条易】您有".$type."文稿（".$title."-".$tid."），请点击链接查看：".$url."。或PC端登录头条易官网进行查看。";
        return self::sendSms($phone, $msg,1);
    }

    public static function sendVerifyCode($phone,$code)
    {
        $content="【头条易】您的验证码为".$code."，在10分钟内生效。";
        return self::sendSms($phone,$content);
    }

    private static function sendSms($phone, $msg,$type='') {
        if(!$phone || !$msg) {
            return;
        }
        $smsapi = "https://dx.ipyy.net/smsJson.aspx/";
        $user = "AB00331"; //短信平台帐号
        $pass = strtoupper(md5("AB0033111"));
        $data = array(
            'action'=>'send',
            'userid'=>'',
            'account'=>$user,
            'password'=>$pass,
            'mobile'=>$phone,
            'content'=>$msg
        );

        $query = http_build_query($data);

        $options['http'] = array(
            'timeout'=>60,
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $query
        );

        $context = stream_context_create($options);
        $result = file_get_contents($smsapi, false, $context);
        $result = \GuzzleHttp\json_decode($result,true);
        if($type){
            return 1;
        }
        return Rjson('',$result['successCounts'],$result['message']);
    }


    public static function newSmsCode($phone,$msg='注册') {
        $yan = self::_vcode($phone,$msg);

        if($yan){
            $data['code'] = 1;
            return $data;
        }
        $code = rand(1000,9999);
        $data['phone'] = $phone;
        $data['code'] = $code;
        $data['verify'] = 0; //未使用
        $data['title'] = $msg;
        $data['ctime'] =date('Y-m-d H:i:s',time());
        $ret =  VerifyPhone::create($data);

        if($ret) {
            return $data;
        }
    }
    public static function _vcode($phone,$msg){

        /*return 1 存在请勿重复发送验证码*/
        if (!$phone){
            return;
        }
        $phone = VerifyPhone::getArray($phone,$msg);
        if(!$phone){
            return;
        }
        $phone = $phone[0];
        $phone['ctime'] = strtotime($phone['ctime']);
        if($phone['verify']==0 && (time() - $phone['ctime'] <= 600)){
            return 1;
        }
    }

    public static function verify($phone,$code){
        if (!$phone){
            return;
        }
        $phone = VerifyPhone::getCode($phone,$code);
        return $phone;
    }
    
    public static function update($data,$id){
        if (!$id){
            return;
        }
        VerifyPhone::update($data,$id);
        return 1;
    }

}
