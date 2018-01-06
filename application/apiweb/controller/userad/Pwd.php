<?php

namespace app\apiweb\controller\Userad;
/**
 * @title 忘记密码
 * @description 接口说明
 */
use app\apiweb\controller\Verify;
use app\common\controller\Api;
use app\common\library\Auth;
use app\common\model\UserAd;
use app\common\model\UsersOld;
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

    public function index($phone='',$password){

        $username = Request::instance()->session('userinfo');
        if($username){
            $phone= $username->phone;
        }


        $user = model('UserAd')->where('phone',$phone)->find();


        $email = Request::instance()->request('email');
        if($email){
            $userold = UsersOld::getemailInfo($email);
        }
        if(!$user && !$userold) {
            $ret['code'] = '-1';
            $ret['msg'] = '账号不存在';
            return  json($ret);
        }

        if(!$username){

            $code = Request::instance()->request('code');
            if(!$code){
                return Rjson('',-1,'验证码错误');
            }
            $ret = Verify::verify($phone,$code);
            if($ret['code']!=200){
                return Rjson('',$ret['code'],$ret['message']);
            }

        }

        if(isset($userold)){
            $data['username']   =   $userold['username'];
            $data['url']        =   $userold['url'];
            $data['email']      =   $userold['email'];
            $data['phone']      =   $phone;
            $data['password']   =   $password;
            $data['status']   =   1;
            $add = $this->reg($phone,$data,1);
            $update['status'] = 5;
            UsersOld::update($update,['uid'=>$userold['uid']]);
            return $add;
        }else{
            $params['password'] = self::_getPassword($password, $user['salt']);
            model('UserAd')->where('uid',$user['uid'])->update($params);
        }

        $rets['code'] = 200;
        $rets['message'] = "修改成功";
        return json($rets);
    }

    public function _getPassword($password, $salt = '')
    {
        return md5(md5($password) . $salt);
    }

}
