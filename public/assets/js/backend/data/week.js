define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'data/week/index',
                    add_url: 'data/week/add',
                    edit_url: 'data/week/edit',
                    del_url: 'data/week/del',
                    multi_url: 'data/week/multi',
                    table: 'data_week',
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
                        {field: 'tid', title: __('Tid')},
                        {field: 'type', title: __('Type')},
                        {field: 'description', title: __('Description')},
                        {field: 'name', title: __('Name')},
                        {field: 'sum_fans_count', title: __('Sum_fans_count')},
                        {field: 'r', title: __('R')},
                        {field: 's', title: __('S')},
                        {field: 'c', title: __('C')},
                        {field: 'p', title: __('P')},
                        {field: 't', title: __('T')},
                        {field: 'w', title: __('W')},
                        {field: 'sum_publish_num', title: __('Sum_publish_num')},
                        {field: 'status', title: __('Status'), formatter: Table.api.formatter.status},
                        {field: 'createtime', title: __('Createtime'), formatter: Table.api.formatter.datetime},
                        {field: 'updatetime', title: __('Updatetime'), formatter: Table.api.formatter.datetime},
                        {field: 'time', title: __('Time'), formatter: Table.api.formatter.datetime},
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