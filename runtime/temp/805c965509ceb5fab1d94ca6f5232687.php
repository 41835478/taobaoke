<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"D:\wamp\www\taobaoke/application/home\view\search\index.html";i:1500452216;s:52:"D:\wamp\www\taobaoke/application/home\view\base.html";i:1500414802;}*/ ?>
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

    
<link rel="stylesheet" href="__STATIC__/home/css/list.css">
<title><?php if(!(empty($keyword_title) || (($keyword_title instanceof \think\Collection || $keyword_title instanceof \think\Paginator ) && $keyword_title->isEmpty()))): ?><?php echo $keyword_title; else: ?>所有宝贝<?php endif; ?>-<?php echo \think\Config::get('system.website_title'); ?></title>
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


<!-- activity image  start-->
<div class="activity-image">
    <img src="https://img.alicdn.com/imgextra/i3/97012073/TB2Y9MifItnpuFjSZFKXXalFFXa_!!97012073.jpg" alt="">

</div>
<!-- activity image  end-->

<!-- choose category and type start -->
<div class="choose-container">
    <div class="choose-list product-category">
        <span class="title">商品分类</span>
        <div class="list">
            <a class="<?php if(isset($urlInfo['cid']) && !is_numeric($urlInfo['cid'])): if(in_array(($urlInfo['cid']), explode(',',"all"))): ?>active<?php endif; endif; ?>" href="<?php echo url('search/index',['keyword'=>$urlInfo['keyword']]); ?>">全部优惠<span>（<?php echo $baseData['cate']['totalNum']; ?>）</span></a>
            <?php if(!empty($baseData['cate']['cateInfo'])): foreach($baseData['cate']['cateInfo'] as $cate): ?>
            <a class="<?php if(isset($urlInfo['cid']) && is_numeric($urlInfo['cid']) && ($urlInfo['cid'] == $cate['id'])): ?>active<?php endif; ?>" href="<?php echo url('search/index',['cid'=>$cate['id'],'keyword'=>$urlInfo['keyword']]); ?>"><?php echo $cate['cate_name']; ?><span>（<?php echo $cate['total']; ?>）</span></a>
            <?php endforeach; else: endif; ?>
        </div>
    </div>
    <div class="choose-list onsale-type">
        <span class="title">促销类型</span>
        <div class="list">
            <div class="checkbox-list">
                <a class="<?php if(isset($urlInfo['type']) && $urlInfo['type'] ==1): ?>active<?php endif; ?>" href="<?php echo url('search/index',['keyword'=>$urlInfo['keyword'],'cid'=>$urlInfo['cid'],'type'=>1]); ?>" target="_self">
                    <i class="iconfont icon-checkbox"></i>
                    天猫
                </a>
            </div>

            <?php if(!empty($baseData['activity'])): foreach($baseData['activity'] as $activity): ?>
            <div class="checkbox-list">
                <a class="<?php if(isset($urlInfo['aid']) && $urlInfo['aid'] == $activity['id']): ?>active<?php endif; ?>" href="<?php echo url('search/index',['keyword'=>$urlInfo['keyword'],'cid'=>$urlInfo['cid'],'aid'=>$activity['id']]); ?>" target="_self">
                    <i class="iconfont icon-checkbox"></i>
                    <?php echo $activity['activity_name']; ?>
                </a>
            </div>
            <?php endforeach; else: endif; ?>

            <div class="checkbox-list confirm">
                <!--<button class="btn btn-confirm" type="button" name="button">确定</button>-->
                <a href="<?php echo url('search/index',['cid'=>$urlInfo['cid']]); ?>" class="btn btn-reset" name="button">重置</a>
            </div>

        </div>

    </div>
</div>
<!-- choose category and type end -->

