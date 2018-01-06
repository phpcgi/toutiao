define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                sortName: 'id',
                sortOrder: 'asc',
                extend: {
                    index_url: 'link/index',
                    add_url: 'link/add',
                    edit_url: 'link/edit',
                    del_url: 'link/del',
                    multi_url: 'link/multi',
                    table: 'link',
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
                        {field: 'title', title: __('Title'),formatter: Controller.api.formatter.url},
                        {field: 'url', title: __('Url'), formatter: Controller.api.formatter.url},
                        {field: 'createtime', title: __('Createtime'), formatter: Table.api.formatter.datetime},
                        {field: 'updatetime', title: __('Updatetime'), formatter: Table.api.formatter.datetime},
                        {field: 'status', title: __('Status'), formatter: Table.api.formatter.status},
                        {field: 'weigh', title: __('Weigh')},
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
                $("form[role=form]").validator({
                    rules: {
                        url:[/^(https?|s?ftp):\/\/\S+$/i, "请填写有效的网址"]
                    },
                    messages: {
                    },
                    fields: {
                        // 'row[title]': "required;length(2~16);",
                        'row[url]': "required;rules:url"
                    },
                });
                
                Form.api.bindevent($("form[role=form]"));
            },
            formatter: {
                url: function (value, row, index) {
                    var id = row.id;
                    return '<a href="http://admintp.cc/admin/test?id=1111" target="_blank" class="label bg-green">'+value+'</a>';
                },
            }
        }
    };
    return Controller;
});