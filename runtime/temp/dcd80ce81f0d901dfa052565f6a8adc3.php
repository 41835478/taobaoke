<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"D:\wamp\www\taobaoke\public/../application/admin\view\cate\add.html";i:1498820217;s:63:"D:\wamp\www\taobaoke\public/../application/admin\view\base.html";i:1497357983;}*/ ?>
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
    
<title>广告添加</title>
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
    <form class="layui-form" id="form-content" method="post" action="<?php echo url('cate/addHandle'); ?>">
        <?php if(isset($cateInfo)): ?>
        <input type="hidden" name="cate_id" value="<?php echo $cateInfo['id']; ?>" />
        <?php endif; ?>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>分类名称</label>
            <div class="layui-input-block">
                <input type="text" name="cate_name"  placeholder="分类名称" autocomplete="off"
                       class="layui-input" value="<?php if(isset($cateInfo)): ?><?php echo $cateInfo['cate_name']; else: endif; ?>">
                <div class="layui-form-mid layui-word-aux">分类名称在2-6字符之间</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>排序值</label>
            <div class="layui-input-block">
                <input type="number" name="cate_sort"  placeholder="请填写非负整数"
                       autocomplete="off" class="layui-input" value="<?php if(isset($cateInfo)): ?><?php echo $cateInfo['sort']; else: endif; ?>">
                <div class="layui-form-mid layui-word-aux">数字越小排序越靠前</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所属淘宝分类</label>
            <div class="layui-input-inline">
                <select name="taobao_category">
                    <option value="">请选择淘宝分类</option>
                    <?php foreach($taobaoCategory as $taobaoKey =>$taobaoCategory): ?>
                    <option <?php if(isset($cateInfo) && $cateInfo['taobao_category']== $taobaoKey): ?>selected<?php endif; ?> value="<?php echo $taobaoKey; ?>"><?php echo $taobaoCategory; ?></option>
                    <?php endforeach; ?>
                    <option value="other">其他</option>

                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否首页展示</label>
            <div class="layui-input-block">
                <input type="checkbox" name="cate_status"  value="1" <?php if(isset($cateInfo) && $cateInfo['status']==1): ?>checked<?php endif; ?>  lay-skin="switch"/>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>标签</label>
            <div class="layui-input-block">
                <input type="text" name="cate_tags"  placeholder="分类标签" autocomplete="off"
                       class="layui-input" value="<?php if(isset($cateInfo)): ?><?php echo $cateInfo['tags']; else: endif; ?>">
                <div class="layui-form-mid layui-word-aux">标签请以|分隔,长度不能超过80字符</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span class="c-red">*</span>分类图标</label>
            <div class="layui-input-block">
                <input type="text" name="cate_icon"  placeholder="分类图标，如icon-renqun" autocomplete="off"
                       class="layui-input" value="<?php if(isset($cateInfo)): ?><?php echo $cateInfo['icon']; else: endif; ?>">
                <div class="layui-form-mid layui-word-aux">分类图标一定要用font-class来表示，可以访问http://www.iconfont.cn/寻找相应的在线并且正确的引用，否则正常显示无法显示,font-class字体链接可以在系统设置里面来设置</div>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button id="cate-submit" class="layui-btn" lay-submit lay-filter="cate-submit"><?php if(isset($cateInfo)): ?>立即修改<?php else: ?>立即提交<?php endif; ?></button>
                <button type="reset" class="layui-btn layui-btn-primary"><?php if(isset($cateInfo)): ?>恢复原来值<?php else: ?>重置<?php endif; ?></button>
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
                    'cate_name':{
                        required:true,
                        rangelength:[2,6]

                    },
                    'cate_sort':{
                        required:true,
                        digits:true
                    },
                    'taobao_category':{
                        required:true,
                    },
                    'cate_tags':{
                        required:true,
                        maxlength:80
                    },
                    'cate_icon':{
                        required:true,
                        maxlength:30
                    }
                },
                messages:{
                    'cate_name':{
                        required:'分类名称必填',
                        rangelength:'分类名称必须在2-6字符之间'

                    },
                    'cate_sort':{
                        required:'分类排序不能为空',
                        digits:'排序必须是非负整数'
                    },
                    'taobao_category':{
                        required:'淘宝所属分类不能为空'

                    },
                    'cate_tags':{
                        required:'标签不能为空',
                        maxlength:'标签不能超过80个字符'
                    },
                    'cate_icon':{
                        required:'分类图标类名不能为空',
                        maxlength:'请确认你的类名是否填写错误'
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
                        title: "是否<?php if(isset($cateInfo)): ?>修改<?php else: ?>添加<?php endif; ?>此分类？",
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
                                            title: "分类<?php if(isset($cateInfo)): ?>修改<?php else: ?>添加<?php endif; ?>成功",
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

</script>


</body>
</html>



