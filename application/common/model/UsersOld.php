<?php

namespace app\common\model;

use think\Model;

class UsersOld extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    public static function getStatusArray($status = NULL)
    {
        $list = collection(self::where(function($query) use($status)
        {
            if (!is_null($status))
            {
                $query->where('status', '=', 1);
            }
        })->select())->toArray();
        return $list;
    }
    public static function getInfo($phone= NULL,$email= NULL){

        $list =self::where(function($query) use($phone,$email)
        {
            if (!is_null($phone))
            {
                $query->where('phone', '=', $phone);
            }
            if (!is_null($email))
            {
                $query->where('email', '=', $email);
            }
//            $query->where('status', '=', 1);
        })->find();
        if ($list)
            $list = $list->toArray();
        return $list;
    }
    public static function getemailInfo($email= NULL){

        $list =self::where(function($query) use($email)
        {
            if (!is_null($email))
            {
                $query->where('email', '=', $email);
            }
//            $query->where('status', '=', 1);
        })->find();
        if ($list)
            $list = $list->toArray();
        return $list;
    }
}
