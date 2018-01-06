define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                search: false,
                extend: {
                    index_url: 'userad/ad/index',
                    add_url: 'userad/ad/add',
                    edit_url: '',
                    del_url: 'userad/ad/del',
                    multi_url: 'userad/ad/multi',
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
                        {field: 'jointime', title: __('Jointime'), operate: false},
                        {field: 'operate', title: __('Operate'), events: Controller.api.events.operate, formatter: function (value, row, index) {
                            var detail = '<a class="btn btn-xs btn-success btn-detail">详情</a> ';
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
            },
            formatter: {//渲染的方法
                thumb: function (value, row, index) {
                    //console.log(row);
                    if (row) {

                        return '<img src="'  + row.pic + '" alt="" height="40" width="40">';

                    } else {
                        return '无';
                    }
                },
                url: function (value, row, index) {
                    return '<a href="' + Config.upload.cdnurl + value + '" target="_blank" class="label bg-green">' + value + '</a>';
                },
                operate: function (value, row, index) {
                    //返回字符串加上Table.api.formatter.operate的结果
                    //默认需要按需显示排序/编辑/删除按钮,则需要在Table.api.formatter.operate将table传入
                    //传入了table以后如果edit_url为空则不显示编辑按钮,如果del_url为空则不显显删除按钮
                    return '<a class="btn btn-info btn-xs btn-detail"><i class="fa fa-list"></i> ' + __('Detail') + '</a> '
                        + Table.api.formatter.operate(value, row, index, $("#table"));
                }
            },
            events: {//绑定事件的方法
                ip: {
                    //格式为：方法名+空格+DOM元素
                    'click .btn-ip': function (e, value, row, index) {
                        e.stopPropagation();
                        console.log();
                        var container = $("#table").data("bootstrap.table").$container;
                        var options = $("#table").bootstrapTable('getOptions');
                        //这里我们手动将数据填充到表单然后提交
                        $("form.form-commonsearch [name='ip']", container).val(value);
                        $("form.form-commonsearch", container).trigger('submit');
                        Toastr.info("执行了自定义搜索操作");
                    }
                },
                browser: {
                    'click .btn-browser': function (e, value, row, index) {
                        e.stopPropagation();
                        Layer.alert("该行数据为: <code>" + JSON.stringify(row) + "</code>");
                    }
                },
                operate: $.extend({
                    'click .btn-detail': function (e, value, row, index) {
                        e.stopPropagation();
                        Backend.api.open('userad/ad/detail/ids/' + row['uid'], __('Detail'));
                    }
                }, Table.api.events.operate)
            }
        }
    };
    return Controller;
});