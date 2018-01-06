<?php

namespace app\apiweb\controller;

use app\common\controller\Api;

class Index extends Api
{

    public function index()
    {
        $data = array("Volvo","BMW","Toyota");
        return Rjson($data);
    }

}
