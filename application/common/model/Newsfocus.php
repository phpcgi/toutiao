<?php

namespace app\common\model;

use think\Model;

class Newsfocus extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    public static function getGenreArray($type = NULL, $status = 'normal')
    {
        $list = collection(self::where(function($query) use($type, $status)
        {
            if (!is_null($type))
            {
                $query->where('type', '=', $type);
            }
            if (!is_null($status))
            {
                $query->where('status', '=', $status);
            }
        })->order('weigh', 'desc')->limit(21)->select())->toArray();
        return $list;
    }
}
