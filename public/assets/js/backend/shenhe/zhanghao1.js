define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                search: false,
                extend: {
                    index_url: 'shenhe/Zhanghao1/index',
                    //add_url: 'shenhe/Zhanghao/add',
                    //edit_url: 'shenhe/Zhanghao/edit',
                    //del_url: 'shenhe/Zhanghao/del',
                    //multi_url: 'shenhe/Zhanghao/multi',
                    table: 'shenhe',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                sortName: 'id',
                columns: [
                    [
                        {field: 'id', checkbox: true},
                        {field: 'name', title: __('Name'), operate: 'LIKE %...%', placeholder: '名称，模糊搜索，*表示任意字符', style: 'width:200px',
                            process: function (value, arg) {
                                return value.replace(/\*/g, '%');
                            }},
                        {field: 'phone', title: __('手机号'), operate: false},
                        {field: 'uid', title: __('uid'), operate: false},
                        {field: 'real_name', title: __('real_name'), operate: false}
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