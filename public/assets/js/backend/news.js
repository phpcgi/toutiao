define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'news/index',
                    add_url: 'news/add',
                    edit_url: 'news/edit',
                    del_url: 'news/del',
                    multi_url: 'news/multi',
                    table: 'news',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                sortName: 'id',
                columns: [
                    [
                        {field: 'state', checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'type', title: __('Type'),operate: 'LIKE %...%', placeholder: '栏目，模糊搜索'},
                        {field: 'title', title: __('Title'), operate: 'LIKE %...%', placeholder: '标题，模糊搜索'},
                        {field: 'createtime', title: __('Createtime'), formatter: Table.api.formatter.datetime, operate: false},
                        {field: 'updatetime', title: __('Updatetime'), formatter: Table.api.formatter.datetime, operate: false},
                        {field: 'status', title: __('Status'), formatter: Table.api.formatter.status, operate: false},
                        // {field: 'del', title: __('Del'), operate: false},
                        {field: 'attachfile', title: __('文件'), operate: false},
                        {field: 'operate', title: __('Operate'), events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ],
                //普通搜索
                commonSearch: true,
                titleForm: '', //为空则不显示标题，不定义默认显示：普通搜索
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            },
            formatter: {
                /* 'news' => '头条新闻',
                 'zfxx' => '政府公文',
                 'lxyz' => '两学一做',
                 'djdg' => '党纪党规',
                 'zcjd' => '政策解读',
                 'djkc' => '党建课程',
                 'spbk' => '视频百科',
                 'dybd' => '党员必懂新词',*/

                type:function (value) {
                    var news = {news: '头条新闻', zfxx: '政府公文', lxyz: '两学一做', djdg: '党纪党规', zcjd: '政策解读', djkc: '党建课程',
                        spbk: '视频百科', dybd: '党员必懂新词'};
                    return news[value];
                }
            }
        }
    };
    return Controller;
});