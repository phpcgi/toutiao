define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                search: false,
                extend: {
                    index_url: 'data/index',
                    add_url: 'data/add',
                    edit_url: 'data/edit',
                    del_url: 'data/del',
                    multi_url: 'data/multi',
                    table: 'data',
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
                        {field: 'id', title: __('Id'), operate: false},
                        {field: 'tid', title: __('Tid'), operate: false},
                        {field: 'type', title: __('Type'), operate: false},
                        {field: 'description', title: __('Description'), operate: false},
                        {field: 'name', title: __('Name'), operate: 'LIKE %...%', placeholder: '名称，模糊搜索，*表示任意字符', style: 'width:200px',
                            process: function (value, arg) {
                                return value.replace(/\*/g, '%');
                            }},
                        {field: 'fans_count', title: __('Fans_count'), operate: false},
                        {field: 'play_effective_count', title: __('Play_effective_count'), operate: false},
                        {field: 'impression_count', title: __('Impression_count'), operate: false},
                        {field: 'view_count', title: __('View_count'), operate: false},
                        {field: 'repin_count', title: __('Repin_count'), operate: false},
                        {field: 'digg_count', title: __('Digg_count'), operate: false},
                        {field: 'comment_count', title: __('Comment_count'), operate: false},
                        {field: 'share_count', title: __('Share_count'), operate: false},
                        {field: 'publish_num', title: __('Publish_num'), operate: false},
                        {field: 'status', title: __('Status'), formatter: Table.api.formatter.status, operate: false},
                        {field: 'createtime', title: __('Createtime'), formatter: Table.api.formatter.datetime, operate: false},
                        {field: 'updatetime', title: __('Updatetime'), formatter: Table.api.formatter.datetime, operate: false},
                        {field: 'operate', title: __('Operate'), events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
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
            }
        }
    };
    return Controller;
});