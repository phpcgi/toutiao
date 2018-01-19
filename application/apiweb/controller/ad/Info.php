<?php

namespace app\apiweb\controller\Ad;
/**
 * @title 详细消息
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\DataMonth;
use app\common\model\Genre;
use think\Request;
use app\common\model\CollectorAd;
use Curl\Curl;
class Info extends Api
{


    /*详情*/
    public function index($id){

        $info = DataMonth::get(['tid'=>$id]);
        $info['R'] = round($info['R']);
        $info['genre'] = self::ages($id);
        $data['info'] = $info;
        $data['Word'] = self::Word($id);

        if($info['genre']){
            $genre = array_keys($info['genre'])[0];
        }
        $data['similarity'] = self::similarity($id,$genre);

        return Rjson($data);

    }

    function ages($id){
        $curl = new Curl();

        $url= 'https://ocean.tarsocial.com/api/toutiao/accounts/'.$id.'?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj&fields=nickname&fields=classification&fields=rank&fields=score&fields=word_cloud&fields=classification_prob&fields=description';
        $curl->get($url);
        $data = $curl->response;
        $j = \GuzzleHttp\json_decode($data,true);
        $kex = $j['classification_prob'];
        foreach ($kex as $key=>$old){
            $kex[$key]=number_format($old,10,'','');
        }
        foreach ($kex as $key => $value) {
            $sort[$key] = $value;
        }
        array_multisort($sort,SORT_DESC, $kex);
        return $kex;
    }
    public function chart($id,$type=1){
        if($type==1){
            $list =   self::zhou($id);
            return Rjson($list);
        }else{
            $list = self::yue($id);
            return Rjson($list);
        }
    }

    public function zhou($id){
        $data_week   = model('DataWeek');
        $week =  mktime(23,59,59,date("m"),date("d")-date("w")+7-49,date("Y"));
        $seventtime =$week;// \fast\Date::unixtime('day', -49);
        $worth_sort = $sum_publish_num =$sum_fans_count =$W =$R = [];
        for ($i = 0; $i < 7; $i++)
        {
            $model = $data_week;
            $day = date("Y-m-d", $seventtime + ($i * 86400*7));
            $strotime = strtotime($day);
            $elect = $model
                ->where('createtime','<=',$strotime)
                ->where('tid',$id)
                ->order('createtime', 'desc')
                ->find();
            $worth_sort[$day] =  $elect['worth'];
            $sum_publish_num[$day] =  $elect['sum_publish_num'];//发文
            $sum_fans_count[$day] =  $elect['sum_fans_count'];//粉丝
            $R[$day] = $elect['R'];//阅读
            $W[$day] =  $elect['W'];//评论
        }
        $data['chuanbo'] = $worth_sort;
        $data['yuedu'] = $R;
        $data['pinglun'] = $W;
        $data['fans'] = $sum_fans_count;
        $data['fawen'] = $sum_publish_num;
        return $data;
    }

    public function yue($id){
        $data_week   = model('DataMonth');

        $week =  date('Y-m-d',strtotime('-6 month', strtotime(date('Y-m', time()).'-01 00:00:00')));
        $worth_sort = $sum_publish_num =$sum_fans_count =$W =$R = [];
        for ($i = 0; $i < 7; $i++)
        {
            $day = date('Y-m-d',strtotime('+'.$i.' month', strtotime($week)));

            $strotime = strtotime("+1 day".$day);
            $elect = $data_week
                ->where('createtime','<=',$strotime)
                ->where('tid',$id)
                ->order('createtime', 'desc')
                ->find();
            $worth_sort[$day] =  $elect['worth'];
            $sum_publish_num[$day] =  $elect['sum_publish_num'];//发文
            $sum_fans_count[$day] =  $elect['sum_fans_count'];//粉丝
            $R[$day] = $elect['R'];//阅读
            $W[$day] =  $elect['W'];//评论
        }
        $data['chuanbo'] = $worth_sort;
        $data['yuedu'] = $R;
        $data['pinglun'] = $W;
        $data['fans'] = $sum_fans_count;
        $data['fawen'] = $sum_publish_num;
        return $data;
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

    public function similarity($id='',$type){
        if(!$id){
            return  Rjson('',-1,'id不存在');
        }
        $curl = new Curl();
        $curl->get('http://ocean.tarsocial.com/api/toutiao/accounts/'.$id.'/similarity?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj');
        $data = $curl->response;
        $json = \GuzzleHttp\json_decode($data);

        if(!$json){
            $json = self::suiji($type);
        }
        return $json;
    }

    public function suiji($type){
        $json =  Genre::getlista($type);
        $ret = [];
        foreach ($json as $old){
            $avatar = self::_Apimedia_info($old['tid']);
            if(!$avatar){
                continue;
            }
            $old['avatar'] = self::_Apimedia_info($old['tid']);
            $old['nickname'] = $old['name'];
            $ret[]=$old;
        }
        return $ret;
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
}
