<?php

namespace app\common\model;

use think\Model;

class DataWeek extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    public static function getArray($name = NULL, $tid = NULL, $time = NULL)
    {
        $list = collection(self::where(function($query) use($name,$tid, $time)
        {
            if (!is_null($name))
            {
                $query->where('name', 'like','%'.$name.'%');
            }
            if ($tid)
            {
                $query->where('tid', '=', $tid);
            }
            if ($time)
            {
                $query->where('createtime', '>=', $time);
            }
        })->select())->toArray();
        return $list;
    }

    public static function gettype($type = NULL, $time = NULL,$order = null)
    {
        $list = collection(self::where(function($query) use($type, $time,$order)
        {

            if ($type)
            {
                $query->where('type', '=', $type);
            }
            if($time)
            {
                $query->where('time', '=', $time);
            }
        })->order($order.' desc')->limit(50)->select())->toArray();
        return $list;
    }

    public static function gettimedata($time)
    {
        $list = collection(self::where(function($query)
        {
            $query->where('time', 'not null');
        })->select())->toArray();
        return $list;
    }
    public static function gettime()
    {
        $list = collection(self::where(function($query)
        {
            $query->where('time', 'not null');
        })->group('time')->field('time')->order('time desc')->select())->toArray();
        return $list;
    }

}
