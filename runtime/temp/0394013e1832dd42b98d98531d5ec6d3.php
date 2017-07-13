<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"D:\wamp\www\taobaoke/install/index\view\index\install.html";i:1499782286;s:51:"D:\wamp\www\taobaoke/install/index\view\header.html";i:1499770424;s:51:"D:\wamp\www\taobaoke/install/index\view\footer.html";i:1354772440;}*/ ?>
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
<script>
    var url = '<?php echo url("finish"); ?>';
</script>
<div class="c_main fr">
<form id="J_install_form" action="<?php echo url('finish_done'); ?>" method="post">
    <div class="c_main_title"><?php echo lang('step_install_desc'); ?></div>
    <div id="J_process" class="c_main_body process"></div>
    <div id="J_link" class="act" style="display:none;">
        <div class="btn"><input type="button" value="<?php echo lang('next'); ?>" class="btn_next" onclick="window.location.href=url;" /></div>
    </div>
    <iframe src="about:blank" style="width:500px; height:300px;display:none;" name="post_target"></iframe>
</form>
</div>
<script>
$(function(){
    $('#J_install_form').attr('target', 'post_target');
    $('#J_install_form').submit();
});
function show_process(html){
    $('#J_process').html($('#J_process').html() + html);
    var _t = $('#J_process').get(0);
    _t.scrollTop = _t.scrollHeight;
}
function install_successed(){
    $('#J_link').show();
}
</script>
</div>
</body>
</html>