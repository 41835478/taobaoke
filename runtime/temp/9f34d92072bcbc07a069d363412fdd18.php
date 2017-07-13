<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"D:\wamp\www\taobaoke/application/admin\view\activity\add.html";i:1499860484;s:53:"D:\wamp\www\taobaoke/application/admin\view\base.html";i:1497357983;}*/ ?>
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
    
<title>活动添加</title>
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
    <form class="layui-form" id="form-content" method="post" action="<?php echo url('activity/addHandle'); ?>">
        <?php if(isset($activityInfo)): ?>
        <input type="hidden" name="activity_id" value="<?php echo $activityInfo['id']; ?>" />
        <?php endif; ?>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>活动名称</label>
            <div class="layui-input-block">
                <input type="text" name="activity_name"  placeholder="活动名称" autocomplete="off"
                       class="layui-input" value="<?php if(isset($activityInfo)): ?><?php echo $activityInfo['activity_name']; else: endif; ?>">
                <div class="layui-form-mid layui-word-aux">活动名称在2-6字符之间</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>排序值</label>
            <div class="layui-input-block">
                <input type="number" name="activity_sort"  placeholder="请填写非负整数"
                       autocomplete="off" class="layui-input" value="<?php if(isset($activityInfo)): ?><?php echo $activityInfo['sort']; else: endif; ?>">
                <div class="layui-form-mid layui-word-aux">数字越小排序越靠前</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否首页展示</label>
            <div class="layui-input-block">
                <input type="checkbox" name="activity_status"  value="1" <?php if(isset($activityInfo) && $activityInfo['status']==1): ?>checked<?php endif; ?>  lay-skin="switch"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">加入咚咚抢</label>
            <div class="layui-input-block">
                <input type="checkbox" name="is_qiang"  value="1" <?php if(isset($activityInfo) && $activityInfo['is_qiang']==1): ?>checked<?php endif; ?>  lay-skin="switch"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>开始日期</label>
            <div class="layui-input-block">
                <input class="layui-input"  id="start_time" name="start_time" value="<?php if(isset($activityInfo)): ?><?php echo $activityInfo['start_time']; else: endif; ?>" placeholder="广告位开始展示时间" autocomplete="off">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>结束日期</label>
            <div class="layui-input-block">
                <input class="layui-input" id="end_time" name="end_time" value="<?php if(isset($activityInfo)): ?><?php echo $activityInfo['end_time']; else: endif; ?>" placeholder="广告位结束展示时间" autocomplete="off">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button id="cate-submit" class="layui-btn" lay-submit lay-filter="activity-submit"><?php if(isset($activityInfo)): ?>立即修改<?php else: ?>立即提交<?php endif; ?></button>
                <button type="reset" class="layui-btn layui-btn-primary"><?php if(isset($activityInfo)): ?>恢复原来值<?php else: ?>重置<?php endif; ?></button>
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

    layui.use(['form','laydate'], function () {
        var form = layui.form();
        var laydate = layui.laydate;

        var start = {
            min: laydate.now(),
            max: '2019-06-16 23:59:59',
            istime: true,
            format: 'YYYY-MM-DD hh:mm', //日期格式
            istoday: false ,
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };

        var end = {
            min: laydate.now(),
            max: '2019-06-16 23:59:59',
            istime: true,
            format: 'YYYY-MM-DD hh:mm', //日期格式
            istoday: false ,
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        document.getElementById('start_time').onclick = function(){
            start.elem = this
            laydate(start);
        }
        document.getElementById('end_time').onclick = function(){
            end.elem = this
            laydate(end);
        }
        //监听提交
        form.on('submit(activity-submit)', function (data) {

            $('#form-content').validate({
                ignore: "",
                rules:{
                    'activity_name':{
                        required:true,
                        rangelength:[2,8]

                    },
                    'activity_sort':{
                        required:true,
                        digits:true
                    },
                    'start_time':{
                        required:true,
                    },
                    'end_time':{
                        required:true,
                    }
                },
                messages:{
                    'activity_name':{
                        required:'活动名称必填',
                        rangelength:'活动名称必须在2-6字符之间'

                    },
                    'activity_sort':{
                        required:'活动排序不能为空',
                        digits:'排序必须是非负整数'
                    },
                    'start_time':{
                        required:'开始时间不能为空'

                    },
                    'end_time':{
                        required:'结束时间不能为空'

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
                        title: "是否<?php if(isset($activityInfo)): ?>修改<?php else: ?>添加<?php endif; ?>此活动？",
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
                                            title: "活动<?php if(isset($activityInfo)): ?>修改<?php else: ?>添加<?php endif; ?>成功",
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
                                             <?php if(isset($activityInfo)): ?>layer_close();parent.$('#msg').text('修改成功');
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

</script>


</body>
</html>



