<?php

namespace app\apiweb\controller;

use app\common\model\DataWeek;
use app\common\model\KindCategory;
use app\common\model\Kol as kolmodel;
use app\common\controller\Api;
use app\common\model\Data;
use app\common\model\Genre;
use app\common\model\Logo;
use Curl\Curl;
class Recommend extends Api
{

    public function kol()
    {
        $array = array('娱乐','科技','健康','体育');
        $newarray = array();
        foreach ($array as $old){
            $new['title'] = $old;
            $list =   kolmodel::getGenreArray($old);
            $new['content'] = $list;
            array_push($newarray,$new);
        }
        return Rjson($newarray);
    }
    
    public function logo()
    {
        $log = Logo::getGenreArray();
        return Rjson($log);
    }

    public function add(){
        /*$a = "财经
动漫
房产
股票
家具
健康
教育
军事
科技
历史
两性
旅游
美食
汽车
社会
时尚
时政
数码
体育
文化
星座
艺术
影视
游戏
娱乐
育儿";


        $d = explode(chr(10),$a);
        foreach ($d as $old){
            $new['name'] = $old;
            $new['name'] = $old;
            KindCategory::create($new);
        }*/

    }
}
