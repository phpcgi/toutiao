<?php

namespace app\common\model;

use think\Model;

class OrderAd extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    public static function getId($id = NULL, $status = NULL)
    {
        $list = collection(self::where(function($query) use($id, $status)
        {
            if (!is_null($id))
            {
                $query->where('id', '=', $id);
            }
        })->select())->toArray();
        return $list;
    }
    public static function getpage($uid = NULL,$start,$page,$type)
    {
        $list = collection(self::where(function($query) use($uid,$start,$page,$type)
        {
            if (!is_null($uid))
            {
                $query->where('uid', '=', $uid);
            }
            if ($type)
            {
                $query->where('status', '=', $type);
                if($type==4){
                    $query->where('del', '=', 0);
                }else{
                    $query->where('del', '=', 1);
                }
            }else{
                $query->where('del', '=', 1);
            }
        })->order('createtime desc')->page($start,$page)->select())->toArray();
        return $list;
    }
    public static function getpagecount($uid = NULL,$type)
    {
        $list = collection(self::where(function($query) use($uid,$type)
        {
            if (!is_null($uid))
            {
                $query->where('uid', '=', $uid);
            }
            if ($type)
            {
                $query->where('status', '=', $type);
                if($type==4){
                    $query->where('del', '=', 0);
                }else{
                    $query->where('del', '=', 1);
                }
            }else{
                $query->where('del', '=', 1);
            }
        })->order('createtime desc')->select())->toArray();
        return $list;
    }
}
