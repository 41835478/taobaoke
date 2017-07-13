<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wamp\www\taobaoke/application/home\view\skill\index.html";i:1499935317;s:52:"D:\wamp\www\taobaoke/application/home\view\base.html";i:1499945866;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <!--<link rel="stylesheet" href="__STATIC__/home/vender/css/normalize.css">-->
    <link rel="stylesheet" href="__STATIC__/home/vender/css/reset.css">
    <link rel="stylesheet" href="__STATIC__/fonts/iconfont.css">
    <link rel="stylesheet" href="__STATIC__/ui/css/layui.css">

    <!-- bootstap -->
    <!--<link rel="stylesheet" href="__STATIC__/home/vender/bootstrap-3.3.7/css/bootstrap.min.css">-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="__STATIC__/home/css/base.css">
    <link rel="stylesheet" href="__STATIC__/home/css/index.css">

    
<link rel="stylesheet" href="__STATIC__/home/css/qiang.css">
<title>领券直播-<?php echo \think\Config::get('system.website_title'); ?></title>
<meta name="description" content="领券直播，<?php echo \think\Config::get('system.website_description'); ?>"/>
<meta name="keywords" content="领券直播，<?php echo \think\Config::get('system.website_Keywords'); ?>"/>


</head>

<body>
<!-- top site-nav start-->
<div class="container-background">
    <div class="site-nav">
        <ul class="site-nav-left">
            <li class="site-nav-welcome">
                    <span class="welcome-text">
                        亲爱的，来加粉丝专享优惠QQ群:<?php echo \think\Config::get('system.qq_number'); ?>
                    </span>
            </li>
        </ul>
        <ul class="site-nav-right">
            <li class="site-nav-list">
                <a href="javascript:void(0);">内部优惠券</a>
            </li>
            <li class="site-nav-list">
                <a href="javascript:void(0);">实时更新</a>
            </li>
            <li class="site-nav-list">
                <a href="#">遇到购物问题？请联系我</a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>

</div>
<!-- site-nav end-->

<!-- header  start -->
<header class="container-fluid container-padding" style="background-color: #ffffff;">
    <div class="header-wrapper">
        <div class="header-wraper-inner">
            <!-- site logo -->
            <a class="header-logo" href="#">
                <img src="__STATIC__/home/images/logo-img.png" alt="" title=""/>
            </a>
            <!-- nav -list -->
            <div class="header-ul-inner">
                <ul class="header-nav">
                    <li class="header-nav-list">
                        <a class="header-nav-href <?php if(\think\Request::instance()->controller() == 'Index'): ?>active<?php endif; ?>"
                           href="<?php echo url('index/index'); ?>" target="_self">首页</a>
                    </li>
                    <li class="header-nav-list">
                        <a class="header-nav-href <?php if(\think\Request::instance()->controller() == 'Quan'): ?>active<?php endif; ?>"
                           href="<?php echo url('quan/index'); ?>" target="_self">领券直播</a>
                    </li>
                    <li class="header-nav-list">
                        <a class="header-nav-href <?php if(\think\Request::instance()->controller() == 'Skill'): ?>active<?php endif; ?>" href="<?php echo url('skill/index'); ?>" target="_self">咚咚抢</a>
                    </li>
                    <?php if(!empty($baseData['activityData'])): foreach($baseData['activityData'] as $activityData): ?>
                    <li class="header-nav-list">
                        <a class="header-nav-href <?php if(isset($urlInfo['aid'])): if(\think\Request::instance()->controller() != 'Quan'): if($urlInfo['aid'] == $activityData['id']): ?>active<?php endif; endif; endif; ?>"
                           href="<?php echo url('activity/index',['aid'=>$activityData['id']]); ?>" target="_self"><?php echo $activityData['activity_name']; ?></a>
                    </li>
                    <?php endforeach; else: endif; ?>
                    <li class="header-nav-list">
                        <form class="search-form" method="get" action="<?php echo url('search/index'); ?>">
                        <input type="text" class="input-search" name="keyword" value="" placeholder="请输入关键词"/>
                        <button type="submit" class="btn btn-search">搜索</button>
                        </form>>
                    </li>
                </ul>

            </div>

        </div>

    </div>

</header>

<!--header end  -->


<!-- 限时抢 背景图片 start -->
<div class="qiang-title-container">
    <div class="container qiang-nav">
        <ul class="qiang-nav-inner">
            <li class="on-qiang qiang-today <?php switch($time): case "0": ?>active<?php break; endswitch; ?>">
                <a href="<?php echo url('skill/index',['time'=>0]); ?>"><b>00:00</b><span></span></a>
            </li>
            <li class="on-qiang qiang-today <?php switch($time): case "8": ?>active<?php break; endswitch; ?>">
                <a href="<?php echo url('skill/index',['time'=>8]); ?>"><b>08:00</b><span></span></a>
            </li>
            <li class="on-qiang qiang-today <?php switch($time): case "12": ?>active<?php break; endswitch; ?>">
                <a href="<?php echo url('skill/index',['time'=>12]); ?>"><b>12:00</b><span></span></a>
            </li>
            <li class="on-qiang qiang-today <?php switch($time): case "16": ?>active<?php break; endswitch; ?>">
                <a href="<?php echo url('skill/index',['time'=>16]); ?>"><b>16:00</b><span></span></a>
            </li>
            <li class="on-qiang qiang-today <?php switch($time): case "20": ?>active<?php break; endswitch; ?>">
                <a href="<?php echo url('skill/index',['time'=>20]); ?>"><b>20:00</b><span></span></a>
            </li>

        </ul>

    </div>


