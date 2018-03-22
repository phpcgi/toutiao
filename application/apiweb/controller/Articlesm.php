<?php

namespace app\apiweb\controller;

use app\common\controller\Api;
use app\common\model\DataMonth;
use Curl\Curl;
class Articlesm extends Api
{

    /*爆文榜*/
    public function index($next='1')
    {
        $readnum='1500000';
        $stime = date("Y-m-d", strtotime('-7 days'));
        $ntime = date("Y-m-d",time());
        $array = Array ( "query" => Array ( "bool" => Array ( "must" => Array ( "0" => Array ( "range" => Array ( "read_num" => Array ( "gte" => $readnum ) ) ),"1" => Array ( "range" => Array ( "post_time" => Array ( "gte" => $stime ,"lte" => $ntime ) ) )  ) ) ), "sort" => Array ( "read_num" => 'desc' ) );
        $query = json_encode($array);
        $curl = new Curl();
        $curl->get('http://ocean.tarsocial.com/api/search/toutiao/articles?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj&query='.$query.'&page_num='.$next.'&page_size=30');
        $data = $curl->response;
        $json = \GuzzleHttp\json_decode($data,true);

        $list = [];
        $listarray = isset($json['data'])?$json['data']:'';


        if (!$listarray){
            return;
        }
        /*foreach ($listarray as $old){
            $old['image'] = self::_Apimedia_info($old['tth_id']);
            $old['infotitle'] = self::_Apiopen_Data($old['tth_id']);
            $list[] = $old;
        }*/
            $ret['data']=$listarray;
            $ret['first']=$json['first'];
            $ret['last']=$json['last'];
        if(isset($json['next'])) {
            $ret['next']=$json['next'];
        }
            $ret['page_num']=$json['page_num'];
            $ret['page_size']=$json['page_size'];
            $ret['total']=$json['total'];

        return json($ret);
    }

    public function _Apimedia_info($media_id){
        if(!$media_id){
            return;
        }
        $curl = new Curl();
        $salt = "toutiao_mp_open_data";
        $tonken = $media_id.$salt;
        $md5 = md5($tonken);

        $curl->post('http://i.snssdk.com/pgcui/media_info/', array(
            "media_id" => "$media_id",
            "token" => "$md5",
        ));
        $info = $curl->response;
        $json = \GuzzleHttp\json_decode($info,true);
        $listarray = isset($json['data'])?$json['data']:'';

        if (!$listarray){
            return;
        }

        return $listarray['avatar_url'];
    }

    public function _Apiopen_Data($media_id){
        if(!$media_id){
            return;
        }
        $curl = new Curl();
        $salt = "toutiao_mp_open_data";
        $tonken = $media_id.$salt;
        $md5 = md5($tonken);
        $curl->post('http://i.snssdk.com/pgcui/open_data/', array(
            "media_id" => "$media_id",
            "token" => "$md5",
        ));
        $data = $curl->response;
        $json = \GuzzleHttp\json_decode($data,true);

        $listarray = isset($json['data'])?$json['data']:'';
        if (!$listarray){
            return;
        }
        return $listarray['name'];
    }
}
