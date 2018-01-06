<?php

namespace app\apiweb\controller\Userflux;
/**
 * @title 忘记密码
 * @description 接口说明
 */
use app\apiweb\controller\Verify;
use app\common\controller\Api;
use app\common\library\Auth;
use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use fast\Random;
use app\common\model\User as UserModel;
class Pwd extends Api
{

    /**
     * @title 忘记密码
     * @description 忘记密码接口
     * @author yingmuhuadao
     * @url /api/user/pwd
     * @remark  post请求
     * @param name:mobile type:int require:1 default: other: desc:手机号
     * @param name:password type:string require:1 default: other: desc:密码
     */

    public function index($password,$phone=''){
        $username = Request::instance()->session('userinfo');
        if($username){
            $phone= $username->phone;
        }

        $user = model('UserFlux')->where('phone',$phone)->find();
        if(!$user) {
            $ret['code'] = '400';
            $ret['message'] = '账号不存在';
            return  json($ret);
        }
        if(!$username) {

            $code = Request::instance()->request('code');
            if (!$code) {
                return Rjson('', -1, '验证码错误');
            }
            $ret = Verify::verify($phone, $code);
            if ($ret['code'] != 200) {
                return Rjson('', $ret['code'], $ret['message']);
            }
        }
        $params['password'] = self::_getPassword($password, $user['salt']);

        model('UserFlux')->where('uid',$user['uid'])->update($params);
        $rets['code'] = 200;
        $rets['message'] = "修改成功";
        return json($rets);
    }

    public function _getPassword($password, $salt = '')
    {
        return md5(md5($password) . $salt);
    }
}
