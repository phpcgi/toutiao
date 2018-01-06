<?php

namespace app\apiweb\controller;

use app\common\controller\Api;
use app\common\model\Category as CategoryModel;
use app\common\model\KindCategory;

class Category extends Api
{

    public function index()
    {

        $list = KindCategory::all();


        $array = array();
        $theme['id']='';
        $theme['name']= '不限';
        array_push($array, $theme);
        foreach ($list as $old){
            $theme['id']=$old['id'];
            $theme['name']=$old['name'];
            array_push($array,$theme);
        }
        return Rjson($array);
    }

}
