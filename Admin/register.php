<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/22/2018
 * Time: 2:32
 */

//开启会话跟踪
session_start();

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Register</title>
	<!-- bootstrap css -->
	<link rel="stylesheet" href="../Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Public/css/style.css">
	<!-- 响应式特性 css -->
	<link rel="stylesheet" href="../Public/css/bootstrap-responsive.css">
	<!-- jquery -->
	<script src="../Public/js/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script src="../Public/js/bootstrap.min.js"></script>

	<style>
		.form-control{
			margin-left : 5%;
			width       : 65%;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
			<div class="row-fluid" id="header">
				<div class="span8 offset2">
					<h1 class="font"><a href="../index.php">蚀刻-个人博客</a></h1>
					<p class="lead">欢迎来到蚀刻博客注册页面！</p>
				</div>
			</div>
			<h3 class="page-header form">注册页面</h3>
			<form class="form form-horizontal" action="./Public/action.php?handler=doregister" method="post">
				<div class="form-group">
					<!--用户名-->
					<label class="control-label col-xs-3" for="registerName">用户名</label>
					<input class="col-xs-9 form-control" type="text" id="name" name="registerName" placeholder="New UserName">
					<!--						<span class="help-block">账号由6-15位字母，数字构成</span>-->
				</div>
				<div class="form-group">
					<!--密码-->
					<label class="control-label col-xs-3" for="registerPassword">密码</label>
					<input class="col-xs-9 form-control" type="text" id="password" name="registerPassword" placeholder="Password">
				</div>
				<div class="form-group">
					<!--确认密码-->
					<label class="control-label col-xs-3" for="registerRePassword">确认密码</label>
					<input class="col-xs-9 form-control" type="text" id="repassword" name="registerRepassword" placeholder="Re Password">
				</div>

                <?php
                if (isset($_SESSION['userInfo']) && $_SESSION['userInfo']['status'] == 0) {
                    echo '
				<div class="form-group has-warning">
					<!--用户权限：下拉框-->
					<label class="control-label col-xs-3" for="permission">用户权限</label>
					<select class="col-xs-9 form-control" id="permission" name="registerPermission">
						<option value="">--请选择--</option>
						<option value="1">管理员</option>
						<option value="2">普通用户</option>
					</select>
				</div>
				';
                }
                ?>
				<div class="form-group">
					<!--真实姓名-->
					<label class="control-label col-xs-3" for="trueName">真实姓名</label>
					<input class="col-xs-9 form-control" type="text" id="trueName" name="registerTruename" placeholder="NickName">
				</div>
				<div class="form-group">
					<!--邮箱地址-->
					<label class="control-label col-xs-3" for="email">邮箱地址</label>
					<input class="col-xs-9 form-control" type="text" id="email" name="registerEmail" placeholder="Email">
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="registerCode">验证</label>
					<input class="col-xs-5 form-control" type="text" id="code" name="registerCode" placeholder="CAPTCHA" style="width: 30%">
					<img class="col-xs-4" src="./Public/yzm.php" onclick="this.src='../Public/yzm.php?id'+Math.random()" style="height: 34px;">
				</div>

				<!--				<div class="form-group input-group">-->
				<!--					<label class="input-group-addon" for="identify_code">验证</label>-->
				<!--					<input class="form-control" type="text" name="code" id="identify_code" placeholder="CAPTCHA" style="width: 55%;">-->
				<!--					<img src="./Public/yzm.php" onclick="this.src='../Public/yzm.php?id'+Math.random()"">-->
				<!--				</div>-->

				<div class="form-group">
					<!--提交按钮-->

					<div class="col-xs-9 col-xs-offset-3">

						<div class="btn-group-justified">
							<div class="btn-group">
								<button class="btn btn-primary" type="submit">提交注册</button>
							</div>
							<div class="btn-group">
								<button class="btn btn-default" type="reset">重置表单</button>
							</div>
						</div>

					</div>

				</div>
			</form>
		</div>
	</div>
    <?php
    include './footer.html';
    ?>
</body>
</html>