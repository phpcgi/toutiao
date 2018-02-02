<?php

namespace app\common\model;

use think\Model;

class Genre extends Model
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
        })->order('createtime', 'desc')->limit(6)->select())->toArray();
        return $list;
    }
    public static function getlist($type = NULL, $status = 'normal')
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
        })->order('createtime', 'desc')->limit(4)->select())->toArray();
        return $list;
    }
    public static function getlista($type = NULL, $status = 'normal')
    {
        $list = collection(self::where(function($query) use($type, $status)
        {

            if (!is_null($type))
            {
                $query->where('type', '=', $type);
            $time1=time()-31*24*3600;
            $query->where('createtime', '<', $time1);
             
            }
            if (!is_null($status))
            {
                $query->where('status', '=', $status);
            }
        })->order('createtime', 'desc')->limit(4)->select())->toArray();
        return $list;
    }    
    public static function getAllTid($status = 'normal')
    {
        $list = collection(self::where(function($query) use( $status)
        {
            if (!is_null($status))
            {
                $query->where('status', '=', $status);
            }
        })->order('createtime', 'desc')->select())->toArray();
        return $list;
    }
    public static function getCount(){
        $list = self::where(function($query)
        {
        })->count();
        return $list;
    }

}
