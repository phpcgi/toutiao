define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                search: false,
                extend: {
                    index_url: 'jiesuan/Zhanghao/index',
                    add_url: 'jiesuan/Zhanghao/add',
                    edit_url: 'jiesuan/Zhanghao/edit',
                    del_url: 'jiesuan/Zhanghao/del',
                    addhao_url: 'jiesuan/Zhanghao/addhao',
                    multi_url: 'jiesuan/Zhanghao/multi',
                    table: 'zhanghao',
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
                        {field: 'kaihuming', title: __('开户账号名'), operate: 'LIKE %...%', placeholder: '名称，模糊搜索，*表示任意字符', style: 'width:200px',
                            process: function (value, arg) {
                                return value.replace(/\*/g, '%');
                            }},
                        {field: 'phone', title: __('手机号'),  operate: false},
                        {field: 'bank', title: __('开户行'), operate: false},
                        {field: 'bankhao', title: __('银行卡号'), operate: false},
                        {field: 'shenfenzheng', title: __('身份证号'), operate: false},
                        {field: 'emall', title: __('邮箱号'), operate: false},                     
                        {field: 'hezuo', title: __('合作次数'),  operate: false},
                        {field: 'show', title: __('配合值'),  operate: false},     
                        {field: 'asad', title: __('撰稿质量值'),  operate: false},
                        {field: 'firsttim', title: __('最后登录时间'),  operate: false}, 
                        {field: 'operate', title: __('操作'), events: Table.api.events.operate, formatter: function (value, row, index) {
                            var detail = '<a href="javascript:;" class="btn btn-success btn-addhaoone btn-xs">绑定头条号</a> ';
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