<?php

namespace app\apiweb\controller\Userflux;
/**
 * @title 注册
 * @description 接口说明
 */
use app\apiweb\controller\Sms;
use app\common\controller\Api;
use app\common\model\VerifyPhone;
use think\Db;
class Verify extends Api
{
    /**
     * @title 发送短信
     * @description 短信发送接口
     * @author yingmuhuadao
     * @url /api/user/verify
     * @remark  get
     * @param name:mobile type:int require:1 default: other: desc:手机号
     **/
    public static function index($phone,$type='1') {

        if(!$phone) {
            return;
        }
        if($type==1){
            $msg = '注册';
        }else{
            $msg = '忘记密码';
        }
        $code = Sms::newSmsCode($phone,$msg);

        if($code['code']==1){
            $ret['code'] = '400';
            $ret['message'] = '请勿重复发送验证码';
            return json($ret);
        }else{
            Sms::sendVerifyCode($phone,$code['code']);
            $ret['code'] = '200';
            $ret['message'] = '验证码发送成功';
            return json($ret);
        }
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

    public static  function verify($phone,$code){
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
