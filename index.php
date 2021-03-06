<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>蚀刻个人博客</title>
</head>

<link href="./Public/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./Public/css/common.css"/>
<link href="./Public/logo.ico" rel="shortcut icon"/>
<script src="./Public/plugin/jquery.min.js"></script>
<script src="./Public/plugin/bootstrap/js/bootstrap.min.js"></script>
<!--	<script type="text/javascript" src="../plugin/jquery.page.js"></script>-->
<!--	<script src="../js/common.js"></script>-->
<!--	<script src="../js/snowy.js"></script>-->

<body>

    <?php include("./Public/header.html"); ?>

	<div class="w_container">
		<div class="container">
			<div class="row w_main_row">
				<div class="col-lg-9 col-md-9 w_main_left">
					<!--滚动图开始-->
					<div class="panel panel-default">

						<div id="w_carousel" class="carousel slide w_carousel" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#w_carousel" data-slide-to="0" class="active"></li>
								<li data-target="#w_carousel" data-slide-to="1"></li>
								<li data-target="#w_carousel" data-slide-to="2"></li>
								<li data-target="#w_carousel" data-slide-to="3"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<img src="./Public/imgs/slider/slide1.jpg" alt="...">
									<div class="carousel-caption">
										<h3>First slide label</h3>
										<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
									</div>
								</div>
								<div class="item">
									<img src="./Public/imgs/slider/slide2.jpg" alt="...">
									<div class="carousel-caption">...</div>
								</div>
								<div class="item">
									<img src="./Public/imgs/slider/slide3.jpg" alt="...">
									<div class="carousel-caption">...</div>
								</div>
								<div class="item">
									<img src="./Public/imgs/slider/slide4.jpg" alt="...">
									<div class="carousel-caption">...</div>
								</div>
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#w_carousel" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#w_carousel" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>

					</div>

					<!--博主置顶-->
					<div class="panel panel-default contenttop">
						<a href="article_detail.html">
							<strong>博主置顶</strong>
							<h3 class="title">嫁人就嫁程序员</h3>
							<p class="overView">
								个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中。。。</p>
						</a>
					</div>

					<!--最新发布-->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">最新发布</h3>
						</div>

						<div class="panel-body">

							<!--文章列表开始-->
							<div class="contentList">

								<div class="panel panel-default">
									<div class="panel-body">

										<h4><a class="title" href="article_detail.html">wfyvv.com</a></h4>
										<p>
											<a class="label label-default">UUID</a>
											<a class="label label-default">java</a>
										</p>
										<p class="overView">个人网站正在建设中。。。</p>
										<p>
											<span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span>
											<span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:666</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:18</span><span class="count"><i class="glyphicon glyphicon-time"></i>2017-02-07</span>
										</p>

									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-body">
										<div class="contentleft">
											<h4><a class="title" href="article_detail.html">使用 Nginx 实现 tomcat、glassfish
													等 web 服务器负载均衡</a></h4>
											<p>
												<a class="label label-default">Nginx</a>
												<a class="label label-default">tomcat负载均衡</a>
											</p>
											<p class="overView">
												1.web服务器负载均衡简介web服务器负载均衡是指将多台可用单节点服务器组合成web服务器集群，然后通过负载均衡器将客户端请求均匀的转发到不同的单节点web服务器上，从而增加整个web服务器集群的吞吐量。</p>
											<p><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span>
												<span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:1003</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:2</span><span class="count"><i class="glyphicon glyphicon-time"></i>2017-01-16</span>
											</p>
										</div>
										<div class="contentImage">
											<div class="row">
												<a href="#" class="thumbnail w_thumbnail">
													<img src="./Public/imgs/slider/Aj6bieY.jpg" alt="...">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-body">

										<h4><a class="title" href="/post/41501569">32位的UUID生成方法总结</a></h4>
										<p>
											<a class="label label-default">UUID</a>
											<a class="label label-default">java</a>
										</p>
										<p class="overView">在学习过程中，我们常常会用到ID，那么有哪些常用的 ID 生成方式，你知道吗？通过
											java.util.UUID（终态类）生成</p>
										<p>
											<span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span>
											<span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:666</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:18</span><span class="count"><i class="glyphicon glyphicon-time"></i>2016-12-25</span>
										</p>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-body">
										<div class="contentleft">
											<h4><a class="title" href="/post/41501569">Java 工具类--学习篇</a></h4>
											<p>
												<a class="label label-default">java</a>
											</p>
											<p class="overView">
												链接一：http://www.open-open.com/lib/view/open1403600391905.html链接二：http://www.360doc.com/content/13/0520/11/1722212_286734557.shtml链接三：https://my.oschina.net/u/1453975/blog/529521链接四：http://blog.csdn.net......</p>
											<p><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span>
												<span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:456</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:58</span><span class="count"><i class="glyphicon glyphicon-time"></i>2016-10-01</span>
											</p>
										</div>
										<div class="contentImage">
											<!--<imgs src="imgs/slider/abs_img_no.jpg"/>-->
											<div class="row">
												<a href="#" class="thumbnail w_thumbnail">
													<img src="./Public/imgs/slider/abs_img_no.jpg" alt="...">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-body">
										<div class="contentleft">
											<h4><a class="title" href="/post/41501569">使用 Nginx 实现 tomcat、glassfish 等
													web 服务器负载均衡</a></h4>
											<p>
												<a class="label label-default">Nginx</a>
												<a class="label label-default">tomcat负载均衡</a>
											</p>
											<p class="overView">
												1.web服务器负载均衡简介web服务器负载均衡是指将多台可用单节点服务器组合成web服务器集群，然后通过负载均衡器将客户端请求均匀的转发到不同的单节点web服务器上，从而增加整个web服务器集群的吞吐量。</p>
											<p><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span>
												<span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:852</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:99</span><span class="count"><i class="glyphicon glyphicon-time"></i>2016-08-25</span>
											</p>
										</div>
										<div class="contentImage">
											<!--<imgs src="imgs/slider/67zmaej.png"/>-->
											<div class="row">
												<a href="#" class="thumbnail w_thumbnail">
													<img src="./Public/imgs/slider/67zmaej.png" alt="...">
												</a>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-body">
										<div class="contentleft">
											<h4><a class="title" href="/post/41501569">Java 工具类--学习篇</a></h4>
											<p>
												<a class="label label-default">java</a>
											</p>
											<p class="overView">
												链接一：http://www.open-open.com/lib/view/open1403600391905.html链接二：http://www.360doc.com/content/13/0520/11/1722212_286734557.shtml链接三：https://my.oschina.net/u/1453975/blog/529521链接四：http://blog.csdn.net......</p>
											<p><span class="count"><i class="glyphicon glyphicon-user"></i><a href="#">admin</a></span>
												<span class="count"><i class="glyphicon glyphicon-eye-open"></i>阅读:456</span><span class="count"><i class="glyphicon glyphicon-comment"></i>评论:58</span><span class="count"><i class="glyphicon glyphicon-time"></i>2016-10-01</span>
											</p>
										</div>
										<div class="contentImage">
											<!--<imgs src="imgs/slider/abs_img_no.jpg"/>-->
											<div class="row">
												<a href="#" class="thumbnail w_thumbnail">
													<img src="./Public/imgs/slider/abs_img_no.jpg" alt="...">
												</a>
											</div>
										</div>
									</div>
								</div>

							</div>
							<!--文章列表结束-->

						</div>
					</div>
				</div>

				<!--左侧开始-->
				<div class="col-lg-3 col-md-3 w_main_right">

					<!--站点公告-->
                    <?php include('./Public/sidebar/Site-Bulletin.html'); ?>

					<!--热门标签-->
                    <?php include('./Public/sidebar/hot-tag.php'); ?>

					<!--热门发布-->
                    <?php include('./Public/sidebar/hot-post.php'); ?>

					<!--友情链接-->
                    <?php include('./Public/sidebar/friendly-link.html'); ?>

					<!--微信公众号-->
                    <?php require('./Public/sidebar/official-account.html'); ?>

				</div>
			</div>
		</div>
	</div>

    <?php include("./Public/header.html"); ?>
</body>
<script type="text/javascript">
var $backToTopEle = $( '<a href="javascript:void(0)" class="Hui-iconfont toTop" title="返回顶部" alt="返回顶部" style="display:none">^</a>' ).appendTo( $( "body" ) ).click( function(){
	$( "html, body" ).animate( { scrollTop: 0 }, 120 );
} );
var backToTopFun = function(){
	var st = $( document ).scrollTop(),
		winh = $( window ).height();
	(st > 0) ? $backToTopEle.show() : $backToTopEle.hide();
	/*IE6下的定位*/
	if( !window.XMLHttpRequest )
	{
		$backToTopEle.css( "top", st + winh - 166 );
	}
};

$( function(){
	$( window ).on( "scroll", backToTopFun );
	backToTopFun();
} );
</script>

</html>