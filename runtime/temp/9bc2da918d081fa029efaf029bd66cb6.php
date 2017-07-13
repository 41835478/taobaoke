<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"D:\wamp\www\taobaoke/application/admin\view\product\index.html";i:1499429560;s:53:"D:\wamp\www\taobaoke/application/admin\view\base.html";i:1497357983;}*/ ?>
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
    
<title>商品管理</title>
<style>
    .product-manage-list .box{
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        border-bottom: 1px;

        height: 40px;
        line-height: 40px;
        border-bottom: 1px #eeeeee solid;
    }
    .product-manage-list .title {
        display: block;
        font-size: 16px;

    }
    .product-manage-list .padding-20{
        padding-left: 20px;
    }
    .product-manage-list .font-style {
        color: #777;
        font-size: 12px;

    }
    .product-manage-list .tips-container{


    }
    .product-manage-list .btn-click{
        height: auto;
        line-height: 60px;

    }
    .layui-form-label {
        color: #777777;
        font-size: 12px;
        width: 150px;

    }

    .layui-input-block{
        margin-left: 180px;
    }
</style>

<script type="text/javascript">
    var deleteAll = '<?php echo url("product/deleteAll"); ?>';
    var deleteExpired = '<?php echo url("product/deleteExpired"); ?>';
    var deleteCondition = '<?php echo url("product/deleteCondition"); ?>';
</script>

</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="product-manage-list">
        <span class="title box">清空所有商品</span>
        <div class="tips-container box padding-20 font-style">
            <span>删除提示：</span>
            <span class="tips">(注：确认是否要删除，删除的数据不可恢复！)</span>
        </div>

        <div class="btn-click box padding-20 font-style">
            <span>清空所有商品：</span>
            <button class="layui-btn" onclick="showTips(deleteAll,1)">清空所有商品</button>
        </div>

    </div>
    <div class="product-manage-list">
        <span class="title box">清空过期商品</span>
        <div class="tips-container box padding-20 font-style">
            <span>删除提示：</span>
            <span class="tips">(注：确认是否要删除过期商品，删除的数据不可恢复！)</span>
        </div>

        <div class="btn-click box padding-20 font-style">
            <span>清空过期商品：</span>
            <button class="layui-btn" onclick="showTips(deleteExpired,2)">清空过期商品</button>
        </div>

    </div>

    <div class="product-manage-list">
        <span class="title box">条件删除商品</span>
        <div class="tips-container box padding-20 font-style" style="margin-bottom: 10px;">
            <span>删除提示：</span>
            <span class="tips">(注：确认是否要删除过期商品，删除的数据不可恢复！)</span>
        </div>


        <div class="form-container">
            <form class="layui-form" id="form-content" action="<?php echo url('product/handle'); ?>">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">优惠券结束时间范围</label>
                        <div class="layui-input-inline">
                            <input type="text" id="end_min" name="end_min" placeholder="优惠券结束时间范围" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid">-</div>
                        <div class="layui-input-inline">
                            <input type="text" id="end_max" name="end_max" placeholder="优惠券结束时间范围" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">关键词</label>
                    <div class="layui-input-block">
                        <input type="text" name="keyword" placeholder="请输入关键词" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">选择分类</label>
                    <div class="layui-input-inline">
                        <select name="cate_id">
                            <option value="">请选择分类</option>
                            <?php if(!empty($categoryData)): foreach($categoryData as $cate): ?>
                            <option value="<?php echo $cate['id']; ?>"><?php echo $cate['cate_name']; ?></option>
                            <?php endforeach; else: endif; ?>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">选择活动</label>
                    <div class="layui-input-inline">
                        <select name="activity_id">
                            <option value="">请选择活动</option>
                            <?php if(!empty($activityData)): foreach($activityData as $activity): ?>
                            <option value="<?php echo $activity['id']; ?>"><?php echo $activity['activity_name']; ?></option>
                            <?php endforeach; else: endif; ?>
                        </select>
                    </div>
                </div>


                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">销量范围</label>
                        <div class="layui-input-inline">
                            <input type="number" name="volume_min" placeholder="最小销量" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid">-</div>
                        <div class="layui-input-inline">
                            <input type="number" name="volume_max" placeholder="最大销量" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">清空商品</label>
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="clear-product">清除选择的商品</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/ui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/x0popup/x0popup.min.js"></script>

<!--/_footer 作为公共模版分离出去-->

<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script>


    //删除商品前的信息提示
    var showTips = function (url,type) {
        var title;
        var data = {};
        switch (type) {
            case 1 :
                title = '是否清空所有商品？';
                break;
            case 2:
                title = '是否删除所有过期商品？';
                break;
            case 3:
                title = '是否删除所有选择商品？';
                break;


        }
        x0p({
            title: title,
            text: '删除的数据不可恢复！',
            icon: 'info',
            animationType: 'fadeIn',
            buttons: [
                {
                    type: 'cancel',
                    text: '取消'
                },
                {
                    type: 'info',
                    text: '确定',
                    showLoading: true
                }
            ]
        }, function(button) {

            if(button == 'info') {
                if(parseInt(type) ===3){
                    data = $('#form-content').serialize();
                }

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
                                title: res.errorMsg,
                                icon: 'ok',
                                animationType: 'pop',
                                buttons: [
                                    {
                                        type: 'ok',
                                        text: '确定'
                                    }
                                ]
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
    };


    layui.use(['form', 'laydate'], function () {
        var form = layui.form();
        var laydate = layui.laydate;

        var start = {
            min: laydate.now(-365),
            max: laydate.now(365),
            istime: false,
            format: 'YYYY-MM-DD', //日期格式
            istoday: false ,
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };

        var end = {
            min: laydate.now(-365),
            max: laydate.now(365),
            istime: false,
            format: 'YYYY-MM-DD', //日期格式
            istoday: false ,
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        document.getElementById('end_min').onclick = function(){
            start.elem = this
            laydate(start);
        };
        document.getElementById('end_max').onclick = function(){
            end.elem = this
            laydate(end);
        };

        //监听提交
        form.on('submit(clear-product)', function (data) {
            $('#form-content').validate({
                ignore: '',
                rules:{
                    'end_min':{
                        dateISO:true
                    },
                    'end_max':{
                        dateISO:true

                    },
                    'keyword':{
                        rangelength:[1,15]
                    },
                    'volume_min':{
                        isIntGteZero:true,
                    },
                    'volume_max':{
                        isIntGteZero:true,
                    }

                },
                messages:{
                    'end_min':{
                        dateISO:'开始时间日期格式不对'

                    },
                    'end_max':{
                        dateISO:'开始时间日期格式不对'

                    },
                    'volume_min':{
                        isIntGteZero:'销量范围的格式不对'
                    },
                    'volume_max':{
                        isIntGteZero:'销量范围的格式不对'
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
                        layer.msg(v.message,{
                            time: 200000 //2秒关闭（如果不配置，默认是3秒）
                        });
                        return false;
                    });
                },
                submitHandler:function () {
                    showTips(deleteCondition,3);

                }
            });

            //return false;
        });

    });
</script>



</body>
</html>



