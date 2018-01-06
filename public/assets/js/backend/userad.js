define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'userad/index',
                    add_url: 'userad/add',
                    edit_url: 'userad/edit',
                    del_url: 'userad/del',
                    multi_url: 'userad/multi',
                    table: 'user_ad',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                sortName: 'uid',
                columns: [
                    [
                        {field: 'state', checkbox: true},
                        {field: 'uid', title: __('Uid')},
                        {field: 'username', title: __('Username')},
                        {field: 'url', title: __('Url'), formatter: Table.api.formatter.url},
                        {field: 'email', title: __('Email')},
                        {field: 'phone', title: __('Phone')},
                        {field: 'sex', title: __('Sex')},
                        {field: 'headimgurl', title: __('Headimgurl'), formatter: Table.api.formatter.url},
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