<?php


function Rjson($data, $code = 200,$msg='成功'){
    $result = [
        'data' => $data,
        'code' => $code,
        'msg'  => $msg,
    ];
    return json($result);
}