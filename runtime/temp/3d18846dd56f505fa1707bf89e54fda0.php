<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"D:\wamp\www\taobaoke\public/../application/admin\view\system\index.html";i:1499851238;s:63:"D:\wamp\www\taobaoke\public/../application/admin\view\base.html";i:1497357983;}*/ ?>
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
    
<title>系统设置页</title>
<style>
    .tabCon {
        display: block;
    }

</style>

</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	站点设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
    <div class="layui-tab layui-tab-brief" lay-filter="tab-system">
        <ul class="layui-tab-title">
            <li class="<?php if($data['type']==1): ?>layui-this<?php endif; ?>">基本设置</li>
            <li class="<?php if($data['type']==2): ?>layui-this<?php endif; ?>">API设置</li>
            <li class="<?php if($data['type']==3): ?>layui-this<?php endif; ?>">缓存清理</li>
            <li class="<?php if($data['type']==4): ?>layui-this<?php endif; ?>">其他设置</li>

        </ul>

        <?php switch($data['type']): case "1": ?>
        <div class="layui-tab-content">
            <form class="layui-form" id="form-content" method="post" action="<?php echo $data['method']; ?>" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="c-red">*</span>网站名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="website_title" value="<?php echo \think\Config::get('system.website_title'); ?>"  placeholder="控制在2-5字符之内以内" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="c-red">*</span>关键词</label>
                    <div class="layui-input-block">
                        <input type="text" name="website_Keywords" value="<?php echo \think\Config::get('system.website_Keywords'); ?>"  placeholder="每个关键词之间用英文,隔开,控制在50字符之内" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="c-red">*</span>描述</label>
                    <div class="layui-input-block">
                        <input type="text" name="website_description"  value="<?php echo \think\Config::get('system.website_description'); ?>" placeholder="最好是80个汉字左右，控制在160个字符以内" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="c-red">*</span>底部版权信息</label>
                    <div class="layui-input-block">
                        <input type="text" name="website_copyright" value="<?php echo \think\Config::get('system.website_copyright'); ?>"  placeholder="类似&copy; 2016 www.baidu.com" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">icp</label>
                    <div class="layui-input-block">
                        <input type="text" name="website_icp" value="<?php echo \think\Config::get('system.website_icp'); ?>"  placeholder="京ICP备00000000号" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">QQ群</label>
                    <div class="layui-input-block">
                        <input type="number" name="qq_number"  value="<?php echo \think\Config::get('system.qq_number'); ?>" placeholder="优惠券群分享的内部QQ群" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">统计代码</label>
                    <div class="layui-input-block">
                        <textarea name="website_count"  placeholder="统计网站流量的代码，请谨慎添加" class="layui-textarea"><?php echo \think\Config::get('system.website_count'); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">淘点金代码</label>
                    <div class="layui-input-block">
                        <textarea name="website_taodianjin"  placeholder="淘点金代码，请到阿里妈妈获取，请谨慎添加" class="layui-textarea"><?php echo \think\Config::get('system.website_taodianjin'); ?></textarea>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="system-submit">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>

        </div>

        <?php break; case "2": ?>
        <div class="layui-tab-content">
            <form class="layui-form" id="form-content" method="post" action="<?php echo $data['method']; ?>" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="c-red">*</span>App Key</label>
                    <div class="layui-input-block">
                        <input class="layui-input" type="number" name="app_key" value="<?php echo \think\Config::get('system.app_key'); ?>" placeholder="请到淘宝开放平台查看" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="c-red">*</span>App Key</label>
                    <div class="layui-input-block">
                        <input class="layui-input" type="text" name="app_secret" value="<?php echo \think\Config::get('system.app_secret'); ?>" placeholder="请到淘宝开放平台查看" autocomplete="off"/>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"><span class="c-red">*</span>Adzone Id</label>
                    <div class="layui-input-block">
                        <input class="layui-input" type="number" name="adzone_id" value="<?php echo \think\Config::get('system.adzone_id'); ?>" placeholder="请到淘宝开放平台查看,mm_memberId_siteId_adzoneId" autocomplete="off"/>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="system-submit">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>

        <?php break; case "3": ?>
        <div class="layui-tab-content">
            功能暂时没开放
        </div>

        <?php break; case "4": ?>
        <div class="layui-tab-content">
            功能暂时没开放
        </div>

        <?php break; endswitch; ?>
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
<!--<script type="text/javascript" src="__STATIC__/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>-->
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>

<script type="text/javascript">
    layui.use(['element','form'], function(){
        var element = layui.element();
        var form = layui.form();

        element.on('tab(tab-system)', function(data){

            window.location = '<?php echo url("system/index"); ?>'+'?type='+(data.index+1);
            //console.log(this); //当前Tab标题所在的原始DOM元素
            //console.log(data.home); //得到当前Tab的所在下标
            //console.log(data.elem); //得到当前的Tab大容器
        });
        //监听提交
        form.on('submit(system-submit)', function (data) {

            $('#form-content').validate({
                rules:{
                    'website_title':{
                        required:true,
                        rangelength:[2,5]

                    },
                    'website_Keywords':{
                        required:true,
                        maxlength:80

                    },
                    'website_description':{
                        required:true,
                        maxlength:160

                    },
                    'website_copyright':{
                        required:true,
                        maxlength:120
                    },
                    'app_key':{
                        required:true,
                        isIntGtZero:true
                    },
                    'app_secret':{
                        required:true
                    },
                    'adzone_id':{
                        required:true,
                        isIntGtZero:true
                    },
                    'qq_number':{
                        isIntGtZero:true,
                        rangelength:[5,20]
                    }

                },
                messages:{
                    'website-title':{
                        required:'网站名称必填',
                        rangelength: '网站名称必须在2-5字符之间'

                    },
                    'website-Keywords':{
                        required:'网站关键词必填',
                        maxlength: '网站关键词必须在80字符之内'
                    },
                    'website-description':{
                        required:'网站描述不能为空',
                        maxlength:'网站描述最好160字符之内'

                    },
                    'website-copyright':{
                        required:'网站版权信息不能为空',
                        maxlength:'网站版权信息最好120字符之内'
                    },
                    'app_key':{
                        required:'app_key不能为空',
                        isIntGtZero:'app_key格式不正确'
                    },
                    'app_secret':{
                        required:'app_secret不能为空'
                    },
                    'adzone_id':{
                        required:'adzone_id不能为空',
                        isIntGtZero:'adzone_id格式不正确'
                    },
                    'qq_number':{
                        isIntGtZero:'qq群号格式不对',
                        rangelength:'qq群号格式不对'
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
                        title: '是否保存此信息？',
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
                                        x0p({
                                            title: '信息修改成功',
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
                                                console.log(location.href);

                                                <?php if(isset($urlVisitType)): ?>
                                                 location.href = document.referrer;//重新载入上一页
                                                <?php else: ?>
                                                  location.reload();
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
<!--<script type="text/javascript" src="__STATIC__/admin/static/js/system.form.validate.js"></script>-->
<!--/请在上方写此页面业务相关的脚本-->


</body>
</html>



