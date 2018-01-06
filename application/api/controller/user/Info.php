<?php

namespace app\api\controller\User;
/**
 * @title 我的
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\library\Auth;
use app\common\model\Activity;
use app\common\model\Study;
use app\common\model\Token;
use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use fast\Random;
use app\common\model\User as UserModel;
use app\common\model\Score as ScoreModel;
use app\common\model\Grade as GradeModel;
use app\common\model\Userext as UserextModel;
use app\common\model\Studyuser as StudyuserModel;
use app\common\model\Activityuser as ActivityuserModel;
class Info extends Api
{

    /**
     * @title 我的
     * @description 我的接口
     * @author yingmuhuadao
     * @url /api/user/info
     * @remark  get
     * @param name:uid type:int require:1 default: other: desc:用户唯一id
     * @return uid:用户id
     * @return username:用户名称
     * @return avatar:用户头像
     * @return grade:支部名称
     * @return score:总积分
     * @return auth:权限
     *@return ext:详情@!
     *@ext duty:责任清单 experience:心得体会 commitment:我的承诺 sex:性别 place:籍贯 time:入党时间 Education:学历  Position:职位
     **/

    public function index($uid){

        /*print_r($this->Session['uid']) ;
        exit();*/
        $add = model('user')->where('id',$uid)->find();
        $grade = self::alluser($add->mobile);
        if($grade){
            $params['grade'] = $grade;
            model('user')->where('id',$uid)->update($params);
        }
        $datainfo['uid'] = $add->id;
        $datainfo['mobile'] = $add->mobile;
        $datainfo['username'] = $add->username;
        $datainfo['idcard'] = $add->idcard;
        if($add->avatar){
            $datainfo['avatar'] = QINIU_IMG_URL.$add->avatar;
        }else{
            $datainfo['avatar'] = $add->avatar;
        }

        $datainfo['grade'] = $grade;//职务
        $datainfo['score'] = $add->score;//积分
        if($grade){
            $datainfo['auth'] = 1;//有权限
        }else{
            $datainfo['auth'] =-1;//无权限
        }
        $token = Token::getId($uid);
        $datainfo['token'] = $token['token'];
        $datainfo['ext'] = self::ext($datainfo['uid']);
        $ret['data'] = $datainfo;
        $ret['code'] = '200';
        return json($ret);
    }

    /**
     * @title 积分
     * @description 积分接口
     * @author yingmuhuadao
     * @url /api/user/info/jifen
     * @remark  get  暂时不加分页 不加点击
     * @param name:uid type:int require:1 default: other: desc:用户唯一id
     * @return list:积分列表@
     *@list title:标题 score:积分 createtime:时间
     **/

    public function jifen($uid){
        $list = ScoreModel::getListUid($uid);
        $array =  array('list' => $list);
        $ret['data'] = $array;
        $ret['code'] = '200';
        return json($ret);
    }
    /**
     * @title 课程
     * @description 课程接口
     * @author yingmuhuadao
     * @url /api/user/info/ke
     * @remark  get
     * @param name:uid type:int require:1 default: other: desc:用户唯一id
     * @return list:课程列表@
     *@list title:标题 ratio:学习百分比,tid:课程id createtime:时间
     */
    public function ke($uid){
        $infoext = UserextModel::getInfo($uid);
        $list = StudyuserModel::getInforgroud($uid);
        $listc = [];
        foreach ($list as $old){
            $info = Study::getinfo($old['tid'],'normal')[0];
            $list1 = StudyuserModel::getInforadio($uid,$old['tid'])[0];
            $old['ratio'] = $list1['ratio'];
            if($info['image']){
                $old['image'] = IMG_URL.$info['image'];
            }else{
                $old['image'] = $info['image'];
            }
            $listc[] = $old;
        }
        $time = $infoext['duration'];
//        $array =  array('list' => $list,'time' => $time,'code'=>200,'offset' => $set,'has_more'=>$hasmore);

        $array = array('list' => $listc);
        $ret['data'] = $array;
        $ret['code'] = '200';
        return json($ret);
    }
    /**
     * @title 活动
     * @description 活动接口
     * @author yingmuhuadao
     * @url /api/user/info/huodong
     * @remark  get
     * @param name:uid type:int require:1 default: other: desc:用户唯一id
     * @return list:活动列表@
     *@list title:标题 activityid:活动id createtime:时间 type:1普通活动3答题活动  status:1开始的活动0结束的活动  tid:题目id
     */
    public function huodong($uid){
        $infoext = UserextModel::getInfo($uid);
        $ratio = $infoext['ratio'];
        $list = ActivityuserModel::getInfoUid($uid);

        $listc = [];
        foreach ($list as $old){
            $time = Activity::getId($old['activityid']);
            $old['tid'] = $time[0]['content'];
            if(!$time[0]['name']){
                $time[0]['name']='';
            }
            $old['author'] = $time[0]['name'];
            $old['startdate'] = strtotime($time[0]['startdate']);
            $old['endtime'] = strtotime($time[0]['activitydate']);
            if($time){
                $old['status'] = 1;
            }else{
                $old['status'] = 0;
            }
            $listc[] = $old;
        }
        $array =  array('list' => $listc);
        $ret['data'] = $array;
        $ret['code'] = '200';
        return json($ret);
    }
    public function ext($uid){
        $user = model('userext')->where('uid',$uid)->find();

        $paramsext['duty'] = isset($user['duty'])? $user['duty'] : $user['duty'];
        $paramsext['experience'] = isset($user['experience'])? $user['experience'] : $user['experience'];
        $paramsext['commitment'] = isset($user['commitment'])? $user['commitment'] : $user['commitment'];
        $paramsext['sex'] = isset($user['sex'])? $user['sex'] : $user['sex'];
        $paramsext['place'] = isset($user['place'])? $user['place'] : $user['place'];
        $paramsext['time'] = isset($user['time'])? $user['time'] : $user['time'];
        $paramsext['education'] = isset($user['education'])? $user['education'] : $user['education'];
        $paramsext['position'] = isset($user['position'])? $user['position'] : $user['position'];
        return $paramsext;
    }
    public function alluser($mobile){
        $user = model('Alluser')->where('phone',$mobile)->find();

        if($user){
            return $user->department;
        }else{
            return '';
        }
    }
    public function keeptime($keeptime = 0)
    {
        $this->keeptime = $keeptime;
    }
    public function getEncryptPassword($password, $salt = '')
    {
        return md5(md5($password) . $salt);
    }
}