<!--product sort type start-->
<div class="product-sort-container">
    <ul class="product-sort-list">
        <li class="sort-list <?php if($urlInfo['sort'] == 'multiple'): ?>active<?php endif; ?>" >
            <a href="<?php echo url('search/index',array_merge($urlInfo,['sort'=>'multiple'])); ?>" data-sort="1">综合</a>
        </li>
        <li class="sort-list <?php if($urlInfo['sort'] == 'latest'): ?>active<?php endif; ?>">
            <a href="<?php echo url('search/index',array_merge($urlInfo,['sort'=>'latest'])); ?>" data-sort="2">最新</a>
        </li>
        <li class="sort-list <?php if($urlInfo['sort'] == 'volume'): ?>active<?php endif; ?>" >
            <a href="<?php echo url('search/index',array_merge($urlInfo,['sort'=>'volume'])); ?>" data-sort="3">销量</a>
        </li>
        <li class="sort-list <?php if($urlInfo['sort'] == 'quan'): ?>active<?php endif; ?>">
            <a href="<?php echo url('search/index',array_merge($urlInfo,['sort'=>'quan'])); ?>" data-sort="4">领券量</a>
        </li>
        <li class="sort-list <?php if($urlInfo['sort'] == 'price'): ?>active<?php endif; ?>" >
            <a href="<?php echo url('search/index',array_merge($urlInfo,['sort'=>'price'])); ?>" data-sort="5">价格</a>
        </li>
    </ul>
    <ul class="page-items">
        <li class="item">
            <a class="link-left" href="<?php echo url('search/index',array_merge($urlInfo,['page'=>$pageInfo['cur']-1])); ?>">
                <i class="iconfont icon-left"></i>
            </a>
        </li>
        <li class="item">
            <span><?php echo $pageInfo['cur']; ?></span>/<span><?php echo $pageInfo['totalPage']; ?></span>
        </li>
        <li class="item">
            <a class="link-right" href="<?php echo url('search/index',array_merge($urlInfo,['page'=>$pageInfo['cur']+1])); ?>">
                <i class="iconfont icon-right"></i>
            </a>
        </li>

    </ul>

</div>

<!--product sort type end-->



<!-- 领券优惠直播 start -->
<section class="list-container realtime-products">
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
                        <span class="product-sale-num"><?php if($urlInfo['sort'] =='quan'): ?>领券量<?php else: ?>销量<?php endif; ?>
                            <b><?php if($urlInfo['sort'] =='quan'): ?><?php echo $quan['coupon_total_count']-$quan['coupon_remain_count']; else: ?><?php echo $quan['volume']; endif; ?></b>
                        </span>
                </div>
                <div class="product-type">
                    <?php switch($quan['user_type']): case "1": ?>
                    <i class="icon-product-type tmall" title="天猫"></i>
                    <?php break; case "0": ?>
                    <i class="icon-product-type pinpai" title="淘宝"></i>
                    <?php break; default: endswitch; ?>

                    <!--
                   <i class="miaosha" title="秒杀"></i>
                    <i class="tmall" title="天猫"></i>
                    <i class="trans" title="运费险"></i>
                    <i class="you" title="优品"></i>
                    <i class="pinpai" title="品牌"></i>
                    <i class="haitao" title="海淘"></i>
                    -->
                </div>
                <div class="clearfix">
                </div>

            </div>

        </div>
        <?php endforeach; else: ?>
        <div class="empty" style="text-align: center">
            <i class="iconfont icon-meiyougengduo" style="font-size: 180px;"></i>
            <h1 style="font-size: 30px">客官，搜索不到东西哦</h1>
        </div>
        <?php endif; ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- 领券优惠直播 end -->

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

<script type="text/javascript">
    var page = '<?php echo $pageInfo["totalPage"]; ?>';
    var cur = '<?php echo $pageInfo["cur"]; ?>'
</script>
<script type="text/javascript" src="__STATIC__/home/js/base.js">
</script>
<script type="text/javascript">
    layui.use(['laypage'], function(){
        var laypage = layui.laypage;
        laypage({
            cont: 'page',
            pages: page,
            curr:cur,
            skin:'#f8c',
            skip: true,
            jump:function (obj, first) {
                if (!first) {
                    //点击跳页触发函数自身，并传递当前页：obj.curr
                    location.href= '<?php echo url("search/index",$urlInfo); ?>'+'?page='+obj.curr;
                }

            }
        });

    });
</script>

</body>
</html>


