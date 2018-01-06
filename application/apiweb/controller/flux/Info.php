<?php

namespace app\apiweb\controller\Flux;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\KindAct;
use app\common\model\KindForm;
use app\common\model\UserFluxtid;
use think\Request;
class Info extends Api
{
    /*
     * 获取消息
    */
    public function index($tid){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        $info = UserFluxtid::get(['uid'=>$username->uid,'kol_id'=>$tid]);
        $info['overview']=self::img($info['overview']);
        $info['seximg']=self::img($info['seximg']);
        $info['ageimg']=self::img($info['ageimg']);
        $info['regionimg']=self::img($info['regionimg']);
        $info['appimg']=self::img($info['appimg']);
        return Rjson($info);
    }
    public function img($data){
        if($data){
            $img = IMG_URL.$data;
        }else{
            $img = $data;
        }
        return $img;
    }
    public function info(){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        $info['tid']=$username->kol_id;
        $info['name']=$username->username;
        return Rjson($info);
    }

    /*获取头条号*/
    public function tid(){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        $list = UserFluxtid::all(['uid'=>$username->uid]);

        return Rjson($list);
    }

    public function update($id,$overview='',$seximg='',$ageimg='',$regionimg='',$appimg='',$auth='',$from='',$num=''){

        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        if($overview){
            $data['overview'] = $overview;
        }
        if($seximg){
            $data['seximg'] = $seximg;
        }
        if($ageimg){
            $data['ageimg'] = $ageimg;
        }
        if($regionimg){
            $data['regionimg'] = $regionimg;
        }
        if($appimg){
            $data['appimg'] = $appimg;
        }
        if($auth){
            $data['auth'] = $auth;
        }
        if($from){
            $data['from'] = $from;
        }
        if($num){
            $data['num'] = $num;
        }

        $update =   UserFluxtid::update($data,['id' => $id]);
        if($update){
            return Rjson('',200,'成功');
        }
    }


    /*功能1/平台2*/
    public function kind($type='1',$tid){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        $info = UserFluxtid::get(['uid'=>$username->uid,'kol_id'=>$tid]);
        if($type==1){
            $list = KindAct::all();
            $list = self::kindis($list,$info);
        }else{
            $list =KindForm::all();
            $list = self::kindfrom($list,$info);
        }
        return Rjson($list);
    }


    public function kindis($data,$info){
        $k =[];
        foreach ($data as $old){
            $auth = explode($old['id'],$info['auth']);
            if(count($auth)>1){
                $old['is_select'] = 1;
            }else{
                $old['is_select'] = 0;
            }
            $k[] = $old;
        }
        return $k;
    }
    public function kindfrom($data,$info){
        $k =[];
        foreach ($data as $old){
            $auth = explode($old['id'],$info['from']);
            if(count($auth)>1){
                $old['is_select'] = 1;
            }else{
                $old['is_select'] = 0;
            }
            $k[] = $old;
        }
        return $k;
    }

    public function addinfoext(){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        $data['uid'] = $username->uid;
        $data['username'] = Request::instance()->request('username');
        $data['link'] = Request::instance()->request('link');
        $data['pic'] = Request::instance()->request('pic');//流量主截图
        $data['is_dg'] = Request::instance()->request('is_dg');//是否支持撰稿
        /*preg_match('/\d+/',$data['link'],$arr);
        if($arr){
            $data['kol_id'] = $arr[0]; //头条号
        }else{
            return Rjson('',-1,'主页连接错误');
        }*/

        $arr = explode('mid=',$data['link']);

        if($arr){
            $data['kol_id'] = $arr[1]; //头条号
        }else{
            return Rjson('',-1,'主页连接错误');
        }
        $del = UserFluxtid::create($data);
        if($del){
            return Rjson('',200,'成功');
        }
    }

    public function delinfoext($id){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        $del = UserFluxtid::destroy($id);
        if($del){
            return Rjson('',200,'成功');
        }
    }

}
