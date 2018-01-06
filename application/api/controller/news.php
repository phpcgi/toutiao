<?php

namespace app\api\controller;

use app\common\controller\Api;
use Curl\Curl;
class News extends Api
{

    public function index()
    {
        $a = '{财经: \'财经\', 动漫: \'动漫\', 房产: \'房产\', 股票: \'股票\', 家具: \'家具\', 健康: \'健康\',
                                教育: \'教育\', 军事: \'军事\', 科技: \'科技\', 历史: \'历史\', 两性: \'两性\', 旅游: \'旅游\', 美食: \'美食\', 汽车: \'汽车\'
                                , 社会: \'社会\', 时尚: \'时尚\', 时政: \'时政\', 数码: \'数码\', 体育: \'体育\', 文化: \'文化\', 星座: \'星座\', 艺术: \'艺术\'
                                , 影视: \'影视\', 游戏: \'游戏\', 娱乐: \'娱乐\', 育儿: \'育儿\'}}';

        return $a;
    }

    public function city(){

        $data = array("Volvo","BMW","Toyota");

        return json($data);
    }

    public function url($url){

//        $url        = 'http://www.toutiao.com/i6434052525963346434/';
        $posturl    = 'http://ocean.tarsocial.com/api/toutiao/monitor/article?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj&monitor_days_from_post=3&url='.$url.'';
        $curl = new Curl();
        $curl->post($posturl, array(
            "url" => "$url",
        ));
        $info = $curl->response;
        $json =\GuzzleHttp\json_decode($info,true);

        if(!$json){
            return ;
        }
        if(!isset($json['project_id'])){
            return ;
        }
        if($json['project_id']){
            $project_id = $json['project_id'];
            $curl->get('http://ocean.tarsocial.com/api/toutiao/monitor/article/'.$project_id.'?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj');
            $data = $curl->response;
            $getjson = \GuzzleHttp\json_decode($data,true);
            return json($getjson);
        }else{
            return ;
        }
    }
}
