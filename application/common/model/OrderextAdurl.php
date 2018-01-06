<?php

namespace app\common\model;

use think\Model;

class OrderextAdurl extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;

    public static function getGroupOrderid($tid = NULL)
    {
        $list = collection(self::where(function($query) use($tid)
        {
            if (!is_null($tid))
            {
                $query->where('tid', '=', $tid);
            }
        })->group('orderid')->select())->toArray();
        return $list;
    }

    public static function getGroupOrderidpage($tid = NULL,$start,$page)
    {
        $list = collection(self::where(function($query) use($tid, $start,$page)
        {
            if (!is_null($tid))
            {
                $query->where('tid', '=', $tid);
            }
        })->group('orderid')->page($start,$page)->select())->toArray();
        return $list;
    }
    public static function getGroupOrderidpagecount($tid = NULL)
    {
        $list = collection(self::where(function($query) use($tid)
        {
            if (!is_null($tid))
            {
                $query->where('tid', '=', $tid);
            }
        })->group('orderid')->select())->toArray();
        return $list;
    } 

}
