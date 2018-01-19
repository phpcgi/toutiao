<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\toutiao\public/../application/admin\view\dashboard\index.html";i:1515128768;s:63:"D:\toutiao\public/../application/admin\view\layout\default.html";i:1515128713;s:60:"D:\toutiao\public/../application/admin\view\common\meta.html";i:1515128766;s:62:"D:\toutiao\public/../application/admin\view\common\script.html";i:1515128767;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="__CDN__/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="__CDN__/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="__CDN__/assets/js/html5shiv.js"></script>
  <script src="__CDN__/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config: {
            'config': <?php echo json_encode($config); ?>
        }
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                    <li><?php echo (isset($title) && ($title !== '')?$title:''); ?></li>
                                </ol>
                                <div class="shortcut pull-right">
                                    <a href="javascript:;" id="search" onclick="$('.search input').focus();"><i class="fa fa-search"></i> <span class="hidden-mobile"><?php echo __('Search'); ?></span></a>
                                    <a href="javascript:;" id="refresh" onclick="location.reload();"><i class="fa fa-refresh"></i> <span class="hidden-mobile"><?php echo __('Refresh'); ?></span></a>
                                </div>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <style type="text/css">
    .sm-st {
        background:#fff;
        padding:20px;
        -webkit-border-radius:3px;
        -moz-border-radius:3px;
        border-radius:3px;
        margin-bottom:20px;
        -webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
        box-shadow: 0 1px 0px rgba(0,0,0,0.05);
    }
    .sm-st-icon {
        width:60px;
        height:60px;
        display:inline-block;
        line-height:60px;
        text-align:center;
        font-size:30px;
        background:#eee;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        float:left;
        margin-right:10px;
        color:#fff;
    }
    .sm-st-info {
        font-size:12px;
        padding-top:2px;
    }
    .sm-st-info span {
        display:block;
        font-size:24px;
        font-weight:600;
    }
    .orange {
        background:#fa8564 !important;
    }
    .tar {
        background:#45cf95 !important;
    }
    .sm-st .green {
        background:#86ba41 !important;
    }
    .pink {
        background:#AC75F0 !important;
    }
    .yellow-b {
        background: #fdd752 !important;
    }
    .stat-elem {

        background-color: #fff;
        padding: 18px;
        border-radius: 40px;

    }

    .stat-info {
        text-align: center;
        background-color:#fff;
        border-radius: 5px;
        margin-top: -5px;
        padding: 8px;
        -webkit-box-shadow: 0 1px 0px rgba(0,0,0,0.05);
        box-shadow: 0 1px 0px rgba(0,0,0,0.05);
        font-style: italic;
    }

    .stat-icon {
        text-align: center;
        margin-bottom: 5px;
    }

    .st-red {
        background-color: #F05050;
    }
    .st-green {
        background-color: #27C24C;
    }
    .st-violet {
        background-color: #7266ba;
    }
    .st-blue {
        background-color: #23b7e5;
    }

    .stats .stat-icon {
        color: #28bb9c;
        display: inline-block;
        font-size: 26px;
        text-align: center;
        vertical-align: middle;
        width: 50px;
        float:left;
    }

    .stat {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: inline-block;
        margin-right: 10px; }
    .stat .value {
        font-size: 20px;
        line-height: 24px;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: 500; }
    .stat .name {
        overflow: hidden;
        text-overflow: ellipsis; }
    .stat.lg .value {
        font-size: 26px;
        line-height: 28px; }
    .stat.lg .name {
        font-size: 16px; }
    .stat-col .progress {height:2px;}
    .stat-col .progress-bar {line-height:2px;height:2px;}

    .item {
        padding:30px 0;
    }
