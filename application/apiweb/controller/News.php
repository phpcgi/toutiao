<?php

namespace app\apiweb\controller;

use app\common\controller\Api;
use app\common\model\CpContent;
use app\common\model\CpContentext;
use app\common\model\CpType;
use app\common\model\DataMonth;
use app\common\model\DataWeek;
use Curl\Curl;
class News extends Api
{

    /*成功案例*/
    public function index($type=3,$start)
    {
        $page = 6;
        $ids = '3,4,5,6';
        $title = CpType::all(['id' => ['in',$ids]]);
        $list = CpContent::getCategoryArray($type,$start,$page);
        $count = count(CpContent::getCategorycount($type));
        $ret['data'] = $list;
        $ret['type'] = $title;
        $ret['count'] = $count;
        $ret['page'] = $page;
        $ret['code'] = 200;
        $ret['msg'] = '成功';
        return json($ret);
    }

    /*新媒体*/
    public function xmt($start=''){
        $page = 10;
        $listc = CpContent::getCategoryArray(2,$start,$page);

        $list  = [];
        foreach ($listc as $old){

            $old['url'] = self::check_url($old['url']);
            $list[] =$old;
        }
        $count = count(CpContent::getCategorycount(2));
        $ret['data'] = $list;
        $ret['count'] = $count;
        $ret['page'] = $page;
        $ret['code'] = 200;
        $ret['msg'] = '成功';
        return json($ret);
    }

    function check_url($url){

        if(!preg_match('/http:*/is',$url)){
            return '';
        }
        return $url;

    }

    /*产品*/
    public function cp($start){
        $page = 6;
        $list = CpContent::getCategoryArray(1,$start,$page);
        $count = count(CpContent::getCategorycount(1));
        $ret['data'] = $list;
        $ret['count'] = $count;
        $ret['page'] = $page;
        $ret['code'] = 200;
        $ret['msg'] = '成功';
        return json($ret);
    }

    public function info($id){
        $info = CpContentext::all(['type'=>$id]);
        $array = [];
        foreach ($info as $old){
            $old['image'] = self::img($old['image']);
            $old['title'] = CpContent::get($old['type'])['title'];
            $array[] = $old;
        }
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
    public function _data($data){
        $array = array();
        foreach ($data as $old){
            $new['type'] = $old['type'];
            $new['name'] = $old['name'];
            $new['image'] = $old['avatar_url'];
            $new['fans'] = $old['sum_fans_count'];
            $new['R'] = $old['R'];
            $new['A1'] = $old['A1'];
            array_push($array,$new);
        }
        return $array;
    }
}
