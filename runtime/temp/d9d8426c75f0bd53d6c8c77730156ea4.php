<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\toutiao\public/../application/admin\view\auth\group\edit.html";i:1515128676;s:63:"D:\toutiao\public/../application/admin\view\layout\default.html";i:1515128713;s:60:"D:\toutiao\public/../application/admin\view\common\meta.html";i:1515128766;s:62:"D:\toutiao\public/../application/admin\view\common\script.html";i:1515128767;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal form-ajax" role="form" method="POST" data-before-submit="refreshrules" action="">
    <input type="hidden" name="row[rules]" value="" />
    <div class="form-group">
        <label for="pid" class="control-label col-xs-12 col-sm-2"><?php echo __('Parent'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_select('row[pid]', $groupdata, $row['pid'], ['class'=>'form-control selectpicker', 'required'=>'', 'data-id'=>$row['id'], 'data-pid'=>$row['pid']]); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="name" name="row[name]" value="<?php echo $row['name']; ?>" required="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="nickname" class="control-label col-xs-12 col-sm-2"><?php echo __('Permission'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <span class="text-muted"><input type="checkbox" name="" id="checkall" /> <label for="checkall"><small><?php echo __('Check all'); ?></small></label></span>
            <span class="text-muted"><input type="checkbox" name="" id="expandall" /> <label for="expandall"><small><?php echo __('Expand all'); ?></small></label></span>

            <div id="treeview"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[status]', ['normal'=>__('Normal'), 'hidden'=>__('Hidden')], $row['status']); ?>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
        <label class="control-label col-xs-12 col-sm-2 col-xs-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>