<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\Genre;
use app\common\model\UserFluxtid;
use Curl\Curl;
class Tid extends Api
{

    public function index()
    {
    }

    // 同步账号到头条易
    public function url(){
        $list = UserFluxtid::getAllTid(1);
        foreach($list as $old){
            $kol_id = $old['kol_id'];

            $posturl    = 'http://ocean.tarsocial.com/api/toutiao/accounts?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj';
            $curl = new Curl();
            $curl->post($posturl, array(
                "tth_id" => "$kol_id",
            ));
            $info = $curl->response;
            $json =\GuzzleHttp\json_decode($info,true);
        }
    }

    // 同步写入分类表fa_genre
    public function tid(){
        $list = UserFluxtid::getAllTid(1);
        foreach($list as $old){
            $tid = $old['kol_id'];
            //判断genre表里是否存在
            $genreInfo = Genre::get(['tid'=>$tid]);
            if(!$genreInfo){
                $type = self::Word($tid);
                if(!isset($type->classification)){
                    continue;
                }
                $typename =$type->classification;

                if($typename){
                    $data['name'] = $old['username'];
                    $data['tid'] = $old['kol_id'];
                    $data['type'] = $typename;
                    $data['status'] = 'normal';
                    Genre::create($data);
                }

            }
        }
        exit();
    }

    public function Word($id='')
    {
        if(!$id){
            return  Rjson('',-1,'id不存在');
        }
        $curl = new Curl();
        $url= 'https://ocean.tarsocial.com/api/toutiao/accounts/'.$id.'?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj&fields=nickname&fields=classification&fields=rank&fields=score&fields=word_cloud&fields=classification_prob&fields=description';

        $curl->get($url);
        $data = $curl->response;
        $json = \GuzzleHttp\json_decode($data);
        return $json;
    }
}
