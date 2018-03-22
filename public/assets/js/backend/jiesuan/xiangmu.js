define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                search: false,
                extend: {
                    index_url: 'jiesuan/Xiangmu/index',
                    add_url: 'jiesuan/Xiangmu/add',
                    edit_url: 'jiesuan/Xiangmu/edit',
                    addhao_url: 'jiesuan/Xiangmu/addwen',
                    vwen_url: 'jiesuan/Xiangmu/vwen',
                    del_url: 'jiesuan/Xiangmu/del',
                    multi_url: 'jiesuan/Xiangmu/multi',
                    table: 'Xiangmu',
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
                        {field: 'project', title: __('项目名'), operate: 'LIKE %...%', placeholder: '名称，模糊搜索，*表示任意字符', style: 'width:200px',
                            process: function (value, arg) {
                                return value.replace(/\*/g, '%');
                            }},
                        {field: 'biaoti', title: __('标题名'), operate: false},
                        {field: 'ming', title: __('姓名或公司名'), operate: false},
                        {field: 'lei', title: __('类型'), operate: false},
                        {field: 'fei', title: __('价格'), operate: false},
                        {field: 'bei', title: __('备注'), operate: false},
                        {field: 'operate', title: __('Operate'), events: Table.api.events.operate, formatter: function (value, row, index) {
                            var detail = '<a class="btn btn-success btn-vwenone btn-xs">详情</a> <a class="btn btn-success btn-addwenone btn-xs">添加撰稿＼发文</a> ';
                            return detail + Table.api.formatter.operate.call(this, value, row, index, table);
                        }}
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