<?php

namespace app\admin\model;

use think\Model;

class Test1 extends Model
{

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
}
