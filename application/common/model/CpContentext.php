<?php

namespace app\common\model;

use think\Model;

class CpContentext extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;

    public static function getCategoryArray($type = NULL, $start,$page)
    {
        $list = collection(self::where(function($query) use($type,  $start,$page)
        {
            if (!is_null($type))
            {
                $query->where('type', 'in', $type);
            }
        })->order('createtime desc')->page($start,$page)->select())->toArray();
        return $list;
    }
    public static function getCategorycount($type = NULL)
    {
        $list = collection(self::where(function($query) use($type)
        {
            if (!is_null($type))
            {
                $query->where('type', '=', $type);
            }
        })->order('createtime desc')->select())->toArray();
        return $list;
    }
}
