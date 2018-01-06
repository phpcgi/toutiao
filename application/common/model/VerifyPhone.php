<?php

namespace app\common\model;

use think\Model;

class VerifyPhone extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;


    public static function getArray($phone,$title)
    {
        $list = collection(self::where(function($query) use($phone,$title)
        {
            $query->where('phone', '=', $phone);
            if($title){
                $query->where('title', '=', $title);
            }

        })->order('ctime', 'desc')->select())->toArray();
        return $list;
    }
    public static function getCode($phone,$code)
    {
        $list = collection(self::where(function($query) use($phone,$code)
        {
            $query->where('phone', '=', $phone);
            if($code){
                $query->where('code', '=', $code);
            }

        })->order('ctime', 'desc')->select())->toArray();
        return $list;
    }
}
