<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/5/2018
 * Time: 3:48
 */

//引入配置文件

include './init.php';
//接受处理方式
$a = isset($_GET['handler']) ? $_GET['handler'] : '';
switch ($a) {
    case 'dologin':
        //echo 'ok';
        $code = $_POST['identify_code'];
        //获取真实验证码
        $yzm = $_SESSION['code'];

        //echo $code;
        //1判断验证码
        if (strtolower($code) != strtolower($yzm)) {
            echo '<h2>验证码错误！</h2>';
            echo '<meta http-equiv="refresh" content="2;url=../login.php?errno=1">';
            exit;
        }
        //接受用户输入的账号密码
        $name = $_POST['inputName'];
        $pass = $_POST['inputPassword'];

        //根据用户输入的数据，去比对数据库内的数据
        $sql = 'select * from ' . PIX . "adminuser where `name` = '{$name}'";

        //执行查询
        $userInfo = @query($sql)[0];    //添加@，可以不报错。
//        var_dump($userInfo);
        if (count($userInfo) > 0) {
            if ($userInfo['pass'] == md5($pass)) {
                //账号 密码正确，登陆成功。
                $_SESSION['userInfo'] = $userInfo;
                echo '<h2>OK</h2>';
                echo '<meta http-equiv="refresh" content="2;url=../admin.php">';
            } else {
                echo '<h2>密码不正确</h2>';
                echo '<meta http-equiv="refresh" content="2;url=../login.php?errno=3">';
            }
        } else {
            echo '<h2>用户名不正确</h2>';
            echo '<meta http-equiv="refresh" content="2;url=../login.php?errno=4">';
        }
        break;

    case 'dologout':
        echo 'dologout';
        //退出注销，本质是将session内的数据销毁
        unset($_SESSION['userInfo']);
        // session_destroy();
        echo '<h2>注销成功</h2>';
        echo '<meta http-equiv="refresh" content="2;url=../login.php">';
        break;

    case 'doregister':
        $registerCode = $_POST['registerCode'];
        //获取真实验证码
        $yzm = $_SESSION['code'];
        //print_r($_POST);
        //echo $code;
        //1判断验证码
        if (strtolower($registerCode) != strtolower($yzm)) {
            echo $registerCode;
            echo $yzm;
            echo '<h2>验证码错误！</h2>';
            echo '<meta http-equiv="refresh" content="2;url=../register.php?errno=1">';
            exit;
        }
        //接受用户输入的账号密码
        $registerName = $_POST['registerName'];
        $registerPass = $_POST['registerPassword'];
        $registerStatus = isset($_POST['registerPermission']) ? $_POST['registerPermission'] : 2;
        $registerRepass = $_POST['registerRepassword'];
        $registerTruename = $_POST['registerTruename'];
        $registerEmail = $_POST['registerEmail'];

        //echo $_POST['registerPermission'];


        //再一次对权限确认
        if ($registerStatus == 1) {
            if (isset($_SESSION['userInfo']) && $_SESSION['userInfo']['status]'] == 0) {

            } else {
                echo "<h2>{$_POST['status']},you don't have permission to do it!</h2>";
                echo '<meta http-equiv="refresh" content="2;url=../register.php?errno=2">';
                exit;
            }
        } elseif ($registerStatus == 2) {

        } else {
            echo "<h2>System error!</h2>";
            echo '<meta http-equiv="refresh" content="2;url=../register.php?errno=2">';
            exit;
        }


        //判断提交的数据是否合法
        //判断

        //先判断用户名是否重复
        $sql = 'select * from ' . PIX . "adminuser where `name` = '{$registerName}'";
        $userInfo = @query($sql)[0];
        if (count($userInfo) > 0) {
            echo '<h2>该用户名已经存在！</h2>';
            echo '<meta http-equiv="refresh" content="2;url=../register.php?errno=3">';
            exit;
        }


        //数据处理
        $addtime = time();
        $registerPass = md5($registerPass);

        //数据库链接，处理。

        $sql = 'insert into ' . PIX . "adminuser(name,pass,status,truename,email,addtime)values('{$registerName}','{$registerPass}','{$registerStatus}','{$registerTruename}','{$registerEmail}','{$addtime}')";
        $result = execu($sql);
        if (isset($result) && $result > 0) {
            echo 'Register success!';
        }

        //如果是已经登录的状态，则保持原有状态。（因为新注册的账号权限必然低于原本的账户权限）
        //如果是游客注册，则自动添加新账户状态。
        echo $_SESSION['userInfo'];
        echo $registerName;
        if (!isset($_SESSION['userInfo'])) {
            //本地添加无法获取id，当然id不是必须的。（我绝不会说是我想偷懒）
            $sql = 'select * from ' . PIX . "adminuser where `name` = '{$registerName}'";
            $userInfo = @query($sql)[0];    //添加@，可以不报错。
            var_dump($userInfo);
            $_SESSION['userInfo'] = $userInfo;
        }

        echo '<meta http-equiv="refresh" content="2;url=../admin.php">';
        break;

    default:
        #code...
        break;
}
?>