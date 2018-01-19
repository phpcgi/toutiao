<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:63:"D:\toutiao\public/../application/admin\view\settings\index.html";i:1515128651;s:63:"D:\toutiao\public/../application/admin\view\layout\default.html";i:1515128713;s:60:"D:\toutiao\public/../application/admin\view\common\meta.html";i:1515128766;s:62:"D:\toutiao\public/../application/admin\view\common\script.html";i:1515128767;}*/ ?>
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
                                <div class="row animated fadeInRight">
    <div class="col-md-8">
        <div class="box box-success">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <form id="update-form" role="form" data-toggle="validator" method="POST" action="<?php echo url('settings/update'); ?>">
                    <div class="box-body">
                         <label for="username" class="control-label">入榜门槛</label>
                        <div class="row">
                            <div class="col-xs-2">
                                <label></label>
                                <!--<input type="text" name="row[week]" value="<?php echo $admin['nickname']; ?>" class="form-control" >-->
                            </div>
                            <div class="col-xs-2">
                                <label>周发文数大于</label>
                                <input type="text" name="row[week]" value="<?php echo $row['A']; ?>" class="form-control" >
                            </div>
                            <div class="col-xs-2">
                                <label>月发文数大于</label>
                                <input type="text" name="row[moon]" value="<?php echo $row['B']; ?>" class="form-control" >
                            </div>
                            <div class="col-xs-2">
                                <label>粉丝量</label>
                                <input type="text" name="row[fans]" value="<?php echo $row['C']; ?>" class="form-control" >
                            </div>
                        </div>
                    </div>


                    <div class="box-body">
                        <label for="username" class="control-label">计算公式</label>
                        <div class="row">
                            <div class="col-xs-2">
                                <label></label>
                                <!--<input type="text" name="row[cc]" value="<?php echo $admin['nickname']; ?>" class="form-control" >-->
                            </div>
                            <div class="col-xs-2">
                                <label >权重  %</label>
                                <!--<input type="text" name="row[cc]" value="<?php echo $admin['nickname']; ?>" class="form-control" >-->
                            </div>
                            <div class="col-xs-2">
                                <label>因素</label>
                                <!--<input type="text" name="row[cc]" value="<?php echo $admin['nickname']; ?>" class="form-control" >-->
                            </div>
                            <div class="col-xs-2">
                                <label>因素权重%</label>
                                <!--<input type="text" name="row[cc]" value="<?php echo $admin['nickname']; ?>" class="form-control" >-->
                            </div>
                            <div class="col-xs-2">
                                <label>放大倍数</label>
                                <!--<input type="text" name="row[cc]" value="<?php echo $admin['nickname']; ?>" class="form-control" >-->
                            </div>
                        </div>
                        <!--<div class="col-xs-3">
                           222 <input type="text" class="form-control" placeholder=".col-xs-3">
                        </div>-->
                        <div class="box-body">
                            <div class="col-sm-2">
                                <label  class="col-sm-2 control-label">传播效果</label>
                            </div>
                            <div class="col-sm-2">
                                    <input type="text" name="row[a]" value="<?php echo $row2['A']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label >R</label></br>
                                <label >T</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[b1]" value="<?php echo $row2['B']['0']; ?>" class="form-control" >
                                <input type="text" name="row[b2]" value="<?php echo $row2['B']['1']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[c1]" value="<?php echo $row2['C']['0']; ?>" class="form-control" >
                                <input type="text" name="row[c2]" value="<?php echo $row2['C']['1']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label ></label>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-2">
                                <label  class="col-sm-2 control-label">内容质量</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[nr]" value="<?php echo $row3['A']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label >S</label></br>
                                <label >C</label></br>
                                <label >P</label></br>
                                <label >T</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[nr1]" value="<?php echo $row3['B']['0']; ?>" class="form-control" >
                                <input type="text" name="row[nr2]" value="<?php echo $row3['B']['1']; ?>" class="form-control" >
                                <input type="text" name="row[nr3]" value="<?php echo $row3['B']['2']; ?>" class="form-control" >
                                <input type="text" name="row[nr4]" value="<?php echo $row3['B']['3']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[nrfa1]" value="<?php echo $row3['C']['0']; ?>" class="form-control" >
                                <input type="text" name="row[nrfa2]" value="<?php echo $row3['C']['1']; ?>" class="form-control" >
                                <input type="text" name="row[nrfa3]" value="<?php echo $row3['C']['2']; ?>" class="form-control" >
                                <input type="text" name="row[nrfa4]" value="<?php echo $row3['C']['3']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label ></label>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-2">
                                <label  class="col-sm-2 control-label">互动效果</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[hd]" value="<?php echo $row4['A']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label >R</label></br>
                                <label >T</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[hd1]" value="<?php echo $row4['B']['0']; ?>" class="form-control" >
                                <input type="text" name="row[hd2]" value="<?php echo $row4['B']['1']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[hdfd1]" value="<?php echo $row4['C']['0']; ?>" class="form-control" >
                                <input type="text" name="row[hdfd2]" value="<?php echo $row4['C']['1']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label ></label>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-2">
                                <label  class="col-sm-2 control-label">粉丝数量</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[fs]" value="<?php echo $row5['A']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label >R</label></br>
                                <label >T</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[fs1]" value="<?php echo $row5['B']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[fsfd1]" value="<?php echo $row5['C']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label ></label>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-sm-2">
                                <label  class="col-sm-2 control-label">发文数量</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[wen]" value="<?php echo $row6['A']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label >Z</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[wen1]" value="<?php echo $row6['B']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="row[wenfd1]" value="<?php echo $row6['C']; ?>" class="form-control" >
                            </div>
                            <div class="col-sm-2">
                                <label ></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><?php echo __('Submit'); ?></button>
                        <button type="reset" class="btn btn-default"><?php echo __('Reset'); ?></button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>