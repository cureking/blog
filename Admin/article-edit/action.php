<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/5/2018
 * Time: 3:48
 */

//引入配置文件

include '../../Public/php/init.php';
//接受处理方式
$a = isset($_GET['handler']) ? $_GET['handler'] : '';
switch ($a) {
    case 'doarticleedit':
//        echo 'OK';
//        echo $_POST['title'];
//        echo $_POST['content'];
//        echo $_POST['tag'];

        //对用户是否登陆做出判断，防止出现意外。（可以在文章编辑页面做该判断，如果没有登陆，则不可以进行文章编辑。
        //code..

        //数据处理
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_SESSION['userInfo']['name'];
        $addtime = time();
        $tag = $_POST['tag'];

        //权限判断，处理。防止出现意外（因为只有管理员和超管才可以编写文章。
        //code....

        //数据库链接，进行数据上传。
        $sql = 'insert into ' . PIX . "article(title,content,author,addtime,tag)values('{$title}','{$content}','{$author}','{$addtime}','{$tag}')";
        $result = execu($sql);
        if (isset($result) && $result > 0) {
            echo 'Article upload success!';
        }

        break;
}