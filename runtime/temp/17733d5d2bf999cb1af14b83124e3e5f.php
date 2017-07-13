<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wamp\www\taobaoke/application/admin\view\index\index.html";i:1499943720;s:53:"D:\wamp\www\taobaoke/application/admin\view\base.html";i:1497357983;}*/ ?>
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
    
<title>管理员后台</title>
<meta name="keywords" content="后台登录">
<meta name="description" content="后台登录">
<style>
    .Hui-aside .menu_dropdown dt .Hui-iconfont{
        color: #333;
        margin-right: 10px;
    }

</style>

</head>
<body>



<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"><a class="logo navbar-logo f-l mr-10 hidden-xs" href="">管理员后台</a>
            <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="">管理员后台</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs"></span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>

            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>超级管理员</li>
                    <li class="dropDown dropDown_hover">
                        <a href="#" class="dropDown_A"><?php echo session('username'); ?>   <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="<?php echo url('login/logout'); ?>">退出</a></li>

                        </ul>
                    </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"><a href="javascript:;" class="dropDown_A"
                                                                               title="换肤"><i class="Hui-iconfont"
                                                                                             style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">

        <!--系统设置 start-->
        <dl id="menu-system">
            <dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('system/index'); ?>" data-title="站点设置" href="javascript:void(0)">站点设置</a></li>
                    <li><a data-href="<?php echo url('system/index',['type'=>2]); ?>" data-title="API接口" href="javascript:void(0)">API接口</a></li>
                    <li><a data-href="<?php echo url('system/index',['type'=>3]); ?>" data-title="缓存清理" href="javascript:void(0)">缓存清理</a></li>

                </ul>
            </dd>
        </dl>
        <!--系统设置 end-->


        <!--商品管理 start-->
        <dl id="menu-product">
            <dt><i class="Hui-iconfont">&#xe620;</i> 商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('product/index'); ?>" data-title="商品管理" href="javascript:void(0)">商品管理</a></li>

                </ul>
            </dd>
        </dl>
        <!--商品管理 end-->

        <!--分类管理 start-->
        <dl id="menu-category">
            <dt><i class="Hui-iconfont">&#xe616;</i>分类管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('cate/index'); ?>" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
                </ul>
            </dd>
        </dl>


        <!--分类管理 end-->

        <!--采集管理 start-->
        <dl id="menu-caiji">
            <dt><i class="Hui-iconfont">&#xe613;</i>采集管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('collect/index'); ?>" data-title="阿里妈妈采集" href="javascript:void(0)">阿里妈妈采集</a></li>
                    <li><a data-href="<?php echo url('quan/index'); ?>" data-title="好券导购采集" href="javascript:void(0)">好券采集</a></li>
                </ul>
            </dd>
        </dl>
        <!--采集管理 end-->

        <!--采集管理 start-->
        <dl id="menu-ad">
            <dt><i class="Hui-iconfont">&#xe61a;</i>插件管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('ad/index'); ?>" data-title="广告管理" href="javascript:void(0)">广告管理</a></li>
                    <li><a data-href="<?php echo url('activity/index'); ?>" data-title="导航设置" href="javascript:void(0)">活动导航</a></li>
                </ul>
            </dd>
        </dl>
        <!--采集管理 end-->

    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" data-href="<?php echo url('index/welcome'); ?>">我的桌面</span>
                    <em></em></li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S"
                                                  href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a
                id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a>
        </div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="<?php echo url('index/welcome'); ?>"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前</li>
        <li id="closeall">关闭全部</li>
    </ul>
</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/ui/layui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/x0popup/x0popup.min.js"></script>

<!--/_footer 作为公共模版分离出去-->



<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">


</script>

<!--此乃百度统计代码，请自行删除-->
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--/此乃百度统计代码，请自行删除-->


</body>
</html>



