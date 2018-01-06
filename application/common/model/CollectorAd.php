<?php

namespace app\common\model;

use think\Model;

class CollectorAd extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;

    public static function getpage($uid = NULL,$start,$page)
    {
        $list = collection(self::where(function($query) use($uid,$start,$page)
        {
            if (!is_null($uid))
            {
                $query->where('uid', '=', $uid);
            }
            $query->where('status', '=', 1);
        })->order('createtime desc')->page($start,$page)->select())->toArray();
        return $list;
    }
    public static function getpagecount($uid = NULL)
    {
        $list = collection(self::where(function($query) use($uid)
        {
            if (!is_null($uid))
            {
                $query->where('uid', '=', $uid);
            }
            $query->where('status', '=', 1);
        })->order('createtime desc')->select())->toArray();
        return $list;
    }
}
