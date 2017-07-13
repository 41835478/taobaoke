<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\wamp\www\taobaoke\public/../application/admin\view\collect\add.html";i:1497683502;s:63:"D:\wamp\www\taobaoke\public/../application/admin\view\base.html";i:1497357983;}*/ ?>
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
    
<title>阿里妈妈采集规则添加</title>
<link href="__STATIC__/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css"/>
<style>
    .layui-form-label {
        width: 100px;
    }
    .layui-input-block {
        margin-left: 130px;
    }
</style>

</head>
<body>

<div class="page-container">
    <form class="layui-form" id="form-content" method="post" action="<?php echo url('collect/addHandle'); ?>">
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>采集名称</label>
            <div class="layui-input-block">
                <input type="text" name="collect_name"  placeholder="采集名称" autocomplete="off"
                       class="layui-input" value="">
                <div class="layui-form-mid layui-word-aux">采集名称的正确设计方便你以后管理，2-10字符之间</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>所属分类</label>
            <div class="layui-input-inline">
                <select name="cate_id">

                    <option value="">请选择分类</option>
                    <?php foreach($cateInfo as $cate): ?>
                    <option value="<?php echo $cate['id']; ?>"><?php echo $cate['cate_name']; ?></option>

                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>选库表</label>
            <div class="layui-input-inline">
                <input type="number" id="favorites_id" name="favorites_id"  placeholder="请填写非负整数"
                       autocomplete="off" class="layui-input" value="">
            </div>
            <button type="button" id="choose-favorites" class="layui-btn layui-btn-primary">选择选库表</button>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">选库名称</label>
            <div class="layui-input-block">
                <input type="text" id="favorites_name" name="favorites_name"  placeholder="选库名称" autocomplete="off"
                       class="layui-input" value="">
                <div class="layui-form-mid layui-word-aux">选库名称请根据阿里妈妈后台信息正确填写 否则不要填写，2-10字符之间</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>adzone_id</label>
            <div class="layui-input-block">
                <input type="number" name="adzone_id"  placeholder="请到阿里妈妈上找到正确的该网站的adzone_id"
                       autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所属活动</label>
            <div class="layui-input-inline">
                <select name="activity_id">
                    <option value="0">请选择活动</option>
                    <?php foreach($activityInfo as $activity): ?>
                    <option value="<?php echo $activity['id']; ?>"><?php echo $activity['activity_name']; ?></option>

                    <?php endforeach; ?>

                </select>
            </div>
        </div>
        <input type="hidden" name="type" value=""/>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button id="cate-submit" class="layui-btn" lay-submit lay-filter="cate-submit">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                <button type="button" onClick="add_cancel();" class="layui-btn layui-btn-primary">取消</button>
            </div>
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
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>

<!--<script type="text/javascript" src="__STATIC__/admin/static/js/ad.form.validate.js"></script>-->
<script>

    layui.use(['form'], function () {
        var form = layui.form();
        //监听提交
        form.on('submit(cate-submit)', function (data) {

            $('#form-content').validate({
                ignore: "",
                rules:{
                    'collect_name':{
                        required:true,
                        rangelength:[2,10]

                    },
                    'cate_id':{
                        required:true,
                        isIntGtZero:true
                    },
                    'favorites_id':{
                        required:true,
                        isIntGtZero:true
                    },
                    'adzone_id':{
                        required:true,
                    }
                },
                messages:{
                    'collect_name':{
                        required:'采集器规则名称必填',
                        rangelength:'采集器规则名称必须在2-10字符之间'

                    },
                    'cate_id':{
                        required:'分类id不能为空',
                        isIntGtZero:'分类id不合法'
                    },
                    'favorites_id':{
                        required:'选库表的ID不能为空',
                        isIntGtZero:'选库表的ID不合法'
                    },
                    'adzone_id':{
                        required:'adzone_id不能为空',

                    }
                },
                onkeyup:false,
                showErrors: function (errorMap, errorList) {
                    console.log(errorList);
                    var msg = "";
                    $.each(errorList, function (i, v) {
                        //msg += (v.message + "\r\n");
                        //在此处用了layer的方法,显示效果更美观
                        //layer.tips(v.message, v.element, { time: 2000 });
                        layer.msg(v.message);
                        return false;
                    });
                },
                submitHandler:function () {
                    x0p({
                        title: "是否添加此采集器？",
                        text: '请确认信息是否填写正确',
                        icon: 'info',
                        animationType: 'fadeIn',
                        buttons: [
                            {
                                type: 'cancel',
                                text: '取消',
                            },
                            {
                                type: 'info',
                                text: '确定',
                                showLoading: true
                            }
                        ]
                    }, function(button) {

                        if(button == 'info') {
                            var data = $('#form-content').serialize();
                            console.log(data);
                            var url = $('#form-content').attr('action');
                            $.ajax({
                                type:'post',
                                data:data,
                                dataType:'json',
                                url:url,
                                //contentType: false,
                                //processData: false,
                                success:function (res) {
                                    console.log(res);

                                    if (res.status ==='ok'){
                                        //x0p('信息添加成功', null, 'ok', false);
                                        x0p({
                                            title: "采集器规则添加成功",
                                            icon: 'ok',
                                            animationType: 'pop',
                                            buttons: [
                                                {
                                                    type: 'ok',
                                                    text: '确定'
                                                }
                                            ]
                                        }, function(button) {

                                            if(button == 'ok') {
                                             <?php if(isset($cateInfo)): ?>layer_close();parent.$('#msg').text('修改成功');
                                             <?php else: ?>location.reload();
                                              <?php endif; ?>

                                            }
                                        });

                                    }else{
                                        x0p('错误提示', res.errorMsg, 'error', false);
                                    }

                                },
                                error:function (res) {
                                    x0p('错误提示', '网络链接失败，请重新再试', 'error', false);

                                },
                                complete:function (res) {

                                }
                            })

                        }
                    });
                }
            });

            //return false;
        });

    });
</script>
<script type="text/javascript">
    function add_cancel() {
        layer_close();
    }
    $(function () {
        $('#choose-favorites').on('click',function () {
            layui.use(['layer'],function () {
                var layer = layui.layer;
                var index =layer.open({
                    type: 2,
                    area: ['600px', '360px'],
                    shadeClose: false, //点击遮罩不关闭
                    title:'选库列表',
                    resize:false,
                    content: '<?php echo url("collect/getAliSelection"); ?>',

                });
            });

        })
    });

</script>


</body>
</html>



