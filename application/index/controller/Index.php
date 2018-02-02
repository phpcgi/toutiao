<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\model\Genre;
use app\common\model\Kol;
use app\common\model\Logo;
use app\common\model\Newsfocus;
use app\common\model\Roll;
use think\Request;
use app\common\model\CpContent;
use app\common\model\CpType;
class Index extends Frontend
{


    public function index()
    {
        $username = Request::instance()->session('userinfo');
        $log = Logo::getGenreArray();
//      print_r($log);
        $kol = self::_kol();
        $faocus = self::_faocus();
        $roll = Roll::all();

        $this->assign('roll',$roll);
        $this->assign('faocus',$faocus);
        $this->assign('log',$log);
        $this->assign('kol0',$kol[0]['content']);
        $this->assign('kol1',$kol[1]['content']);
        $this->assign('kol2',$kol[2]['content']);
        $this->assign('kol3',$kol[3]['content']);

        if($username){
            if(isset($username->kol_id)){
                $this->assign('kol',$username->kol_id);
            }else{
                $this->assign('kol','');
            }
            $this->assign('name',$username->username);
        }else{
            $this->assign('name','');
        }
        $anli = self::anlititle();

        $genre = round(self::genre()*1);
        $this->assign('countgenre',$genre);
        $this->assign('anli',$anli);
        return $this->view->fetch('toutiao/shouye');
    }


    public function genre(){
        $count = Genre::getCount();
        return $count;
    }
    public function anlititle(){
        $ids = '3,4,5,6';
        $title = CpType::all(['id' => ['in',$ids]]);

        $array = array();
        foreach ($title as $old){
            $new['title'] = $old['title'];
            $new['id'] = $old['id'];
            $list = CpContent::getCategoryArraytype($old['id']);

            $listc = [];
            foreach ($list as $oold){
                $oold['image']=self::img($oold['image']);
                $listc[] = $oold;
            }
            $new['content']=$listc;
            array_push($array,$new);
        }
        return $array;
    }

    public function img($data){
        if($data){
            $img = IMG_URL.$data;
        }else{
            $img = $data;
        }
        return $img;
    }
    public function anli(){

    }
    public function _logo(){
        $logo = Logo::getGenreArray();
        $array =array();
        foreach ($logo as $old){
            $new['title'] =$old['title'];
            $new['image'] =IMG_URL.$old['image'];
            $new['url'] ='';
            array_push($array,$new);
        }
        return $array;
    }
    public function _faocus()
    {
        $faocus = Newsfocus::all();

        $array =array();
        foreach ($faocus as $old){
            $new['title'] =$old['title'];
            $new['image'] =IMG_URL.$old['image'];
            $new['image1'] =IMG_URL.$old['image1'];
            $new['url'] ='';
            array_push($array,$new);
        }
        return $array;
    }

    public function _kol()
    {
        $array = array('娱乐','健康','历史','军事');
        $newarray = array();
        foreach ($array as $old){
            $new['title'] = $old;
            $list =   Kol::getGenreArray($old);
            $new['content'] = $list;
            array_push($newarray,$new);
        }
        return $newarray;
    }
}
