<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"D:\wamp\www\taobaoke/application/home\view\index\index.html";i:1501636038;s:52:"D:\wamp\www\taobaoke/application/home\view\base.html";i:1500414802;}*/ ?>
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

    
<link rel="stylesheet" href="__STATIC__/home/vender/Swiper-3.4.2/swiper.min.css">
<style>
    .swiper-container .swiper-slide a {
        display: block;
        background-position: center;
        background-size: cover;
        width: 100%;
        height: 100%;
        z-index: 9;
        cursor: pointer;

    }

    .get-more {
        text-align: center;
        min-width: 990px;
    }

    .get-more a {
        display: inline-block;
        line-height: 40px;
        font-size: 16px;
        color: #fff;
        background: #f8c;
        height: 40px;
        border-radius: 20px;
        margin-bottom: 20px;
        padding: 0 100px
    }

    .get-more a:hover {
        opacity: 0.9;

    }

</style>
<title><?php echo \think\Config::get('system.website_title'); ?></title>
<meta name="description" content="<?php echo \think\Config::get('system.website_description'); ?>"/>
<meta name="keywords" content="<?php echo \think\Config::get('system.website_Keywords'); ?>"/>



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
                        <input type="text" class="input-search" name="keyword" value="<?php if(!(empty($keyword_title) || (($keyword_title instanceof \think\Collection || $keyword_title instanceof \think\Paginator ) && $keyword_title->isEmpty()))): ?><?php echo $keyword_title; endif; ?>" placeholder="请输入关键词"/>
                        <button type="submit" class="btn btn-search">搜索</button>
                        </form>>
                    </li>
                </ul>

            </div>

        </div>

    </div>

</header>

<!--header end  -->


<!-- nav and carousel list start-->
<div class="navigation-carousel">
    <!-- navigation-cantainer -->
    <div class="navigation-cantainer">
        <ul class="navigation">
            <?php if(!empty($baseData['cate'])): foreach($baseData['cate'] as $cate): ?>
            <li class="category-item">
                <i class="iconfont <?php echo $cate['icon']; ?>"></i>
                <a href="<?php echo url('quan/index',['cid'=>$cate['id']]); ?>" target="_blank"><?php echo $cate['cate_name']; ?></a>
            </li>
            <?php endforeach; else: endif; ?>

        </ul>

    </div>
    <!-- carousel container -->
    <div class="carousel-container swiper-container">
        <div class="swiper-wrapper">
            <?php if(!empty($baseData['ad']['carousel'])): foreach($baseData['ad']['carousel'] as $ad): ?>
            <div class="swiper-slide">
                <a href="<?php echo $ad['link_url']; ?>" target="_blank"
                   style="background-image:url('__UPLOADS__/<?php echo $ad['image_url']; ?>');">
                    <!--<img src="__STATIC__/home/images/slider-1.jpg"/>-->
                </a>
            </div>
            <?php endforeach; else: endif; ?>
        </div>
        <!-- 分页器 -->
        <div class="swiper-pagination"></div>

        <!-- 导航按钮 -->
        <div class="swiper-button-prev swiper-button-white"></div>
        <div class="swiper-button-next swiper-button-white"></div>
    </div>
    <!-- activity container -->
    <div class="activity-container">
        <?php if(!empty($baseData['ad']['activity_1'])): ?>
        <div class="activity-item">
            <a href="<?php echo $baseData['ad']['activity_1'][0]['link_url']; ?>" target="_blank">
                <img src="__UPLOADS__/<?php echo $baseData['ad']['activity_1'][0]['image_url']; ?>" alt="">
            </a>

            <div class="activity-description">
                <h5><?php echo $baseData['ad']['activity_1'][0]['ad_name']; ?></h5>

                <div class="banner">
                    <p><a href="<?php echo $baseData['ad']['activity_1'][0]['link_url']; ?>" target="_blank"><?php echo $baseData['ad']['activity_1'][0]['ad_description']; ?></a>
                    </p>

                </div>
                <div class="banner-background"></div>

            </div>
            <div class="activity-background"></div>
        </div>
        <?php else: endif; if(!empty($baseData['ad']['activity_2'])): ?>
        <div class="activity-item">
            <a href="<?php echo $baseData['ad']['activity_2'][0]['link_url']; ?>" target="_blank">
                <img src="__UPLOADS__/<?php echo $baseData['ad']['activity_2'][0]['image_url']; ?>" alt="">
            </a>

            <div class="activity-description">
                <h5><?php echo $baseData['ad']['activity_2'][0]['ad_name']; ?></h5>

                <div class="banner">
                    <p><a href="<?php echo $baseData['ad']['activity_2'][0]['link_url']; ?>" target="_blank"><?php echo $baseData['ad']['activity_2'][0]['ad_description']; ?></a>
                    </p>

                </div>
                <div class="banner-background"></div>

            </div>
            <div class="activity-background"></div>
        </div>
        <?php else: endif; ?>

    </div>
    <div class="clearfix"></div>

</div>

<!-- nav and carousel list end-->

