<?php

namespace app\common\model;

use think\Model;

class CpType extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;

    public static function getCategoryPidArray($pid , $status = NULL)
    {
        $list = collection(self::where(function($query) use($pid, $status)
        {
        })->select())->toArray();
        return $list;
    }
}
