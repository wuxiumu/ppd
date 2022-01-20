<?php
/* ========================================================================
 * 全局函数
 * ======================================================================== */
// 打印数据
function ddp($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function ddd($array)
{
    call_user_func_array('ddp', func_get_args());
}

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            dump($v);
        }

        die(1);
    }
}
if (!function_exists('dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     */
    function dump($var, ...$moreVars)
    {
        var_dump($var);
        foreach ($moreVars as $v) {
            var_dump($v);
        }

        if (1 < func_num_args()) {
            return func_get_args();
        }
        return $var;
    }
}


/**
 * 创建多级目录
 * @param $path string 要创建的目录
 * @param $mode int 创建目录的模式，在windows下可忽略
 */
function create_dir($path, $mode = 0777)
{
    if (is_dir($path)) {
        # 如果目录已经存在，则不创建
        echo "该目录已经存在";
    } else {
        # 不存在，创建
        if (mkdir($path, $mode, true)) {
            echo "创建目录成功";
        } else {
            echo "创建目录失败";
        }
    }
}

/**
 * 字符串反转
 * @param $str string 要反转的字符串
 */
function fan($str)
{
    //声明一个临时的变量
    $n = "";
    //获取字符串长度
    $m = strlen($str) - 1;
    for ($i = $m; $i >= 0; $i--) {
        $n .= substr($str, $i, 1);
    }
    return $n;
}

/**
 * 获取扩展名称
 * @param $url string 文件地址
 */
function extname($url)
{
    if (strstr($url, "?")) {
        //如果有问号格式的文件， 将问号前的文件取出给变量$file
        list($file) = explode("?", $url);
    } else {
        $file = $url;
    }
    //以下是第二步取出文件名
    $loc = strrpos($file, "/") + 1;
    $filename = substr($file, $loc);
    //以下是第三步取扩展名称
    $arr = explode(".", $filename);
    //弹出数组最后一个元素
    return array_pop($arr);
}

/**
 * 字符串第一个大写
 * @param $url string 文件地址
 *
 * 测试
 *  - $str = "get-element-by-id";
 *  - $str1 = "president-donald-trump";
 */
function camelCase($str)
{
    /*仅在第一次调用 strtok() 函数时使用了 string 参数。在首次调用后，该函数仅需要 split 参数，这是因为它清楚自己在当前字符串中所在的位置。*/
    $token = strtok($str, "-");

    $a = array();
    while ($token !== false) {
        $str_temp = $token;

        /*将分割的子串依次放入数组中*/
        array_push($a, $str_temp);

        /*这一句一定不能少，否则内存溢出*/
        $token = strtok("-");
    }

    //检测是否正确地将字符串分割为子串
    // var_dump($a);

    /*遍历字符串数组，将数组中第二个元素开始的字符串的首字符依次转换为大写字母*/
    for ($i = 1; $i < count($a); $i++) {

        $a[$i] = ucfirst($a[$i]);
    }

    /*implode函数把数组元素组合为字符串：*/
    $str_return = implode("", $a);
}

/**
 * 连个文件的相对地址
 * @param $a, $b string 文件地址
 *
 * 测试
 *  - $a = "/a/b/c/d/e.php";$b = "/a/b/12/34/c.php";
 *  - //  ../../c/d
 */
function abspath($a, $b)
{

    //第一步去除公共的目录结构
    $a = dirname($a);    //  /a/b/c/d
    $b = dirname($b);    //  /a/b/12/34

    $a = trim($a, "/");   //   a/b/c/d
    $b = trim($b, "/");   //   a/b/12/34

    $a = explode("/", $a);  //  array("a", "b", "c", "d")
    $b = explode("/", $b);  //  array("a", "b", "12", "34")

    //合并上面代码相当于 $a = explode("/", trim(dirname($a), "/"));
    $num = max(count($a), count($b));

    for ($i = 0; $i < $num; $i++) {
        if ($a[$i] == $b[$i]) {
            unset($a[$i]);
            unset($b[$i]);
        } else {
            break;
        }
    }

    //$a = array("c", "d");
    //$b = array("12", "34");
    //第二步：回到同级目录， 进入另一个目录

    $path = str_repeat("../", count($b)) . implode("/", $a);

    return $path;
}

/**
 * 格式化字符串
 * @param $str string
 *
 * 测试
 *  - $str = "12345678932132";
 *  - 1,234,567,893,213,2
 */
function nformat($str)
{
    $n = "";   //临时的变量
    $m = strlen($str); //获取字符串长度
    $k = $m %  3;  //让整个长度和3取余之后余数是多少 = 0

    for ($i = 0; $i < $m; $i++) {
        if ($i % 3 == $k && $i != 0) {
            $n .= ",";
        }
        // $n .= $str{$i};
        $n .= substr($str, $i, 1);
    }
    return $n;
}
function redirect($url)
{
    Header("Location:$url");
}

function captcha()
{
    $image = imagecreate(200, 100);
    imagecolorallocate($image, 0, 0, 0);
    for ($i = 0; $i <= 9; $i++) {
        // 绘制随机的干扰线条
        imageline($image, rand(0, 200), rand(0, 100), rand(0, 200), rand(0, 100), rand_color($image));
    }
    for ($i = 0; $i <= 100; $i++) {
        // 绘制随机的干扰点
        imagesetpixel($image, rand(0, 200), rand(0, 100), rand_color($image));
    }
    $length = 4; //验证码长度
    $str = rand_str($length); //获取验证码
    $font = PPDFRAME . '/public/package/SourceHanSansCN-Normal.ttf';
    for ($i = 0; $i < $length; $i++) {
        // 逐个绘制验证码中的字符
        imagettftext($image, rand(20, 38), rand(0, 60), $i * 50 + 25, rand(30, 70), rand_color($image), $font, $str[$i]);
    }
    header('Content-type:image/jpeg');
    imagejpeg($image);
    imagedestroy($image);
}

function rand_str($length)
{
    // 验证码中所需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        // 随机截取 $chars 中的任意一位字符；
        $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
}
function rand_color($image)
{
    // 生成随机颜色
    return imagecolorallocate($image, rand(127, 255), rand(127, 255), rand(127, 255));
}
function json($code = 200, $msg = 'success', $body = '')
{
    header("Content-type", "application/json");
    echo json_encode(array('head' => array('code' => $code, 'msg' => $msg), 'body' => $body), JSON_UNESCAPED_UNICODE);
}

/**
 * 记录控制器日志
 * @param string $key
 * @param mixed $value
 */
function pplog($key, $value = '')
{
    // return true;
    if (!is_string($value)) $value = json_encode($value, JSON_UNESCAPED_UNICODE);

    if ($value) $message = 'logkey=' . $key . ' | ' . $value;
    else $message = $key;

    wlog(getv('controller'), $message);
}
