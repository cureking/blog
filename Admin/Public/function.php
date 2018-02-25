<?php
/**
 * Created by PhpStorm.
 * User: curek
 * Date: 2/5/2018
 * Time: 3:57
 */

/**
 * 公共函数库
 * @author 蚀刻
 * @data ...
 *
 *
 */

/**
 * 单文件上传
 * @param [type] string $upFile [descript] 上传文件的参数 如：$_FILES['myfile']
 * @param [type] string $savePath [descript] 保存到指定目录 如果为空，那么取 uploads 作为默认目录，否则去本身
 * @param [type] array $allowType [descript] 允许的文件类型 如果为空，那么则不限制类型
 * @param [type] int $maxSize [descript] 允许的最大文件大小 如果等于0，那么则不限制大小 （只是在这里不限制，其他方面的限制还是有的）
 * @return [type] array [descript] 返回给用户的信息
 */
function upload($upFile, $savePath = '', $allowType = array(), $maxSize = 0)
{
    //如果等于0，代表不限制
    //$maxSize=0;

    //获取文件上传信息到新的变量
    $userFile = $_FILES[$upFile];

    //返回给用户的信息
    $returnResult = array('status' => false, 'msg' => '');

    //如果允许类型为空，我们不限制
    //$allowType = array();
    //$allowType = array('image/gif','image/png');

    //保存目录
    //$savePath = '';   //如果为空，用户没有指定上传的目录  ./save ./save/
    //$savePath = 'savefile';
    //如果为空，那么去 uploads 作为默认目录，否则取本身
    $savePath = empty($savePath) ? 'uploads' : $savePath;

    //处理一下路径
    $savePath = rtrim($savePath, '/') . '/';

    //如果这个文件不存在，就创建一个新的
    if (!file_exists($savePath)) {
        mkdir($savePath, 0777, true); //设置文件权限777-022=755
    }

    //1.是否成功上传？
    if ($userFile['error'] > 0) {
        switch ($userFile['error']) {
            case 1:
                $info = '错误值为1:表示上传文件的大小超出了约定值。文件大小的最大值在PHP配置文件中指定的，该指令是：upload_max_filesize。';
                break;
            case 2:
                $info = '错误值为2:表示上传文件的大小超出了HTML表单隐藏域属性的MAX_FILE_SIZE元素所制定的最大值。';
                break;
            case 3:
                $info = '错误值为3:表示文件值被部分上传。';
                break;
            case 4:
                $info = '错误值为4:表示没有上传任何文件';
                break;
            case 6:
                $info = '错误值为6:表示找不到临时文件夹。PHP 4.3.10与PHP 5.0.3 引进。';
                break;
            case 7:
                $info = '错误值为7:表示文件写入失败。PHP 5.1.0引进。';
                break;
            default:
                $info = '未知错误';
                break;
        }
        //将错误信息保存在 下表 msg 里面
        $returnResult['msg'] = $info;
        return $returnResult;   //返回信息
    }

    //2.验证大小
    if ($maxSize > 0) { //如果大于 0，表示已经限定了大小了
        if ($userFile['size'] > $maxSize) {
            $returnResult['msg'] = '超出文件大小限制，文件最大为' . $maxSize;
            return $returnResult;
        }
    }

    //3.验证类型
    if (count($allowType) > 0) {
        //判断类型
        if (!in_array($userFile['type'], $allowType)) {
            $returnResult['msg'] = '文件类型不符合';
            return $returnResult;
        }
    }

    //4.正确形成文件全称
    //4.1生成拓展名
    $ext = pathinfo($userFile['name'], PATHINFO_EXTENSION);
    //4.2随机文件名字
    do { //如果生成的随机文件名字已存在，就继续随机产生。
        $newName = md5(time() . mt_rand(1, 9999999)) . '.' . $ext;
    } while (file_exists($savePath . $newName));

    //5.执行上传
    //判断文件是否是通过 HTTP,POST 上传
    if (is_uploaded_file($userFile['tmp_name'])) {
        //移动上传文件
        if (move_uploaded_file($userFile['tmp_name'], $savePath . $newName)) {
            //执行成功，返回相关信息
            $returnResult['status'] = true;
            $returnResult['imageName'] = $newName;

            return $returnResult;
        }
    } else {
        $returnResult['msg'] = '非法上传！';
        return $returnResult;
    }
}

/**
 * @param [type] string $url [description] 文件地址
 * @return [type] bool [description] 函数执行成功后返回 true
 */
function getNetSource($url)
{
    //来源 如果是网络资源，那么打开方式只能是 r
    //$path = 'https://ssl.baidu.com
    //打开
    $source = fopen($url, 'r');

    $content = '';

    while (!feof($source)) {
        //将字节读取到 content
        $content .= fread($source, 8192);
        //设置文件最大读取长度。测试文件指针是否到了文件结束的位置
    }

    fclose($source);

    //打开一个新的资源。 （不存在）
    $sourceTwo = fopen(basename($url), 'a+');

    //将$content 写入到新的资源
    fwrite($sourceTwo, $content);

    fclose($sourceTwo);

    //返回信息，表示函数执行完毕
    return true;
}


/**
 * 图片裁剪
 * @param [type] string $picpath [description] 图片路径
 * @param [type] int $x [description] 图片的起始横坐标x
 * @param [type] int $y [description] 图片的起始纵坐标y
 * @param [type] int $cutWidth [description] 目标图片的宽度
 * @param [type] int $cutHeight [description] 目标图片的高度
 * @return null
 */
