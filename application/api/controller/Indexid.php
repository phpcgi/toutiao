<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\DataWeek;
use think\Controller;
use think\Db;
use Curl\Curl;
class Indexid extends Api
{
    //set_time_limit(0);
    public function _genrelistid($tid){
        $genre_model = model('Genre');
        $total = $genre_model
        ->where('tid','=',$firs_id)
        ->select();
        return $total;
    }

    public function _genrelist(){
        $genre_model = model('Genre');
        $total = $genre_model->where('id','>','1')->select();
        return $total;
    }
    public function linktid($tid)
    {
        $list = self::_genrelistid($tid);
        foreach ($list as $old){
            $new  =  self::_Apiopen_data($old['tid']);
            $info =  self::_Apimedia_info($old['tid']);
            $new['avatar_url']=$info['avatar_url'];
            $new['description']=$info['description'];
            $new['tid'] = $old['tid'];
//            $new['link'] = $old['link'];
            $new['type'] = $old['type'];
            $time =date("Y-m-d",time());//***日期录入(当日)
            $new['time'] = $time;
echo $info['link'].'<br><br>';
            $elect = model('Data')->where('time',$time)
                ->where('tid',$old['tid'])
                ->select();
            if($elect){
                continue;
            }else{
                model('Data')->create($new);
            }
        }
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
        $info = $curl->response;
        $json =\GuzzleHttp\json_decode($info,true);
        if($json['message']=='success'){
            $data = $json['data'];
            return $data;
        }else{
            return ;
        }
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
        $json =\GuzzleHttp\json_decode($info,true);
        if($json['message']=='success'){
            $data = $json['data'];
            return $data;
        }else{
            return ;
        }
    }

    //数据接口 每天执行
    public function DataAdd()
    {
        $list = self::_genrelist();
        foreach ($list as $old){
            $new  =  self::_Apiopen_data($old['tid']);
            $info =  self::_Apimedia_info($old['tid']);
            $new['avatar_url']=$info['avatar_url'];
            $new['description']=$info['description'];
            $new['tid'] = $old['tid'];
            $new['type'] = $old['type'];
            $time =date("Y-m-d",time());//***日期录入(当日)
            $new['time'] = $time;
            $elect = model('Data')->where('time',$time)
                ->where('tid',$old['tid'])
                ->select();
            if($elect){
                continue;
            }else{
                model('Data')->create($new);
            }
        }
    }
    public function data_zhou_id($firs_id,$last_id){
        set_time_limit(0);
        $genre_model = model('genre');
        $data_week   = model('DataWeek');
        $dbname='dataweek';
        $genrelist = $genre_model
                 ->where('id','>=',$firs_id)
                 ->where('id','<',$last_id)
                 ->order("id desc")
                 ->select();
        $datetime = self::getweekDays();
        foreach ($genrelist as $old){
            $tid = $old->tid;
            
            $data_model = model('data');
            $firstday = $datetime[0];
            $lastday  = $datetime[1];
            $total = $data_model
                ->where('time','>=',$firstday)
                ->where('time','<=',$lastday)
                ->where('tid','=',$tid)
                ->select();

            $list['time'] = $firstday.'~'.$lastday;
            $elect = $data_week->where('time',$list['time'])
                ->where('tid',$tid)
                ->find();
            if($elect){
                continue;
            }else{
                $list = self::gongshi($total,1);
                if($list['tid']){
                    $list['time'] = $firstday.'~'.$lastday;
                    $data_week->create($list);
                }
            }
        }
    }

    public function data_zhou(){
        set_time_limit(0);
        $genre_model = model('genre');
        $data_week   = model('DataWeek');
        $dbname='dataweek';
        $genrelist = $genre_model->where('id','>','1')->select();

        $datetime = self::getweekDays();
        foreach ($genrelist as $old){
            $tid = $old->tid;
            $data_model = model('data');
            $firstday = $datetime[0];
            $lastday  = $datetime[1];
            $total = $data_model
                ->where('time','>=',$firstday)
                ->where('time','<=',$lastday)
                ->where('tid','=',$tid)
                ->select();

            $list['time'] = $firstday.'~'.$lastday;
            $elect = $data_week->where('time',$list['time'])
                ->where('tid',$tid)
                ->find();
            if($elect){
                continue;
            }else{
                $list = self::gongshi($total,1);
                if($list['tid']){
                    $list['time'] = $firstday.'~'.$lastday;
                    $data_week->create($list);
                }
            }
        }
    }

