<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\wamp\www\taobaoke/application/admin\view\index\welcome.html";i:1499693764;s:53:"D:\wamp\www\taobaoke/application/admin\view\base.html";i:1497357983;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="__STATIC__/admin/favicon.ico">
    <link rel="Shortcut Icon" href="__STATIC__/admin/favicon.ico"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="__STATIC__/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="__STATIC__/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/ui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/lib/x0popup/x0popup.min.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/fonts/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/static/h-ui.admin/css/style.css"/>


    <!--[if IE 6]>
    <script type="text/javascript" src="__STATIC__/admin/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->
    
<title>后台欢迎页</title>

</head>
<body>

<div class="page-container">
    <p class="f-20 text-success">欢迎<?php echo session('username'); ?>登陆后台</p>
    <p>登录次数：18 </p>
    <p>上次登录IP：<?php echo session('last_ip'); ?>  上次登录时间：<?php echo date('Y-m-d H:i:s',session('last_time')); ?></p>
    <table class="table table-border table-bordered table-bg mt-20">
        <thead>
        <tr>
            <th colspan="2" scope="col">服务器信息</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>服务器IP地址</td>
            <td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
        </tr>
        <tr>
            <td>服务器域名</td>
            <td><?php echo $_SERVER['HTTP_HOST']; ?></td>
        </tr>
        <tr>
            <td>服务器端口 </td>
            <td><?php echo $_SERVER['SERVER_PORT']; ?></td>
        </tr>
        <tr>
            <td>服务器IIS版本 </td>
            <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
        </tr>
        <tr>
            <td>本文件所在文件夹 </td>
            <td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
        </tr>
        <tr>
            <td>服务器当前时间 </td>
            <td><?php echo date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']); ?></td>
        </tr>
        </tbody>
    </table>
</div>
<footer class="footer mt-20">
    <div class="container">
        <p>本系统是基于jQuery框架，bootstrap框架开发的<br>
            Copyright &copy;2017-2018 jechorn.top二次开发 All Rights Reserved.<br>
            本后台系统由使用的是h-ui框架</p>
    </div>
</footer>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/ui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/x0popup/x0popup.min.js"></script>

<!--/_footer 作为公共模版分离出去-->

<!--此乃百度统计代码，请自行删除-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--/此乃百度统计代码，请自行删除-->

</body>
</html>