function cut($picpath, $x, $y, $cutWidth, $cutHeight)
{
    //图片的信息
    $imageInfo = getimagesize($picpath);
    //原图片高度
    $w = $imageInfo[0];
    $h = $imageInfo[1];

    //如果要目标图片（要裁剪出的图片）比原图片还要大，则放弃。
    if ($cutWidth > $w | $cutHeight > $h) {
        exit('目标图片尺寸大于原图片尺寸！');
    }

    //裁剪后缀
    $mime = explode('/', $imageInfo['mine']);
    //获取图片的后缀
    $subType = $mime[1];

    //打开将裁剪的图片
    $imagefrom = 'imagecreatefrom' . $subType;
    //imagecreatefromjpeg();
    //imagecreatefrompng();
    //$imagefrom 是一个变量函数
    $imagesrc = $imagefrom($picpath);

    //新建画布
    $imagedes = imagecreatetruecolor($cutWidth, $cutHeight);

    //重采样拷贝部分图片并调整大小
    imagecopyresampled(
        $imagedes,  //画布
        $imagesrc,  //要裁剪的原图
        0, 0,    //从画布的开始坐标
        $x, $y,  //从原图的开始坐标
        $cutWidth,  //画布的宽度
        $cutHeight, //画布的高度
        $cutWidth,  //从原图上要裁剪的宽度
        $cutHeight //从原图上要裁剪的高度
    );

    //保存输出
    header('Content-Type:image/' . $subType);

    //变量函数
    $imageecho = 'image' . $subType;
    $imageecho($imagedes);
    //$imagejpeg($imagedes);

    //释放系统资源
    imagedestroy($imagesrc);
    imagedestroy($imagedes);
}


/**
 * 图片缩放
 * @param [type] string $imagePath [description] 图片路径
 * @param [type] string $savePath [description] 缩放后图片的保存路径
 * @param [type] number $zoomSize [description] 缩放的大小
 * @param [type] number $zoomHeight [description] 如果不为空，就是制定高度缩放
 * @return null
 */
function zoom($imagePath, $savePath, $zoomSize, $zoomHeight = null)
{
    //获取图片信息
    $imageInfo = getimagesize($imagePath);

    //原图的宽度
    $imageWidth = $imageInfo[0];
    //原图的高度
    $imageHeight = $imageInfo[1];

    //获取图片的后缀
    $suffix = explode('/', $imageInfo['mime'])[1];

    /*
        图片缩放分为两种情况
        1.宽度比高要大
            那么宽的值直接等于缩放后的值
        2.高度比宽要大
            那么高的值直接等于缩放后的值

    $zoomWidth = 400
    */
    if (!$zoomHeight) {
        //求缩放后的宽度
        if ($imageWidth > $imageHeight) {
            $zoomWidth = $zoomSize;
            $zoomHeight = ($imageHeight / $imageWidth) * $zoomWidth;
            //  100 / 200 = 200 / 400
        } else {
            $zoomHeight = $zoomSize;
            $zoomWidth = ($imageWidth / $imageHeight) * $zoomHeight;
        }
    } else {
        $zoomWidth = $zoomSize;
    }


    //打开要处理的图片
    $imagefrom = 'imagecreatefrom' . $suffix;
    //$imagesrc=imagecreatefromjpeg($imagePath);
    $imagesrc = $imagefrom($imagePath);

    //创建指定尺寸的画布
    $canvas = imagecreatetruecolor($zoomWidth, $zoomHeight);

    imagecopyresampled(
        $canvas,    //画布
        $imagesrc,  //原图
        0, 0,    //画布的起始位置
        0, 0,    //原图的起始位置

        $zoomWidth,
        $zoomHeight,    //画布的尺寸 size

        $imageWidth,    //imagesx($imagesrc),   //原图的宽度
        $imageHeight    //imagesy($imagesrc)    //原图的高度
    );


    //header('Content-Type:image/' . $suffix); 不让输出
    $imageecho = 'image' . $suffix;
    //imagejpeg($canvas);
    //$imageecho($canvas); 不让输出

    //处理路径
    $savePath = trim($savePath, '/') . '/';

    //如果保存的目录不存在，就新建一个
    if (!file_exists($savePath)) {
        mkdir($savePath, 0777, true);
    }

    //随机图片名
    $imageName = md5(mt_rand(1, 9999999) . uniqid()) . '.' . $suffix;

    //另存为图片
    $imageecho($canvas, $savePath . $imageName);

    imagedestroy($imagesrc);
    imagedestroy($canvas);

    //返回上传后的图片名
    return $imageName;
}


/**
 * 专门用来处理数据库的 增 删 改 查
 * @param $sql
 */
function execu($sql)
{
    //1.连接
    $link = @mysqli_connect(HOST, USER, PASS, DB) or exit('链接失败！');
    //2.设置字符集
    mysqli_set_charset($link, CHARSET);

    //3.发送执行命令
    $result = mysqli_query($link, $sql);

    //如果执行成功 和受影响行大于0 （即数据库修改成功）
    if ($result && mysqli_affected_rows($link) > 0) {
        return mysqli_insert_id($link) ? mysqli_insert_id($link) : mysqli_affected_rows($link);
    }
    mysqli_close($link);
}

/**
 * 专门遍历结果集合的
 * @param [type] $sql
 * @return [type] array|bool
 */
function query($sql)
{
    //1.连接
    $link = @mysqli_connect(HOST, USER, PASS, DB) or exit('链接失败！');
    //2.设置字符集
    mysqli_set_charset($link, CHARSET);

    //3.发送执行命令
    $result = mysqli_query($link, $sql);

    //增加判断，如果有结果，循环结果集
    if ($result) {
        $list = array();
        //循环遍历结果集
        while ($row = @mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }

        //释放资源
        @mysqli_free_result($result);
        //关闭连接
        mysqli_close($link);

        //直接将遍历完成的数据返回
        return $list;
    }
    return false;
}