    public function data_zhoujisuan(){
        set_time_limit(0);
        //jisuan($id,$R,$T,$S,$C,$P,$W,$sum_fans_count,$sum_publish_num){
        $data_week   = model('DataWeek');
        $datetime = self::getweekDays();
        $time = $datetime[0].'~'.$datetime[1];
        $row = $data_week->where('time',$time)->select();
        foreach ($row as $old){
            self::jisuan($old->id,$old->R,$old->T,$old->S,$old->C,$old->P,$old->W,$old->sum_fans_count,$old->sum_publish_num);
        }
        echo "1";
        exit();
    }
    public function data_zhousort(){
        $dbname ='DataWeek';
        self::_A_sort('A1',$dbname);
        self::_A_sort('A2',$dbname);
        self::_A_sort('A3',$dbname);
        self::_A_sort('A4',$dbname);
        self::_A_sort('A5',$dbname);
        self::_A_sort('worth',$dbname);
        exit();
    }
    public function _A_sort($A='A3',$db){
        $data   = model($db);
        $datetime = self::getweekDays();
        $time = $datetime[0].'~'.$datetime[1];
        $row = $data->where('time',$time)->order($A,' desc')->select();
        if(!$row){
            return;
        }
        foreach ($row as $k => $old){
            $roand = round(100000 / $row[0]->$A *$old->$A,2);
            $new[$A.'_sort'] =$roand;
            $data->where('id', $old->id)->update($new);
        }
        return 1;
    }

    public function data_yue(){
        $genre_model = model('genre');
        $data_month   = model('DataMonth');
        $dbname = 'DataMonth';
        $genrelist = $genre_model->where('id','>','1')->select();
        $Days = self::getlastMonthDays();
        print_r($Days);
        foreach ($genrelist as $old){
            $tid = $old->tid;
            $data_model = model('data');
            $firstday = $Days[0];
            $lastday  = $Days[1];
            $total = $data_model
                ->where('time','>=',$firstday)
                ->where('time','<=',$lastday)
                ->where('tid','=',$tid)
                ->select();
            $list = self::gongshi($total,2);
            if($list){
                $list['time'] = $firstday.'~'.$lastday;
                $elect = $data_month->where('time',$list['time'])
                    ->where('tid',$tid)
                    ->select();
                if($elect){
                    continue;
                }else{
                    $data_month->create($list);
                }
            }
        }
        self::_A_sort('A1',$dbname);
        self::_A_sort('A2',$dbname);
        self::_A_sort('A3',$dbname);
        self::_A_sort('A4',$dbname);
//        self::_A_sort('A5');
        self::_A_sort('worth',$dbname);
        exit();
    }

