define(['jquery', 'bootstrap', 'backend', 'addtabs', 'table', 'echarts', 'echarts-theme'], function ($, undefined, Backend, Datatable, Table, Echarts) {

    var Controller = {
        index: function () {
            // 基于准备好的dom，初始化echarts实例
            var myChart = Echarts.init(document.getElementById('echart'), 'walden');
            // 指定图表的配置项和数据
            var option = {
                title: {
                    text: '',
                    subtext: ''
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['总榜', '平均阅读量趋势', '平均评论量趋势', '粉丝量趋势', '平均发文量趋势']
                },
                toolbox: {
                    show: false,
                    feature: {
                        magicType: {show: true, type: ['stack', 'tiled']},
                        saveAsImage: {show: true}
                    }
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: Orderdata.column
                },
                yAxis: {

                },
                grid: [{
                    left: 'left',
                    top: 'top',
                    right: '10',
                    bottom:30
                }],
                series: [{
                    name: '总榜',
                    type: 'line',
                    smooth: true,
                    areaStyle: {
                        normal: {
                        }
                    },
                    lineStyle: {
                        normal: {
                            width:1.5
                        }
                    },
                    data: Orderdata.worth_sort
                },
                    {
                        name: '平均阅读量趋势',
                        type: 'line',
                        smooth: true,
                        areaStyle: {
                            normal: {
                            }
                        },
                        lineStyle: {
                            normal: {
                                width:1.5
                            }
                        },
                        data: Orderdata.R
                    }
                    ,
                    {
                        name: '平均评论量趋势',
                        type: 'line',
                        smooth: true,
                        areaStyle: {
                            normal: {
                            }
                        },
                        lineStyle: {
                            normal: {
                                width:1.5
                            }
                        },
                        data: Orderdata.w
                    }
                    ,
                    {
                        name: '粉丝量趋势',
                        type: 'line',
                        smooth: true,
                        areaStyle: {
                            normal: {
                            }
                        },
                        lineStyle: {
                            normal: {
                                width:1.5
                            }
                        },
                        data: Orderdata.sum_fans_count
                    }
                    ,
                    {
                        name: '平均发文量趋势',
                        type: 'line',
                        smooth: true,
                        areaStyle: {
                            normal: {
                            }
                        },
                        lineStyle: {
                            normal: {
                                width:1.5
                            }
                        },
                        data: Orderdata.sum_publish_num
                    }



                ]
            };

            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
            $(window).resize(function(){
                myChart.resize();
            });
        },
        add: function () {
            // 基于准备好的dom，初始化echarts实例
            var myChart = Echarts.init(document.getElementById('echart'), 'walden');
            // 指定图表的配置项和数据
            var option = {
                title: {
                    text: '',
                    subtext: ''
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['总榜', '平均阅读量趋势', '平均评论量趋势', '粉丝量趋势', '平均发文量趋势']
                },
                toolbox: {
                    show: false,
                    feature: {
                        magicType: {show: true, type: ['stack', 'tiled']},
                        saveAsImage: {show: true}
                    }
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: Orderdata.column
                },
                yAxis: {

                },
                grid: [{
                    left: 'left',
                    top: 'top',
                    right: '10',
                    bottom:30
                }],
                series: [{
                    name: '总榜',
                    type: 'line',
                    smooth: true,
                    areaStyle: {
                        normal: {
                        }
                    },
                    lineStyle: {
                        normal: {
                            width:1.5
                        }
                    },
                    data: Orderdata.worth_sort
                },
                    {
                        name: '平均阅读量趋势',
                        type: 'line',
                        smooth: true,
                        areaStyle: {
                            normal: {
                            }
                        },
                        lineStyle: {
                            normal: {
                                width:1.5
                            }
                        },
                        data: Orderdata.R
                    }
                    ,
                    {
                        name: '平均评论量趋势',
                        type: 'line',
                        smooth: true,
                        areaStyle: {
                            normal: {
                            }
                        },
                        lineStyle: {
                            normal: {
                                width:1.5
                            }
                        },
                        data: Orderdata.w
                    }
                    ,
                    {
                        name: '粉丝量趋势',
                        type: 'line',
                        smooth: true,
                        areaStyle: {
                            normal: {
                            }
                        },
                        lineStyle: {
                            normal: {
                                width:1.5
                            }
                        },
                        data: Orderdata.sum_fans_count
                    }
                    ,
                    {
                        name: '平均发文量趋势',
                        type: 'line',
                        smooth: true,
                        areaStyle: {
                            normal: {
                            }
                        },
                        lineStyle: {
                            normal: {
                                width:1.5
                            }
                        },
                        data: Orderdata.sum_publish_num
                    }



                ]
            };

            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
            $(window).resize(function(){
                myChart.resize();
            });
        }
    };

    return Controller;
});