<!-- quan miaosha choose start -->
<section class="list-container second-kill">
    <div class="list-title skill-title">
        <h3>领券秒杀精选</h3>
    </div>
    <div class="list-description skill-description">
        <span>实时更新</span>
        <span>将优选、性价比做到极致</span>
        <span>商家内部券</span>
    </div>
    <div class="list-products skill-products">

        <?php if(!empty($baseData['skill'])): foreach($baseData['skill'] as $skill): ?>
        <div class="product-item skill-product-item">
            <a href="<?php echo url('detail/index',['id'=>$skill['id']]); ?>" target="_blank">
                <!-- <img class="lazy-load" data-original="<?php echo $skill['pict_url']; ?>" src="__STATIC__/home/images/lazy.jpg"
                      alt="<?php echo $skill['title']; ?>" title="<?php echo $skill['title']; ?>">-->
                <img class="lazy-load" data-original="<?php echo $skill['pict_url']; ?>" src="<?php echo $skill['pict_url']; ?>"
                     alt="<?php echo $skill['title']; ?>" title="<?php echo $skill['title']; ?>">
            </a>
            <p class="title">
                <a href="<?php echo url('detail/index',['id'=>$skill['id']]); ?>" target="_blank"><i
                        class="<?php switch($skill['user_type']): case "1": ?>icon-product-type tmall<?php break; case "0": ?>icon-product-type pinpai<?php break; default: endswitch; ?>"></i><?php echo $skill['title']; ?></a>
            </p>
            <div class="border-line">

            </div>
            <div class="quan-detail">
                <div class="quan-note">
                    <div class="quan-show">
                        <em class="left"></em>
                        <span class="quan-name">券</span>
                        <span class="quan-price">￥<?php echo $skill['coupon_info']; ?></span>
                        <em class="right"></em>
                    </div>
                    <div class="quan-time">
                        <span><strong><?php echo $skill['coupon_end_time']; ?></strong>过期</span>
                    </div>
                    <div class="clearfix">

                    </div>

                </div>
                <div class="quan-num">
                    <span>优惠券剩余<strong><?php echo $skill['coupon_remain_count']; ?></strong>张，已领取<strong><?php echo $skill['coupon_total_count']-$skill['coupon_remain_count']; ?></strong>张</span>
                </div>

            </div>
            <div class="quan-link">
                <div class="quan-price">
                    <span class="current-price"><?php echo floor($skill['zk_final_price']-$skill['coupon_info']); ?></span>
                    <div class="old-price">
                        <span>￥<?php echo floor($skill['zk_final_price']); ?></span>
                        <span>券后价</span>

                    </div>

                </div>

                <div class="to-buy">
                    <a href="<?php echo url('detail/index',['id'=>$skill['id']]); ?>" target="_blank">去下单</a>
                </div>

            </div>

        </div>
        <?php endforeach; else: endif; ?>


        <div class="clearfix">

        </div>

    </div>
</section>
<!-- quan miaosha choose end -->

<!-- 领券优惠直播 start -->
<section class="list-container realtime-products">
    <div class="list-title realtime-title">
        <h3>领券优惠直播</h3>
    </div>
    <div class="list-description realtime-description">
        <span>实时更新</span>
        <span>将优选、性价比做到极致</span>
        <span>商家内部券</span>
    </div>
    <div class="list-products realtime-products">
        <?php if(!empty($baseData['quan'])): foreach($baseData['quan'] as $quan): ?>
        <div class="product-item realtime-product-item">
            <a href="<?php echo url('detail/index',['id'=>$quan['id']]); ?>" target="_blank">
                <!--<img class="lazy-load" data-original="<?php echo $quan['pict_url']; ?>" src="__STATIC__/home/images/lazy.jpg"
                     alt="<?php echo $quan['title']; ?>" title="<?php echo $quan['title']; ?>">-->
                <img class="lazy-load" data-original="<?php echo $quan['pict_url']; ?>" src="<?php echo $quan['pict_url']; ?>"
                     alt="<?php echo $quan['title']; ?>" title="<?php echo $quan['title']; ?>">
            </a>
            <div class="price-quan">

                <i class="icon-cny">¥</i>
                <span class="now-price"><?php echo floor($quan['zk_final_price']-$quan['coupon_info']); ?></span>
                <span class="title">券后价</span>
                <span class="old-price">
                        <i class="icon-cny">¥</i>
                        <?php echo floor($quan['zk_final_price']); ?></span>
                <div class="quan-show">
                    <em class="left"></em>
                    <span class="quan-name">券</span>
                    <span class="quan-price">¥<?php echo $quan['coupon_info']; ?></span>
                    <em class="right"></em>
                </div>
            </div>
            <div class="border-line">

            </div>
            <p class="title"><a href="<?php echo url('detail/index',['id'=>$quan['id']]); ?>" target="_blank"><?php echo $quan['title']; ?></a></p>
            <div class="product-num-type">
                <div class="product-num">
                        <span class="product-sale-num">销量
                            <b><?php echo $quan['volume']; ?></b>
                        </span>
                </div>
                <div class="product-type">
                    <?php switch($quan['user_type']): case "1": ?>
                    <i class="icon-product-type tmall" title="天猫"></i>
                    <?php break; case "0": ?>
                    <i class="icon-product-type pinpai" title="淘宝"></i>
                    <?php break; default: endswitch; ?>

                </div>
                <div class="clearfix">
                </div>

            </div>

        </div>
        <?php endforeach; else: endif; ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- 领券优惠直播 end -->

<!--查看更多-->
<div class="get-more" style="text-align: center">
    <a href="<?php echo url('quan/index'); ?>">查看更多</a>
</div>




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

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/home/vender/Swiper-3.4.2/swiper-3.4.2.jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {


        var mySwiper = new Swiper('.swiper-container', {
            direction: 'horizontal',
            speed: 1000,
            loop: true,
            autoplay: 1500,//可选选项，自动滑动
            preventClicks: false,//默认true
            autoplayDisableOnInteraction: false, //用户操作swiper之后，是否禁止autoplay。默认为true：停止。
            // 如果需要分页器
            pagination: '.swiper-pagination',
            paginationClickable: true,

            // 如果需要前进后退按钮
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'

        });

    });


</script>


</body>
</html>


