<?php

namespace app\common\model;

use think\Model;

class Biz extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    public static function getListArray()
    {
        $list = collection(self::where(function($query)
        {
        })->order('weigh', 'desc')->limit(6)->select())->toArray();
        return $list;
    }
}
