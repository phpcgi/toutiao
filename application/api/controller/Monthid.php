<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\common\model\DataMonth;
use think\Controller;
use think\Db;
use Curl\Curl;
class Monthid extends Api
{
    public function data_yue_id($firs_id,$last_id){
        set_time_limit(0);
        $genre_model = model('genre');
        $data_week   = model('DataMonth');
        $genrelist = $genre_model
                 ->where('id','>=',$firs_id)
                 ->where('id','<',$last_id)
                 ->order("id desc")
                 ->select();

        $datetime = self::getlastMonthDays();
        foreach ($genrelist as $old){
            $tid = $old->tid;
            $id=$old->id;
    ob_flush();
    flush();
    file_put_contents($firs_id.".txt",$id."-",FILE_APPEND);
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
                $list = self::gongshi($total,2);
                if($list['tid']){
                    $list['time'] = $firstday.'~'.$lastday;
                    $data_week->create($list);
                }
            }
            echo "{".$list['R']."}".$id."---".$tid.'<br>';
        }
        file_put_contents($firs_id.".txt","完成",FILE_APPEND);
    }
    public function data_yue(){
        set_time_limit(0);
        $genre_model = model('genre');
        $data_week   = model('DataMonth');
        $genrelist = $genre_model->where('id','>','1')->select();

        $datetime = self::getlastMonthDays();
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
                $list = self::gongshi($total,2);
                if($list['tid']){
                    $list['time'] = $firstday.'~'.$lastday;
                    $data_week->create($list);
                }
            }
        }
    }

    public function data_yuejisuan(){
        set_time_limit(0);
        //jisuan($id,$R,$T,$S,$C,$P,$W,$sum_fans_count,$sum_publish_num){
        $data_week   = model('DataMonth');
        $datetime = self::getlastMonthDays();
        $time = $datetime[0].'~'.$datetime[1];
        $row = $data_week->where('time',$time)->select();
        foreach ($row as $old){
            self::jisuan($old->id,$old->R,$old->T,$old->S,$old->C,$old->P,$old->W,$old->sum_fans_count,$old->sum_publish_num);
        }
        echo "1";
        exit();
    }
    public function getlastMonthDays(){
        $timestamp = time();
        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        return array($firstday,$lastday);
    }



    public function gongshi($list=array(),$daytype){
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
            $sum_view_count += $old->play_effective_count;
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
            $description=$old->description;
        }

//        if($sum_publish_num==0){
//            return;
//        }

        $setA = self::settings(1);//  id = 1  A周  b 月  c 粉丝

        if ($daytype==2){
            if($sum_publish_num<$setA['B'][0]){
                return;
            }
        }
        if($sum_fans_count<$setA['C'][0]){
            return;
        }
        if ($sum_publish_num<1){
        $R =0;
        $S =0;
        $C =0;
        $P =0;
        $T =0;
        $W =0;
        }else{
        $R =round($sum_view_count/$sum_publish_num,2);
        $S =round($sum_share_count/$sum_publish_num,2);
        $C =round($sum_repin_count/$sum_publish_num,2);
        $P =round($sum_digg_count/$sum_publish_num,2);
        $T =round($sum_impression_count/$sum_publish_num,2);
        $W =round($sum_comment_count/$sum_publish_num,2);
        }
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
        $new['description'] = $description;
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



    public function jisuan($id,$R,$T,$S,$C,$P,$W,$sum_fans_count,$sum_publish_num){
        $data_week   = model('DataMonth');
        $info = DataMonth::get($id);
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
?>

