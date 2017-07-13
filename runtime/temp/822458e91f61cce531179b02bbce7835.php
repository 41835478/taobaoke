<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\wamp\www\taobaoke\public/../application/home\view\detail\index.html";i:1499852700;s:62:"D:\wamp\www\taobaoke\public/../application/home\view\base.html";i:1499939810;}*/ ?>
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

    
<style>
    .activity-image {
        overflow: hidden;
        margin: 10px auto;
    }

    .activity-image img {
        width: 100%;
    }
</style>
<link rel="stylesheet" href="__STATIC__/home/vender/Swiper-3.4.2/swiper.min.css">
<link rel="stylesheet" href="__STATIC__/home/css/detail.css">
<link rel="stylesheet" href="__STATIC__/home/css/activity.css">

<title><?php if(empty($baseData['detail']['title']) || (($baseData['detail']['title'] instanceof \think\Collection || $baseData['detail']['title'] instanceof \think\Paginator ) && $baseData['detail']['title']->isEmpty())): ?>无法找到该商品<?php else: ?><?php echo $baseData['detail']['title']; endif; ?>-<?php echo \think\Config::get('system.website_title'); ?></title>
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
                <a href="#">设为首页</a>
            </li>
            <li class="site-nav-list">
                <a href="#">加入收藏</a>
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


<!-- activity image  start-->
<div class="container activity-image">
    <img src="https://img.alicdn.com/imgextra/i3/97012073/TB2Y9MifItnpuFjSZFKXXalFFXa_!!97012073.jpg" alt="">

</div>
<!-- activity image  end-->

<!-- product information start -->
<?php if(!empty($baseData['detail'])): ?>
<div class="container detail-container">
    <div class="image-container">
        <a href="javascript:void(0)" target="_blank">
            <img src="<?php echo $baseData['detail']['pict_url']; ?>"
                 title="<?php echo $baseData['detail']['pict_url']; ?>" alt="<?php echo $baseData['detail']['pict_url']; ?>"/>
        </a>

    </div>
    <div class="detail-info">
        <a class="detail-title">
            <?php switch($baseData['detail']['user_type']): case "1": ?>
            <i class="icon-product-type tmall" title="天猫"></i>
            <?php break; case "0": ?>
            <i class="icon-product-type taobao" title="淘宝"></i>
            <?php break; default: endswitch; ?>


            <span><?php echo $baseData['detail']['title']; ?></span>
        </a>
        <?php if(isset($baseData['detail']['item_description']) && !empty($baseData['detail']['item_description'])): ?>
        <div class="detail-reason">
            <span>推荐理由:</span>
            <span><?php echo $baseData['detail']['item_description']; ?></span>

        </div>
        <?php endif; ?>
        <div class="detail-price">
            <span class="detail-price-list">
                <b class="red">（独享价）</b>
                <b>券后价</b>
                <span class="price">
                    <b>¥</b>
                    <b><?php echo $baseData['detail']['zk_final_price']-$baseData['detail']['coupon_info']; ?></b>
                </span>

            </span>
            <span class="detail-price-list">
                <b>在售价</b>
                <span class="price">
                    <b>¥</b>
                    <b><?php echo $baseData['detail']['zk_final_price']; ?></b>
                </span>
            </span>
        </div>
        <div class="detail-quan-container">
            <div class="detail-quan">
                <span>已领券<b><?php echo $baseData['detail']['coupon_total_count']-$baseData['detail']['coupon_remain_count']; ?></b>张，手慢无</span>
                <span>已有<b><?php echo $baseData['detail']['volume']; ?></b>人购买</span>
            </div>
        </div>
        <div class="detail-to-buy">
            <div class="quan-price">
                <span>优惠券</span>
                <span><b>¥</b><?php echo $baseData['detail']['coupon_info']; ?></span>
            </div>
            <a class="link-to-buy" href="<?php echo $baseData['detail']['coupon_click_url']; ?>" target="_blank">
                领券购买
            </a>
        </div>
        <div class="product-share">
            <span>如果您喜欢此宝贝，记得分享给您的朋友，一起享优惠：</span>
            <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友">QQ好友</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a></div>
        </div>

    </div>
    <div class="product-association">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if(!empty($baseData['more'])): foreach($baseData['more'] as $more): ?>
                <div class="swiper-slide">
                    <div class="inner">
                        <a href="<?php echo url('detail/index',['id'=>$more['id']]); ?>" target="_self">
                            <img src="<?php echo $more['pict_url']; ?>" alt="<?php echo $more['title']; ?>" title="<?php echo $more['title']; ?>"/>
                        </a>
                        <span>券后价：¥<?php echo floor($more['zk_final_price']-$more['coupon_info']); ?></span>
                    </div>
                </div>
                <?php endforeach; else: endif; ?>

            </div>
        </div>
        <!-- 导航按钮 -->
        <div class="swiper-button">
            <a class="swiper-button-up">
                <i class="iconfont icon-up"></i>
            </a>
            <a class="swiper-button-down">
                <i class="iconfont icon-down"></i>
            </a>
        </div>

    </div>
    <div class="clearfix"></div>
</div>
<?php else: ?>
<div class="container detail-container">
    <h3 style="font-size: 20px;text-align: center;">无法找到该商品，或许你会喜欢</h3>
</div>