</style>
<link rel="stylesheet" href="../assets/libs/AdminLTE/plugins/daterangepicker/daterangepicker.css">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="../assets/libs/AdminLTE/plugins/datepicker/datepicker3.css">
<div class="panel panel-default panel-intro">

    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="one">
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="panel-heading">
                            搜索条件
                        </div>
                        <div class="panel-body">
                            <form id="update-form" role="form" data-toggle="validator" method="POST" action="<?php echo url('Dashboard/add'); ?>">
                                <div class="form-group">
                                    <label for="username" class="control-label">头条号名称:</label>
                                    <input type="text" class="form-control" name="row[name]" value=""  />
                                </div>
                                <div class="form-group">
                                    <label for="tid" class="control-label">头条号id:</label>
                                    <input type="number" class="form-control" name="row[tid]" value=""  />
                                </div>
                                <div class="form-group">
                                    <label for="nickname" class="control-label">周榜:</label>
                                    <input id="row[status]-zhou" checked="checked" name="row[status]" type="radio" value="1">
                                    <label for="nickname" class="control-label">月榜:</label>
                                    <input id="row[status]-yue"  name="row[status]" type="radio" value="2">
                                </div>
                                <div class="form-group">
                                    <label>时间:</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="reservation" name="row[time]">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><?php echo __('Submit'); ?></button>
                                    <button type="reset" class="btn btn-default"><?php echo __('Reset'); ?></button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <?php if($type!="1"): ?>
                <div class="panel-body">
                    </div>
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="sm-st clearfix">
                            <!--<span class="sm-st-icon st-red"><i class="fa fa-users"></i></span>-->
                            <div class="sm-st-info">
                                <span><?php echo $weeklist['name']; ?></span>
                                头条名称
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="sm-st clearfix">
                            <!--<span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>-->
                            <div class="sm-st-info">
                                <span><?php echo $weeklist['tid']; ?></span>
                                头条id
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="sm-st clearfix">
                            <!--<span class="sm-st-icon st-blue"><i class="fa fa-shopping-bag"></i></span>-->
                            <div class="sm-st-info">
                                <span><?php echo $weeklist['type']; ?></span>
                                头条类别
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="sm-st clearfix">
                            <!--<span class="sm-st-icon st-green"><i class="fa fa-cny">名称</i></span>-->
                            <div class="sm-st-info">
                                <span><?php echo $weeklist['sum_fans_count']; ?></span>
                                粉丝量
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="card sameheight-item stats">
                            <div class="card-block">
                                <div class="row row-sm stats-container">
                                    <div class="col-xs-2 stat-col">
                                        <!--<div class="stat-icon"> <i class="fa fa-rocket"></i> </div>-->
                                        <div class="stat">
                                            <div class="name"> 平均阅读数 </div>
                                            <div class="value"> <?php echo $weeklist['R']; ?></div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 20%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 stat-col">
                                        <!--<div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>-->
                                        <div class="stat">
                                            <div class="name"> 平均推荐量 </div>
                                            <div class="value"> <?php echo $weeklist['T']; ?> </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 20%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 stat-col">
                                        <!--<div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>-->
                                        <div class="stat">
                                            <div class="name"> 平均分享量 </div>
                                            <div class="value"> <?php echo $weeklist['S']; ?> </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 20%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 stat-col">
                                        <!--<div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>-->
                                        <div class="stat">
                                            <div class="name"> 平均收藏量 </div>
                                            <div class="value"> <?php echo $weeklist['C']; ?> </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 20%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 stat-col">
                                        <!--<div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>-->
                                        <div class="stat">
                                            <div class="name"> 平均点赞量 </div>
                                            <div class="value"> <?php echo $weeklist['P']; ?> </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 20%"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-1 stat-col">
                                    <!--<div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>-->
                                    <div class="stat">
                                        <div class="name"> 平均评论量 </div>
                                        <div class="value"> <?php echo $weeklist['W']; ?> </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" style="width: 20%"></div>
                                    </div>
                                 </div>
                                    <div class="col-xs-1 stat-col">
                                        <!--<div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>-->
                                        <div class="stat">
                                            <div class="name"> 发文篇数 </div>
                                            <div class="value"> <?php echo $weeklist['sum_publish_num']; ?> </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" style="width: 20%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th>榜单</th>
                            <th>得分</th>
                            <!--<th style="width: 40px">Label</th>-->
                        </tr>
                        <tr>
                            <td>传播效果榜</td>
                            <td><span class="badge bg-red"><?php echo $weeklist['A1_sort']; ?></span></td>
                        </tr>
                        <tr>
                            <td>内容质量</td>
                            <td><span class="badge bg-red"><?php echo $weeklist['A2_sort']; ?></span></td>
                        </tr>
                        <tr>
                            <td>互动效果</td>
                            <td><span class="badge bg-red"><?php echo $weeklist['A3_sort']; ?></span></td>
                        </tr>
                        <tr>
                            <td>粉丝数量</td>
                            <td><span class="badge bg-red"><?php echo $weeklist['A4_sort']; ?></span></td>
                        </tr>
                        <tr>
                            <td>传播价值（总榜）</td>
                            <td><span class="badge bg-red"><?php echo $weeklist['worth_sort']; ?></span></td>
                        </tr>
                        </tbody></table>
                </div>
                <div class="col-lg-8">
                    <div id="echart" style="height:200px;width:100%;"></div>
                </div>
    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    var Orderdata = {
    column: <?php echo json_encode(array_keys($worth_sort)); ?>,
    worth_sort: <?php echo json_encode(array_values($worth_sort)); ?>,
    sum_publish_num: <?php echo json_encode(array_values($sum_publish_num)); ?>,
    sum_fans_count: <?php echo json_encode(array_values($sum_fans_count)); ?>,
    R: <?php echo json_encode(array_values($R)); ?>,
    w: <?php echo json_encode(array_values($W)); ?>,
    };
</script>
<script src="../assets/libs/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Select2 -->
<script src="../assets/libs/AdminLTE/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../assets/libs/AdminLTE/plugins/input-mask/jquery.inputmask.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../assets/libs/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/DD/MM h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();


    });
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>