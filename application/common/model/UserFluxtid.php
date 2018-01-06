<?php

namespace app\common\model;

use think\Model;

class UserFluxtid extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;

    public static function getisdgSearch($start,$page)
    {
        $list = collection(self::where(function($query) use($start,$page)
        {
            $query->where('is_dg', 1);
        })->page($start,$page)->select())->toArray();
        return $list;
    }
    public static function getUidcount($uid)
    {
        $list = self::where(function($query) use($uid)
        {
            $query->where('uid', $uid);
            $query->where('status', 0);
        })->count();
        return $list;
    }

    public static function getAllTid($status)
    {
        $list = collection(self::where(function($query) use($status)
        {
            $query->where('status', $status);
        })->select())->toArray();
        return $list;
    }
}
