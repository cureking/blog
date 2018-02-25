<div class="row-fluid" id="nav">
	<div class="span8 offset2">
		<ul class="nav nav-pills">
			<li class="active">
				<a href="#">首页</a>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li class="dropdown-toggle">后台管理</li>
					<li><a href="<?= HTTPATH; ?>./user/add.php">添加管理员</a></li>
					<li><a href="<?= HTTPATH; ?>./user/userlist.php">管理员列表</a></li>

					<li class="dropdown-toggle">前台管理</li>
					<li><a href="<?= HTTPATH; ?>./homeuser/userlist.php">用户列表</a></li>
				</ul>
			</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['userInfo']['name']; ?>
					<b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?= HTTPATH; ?>./action.php?id=<?= $_SESSION['userInfo']['id']; ?>">修改密码</a></li>
					<li><a href="<?= HTTPATH; ?>./action.php?handler=logout">注销</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>