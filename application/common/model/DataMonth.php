<?php

namespace app\common\model;

use think\Model;

class DataMonth extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    public static function getSearch($name = NULL,$type = NULL,$readnum = NULL,$cost = NULL,$sort = 'worth',$time,$start,$page)
    {
        $list = collection(self::where(function($query) use($name,$type,$readnum,$cost,$sort,$time,$start,$page)
        {
            if (!is_null($name))
            {
                $query->where('name', 'like', '%'.$name.'%');
            }    
            if (!is_null($type))
            {
                $query->where('type', 'in', $type);
            }
            if (!is_null($readnum))
            {
                $query->where('R', '>', $readnum[0]);
                $query->where('R', '<', $readnum[1]);
            }
            if (!is_null($cost))
            {
                $query->where('R', '>', $cost[0]);
                $query->where('R', '<', $cost[1]);
            }
            if (!is_null($time))
            {
                $query->where('time', '=', $time);
            }
        })->order($sort, 'desc')->page($start,$page)->limit(130)->select())->toArray();
        return $list;
    }
    public static function getSearchcount($name = NULL,$type = NULL,$readnum = NULL,$cost = NULL,$sort = 'worth',$time)
    {
        $list = collection(self::where(function($query) use($name,$type,$readnum,$cost,$time)
        {
            if (!is_null($name))
            {
                $query->where('name', 'like', '%'.$name.'%');
            }
            if (!is_null($type))
            {
                $query->where('type', 'in', $type);
            }
            if (!is_null($readnum))
            {
                $query->where('R', '>', $readnum[0]);
                $query->where('R', '<', $readnum[1]);
            }
            if (!is_null($cost))
            {
                $query->where('R', '>', $cost[0]);
                $query->where('R', '<', $cost[1]);
            }
            if (!is_null($time))
            {
                $query->where('time', '=', $time);
            }
        })->order($sort, 'desc')->limit(130)->select())->toArray();
        return $list;
    }
    public static function gettype($type = NULL, $time = NULL,$order=null)
    {
        $list = collection(self::where(function($query) use($type, $time,$order)
        {

            if ($type)
            {
                $query->where('type', '=', $type);
            }
            if (!is_null($time))
            {
                $query->where('time', '=', $time);
            }
        })->order($order,'desc')->limit(50)->select())->toArray();
        return $list;
    }
    public static function gettid($tid = NULL)
    {
        $list = collection(self::where(function($query) use($tid)
        {
            if ($tid)
            {
                $query->where('tid', '=', $tid);
            }
        })->select())->toArray();
        return $list;
    }
}
