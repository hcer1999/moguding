<?php

require "func.php";

$token = $_POST['token'];

$cookie = $_POST['cookie'];
$url = 'https://api.moguding.net:9000/attendence/clock/v1/listSynchro';

$date = date("Y-n-t") . " 23:59:59";

$param = '{"endTime":"'. $date .'","startTime":"2019-12-01 00:00:00"}';

//echo $param;

$headers = array(
    'Accept: */*',
    'Accept-Encoding: gzip, deflate, br',
    'Accept-Language: zh-Hans-CN;q=1, en-CN;q=0.9',
    'Authorization: ' . $token,
    'User-Agent: Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; MI 6 Build/NMF26X) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
    'Connection: close',
    'Content-Length: '. strlen($param),
    'Content-Type: application/json; charset=UTF-8',
    'Cookie: ' . $cookie,
    'Host: api.moguding.net:9000',
    'roleKey: ',
);

echo json_post($url,$param,$headers);
