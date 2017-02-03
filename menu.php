<?php
$access_token = "p-2t5P9Rf00aC_KJAX-TI5OFRUVpPDv1xoxpfyIEdGC5y-CtviFlFQpey1e-0x4k22W7iDVpqmBVGFj-odDmxMttV1PT86cROhstx72Y3cARsXEyQcEbNEOdaMX-pXD2DYIcADAMHR";
$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$data = '{
     "button":[
     {
           "name":"木屋工作室",
           "sub_button":[
            {
               "type":"click",
               "name":"公司简介",
               "key":"company"
            },
            {
               "type":"click",
               "name":"趣味游戏",
               "key":"游戏"
            },
            {
                "type":"click",
                "name":"讲个笑话",
                "key":"笑话"
            }]


       },
      {
           "name":"菜单",
           "sub_button":[
           {
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       },
       {
            "name": "发送位置",
            "type": "location_select",
            "key": "rselfmenu_2_0"
   }
   ]
 }';

$date = '{
    "button":[
    {
        "type":"view",
        "name":"微网站",
        "url":"http://haoyiya.cn/weixin/"
    },
    {
        "type":"click",
        "name":"产品中心",
        "key":"product"
    },
    {
        "name":"菜单",
           "sub_button":[
           {
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"关于我们",
               "key":"aboutus"
            }]
    }
    ]
}';
//开启CURL
$ch = curl_init();
//设置CURL请求的url地址
curl_setopt($ch, CURLOPT_URL, $url);
//捕获内容，但不输出
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//模拟发送POST请求
curl_setopt($ch, CURLOPT_POST, 1);
//发送POST请求是传递数据
curl_setopt($ch, CURLOPT_POSTFIELDS, $date);
//禁止服务器端校验SSL
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
//执行curl操作
$output = curl_exec($ch);
//有值则输出，没有值则报错
if($output){
    echo $output;
}else{
    echo curl_error($ch);
}

curl_close($ch);














