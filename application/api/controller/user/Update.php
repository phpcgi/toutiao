<?php

namespace app\api\controller\User;
/**
 * @title 修改个人信息
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\library\Auth;
use app\common\model\Token;
use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use fast\Random;
use app\common\model\User as UserModel;
class Update extends Api
{

    /**
     * @title 修改个人信息
     * @description 修改个人信息接口
     * @author yingmuhuadao
     * @url /api/user/update
     * @remark  post请求
     * @param name:uid type:int require:1 default: other: desc:用户id
     * @param name:username type:string require: default: other: desc:用户名
     * @param name:commitment type:string require: default: other: desc:我的承诺
     * @param name:experience type:string require: default: other: desc:心得体会
     * @param name:duty type:string require: default: other: desc:责任清单
     * @param name:sex type:string require: default: other: desc:性别
     * @param name:place type:string require: default: other: desc:籍贯
     * @param name:time type:string require: default: other: desc:入党时间
     * @param name:education type:string require: default: other: desc:学历
     * @param name:position type:string require: default: other: desc:职位
     * @param name:idcard type:string require: default: other: desc:身份证
     */
    public function index($uid,$token=''){

        /*$tokeninfo = Token::getId($uid);
        if(!$tokeninfo){
            $rets['code'] = 200;
            $rets['message'] = "令牌错误";
            return json($rets);
        }
        if ($tokeninfo['token']!=$token){
            $rets['code'] = 200;
            $rets['message'] = "令牌错误";
            return json($rets);
        }*/

        $user = model('user')->where('id',$uid)->find();
        if(!$user) {
            $ret['code'] = '400';
            $ret['message'] = '账号不存在';
            return  json($ret);
        }
        $params['username'] = isset($_REQUEST['username'])? $_REQUEST['username'] : $user['username'];
        $params['avatar'] = isset($_REQUEST['avatar'])? $_REQUEST['avatar'] : $user['avatar'];
        $params['idcard'] = isset($_REQUEST['idcard'])? $_REQUEST['idcard'] : $user['idcard'];
        model('user')->where('id',$uid)->update($params);

        $paramsext['uid'] = $uid;
        $user = model('userext')->where('uid',$uid)->find();

        $paramsext['duty'] = isset($_REQUEST['duty'])? $_REQUEST['duty'] : $user['duty'];
        $paramsext['experience'] = isset($_REQUEST['experience'])? $_REQUEST['experience'] : $user['experience'];
        $paramsext['commitment'] = isset($_REQUEST['commitment'])? $_REQUEST['commitment'] : $user['commitment'];
        $paramsext['sex'] = isset($_REQUEST['sex'])? $_REQUEST['sex'] : $user['sex'];
        $paramsext['place'] = isset($_REQUEST['place'])? $_REQUEST['place'] : $user['place'];
        $paramsext['time'] = isset($_REQUEST['time'])? $_REQUEST['time'] : $user['time'];
        $paramsext['education'] = isset($_REQUEST['education'])? $_REQUEST['education'] : $user['education'];
        $paramsext['position'] = isset($_REQUEST['position'])? $_REQUEST['position'] : $user['position'];
        if (!$user){
            model('userext')->create($paramsext);
        }else{
            model('userext')->where('uid',$uid)->update($paramsext);
        }
        $rets['code'] = 200;
        $rets['message'] = "修改成功";
        return json($rets);
    }
}
