<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/5/2018
 * Time: 4:00
 */
//开启会话跟踪
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Login</title>
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
	<div class="container">
		<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
			<div class="row-fluid" id="header">
				<div class="span8 offset2">
					<h1 class="font"><a href="../index.php">蚀刻-个人博客</a></h1>
					<p class="lead">欢迎来到博客后台登陆页！</p>
				</div>
			</div>

			<h3 class="page-header form">登录页面</h3>
			<form class="form-horizontal col-xs-8 col-xs-offset-2" action="./Public/action.php?handler=dologin" method="post">
				<div class="form-group input-group">
					<label class="input-group-addon" for="inputName">帐号</label>
					<input class="form-control" id="name" name="inputName" placeholder="Name">
				</div>

				<div class="form-group input-group">
					<label class="input-group-addon" for="inputPassword">密码</label>
					<input class="form-control" type="text" id="password" name="inputPassword" placeholder="Password">
				</div>

				<div class="form-group input-group">
					<label class="input-group-addon" for="identify_code">验证</label>
					<input class="form-control" type="text" id="code" name="identify_code" placeholder="CAPTCHA" style="width: 55%;">
					<img src="./Public/yzm.php" onclick="this.src='<?= HTTPATH; ?>../Public/yzm.php?id'+Math.random()"">
				</div>

				<div class="form-group">

					<div class="row">
						<div class="col-xs-12 col-sm-10 col-md-10 col-md-offset-1">
							<div class="btn-group-justified">
								<div class="btn-group">
									<button type="submit" class="btn btn-primary">立即登录</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</form>
		</div>
	</div>
    <?php include('./footer.html'); ?>
</body>
</html>






















