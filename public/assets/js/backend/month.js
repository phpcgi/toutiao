define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'month/index',
                    add_url: 'month/add',
                    edit_url: 'month/edit',
                    del_url: 'month/del',
                    multi_url: 'month/multi',
                    table: 'data_month',
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
                        {field: 'name', title: __('Name')},
                        {field: 'sum_fans_count', title: __('Sum_fans_count')},
                        {field: 'R', title: __('R')},
                        {field: 'S', title: __('S')},
                        {field: 'C', title: __('C')},
                        {field: 'P', title: __('P')},
                        {field: 'T', title: __('T')},
                        {field: 'W', title: __('W')},
                        {field: 'worth', title: __('Worth')},
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