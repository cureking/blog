<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/10/2018
 * Time: 21:43
 */

//引入配置文件

include './init.php';
//接受处理方式
$a = isset($_GET['handler']) ? $_GET['handler'] : '';

switch ($a) {
    case 'add':
        //var_dump($_POST);
        //var_dump($_SESSION);
        if ($_SESSION['userInfo']['status'] != 0) {
            //不等于0，也就是说，不是超管，就不能让他添加用户
            echo '<script>alert("对不起，您没有超级管理员权限！");window.history.go(-1);</script>';
            exit;
        }

        if ($_POST['password'] != $_POST['repassword']) {
            //表示两次密码不一致
            echo '<script>alert("两次密码不一致。请重新输入！");window.history.go(-1);</script>';
            exit;
        }

        //准备存储图片的目录
        $savePath = '../Public/icon/';

        //允许上传的类型
        $allowType = array('image/jepg', 'image/jpg', 'image/png', 'image/gif');

        //1.调用上传函数
        //文件上传，form表单必须加上这个属性. enctype="multipart/form-data";
        $upload = upload('myfile', $savePath, $allowType);
        //var_dump(//$upload);
        //判断上传之后的状态，如果成功的话，status值为TRUE
        if ($upload['status']) {
            //如果有上传成功，就返回上传的文件名
            $picPath = $upload['imageName'];  //获取上传后的文件名

            //文件路径 拼接上 上传后的文件名
            $picPath = $savePath . $picPath;

            //得到图片，进行缩放
            $zoomSmallName = zoom($picPath, $savePath, 100, 100);

            //将上传的大图给删除掉
            unlink($picPath);
        }
        echo '大图是' . $picPath;
        echo '<br>';
        echo '小图是' . $zoomSmallName;

        //1.接收用户输入的数据
        //永远不要相信用户
        $name = htmlspecialchars($_POST['name']);
        $pass = md5($_POST['password']);
        $truename = htmlspecialchars($_POST['truename']);
        $email = htmlspecialchars($_POST['email']);
        $icon = $zoomSmallName;
        $status = $_POST['status'];
        $addtime = time();

        //可以验证上述数据。
        //2.准备SQL语句
        $sql =
            'insert into'
            . PIX .
            "adminuser (
            'name','pass','truename','email','icon','status','addtime') 
            values (
            '{$name}','{$pass}','{$truename}','{$email}','{$icon}','{$status}','{$addtime}')";

        //echo $sql
        //执行插入，返回ID
        $insertId = execu($sql);
        var_dump($insertId);

        if ($insertId) {
            echo '添加管理员成功。3秒后进行跳转。';
            echo '<meta http-equiv="refresh" content="2;url=./userlist.php">';
        } else {
            echo '<script>alert("添加失败。请重新输入后再试！");window.history.go(-1);</script>';
            exit;
        }

        break;
    default:
        # code...
        break;
}