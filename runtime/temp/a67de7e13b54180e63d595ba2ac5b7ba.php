<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\wamp\www\taobaoke\public/../application/admin\view\collect\list.html";i:1499243778;s:63:"D:\wamp\www\taobaoke\public/../application/admin\view\base.html";i:1497357983;}*/ ?>
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
    
<title>选库表列表</title>
<style>
    .padding-container{
        padding: 20px;
    }
    .layui-form-radio{
        width: 20%;
        text-align: left;
        white-space: nowrap;
        overflow-x: hidden;

    }

    .input-width{
        width: 100% !important;
        text-align: center;
    }

    .center{
        text-align: center;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .center .layui-btn{
        margin:0 auto;
    }
    .layui-form-radio span{
        white-space: nowrap;
        overflow-x: hidden;
        display: inline-block;
    }

</style>


</head>
<body>

<div class="padding-container">
    <form class="layui-form">
    <div class="layui-form-item center">
        <div class="layui-input-inline input-width">
            <input type="text" id="search" name="title"  placeholder="搜索" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">

        <?php foreach($list as $vo): ?>
            <input type="radio" name="favorites_id" lay-filter="" value="<?php echo $vo['favorites_id']; ?>" title="<?php echo $vo['favorites_title']; ?>">
        <?php endforeach; ?>

    </div>
    <div class="layui-form-item center">
        <button type="submit" class="layui-btn" lay-submit lay-filter="choose">确定</button>
    </div>
    </form>

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
    layui.use(['form','layer'],function () {
        var form = layui.form();
        var layer = layui.layer;
        form.on('submit(choose)', function(data){
            parent.$('#favorites_id').val(data.field.favorites_id);
            var title = $("input[type='radio']:checked").attr('title');
            parent.$('#favorites_name').val(title);
            console.log(title);
            layer_close();
            //
            //console.log(data) //当前容器的全部表单字段，名值对形式：{name: value}

            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

    });

    $('#search').bind('input propertychange', function() {
        var _this = $(this);
        if($(this).val().trim() ===''|| $(this).val().trim()===null){
            $('.layui-form-radio').css('display','inline-block');
            return false;
        }
        var pattern = new RegExp($(this).val());
        $('.layui-form-radio').each(function () {

            if(pattern.test($(this).find('span').text())){
                $(this).css('display','inline-block')
            }else{
                $(this).css('display','none')
            }
        });
    });

</script>


</body>
</html>



