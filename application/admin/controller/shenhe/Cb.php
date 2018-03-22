<?php

namespace app\admin\controller\shenhe;

use app\common\controller\Backend1;

use think\Controller;
use think\Request;

/**
 * 月榜单
 *
 * @icon fa fa-circle-o
 */
class Cb extends Backend1
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('shenhe');
    }
    public function edit($ids = NULL)
    {
$time=time();
$u='base_id'.$ids.'time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/image/?base_id='.$ids.'&verify_agent=1&time='.$time.'&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
 //var_dump($html['data']);
 foreach($html['data'] as $h){
 	echo '类型：'.$h['pic_type_name'].'<img src="'.$h['url'].'">';
}

$time=time();
$u='base_id'.$ids.'time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/contact/?base_id='.$ids.'&verify_agent=1&time='.$time.'&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
 //var_dump($html['data']);
 foreach($html['data'] as $h){
 	echo 'Email：'.$h['mail'].'　电话：'.$h['phone'].'　名字：：'.$h['real_name'].'<br>';
}

    }
}
