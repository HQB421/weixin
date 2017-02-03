<?php
$ch = curl_init();

$url = "http://www.baidu.com";

curl_setopt($ch,CURLOPT_URL,$url);

curl_exec($ch);

curl_close($ch);

?>