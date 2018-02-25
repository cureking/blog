<?php

//设置字符集
header("Content-Type:text/html;charset=utf-8");

//图宽
$width = 150;
//图高
$height = 40;
//验证码的长度
$length = 4;
//字体样式
$fontstyle = './font/MSYHBD.TTF';

//字体大小
$fontsize = 20;

//1.创建画布
$img = imagecreatetruecolor($width, $height);

//2.分配颜色
$bgcolor = imagecolorallocate($img, mt_rand(180, 240), mt_rand(180, 240), mt_rand(180, 240));

//3.填充
imagefill($img, 0, 0, $bgcolor);


//4.画干扰
$str = '~~~~~~~~~~~~~~~~~~~~!@#$%%^^&*()_+.,[]:<>';   //手写一些奇葩符号
$str_len = strlen($str);
for ($i = 0; $i < $str_len; $i++) {
    //分配字体颜色
    $fontcolor = imagecolorallocate($img, mt_rand(0, 150), mt_rand(0, 150), mt_rand(0, 150));
    imagettftext($img, 8, mt_rand(0, 360), mt_rand(0, $width), mt_rand(0, $height), $fontcolor, './font/MSYHBD.TTF', $str[$i]);
}


//5.生成随机验证码
$code_small = range('a', 'z');
$code_big = range('A', 'Z');
$code_num = range('0', '9');

//6.合并成一个数组
$list = array_merge($code_small, $code_big, $code_num);
//7.随机打乱顺序
shuffle($list);

//8.用于储存验证码
$code = '';
for ($i = 0; $i < $length; $i++) {
    //分配字体颜色
    //分配字体颜色
    $fontcolor = imagecolorallocate($img, mt_rand(0, 150), mt_rand(0, 150), mt_rand(0, 150));
    imagettftext(
        $img,   //操作目标
        $fontsize,  //字体大小
        mt_rand(-40, 40), //角度
        (($i * $fontsize) + ($width - ($length + $fontsize) >> 1)),   //字体横坐标X
        (($height - $fontsize >> 1) + $fontsize), //字体纵坐标Y
        $fontcolor, //字体颜色
        $fontstyle, //字体样式
        $list[$i]   //字体内容
    );
    $code .= $list[$i];
}

//9.开启会话
session_start();
//10.将正确验证码放入session
$_SESSION['code'] = $code;

header('Content-Type:image/png');
imagepng($img);
imagedestroy($img);
?>



