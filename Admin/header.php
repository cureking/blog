<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/8/2018
 * Time: 0:55
 */
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
	<link rel="stylesheet" href="../Public/js/jquery.min.js">
	<!-- bootstrap js -->
	<link rel="stylesheet" href="../Public/js/bootstrap.min.js">
</head>
<body>
	<div class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header navbar-left">
				<a class="navbar-brand" href="#">
					<span class="glyphicon glyphicon-map-marker"></span> 蚀刻个人博客
				</a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><?php
                        if (isset($_SESSION['userInfo'])) {
                            echo $_SESSION['userInfo']['name'];
                        } else {
                            echo '游客';
                        }
                        ?>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
				<li class="active"><a href="../index.php">首页</a></li>
				<li><a href="#">后台</a></li>

				<li><a href="javascript:void(0)">个人中心（暂定）</a></li>

				<li><a href="./Public/action.php?handler=dologout">注销</a></li>

			</ul>
		</div>
	</div>
</body>

