<?php

$ak = "6YQz4vDTGWqqAsRocHsN1NGzRlDch6KN";

$url = "http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=39.983424,116.322987&output=json&pois=1&ak=".$ak;

$str = file_get_contents($url);

preg_match("/^renderReverse&&renderReverse\((.*)\)/i",$str,$match);

$code = json_decode($match[1]);

print_r($code->result->formatted_address);
