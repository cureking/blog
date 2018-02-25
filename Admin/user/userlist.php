<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/10/2018
 * Time: 22:25
 */

require '../init.php';
require LOCALPATH . '/Public/header.php';
require LOCALPATH . '/Public/nav.php';
//先查所有的用户数据
//1.准备SQL语句
$sql = 'selct * from ' . PIX . 'adminuser';
//2.发送执行
$userlist = query($sql);
var_dump($userlist);

//准备格式化数据
$status = array('超级管理员', '普通管理员', '普通用户');


?>
<div class="row-fluid" id="main">
	<div class="span8 offset2">
		<form class="form-search fr" action="./action.php?handler=search" method="post">
			<input type="text" name="name" class="input-medium" placeholder="Name">
			<button type="submit" class="btn">搜索</button>
		</form>

		<table class="table table-striped">
			<thead>
			<tr>
				<th>编号</th>
				<th>头像</th>
				<th>账号名</th>
				<th>真实姓名</th>
				<th>邮箱</th>
				<th>添加时间</th>
				<th>级别</th>
				<th>操作</th>
			</tr>
			</thead>
			<tbody>
            <?php
            foreach ($userlist as $key => $val):?>
				<tr>
					<td><?php $val['id']; ?></td>
					<td><img src="../Public/icon/<?php $val['icon']; ?>" width="50"></td>
					<td><?php $val['name']; ?></td>
					<td><?php $val['truename']; ?></td>
					<td><?php $val['email']; ?></td>
					<td><?php echo date('Y-m-d H:i:s', $val['addtime']); ?></td>
					<td><?php echo $status[$val['status']]; ?></td>
					<td>
						<!--如果当前登陆的用户级别，等于0（超级管理员）才输出 编辑和删除 并且同等级不输出-->
                        <?php if ($_SESSION['userInfo']['status'] == 0): ?>
                            <?php if ($val['status'] == 0): ?>

                            <?php else: ?>
								<a href="./edit.php?id=<?php echo $val['id']; ?>">编辑</a>
								<a href="./action.php?handler=userdel&id=<?php echo $val['id']; ?>">删除</a>
                            <?php endif; ?>
                        <?php endif; ?>
					</td>

				</tr>
            <?php endforeach; ?>
			</tbody>
		</table>
		<div class="pagination">
			<ul>

			</ul>
		</div>
	</div>
	<script>
	$( '.pagination ul a' ).unwrap( 'div' ).wrap( '<li></li>' );
	$( '.pagination ul span' ).wrap( '<li class="active"></li>' );
	</script>
</div>

<?php
require LOCALPATH . './Public/footer.html';
?>