<?php endif; ?>



<!-- product information end -->

<!--相关推荐 start-->
<div class="container product-more">
    <div class="list-title">
        <h3>你可能还喜欢</h3>
    </div>
    <div class="list-description">
        <span>价格最低</span>
        <span>将性价比做到极致</span>
        <span>商家内部券</span>
    </div>
</div>

<!--相关推荐 end-->


<!--活动商品列表 start-->

<section class="list-container realtime-products">
    <div class="list-products realtime-products">

        <?php if(!empty($baseData['favorites'])): foreach($baseData['favorites'] as $quan): ?>
        <div class="product-item realtime-product-item">
            <div class="icon-quan">
                <span>券</span><span>¥<?php echo $quan['coupon_info']; ?></span>

            </div>
            <div class="product-content">
                <div class="image-link">
                    <a href="<?php echo url('detail/index',['id'=>$quan['id']]); ?>" target="_self">
                        <img class="lazy-load" data-original="<?php echo $quan['pict_url']; ?>" src="<?php echo $quan['pict_url']; ?>"
                             alt="<?php echo $quan['title']; ?>" title="<?php echo $quan['title']; ?>">
                    </a>
                    <div class="link-title">
                        <a class="link-list" href="<?php echo $quan['click_url']; ?>" target="_blank">直接购买
                        </a>
                        <a class="link-list" href="<?php echo $quan['coupon_click_url']; ?>" target="_blank">领券购买
                        </a>
                    </div>
                    <div class="link-background"></div>
                </div>

                <p class="volume-info">本月已有<span><?php echo $quan['volume']; ?></span>人购买</p>
                <a href="<?php echo url('detail/index',['id'=>$quan['id']]); ?>" target="_self" class="a-title">
                    <?php switch($quan['user_type']): case "1": ?>
                    <i class="tmall" title="天猫"></i>
                    <?php break; case "0": ?>
                    <i class="taobao" title="淘宝"></i>
                    <?php break; default: endswitch; ?>
                    <?php echo $quan['title']; ?></a>
                <div class="layui-progress" lay-showPercent="yes">
                    <div class="layui-progress-bar"
                         lay-percent="<?php echo round(($quan['coupon_total_count']-$quan['coupon_remain_count'])*100/$quan['coupon_total_count']); ?>%"></div>
                </div>
                <div class="price-info">
                    <div class="now-price price-list">
                        <p><b>¥</b><?php echo floor($quan['zk_final_price']-$quan['coupon_info']); ?></p>
                        <p>券后价</p>
                    </div>
                    <div class="quan price-list">
                        <p><b>¥</b><?php echo $quan['coupon_info']; ?></p>
                        <p>优惠券</p>
                    </div>
                    <div class="old-price price-list">
                        <p><b>¥</b><?php echo floor($quan['zk_final_price']); ?></p>
                        <p>原价</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="product-num-type">
                    <div class="product-num">
                        <span class="product-sale-num">销量
                            <b><?php echo $quan['volume']; ?></b>
                        </span>
                    </div>
                    <div class="product-type">
                        <?php switch($quan['user_type']): case "1": ?>
                        <i class="tmall" title="天猫"></i>
                        <?php break; case "0": ?>
                        <i class="pinpai" title="品牌"></i>
                        <?php break; default: endswitch; ?>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="border-line"></div>
                <p class="quan-num">优惠券剩余量<b><?php echo $quan['coupon_remain_count']; ?></b>/<?php echo $quan['coupon_total_count']; ?></p>
                <p class="seller-name">店铺名：<b><?php echo $quan['nick']; ?></b></p>

            </div>
        </div>
        <?php endforeach; else: ?>
        <div class="empty" style="text-align: center">
            <i class="iconfont icon-meiyougengduo" style="font-size: 180px;"></i>
            <h1 style="font-size: 30px">客官，暂时没有更多推荐哦</h1>
        </div>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
</section>

<!--活动商品列表- end-->

<!--分页-->
<div id="page"></div>




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

<script type="text/javascript" src="__STATIC__/home/js/base.js">
</script>
<script type="text/javascript" src="__STATIC__/home/vender/Swiper-3.4.2/swiper-3.4.2.jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var mySwiper = new Swiper('.swiper-container', {
            direction: 'vertical',
            speed: 1000,
            //loop: true,
            slidesPerView: 3,
            slidesPerGroup: 3,

            //autoplay: 5000,//可选选项，自动滑动
            //preventClicks: false,//默认true
            //autoplayDisableOnInteraction: false, //用户操作swiper之后，是否禁止autoplay。默认为true：停止。

            // 如果需要前进后退按钮
            nextButton: '.swiper-button-down',
            prevButton: '.swiper-button-up'

        });

    });


</script>
<script type="text/javascript">
    layui.use(['element'], function () {
        var element = layui.element();

    });
    var pict_url = '<?php if(!(empty($baseData['detail']['pict_url']) || (($baseData['detail']['pict_url'] instanceof \think\Collection || $baseData['detail']['pict_url'] instanceof \think\Paginator ) && $baseData['detail']['pict_url']->isEmpty()))): ?><?php echo $baseData['detail']['pict_url']; endif; ?>';
</script>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":pict_url,"bdStyle":"0","bdSize":"16"},"share":{"bdSize":16}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>


</body>
</html>


