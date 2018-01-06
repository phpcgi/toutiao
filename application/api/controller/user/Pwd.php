<?php

namespace app\api\controller\User;
/**
 * @title 忘记密码
 * @description 接口说明
 */
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

    public function index($password,$mobile){
        if (!$mobile){
            return;
        }
        $user = model('user')->where('mobile',$mobile)->find();
        if(!$user) {
            $ret['code'] = '400';
            $ret['message'] = '账号不存在';
            return  json($ret);
        }
        $params['password'] = self::getEncryptPassword($password, $user['salt']);

        model('user')->where('id',$user['id'])->update($params);
        $rets['code'] = 200;
        $rets['message'] = "修改成功";
        return json($rets);
    }

    public function getEncryptPassword($password, $salt = '')
    {
        return md5(md5($password) . $salt);
    }
}
