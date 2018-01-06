<?php

namespace app\common\model;

use think\Db;
use think\Model;

class OrderextAd extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;

    public static function getGroupOrderid($tid = NULL)
    {
        $list = collection(self::where(function($query) use($tid)
        {
            if (!is_null($tid))
            {
                $query->where('tid', '=', $tid);
            }
        })->group('orderid')->select())->toArray();
        return $list;
    }

    public static function OrderPageNum($tid = NULL)
    {
        $subsql = Db::table('fa_order_ad')->where('status','NEQ',1)->buildSql();
        $list = Db::table('fa_orderext_ad')
            ->alias('a')->join([$subsql=> 'w'], 'a.orderid = w.id')
            ->where('a.del', '=', 1)
            ->where('a.tid', '=', $tid)
            ->group('a.orderid')
//            ->page($start,$page)
            ->select();
        return $list;
    }

    public static function OrderPage($tid = NULL,$start,$page)
    {
        $subsql = Db::table('fa_order_ad')->where(['del'=>1])->where('status','NEQ',1)->buildSql();
        $list = Db::table('fa_orderext_ad')
            ->alias('a')->join([$subsql=> 'w'], 'a.orderid = w.id')
            ->where('a.del', '=', 1)
            ->where('a.tid', '=', $tid)
            ->group('a.orderid')
            ->page($start,$page)
            ->select();
        return $list;
    }
    public static function getGroupOrderidpage($tid = NULL,$start,$page)
    {
        $list = collection(self::where(function($query) use($tid, $start,$page)
        {
            if (!is_null($tid))
            {
                $query->where('tid', '=', $tid);
            }
            $query->where('del', '=', 1);
        })->group('orderid')->page($start,$page)->select())->toArray();
        return $list;
    }
    public static function getGroupOrderidpagecount($tid = NULL)
    {
        $list = collection(self::where(function($query) use($tid)
        {
            if (!is_null($tid))
            {
                $query->where('tid', '=', $tid);
            }
            $query->where('del', '=', 1);
        })->group('orderid')->select())->toArray();
        return $list;
    }
    public static function getpage($uid = NULL,$start,$page)
    {
        $list = collection(self::where(function($query) use($uid,$start,$page)
        {
            if (!is_null($uid))
            {
                $query->where('uid', '=', $uid);
            }
        })->order('createtime desc')->page($start,$page)->select())->toArray();
        return $list;
    }
    public static function getpagecount($uid)
    {
        $list = collection(self::where(function($query) use($uid)
        {
            if ($uid)
            {
                $query->where('uid', '=', $uid);
            }
        })->order('createtime desc')->select())->toArray();
        return $list;
    }

    /*任务*/
    public static function getTaskArray($uid = NULL,$start,$page)
    {
        $list = collection(self::where(function($query) use($uid,$start,$page)
        {
            if (!is_null($uid))
            {
                $query->where('uid', '=', $uid);
            }
            $query->where('status', '=', 7);
        })->order('createtime desc')->page($start,$page)->select())->toArray();
        return $list;
    }
    public static function getTastcount($uid)
    {
        $list = collection(self::where(function($query) use($uid)
        {
            if ($uid)
            {
                $query->where('uid', '=', $uid);
            }
            $query->where('status', '=', 7);
        })->order('createtime desc')->select())->toArray();
        return $list;
    }

}