</div>
<!-- 限时抢 背景图片 end -->
<ul class="container qiang-products-container">

    <?php if(!empty($baseData['skill'])): foreach($baseData['skill'] as $skill): ?>
    <div class="qiang-product-list">
        <div class="pro-left">
            <a href="<?php echo $skill['coupon_click_url']; ?>" target="_blank">
                <img src="<?php echo $skill['pict_url']; ?>" alt="<?php echo $skill['title']; ?>">
            </a>
        </div>
        <div class="pro-right">
            <p class="title">
                <a href="<?php echo $skill['coupon_click_url']; ?>" target="_blank"><?php echo $skill['title']; ?></a>
            </p>
            <div class="price-quan">

                <i class="icon-cny">¥</i>
                <span class="now-price"><?php echo $skill['zk_final_price']-$skill['coupon_info']; ?></span>
                <span class="title">券后价</span>
                <span class="old-price">
                        <i class="icon-cny">¥</i>
                        <?php echo $skill['zk_final_price']; ?></span>
                <div class="quan-show">
                    <em class="left"></em>
                    <span class="quan-name">券</span>
                    <span class="quan-price">￥<?php echo $skill['coupon_info']; ?></span>
                    <em class="right"></em>
                </div>
            </div>
            <div class="sale-num">
                <div class="sale-num-inner">
                    <i class="iconfont icon-renqun"></i>
                    <span>已有<b><?php echo $skill['volume']; ?></b>人购买</span>
                </div>
                <div class="clearfix">

                </div>

            </div>
            <div class="pinpai-tobuy">
                <div class="pinpai">
                    <div class="pinpai-logo">
                        <span><?php echo $skill['nick']; ?></span>
                        <img src="" alt="<?php echo $skill['nick']; ?>" title="<?php echo $skill['nick']; ?>">
                    </div>
                    <span class="pinpai-text">店铺</span>

                </div>
                <div class="tobuy">
                    <a href="<?php echo $skill['coupon_click_url']; ?>" target="_blank">去抢购</a>

                </div>
                <div class="clearfix">

                </div>

            </div>


        </div>

    </div>
    <?php endforeach; else: endif; ?>




    <div class="clearfix"></div>


</ul>


<!-- 限时抢 商品列表 end -->




<!-- footer start -->
<footer class="footer">
    <div class="inner-container">
        <h1>“感谢有你，我们的坚持才更有意义”</h1>
        <div class="copyright">
            <p><?php echo \think\Config::get('system.website_copyright'); ?> </p>
            <p><?php echo \think\Config::get('system.website_title'); ?> --- <?php echo \think\Request::instance()->server('http_host'); ?></p>

        </div>

    </div>

</footer>
<!-- footer end -->
<!--返回顶部按钮-->
<div class="scroll-to-top">
    <i class="iconfont icon-top"></i>
</div>
<div class="scroll-background"></div>


<!--_footer 作为公共模版分离出去-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="__STATIC__/home/vender/js/jquery-1.10.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- <script type="text/javascript" src="./static/vender/bootstrap-3.3.7/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="__STATIC__/home/vender/js/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="__STATIC__/home/vender/js/smoothscroll.js"></script>
<script type="text/javascript" src="__STATIC__/ui/layui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.scroll-to-top').click(function () {
            window.scroll({top: 0, left: 0, behavior: 'smooth'});
        });
//        $("img.lazy-load").lazyload();

    });

</script>
<?php if(!(empty(\think\Config::get('system.website_taodianjin')) || ((\think\Config::get('system.website_taodianjin') instanceof \think\Collection || \think\Config::get('system.website_taodianjin') instanceof \think\Paginator ) && \think\Config::get('system.website_taodianjin')->isEmpty()))): ?>
<?php echo \think\Config::get('system.website_taodianjin'); endif; ?>

<!--/_footer 作为公共模版分离出去-->

<script type="text/javascript" src="__STATIC__/home/js/base.js"></script>
<script type="text/javascript">
    $(function() {
        //滚动到顶部固定
        var top = $('.qiang-products-container').offset().top - 40;
        $(window).scroll(function(event) {
            /* Act on the event */
            if ($(window).scrollTop() > top) {
                $('.qiang-nav-inner').addClass('container-fix')
            } else {
                $('.qiang-nav-inner').removeClass('container-fix')
            }


        });

        //获取当前的时间
        var date = new Date();
        var hour = date.getHours();
        if (hour < 8) {

            $('.qiang-today:eq(0) span').addClass('on').text('正在抢购');
            $('.qiang-today:gt(0) span').removeClass('on').text('即将开始');

        }else if ( 8 <= hour && hour < 12) {


            $('.qiang-today:lt(2) span').addClass('on').text('正在抢购');
            $('.qiang-today:gt(1) span').removeClass('on').text('即将开始');


        }else if (12 <= hour && hour < 16) {

            $('.qiang-today:lt(3) span').addClass('on').text('正在抢购');
            $('.qiang-today:gt(2) span').removeClass('on').text('即将开始');


        }else if (16 <= hour && hour < 20) {

            $('.qiang-today:lt(4) span').addClass('on').text('正在抢购');
            $('.qiang-today:gt(3) span').removeClass('on').text('即将开始');

        }else if (20 <= hour && hour < 24) {

            $('.qiang-today span').addClass('on').text('正在抢购');
        }


    });
</script>

</body>
</html>


