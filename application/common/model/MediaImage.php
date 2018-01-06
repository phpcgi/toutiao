<?php

namespace app\common\model;

use think\Model;

class MediaImage extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    public static function getfind()
    {
        $list =self::where(function($query)
        {
        })->order('createtime', 'desc')->find();
        if ($list)
            $list = $list->toArray();
        return $list;
    }
}
