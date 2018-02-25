<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/6/2018
 * Time: 9:04
 */
//引入配置文件

include './Public/init.php';
//忽略页面中的PHP报错信息
error_reporting(E_ALL || ~E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Admin</title>
	<!-- bootstrap css -->
	<link rel="stylesheet" href="../Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Public/css/style.css">
	<!-- 响应式特性 css -->
	<link rel="stylesheet" href="../Public/css/bootstrap-responsive.css">
	<!-- jquery -->
	<script src="../Public/js/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script src="../Public/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include('./header.php') ?>
	<div class="container">
		<div class="row-fluid" id="header">
			<div class="span8 offset2">
				<h1 class="font"><a href="../index.php">蚀刻-个人博客</a></h1>
				<p class="lead">欢迎来到博客后台！</p>
			</div>
		</div>

		<div class="row-fluid input-lg" id="login">
			<div class="span8 offset2">
				<form class="form-horizontal" action="./Public/action.php?handler=dologin" method="post">
					<h3>博客后台</h3>
					<div class="control-group">
						<h4>用户管理</h4>
						<!--                            <button type="button" class="btn btn-large btn-default" onclick="window.location.href='http://www.baidu.com/'">-->
						<button type="button" class="btn btn-large btn-default" onclick="window.open('./register.php','_black')">
							添加用户
						</button>
						<label class="checkbox">
							&nbsp;
						</label>
					</div>
					<div class="control-group">
						<div class="controls">
							<h4>文章管理</h4>
							<button type="button" class="btn btn-large btn-default" onclick="window.open('./article-edit/php/edit.php','_black')">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;创建文章&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</button>
							<button type="button" class="btn btn-large btn-primary">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;文章列表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</button>
                            <?php include('./article-edit/article-list.php'); ?>
							<label class="checkbox">
								&nbsp;
							</label>
						</div>
						<div class="control-group">
							<div class="controls">
								<h4>站务管理</h4>

								<button type="button" class="btn btn-large btn-primary">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;轮播图片&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</button>
								<button type="button" class="btn btn-large btn-primary">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;置顶文章&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</button>
								<button type="button" class="btn btn-large btn-primary">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;站务公告&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</button>
								<button type="button" class="btn btn-large btn-primary">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;友情链接&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</button>
								<label class="checkbox">
									&nbsp;
								</label>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
    <?php
    include './footer.html';
    ?>
</body>
</html>


