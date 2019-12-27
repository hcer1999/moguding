<?php

require "func.php";
$phone = $_POST['phone'];
$password = $_POST['password'];
$isLogin = $_POST['isLogin'];
$url = 'https://api.moguding.net:9000/session/user/v1/login';

$param = '{"phone":"'. $phone .'","uuid":"","password":"'. $password .'","loginType":"android"}';

$headers = array(
    'Accept-Language: zh-CN,zh;q=0.8',
    'User-Agent: Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; MI 6 Build/NMF26X) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30',
    'Authorization: ',
    'roleKey: ',
    'Content-Type: application/json; charset=UTF-8',
    'Content-Length: '. strlen($param),
    'Host: api.moguding.net:9000',
    'Connection: Keep-Alive',
    'Accept-Encoding: gzip',
    'Cache-Control: no-cache'
);

echo json_post($url,$param,$headers,$isLogin);