    public function gongshi($list=array(),$daytype){
        /*
         * R:  平均阅读量 = 总阅读数/篇数
            S:  平均分享量 = 总分享量/篇数
            C:  平均收藏量 = 总收藏量/篇数
            P:  平均点赞量 = 总点赞量/篇数
            T:  平均推荐量 = 总推荐量/篇数
            W:  平均评论量 = 总评论量/篇数
            X:  粉丝总量
            Z:  发文篇数 */
        $sum_view_count= '';//总阅读量
        $sum_share_count= '';//总分享量
        $sum_repin_count= '';//总收藏量
        $sum_digg_count= '';//总点赞量
        $sum_impression_count= '';//总推荐量
        $sum_comment_count= '';//总评论数
        $sum_publish_num= '';//总篇数
        $sum_fans_count= '';//总粉丝数
        $id= '';
        $type= '';
        $avatar_url= '';
        $name= '';

        foreach ($list as $old){
            $sum_view_count += $old->view_count;
            $sum_publish_num += $old->publish_num;
            $sum_share_count += $old->share_count;
            $sum_repin_count += $old->repin_count;
            $sum_digg_count += $old->digg_count;
            $sum_impression_count += $old->impression_count;
            $sum_comment_count += $old->comment_count;

            $sum_fans_count = $old->fans_count;
            $id = $old->tid;
            $type = $old->type;
            $avatar_url = $old->avatar_url;
            $name = $old->name;
        }

        if($sum_publish_num==0){
            return;
        }

        $setA = self::settings(1);//  id = 1  A周  b 月  c 粉丝

        if($daytype==1){
            if($sum_publish_num<$setA['A']){
                return;
            }
        }
        if ($daytype==2){
            if($sum_publish_num<$setA['B'][0]){
                return;
            }
        }
        if($sum_fans_count<$setA['C'][0]){
            return;
        }
        if ($sum_publish_num<1){
            return;
        }
        $R =round($sum_view_count/$sum_publish_num,2);
        $S =round($sum_share_count/$sum_publish_num,2);
        $C =round($sum_repin_count/$sum_publish_num,2);
        $P =round($sum_digg_count/$sum_publish_num,2);
        $T =round($sum_impression_count/$sum_publish_num,2);
        $W =round($sum_comment_count/$sum_publish_num,2);
        $new['R'] = $R;
        $new['S']  = $S;
        $new['C']  = $C;
        $new['P']  = $P;
        $new['T']  = $T;
        $new['W']  = $W;
        $new['sum_publish_num']  = $sum_publish_num;
        $new['sum_fans_count']  = $sum_fans_count;
        $new['tid'] = $id;
        $new['type'] = $type;
        $new['avatar_url'] = $avatar_url;
        $new['name'] = $name;
        $ret =$new;
        return $ret;
    }
    public function settings($id='1'){
        $model = model('Settings');

        $row = $model->get($id);
        $new['A'] = $row->A;
        $new['B'] =explode('^',$row->B);
        $new['C'] = explode('^',$row->C);
        return $new;
    }

    public function getweekDays(){
        $firstday = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-date('w')-7,date('Y')));;
        $lastday  = date("Y-m-d",mktime(23,59,59,date('m'),date('d')-date('w')+6-7,date('Y')));;
        return array($firstday,$lastday);
    }
    public function getlastMonthDays(){
        $timestamp = time();
        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        return array($firstday,$lastday);
    }

    public function jisuan($id,$R,$T,$S,$C,$P,$W,$sum_fans_count,$sum_publish_num){
        $data_week   = model('DataWeek');
        $info = DataWeek::get($id);
        if($info->A1){
            return;
        }
        $setA1 = self::settings(2);//
        $setA2 = self::settings(3);
        $setA3 = self::settings(4);
        $setA4 = self::settings(5);
        $setA5 = self::settings(6);

        $A1 = ($setA1['B'][0]/100*log($R*$setA1['C'][0]+1)
            + $setA1['B'][1]/100*log($T*$setA1['C'][1]+1))*100;
        $A2 = ($setA2['B'][0]/100*log($S*$setA2['C'][0]+1)
            +$setA2['B'][1]/100*log($C*$setA2['C'][1]+1)
            +$setA2['B'][2]/100*log($P*$setA2['C'][2]+1)
            +$setA2['B'][3]/100*log($T*$setA2['C'][3]+1))*100;
        $A3 = ($setA3['B'][0]/100*log($W*$setA2['C'][0]+1)+$setA3['B'][1]/100*log($P*$setA2['C'][1]+1))*100;
        $A4 = log($sum_fans_count*$setA4['C'][0]+1)*100;
        $A5 = log($sum_publish_num*$setA5['C'][0]+1)*100;
        $worth  = $setA1['A']/100*$A1
            + $setA2['A']/100*$A2
            + $setA3['A']/100*$A3
            + $setA4['A']/100*$A4
            + $setA5['A']/100*$A5;
        $round = round($worth,2);
        $new['A1']  = round($A1,2);
        $new['A2']  = round($A2,2);
        $new['A3']  = round($A3,2);
        $new['A4']  = round($A4,2);
        $new['A5']  = round($A5,2);
        $new['worth']  = $round;
        $data_week->where('id', $id)->update($new);
        $ret =$new;
        return $ret;
    }


}
