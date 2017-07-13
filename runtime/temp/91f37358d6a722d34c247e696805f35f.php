<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\wamp\www\taobaoke\public/../application/admin\view\collect\show.html";i:1499233300;s:63:"D:\wamp\www\taobaoke\public/../application/admin\view\base.html";i:1497357983;}*/ ?>
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
    
<title>一键采集商品</title>
<style>
    .padding-container {
        padding: 20px;
        text-align: center;
    }
    .icon-font {
        font-size: 50px;
        margin: 0 auto;
        display: inline-block;

    }
    #before-collect p,#state-msg p{
        font-size: 14px;
        line-height: 28px;
    }


</style>


</head>
<body>

<div class="padding-container">

    <div id="before-collect">
        <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop icon-font">&#xe63d;</i>
        <p>正在采集选库表中，请稍后.....</p>
        <p>采集过程中请不要关闭本页面</p>
    </div>
    <div id="state-msg">

    </div>


</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/ui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/x0popup/x0popup.min.js"></script>

<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(function () {
        (function longPolling() {
            //alert(Date.parse(new Date())/1000);
            $.ajax({
                url: "<?php echo $ajaxUrl; ?>",
                type:'get',
                data: {"timed": Date.parse(new Date())/1000},
                dataType: "json",
                timeout: 60000,//600秒超时，可自定义设置
                error: function (XMLHttpRequest, textStatus, errorThrown) {
//
//                    if (textStatus === "timeout") { // 请求超时
//
//                        longPolling(); // 递归调用
//                    } else { // 其他错误，如网络错误等
//                        longPolling();
//                    }
                    $('#before-collect').css('display','none');
                    $('#state-msg').html('<p>服务器连接失败正在重试...</p>');
                    $('#state-msg').css('display','block');
                    setTimeout(function () {
                        longPolling(); // 递归调用
                        $('#before-collect').css('display','block');
                        $('#state-msg').css('display','none');

                    },3000);

                },
                success: function (data, textStatus) {
                    $("#state").text(data.msg);
                    if (parseInt(data.status) === 2) { // 请求成功
                        $('#before-collect').css('display','none');
                        $('#state-msg').html('<p>'+data.msg+'</p>');
                        $('#state-msg').css('display','block');
                    }else{
                        $('#before-collect').css('display','none');
                        $('#state-msg').html('<p>'+data.msg+'</p>');
                        $('#state-msg').css('display','block');
                        setTimeout(function () {
                            longPolling(); // 递归调用
                            $('#before-collect').css('display','block');
                            $('#state-msg').css('display','none');

                        },2000);
                    }
                }
            });

        })();
    });

</script>


</body>
</html>



