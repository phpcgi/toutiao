<meta charset="UTF-8">
<?php

namespace app\apiweb\controller\Ad;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\Data;
use app\common\model\DataMonth;
use app\common\model\OrderextAd;
use app\common\model\UserFluxtid;
use traits\controller\Jump;
use think\Request;
use app\common\model\CollectorAd;
class Tuijian extends Api

public function index(){
error_reporting(0);
$data['type'] = Request::instance()->request('type');
 $url='http://ocean.tarsocial.com/api/toutiao/hot/issues?access_token=qxWDGYVzJUNuTxihUdrX9Hutcp1Eon&page_num=1&page_size=4&category='.$data['type']; 
 $html = (json_decode(file_get_contents($url),true));  

foreach($html as $v1) {
			foreach($v1 as $v4) {
				echo "热度：".$v4["score"]."<br>";
				echo "关键字：";
				foreach($v4["keywords"] as $vk) {
					echo $vk.",";
				}
				echo "<br>分类：".$v4["classification"]."<br>";
				echo "分享数：".$v4["articles"][0]["share_count"]."<br>";
					echo "标题：".$v4["articles"][0]["title"]."<br>";
					echo $v4["articles"][0]["url"]."<br>";
					echo "<br><br>";
}
}
}
}


?>