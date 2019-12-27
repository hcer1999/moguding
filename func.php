<?php

function json_post($url, $data = NULL,$headers,$isLogin = false)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    if(!$data){
        return 'data is null';
    }
    if(is_array($data))
    {
        $data = json_encode($data);
    }
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    if ($isLogin){
        curl_setopt($curl, CURLOPT_HEADER, 1);
    }else{
        curl_setopt($curl, CURLOPT_HEADER, 0);
    }
    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($curl);
    $errorno = curl_errno($curl);
    if ($errorno) {
        return $errorno;
    }
    curl_close($curl);

    if ($isLogin){
        preg_match_all('/set-cookie:(.*?);/', $res, $cookies);
//    $cookies[1][0]$cookies[1][1]为cookie
        $cookie = ltrim($cookies[1][0]) . '; ' . ltrim($cookies[1][1]);
        $res = '{' . getSubstr($res,'{','}') . ',"cookie"'. ':"' . $cookie . '"}}}';
    }

    return $res;

//    $res = json_decode($res,true);
////    $res = json_encode($res);
//    var_dump($res);
//    die();
//    $res["data"]["cookie"] = $cookies[0][0] . $cookies[0][1];
//    $res = json_encode($res);

}
function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    //echo '左边:'.$left;
    $right = strpos($str, $rightStr,$left);
    //echo '<br>右边:'.$right;
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}