define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'test/index',
                    add_url: 'test/add',
                    edit_url: 'test/edit',
                    del_url: 'test/del',
                    multi_url: 'test/multi',
                    table: 'test',
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
                        {field: 'tid', title: __('Tid')},
                        {field: 'type', title: __('Type'),
                            searchList: {财经: '财经', 动漫: '动漫', 房产: '房产', 股票: '股票', 家具: '家具', 健康: '健康',
                                教育: '教育', 军事: '军事', 科技: '科技', 历史: '历史', 两性: '两性', 旅游: '旅游', 美食: '美食', 汽车: '汽车'
                                , 社会: '社会', 时尚: '时尚', 时政: '时政', 数码: '数码', 体育: '体育', 文化: '文化', 星座: '星座', 艺术: '艺术'
                                , 影视: '影视', 游戏: '游戏', 娱乐: '娱乐', 育儿: '育儿'}},
                        {field: 'name', title: __('Name'), operate: 'LIKE %...%', placeholder: '名称，模糊搜索，*表示任意字符', style: 'width:200px',
                            process: function (value, arg) {
                                return value.replace(/\*/g, '%');
                            }
                        },
                        {field: 'sum_fans_count', title: __('Sum_fans_count'), operate: false},
                        {field: 'R', title: __('R'), operate: false},
                        {field: 'S', title: __('S'), operate: false},
                        {field: 'C', title: __('C'), operate: false},
                        {field: 'P', title: __('P'), operate: false},
                        {field: 'T', title: __('T'), operate: false},
                        {field: 'W', title: __('W'), operate: false},
                        {field: 'sum_publish_num', title: __('Sum_publish_num'), operate: false},
                        {field: 'worth', title: __('worth'), operate: false},
                        // {field: 'time', title: __('Time'),searchList:Controller.api.formatter.dome},
                        {field: 'createtime', title: __('Createtime'), formatter: Table.api.formatter.datetime,operate: 'BETWEEN', type: 'datetime', addclass: 'datetimepicker', data: 'data-date-format="YYYY-MM-DD"'},
                        {field: 'operate', title: __('Operate'), events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ],
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
            }
        }
    };
    return Controller;
});