<?php
//http://www.php.cn/php-weizijiaocheng-340929.html
//黑名单过滤
function is_spam($text, $file, $split = ':', $regex = false)
{
    $handle = fopen($file, 'rb');
    $contents = fread($handle, filesize($file));
    fclose($handle);
    $lines = explode("n", $contents);
    $arr = array();
    foreach ($lines as $line) {
        list($word, $count) = explode($split, $line);
        if ($regex)
            $arr[$word] = $count;
        else
            $arr[preg_quote($word)] = $count;
    }
    preg_match_all("~" . implode('|', array_keys($arr)) . "~", $text, $matches);
    $temp = array();
    foreach ($matches[0] as $match) {
        if (!in_array($match, $temp)) {
            $temp[$match] = $temp[$match] + 1;
            if ($temp[$match] >= $arr[$word])
                return true;
        }
    }
    return false;
}

//$file = 'spam.txt';
//$str = 'This/* string has cat, dog word';
//if(is_spam($str, $file))
//    echo 'this is spam';
//else
//    echo 'th*/is is not spam';

//随机颜色生成
function randomcolor()
{
    $str = '#';
    for ($i = 0; $i < 6; $i++) {
        $random = rand(0, 15);
        switch ($random) {
            case 10:
                $random = 'A';
                break;
            case 11:
                $random = 'B';
                break;
            case 12:
                $random = 'C';
                break;
            case 13:
                $random = 'D';
                break;
            case 14:
                $random = 'E';
                break;
            case 15:
                $random = 'F';
                break;
        }
        $str .= $random;
    }
    return $str;
}

//echo randomcolor();

//从网上下载文件
/*set_time_limit(30);//设置脚本最大执行时间
$url = 'http://wordpress.org/latest.zip';//download $url = 'http://somsite.com/some_video.flv';
$pi=pathinfo($url);
$ext=$pi["extension"];
$name=$pi["filename"];
// create a new cURL resource
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL and pass it to the browser
$opt = curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
$saveFile = $name.'.'.$ext;
if(preg_match("/[^0-9a-z._-]/i", $saveFile))
    $saveFile = md5(microtime(true)).'.'.$ext;
$handle = fopen($saveFile, 'wb');
fwrite($handle, $opt);
fclose($handle);
*/

//通过cURL获取RSS订阅数
//$ch = curl_init();
//curl_setopt($ch,CURLOPT_URL,'https://feedburner.google.com/api/awareness/1.0/GetFeedData?id=7qkrmib4r9rscbplq5qgadiiq4');
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);
//$content = curl_exec($ch);
//$subscribers = get_match('/circulation="(.*)"/isU',$content);
//curl_close($ch);

//检查是否连接网络
function Visit($url)
{
    $agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $page = curl_exec($ch);
    //echo curl_error($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($httpcode >= 200 && $httpcode < 300) return true;
    else return false;
}

//if (Visit("http://www.google.com"))
//    echo "Website OK"."n";
//else
//    echo "Website DOWN";

//图片操作
//$filename = "test.jpeg";
//list($w, $h, $type, $attr) = getimagesize($filename);
//$src_im = imagecreatefromjpeg($filename);
//$src_x = '0';   // begin x
//$src_y = '0';   // begin y
//$src_w = '100'; // width
//$src_h = '100'; // height
//$dst_x = '0';   // destination x
//$dst_y = '0';   // destination y
//$dst_im = imagecreatetruecolor($src_w, $src_h);
//$white = imagecolorallocate($dst_im, 255, 255, 255);
//imagefill($dst_im, 0, 0, $white);
//imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);
//header("Content-type: image/png");
//imagepng($dst_im);
//imagedestroy($dst_im);

//时间差异
function ago($time)
{
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");
    $now = time();
    $difference     = $now - $time;
    $tense         = "ago";
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if($difference != 1) {
        $periods[$j].= "s";
    }
    return "$difference $periods[$j] 'ago' ";
}
echo ago('1385039548');