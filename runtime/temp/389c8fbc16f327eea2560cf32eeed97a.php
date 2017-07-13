<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\wamp\www\taobaoke\public/../install/index\view\index\setconf.html";i:1499776972;s:61:"D:\wamp\www\taobaoke\public/../install/index\view\header.html";i:1499770424;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo lang('page_title'); ?></title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/install/css/install.css" />
    <script type="text/javascript" src="__STATIC__/home/vender/js/jquery-1.11.1.min.js"></script>
</head>

<body>
<div class="header">
    <div class="logo fl"></div>
    <div class="fr">
        <h2 class="fr"><?php echo lang('wellcom_user_ftxia'); ?></h2>
    </div>
</div>
<div class="content">
    <div class="step fl">
        <h3></h3>
        <ul>
            <li <?php if($step_curr == 'eula'): ?>class="curr"<?php endif; ?>><span>1</span><h4><?php echo lang('step_eula'); ?></h4></li>
            <li <?php if($step_curr == 'check'): ?>class="curr"<?php endif; ?>><span>2</span><h4><?php echo lang('step_check'); ?></h4></li>
            <li <?php if($step_curr == 'setconf'): ?>class="curr"<?php endif; ?>><span>3</span><h4><?php echo lang('step_setconf'); ?></h4></li>
            <li <?php if($step_curr == 'install'): ?>class="curr"<?php endif; ?>><span>4</span><h4><?php echo lang('step_install'); ?></h4></li>
            <li <?php if($step_curr == 'finish'): ?>class="curr"<?php endif; ?>><span>5</span><h4><?php echo lang('step_finish'); ?></h4></li>
        </ul>
    </div>
<div class="c_main fr">
<form action="<?php echo url('setconf'); ?>" method="post">
	<div class="c_main_title"><?php echo lang('step_setconf_desc'); ?></div>
	<div class="c_main_body setconf">

        <?php if(isset($error_msg)): ?>
        <div class="error_msg"><?php echo $error_msg; ?></div>
        <?php endif; ?>

        <fieldset>
        	<legend><?php echo lang('setconf_database'); ?></legend>
            <ul>
            	<li><span class="field"><?php echo lang('database_host'); ?>：</span><input type="text" name="db_host" class="text_input" size="30" value="<?php echo $db_host; ?>" /><span class="field port"><?php echo lang('database_port'); ?>：</span><input type="text" name="db_port" class="text_input" size="8" value="<?php echo $db_port; ?>" /></li>
                <li><span class="field"><?php echo lang('database_user'); ?>：</span><input type="text" name="db_user" class="text_input" size="30" value="<?php echo $db_user; ?>" /><span class="field_tip"><?php echo lang('database_user_tip'); ?></span></li>
                <li><span class="field"><?php echo lang('database_pass'); ?>：</span><input type="password" name="db_pass" id="db_pass" class="text_input" size="30" value="<?php echo $db_pass; ?>" /><span class="field_tip"><?php echo lang('database_pass_tip'); ?></span></li>
                <li><span class="field"><?php echo lang('database_name'); ?>：</span><input type="text" name="db_name" class="text_input" size="30" value="<?php echo $db_name; ?>" /><span class="field_tip"><?php echo lang('database_name_tip'); ?></span></li>
                <li><span class="field"><?php echo lang('table_prefix'); ?>：</span><input type="text" name="db_prefix" class="text_input" size="30" value="<?php echo $db_prefix; ?>" /><span class="field_tip"><?php echo lang('table_prefix_tip'); ?></span></li>
            </ul>
        </fieldset>
        <fieldset class="admin_info">
        	<legend><?php echo lang('setconf_admin'); ?></legend>
            <ul>
                <li><span class="field"><?php echo lang('admin_user'); ?>：</span><input type="text" name="admin_user" class="text_input" size="30" value="<?php echo $admin_user; ?>" /></li>
                <li><span class="field"><?php echo lang('admin_pass'); ?>：</span><input type="password" name="admin_pass" class="text_input" size="30" value="<?php echo $admin_pass; ?>" /></li>
                <li><span class="field"><?php echo lang('admin_pass_confirm'); ?>：</span><input type="password" name="admin_pass_confirm" class="text_input" size="30" value="<?php echo $admin_pass_confirm; ?>" /></li>
                <li><span class="field"><?php echo lang('admin_email'); ?>：</span><input type="text" name="admin_email" class="text_input" size="30" value="<?php echo $admin_email; ?>" /></li>
            </ul>
        </fieldset>
    </div>
    <div class="act">
        <div class="btn"><input type="submit" value="<?php echo lang('next'); ?>" class="btn_next" /></div>
    </div>
</form>
</div>
<include file="public:footer"/>