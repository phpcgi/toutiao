<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 周榜单
 *
 * @icon fa fa-circle-o
 */
class Zhou extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('DataWeek');
    }

    public function add1()
    {
        $array = array('a'=>1);
        return json($array);
    }

    public function index($offset='1',$limit='1')
    {

        $a = "财经: '财经', 动漫: '动漫', 房产: '房产', 股票: '股票', 家具: '家具', 健康: '健康',
                                教育: '教育', 军事: '军事', 科技: '科技', 历史: '历史', 两性: '两性', 旅游: '旅游', 美食: '美食', 汽车: '汽车'
                                , 社会: '社会', 时尚: '时尚', 时政: '时政', 数码: '数码', 体育: '体育', 文化: '文化', 星座: '星座', 艺术: '艺术'
                                , 影视: '影视', 游戏: '游戏', 娱乐: '娱乐', 育儿: '育儿'";

        $this->view->assign('groupdata', $a);
        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order($sort, $order)
                ->count();
            $list = $this->model
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }

    public function jz(){
        $a = "财经: '财经', 动漫: '动漫', 房产: '房产', 股票: '股票', 家具: '家具', 健康: '健康',
                                教育: '教育', 军事: '军事', 科技: '科技', 历史: '历史', 两性: '两性', 旅游: '旅游', 美食: '美食', 汽车: '汽车'
                                , 社会: '社会', 时尚: '时尚', 时政: '时政', 数码: '数码', 体育: '体育', 文化: '文化', 星座: '星座', 艺术: '艺术'
                                , 影视: '影视', 游戏: '游戏', 娱乐: '娱乐', 育儿: '育儿'";

        $this->view->assign('groupdata', $a);
        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order($sort, $order)
                ->count();
            $list = $this->model
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();
                $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }

    public function cb(){
        $a = "财经: '财经', 动漫: '动漫', 房产: '房产', 股票: '股票', 家具: '家具', 健康: '健康',
                                教育: '教育', 军事: '军事', 科技: '科技', 历史: '历史', 两性: '两性', 旅游: '旅游', 美食: '美食', 汽车: '汽车'
                                , 社会: '社会', 时尚: '时尚', 时政: '时政', 数码: '数码', 体育: '体育', 文化: '文化', 星座: '星座', 艺术: '艺术'
                                , 影视: '影视', 游戏: '游戏', 娱乐: '娱乐', 育儿: '育儿'";

        $this->view->assign('groupdata', $a);
        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order($sort, $order)
                ->count();
            $list = $this->model
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
