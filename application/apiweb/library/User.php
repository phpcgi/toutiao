<?php

namespace app\apiweb\library;

use app\common\model\UserAd as usermodel;
use fast\Random;
use fast\Tree;
use think\Validate;
use think\Cookie;
use think\Request;
use think\Session;

define('Cookie_UserInfo', 'usercooke');
define('Session_UserInfo', 'userinfo');
class User
{


    public function __get($name)
    {
        return Session::get(Session_UserInfo. $name);
    }
    
    public static  function reg($phone,$data, $keeptime = 0){
        if(!$data)
        {
            return false;
        }
        if(self::validate($data)){
            return Rjson('',-1,self::validate($data));
        }
        $admin = usermodel::get(['phone' => $phone]);
        if ($admin)
        {
            return Rjson('',-1,'已存在');
        }
        $salt =  Random::alnum();
        $data['password'] = self::getEncryptPassword($data['password'], $salt);
        $time = date('Y-m-d H:i:s');
        $data['salt'] = $salt;
        $data['logintime'] = $time;
        $data['token'] =Random::uuid();
        $data['jointime'] =$time;
        $add = usermodel::create($data);
        if($add){
            Session::set(Session_UserInfo, $admin);
           // self::keeplogin($keeptime);
            $new['uid'] = $add['uid'];
            $new['username'] = $add['username'];
            $new['phone'] = $add['phone'];
            $new['email'] = $add['email'];
            return Rjson($new,200,'注册成功');
        }
        return true;
    }

    public static  function validate($data){
        $rule = [
            'password' => 'require|length:6,30',
            'phone'   => 'regex:/^1\d{10}$/',
        ];

        $msg = [
            'password.require' => __('密码不能为空'),
            'password.length'  => __('密码长度 6 to 30 '),
            'phone'           => __('手机号不正确'),
        ];
        $data = [
            'password' => $data['password'],
            'phone'   => $data['phone'],
        ];
        $validate = new Validate($rule, $msg);
        $result = $validate->check($data);
        if(!$result){
            return $validate->getError();
        }
    }
    public static function login($phone, $password, $keeptime = 0)
    {
        $admin = usermodel::get(['phone' => $phone]);
        if (!$admin)
        {
            return Rjson('',-1,'账号不存在');
        }
        if ($admin->password != md5(md5($password) . $admin->salt))
        {
            $admin->loginfailure++;
            $admin->save();
            return false;
        }
        $admin->logintime = time();
        $admin->token = Random::uuid();
        $admin->save();
        Session::set(Session_UserInfo, $admin);
        //self::keeplogin($keeptime);
        $new['uid'] = $admin['uid'];
        $new['username'] = $admin['username'];
        $new['phone'] = $admin['phone'];
        $new['email'] = $admin['email'];
        return Rjson($new,200,'登录成功');
    }

    /**
     * 注销登录
     */
    public static function logout()
    {
        $session = Session::get(Session_UserInfo);
        $admin = usermodel::get(['uid' => intval($session->uid)]);
        if (!$admin)
        {
            return true;
        }
        $admin->token = '';
        $admin->save();
        Session::delete(Session_UserInfo);
        Cookie::delete(Cookie_UserInfo);
        return Rjson('',200,'成功退出');
    }

    /**
     * 自动登录
     * @return boolean
     */
    public function autologin()
    {
        $keeplogin = Cookie::get(Session_UserInfo);
        if (!$keeplogin)
        {
            return false;
        }
        list($id, $keeptime, $expiretime, $key) = explode('|', $keeplogin);
        if ($id && $keeptime && $expiretime && $key && $expiretime > time())
        {
            $admin = Admin::get($id);
            if (!$admin)
            {
                return false;
            }
            //token有变更
            if ($key != md5(md5($id) . md5($keeptime) . md5($expiretime) . $admin->token))
            {
                return false;
            }
            Session::set(Session_UserInfo, $admin);
            //刷新自动登录的时效
            $this->keeplogin($keeptime);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * 刷新保持登录的Cookie
     * @param int $keeptime
     * @return boolean
     */
    public static function keeplogin($keeptime = 0)
    {
        if ($keeptime)
        {
            $expiretime = time() + $keeptime;
            $key = md5(md5(self::id) . md5($keeptime) . md5($expiretime) . self::token);
            $data = [self::id, $keeptime, $expiretime, $key];
            Cookie::set(Cookie_UserInfo, implode('|', $data));
            return true;
        }
        return false;
    }

    public function check($name, $uid = '', $relation = 'or', $mode = 'url')
    {
        return parent::check($name, $this->id, $relation, $mode);
    }

    /**
     * 检测当前控制器和方法是否匹配传递的数组
     *
     * @param array $arr 需要验证权限的数组
     */
    public function match($arr = [])
    {
        $request = Request::instance();
        $arr = is_array($arr) ? $arr : explode(',', $arr);
        if (!$arr)
        {
            return FALSE;
        }

        // 是否存在
        if (in_array(strtolower($request->action()), $arr) || in_array('*', $arr))
        {
            return TRUE;
        }

        // 没找到匹配
        return FALSE;
    }

    /**
     * 检测是否登录
     *
     * @return boolean
     */
    public function isLogin()
    {
        return Session::get(Cookie_UserInfo) ? true : false;
    }
    public static function getEncryptPassword($password, $salt = '')
    {
        return md5(md5($password) . $salt);
    }
}
