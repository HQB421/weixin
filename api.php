<?php
/**
 * wechat php test
 */

//define your token


define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();

//该方法用于api验证，验证成功后注释
//$wechatObj->valid();

//开启自动回复
$wechatObj->responseMsg();

class wechatCallbackapiTest
{


    //定义自动回复功能
    public function responseMsg()
    {
        //get post data, May be due to the different environments
        //接收用户端发送过来的xml数据
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        //判断xml数据是否为空
        if (!empty($postStr)) {

            //通过simplexml进行解析xml
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            //接收微信的手机端
            $fromUsername = $postObj->FromUserName;
            //微信的公众平台
            $toUsername = $postObj->ToUserName;
            //接收用户消息类型
            $msgType = $postObj->MsgType;
            //接收经纬度信息
            $latitude = $postObj->Location_X;
            $longtitude = $postObj->Location_Y;
            //接收事件推送
            $event = $postObj->Event;
            $eventKey = $postObj->EventKey;
            //接收用户发送的关键词
            $keyword = trim($postObj->Content);
            //时间戳
            $time = time();
            //文本发送模板
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";

            //音乐发送模板
            $musicTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Music>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <MusicUrl><![CDATA[%s]]></MusicUrl>
                            <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                            </Music>
                            </xml>";

            //图文消息模板
            $newsTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <ArticleCount>%s</ArticleCount>
                            <Articles>
                            <item>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <PicUrl><![CDATA[%s]]></PicUrl>
                            <Url><![CDATA[%s]]></Url>
                            </item>
                            <item>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <PicUrl><![CDATA[%s]]></PicUrl>
                            <Url><![CDATA[%s]]></Url>
                            </item>
                            </Articles>
                            </xml>";

            //判断用户发送的数据类型
            if ($msgType == "text") {
                //判断用户发送关键词是否为空
                if (!empty($keyword)) {
                    //回复内容
                    switch ($keyword) {
                        case '?':
                            //回复类型，text代表文本类型
                            $msgType = "text";
                            $contentStr = "【1】特殊服务号码\n【2】通讯服务号码\n【3】银行服务号码\n你可以通过输入【】方括号的编号获取内容哦！";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            break;
                        case '？':
                            //回复类型，text代表文本类型
                            $msgType = "text";
                            $contentStr = "【1】特殊服务号码\n【2】通讯服务号码\n【3】银行服务号码\n你可以通过输入【】方括号的编号获取内容哦！";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            break;
                        case 1:
                            //回复类型，text代表文本类型
                            $msgType = "text";
                            $contentStr = "常用特种服务号码:\n匪警：110\n火警：119";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            break;
                        case 2:
                            //回复类型，text代表文本类型
                            $msgType = "text";
                            $contentStr = "常用通讯服务号码:\n中移动：10086\n中电信：10000";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            break;
                        case 3:
                            //回复类型，text代表文本类型
                            $msgType = "text";
                            $contentStr = "常用银行服务号码:\n工商银行：95588\n建设银行：95533";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            break;
                        case '音乐':
                            //回复类型，music代表文本类型
                            $msgType = "music";
                            //音乐标题
                            $title = "爱在有情天";
                            //音乐描述
                            $desc = "陈展鹏、陈秀雯-《爱在有情天》";
                            //普通音乐路径
                            $musicUrl = "http://haoyiya.cn/weixin/music.mp3";
                            //高品质音乐路径
                            $hqmusicUrl = "http://haoyiya.cn/weixin/music.mp3";
                            //格式化字符串
                            $resultStr = sprintf($musicTpl, $fromUsername, $toUsername, $time, $msgType, $title, $desc, $musicUrl, $hqmusicUrl);
                            break;
                        case '图文':
                            $msgType = "news";
                            $count = "2";
                            $title = "后楼村";
                            $desc = "惠安县墩南村后楼";
                            $picUrl = "http://haoyiya.cn/weixin/image/1.jpg";
                            $url = "http://haoyiya.cn/weixin/";
                            $title2 = "墩南村";
                            $desc2 = "泉州市墩南村";
                            $picUrl2 = "http://haoyiya.cn/weixin/image/2.jpg";
                            $url2 = "http://haoyiya.cn/weixin/";
                            $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, $msgType, $count, $title, $desc, $picUrl, $url, $title2, $desc2, $picUrl2, $url2);
                            break;
                        default:
                            //回复类型，text代表文本类型
                            $msgType = "text";
                            $contentStr = "你发送的是text文本!";
                            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                            break;
                    }

                    //返回一个格式化的字符串，把%s号占位符替换
                    //$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    //把xml数据返回给腾讯服务器在发送给手机端
                    echo $resultStr;
                } else {
                    echo "Input something...";
                }
            } elseif ($msgType == "image") {
                //回复类型，text代表文本类型
                $msgType = "text";
                //回复内容
                $contentStr = "你发送的是image消息!";
                //格式化字符串
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                //把xml数据返回给腾讯服务器在发送给手机端
                echo $resultStr;
            } elseif ($msgType == "video") {
                //回复类型，text代表文本类型
                $msgType = "text";
                //回复内容
                $contentStr = "你发送的是video消息!";
                //格式化字符串
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                //把xml数据返回给腾讯服务器在发送给手机端
                echo $resultStr;
            } elseif ($msgType == "voice") {
                //回复类型，text代表文本类型
                $msgType = "text";
                //回复内容
                $contentStr = "你发送的是voice消息!";
                //格式化字符串
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                //把xml数据返回给腾讯服务器在发送给手机端
                echo $resultStr;
            } elseif ($msgType == "location") {
                //回复类型，text代表文本类型
                $msgType = "text";
                //百度api
                $ak = "6YQz4vDTGWqqAsRocHsN1NGzRlDch6KN";
                $url = "http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location={$latitude},{$longtitude}&output=json&pois=1&ak=".$ak;
                $str = file_get_contents($url);
                preg_match("/^renderReverse&&renderReverse\((.*)\)/i",$str,$match);
                $code = json_decode($match[1]);
                //回复内容
                $contentStr = $code->result->formatted_address;
                //格式化字符串
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                //把xml数据返回给腾讯服务器在发送给手机端
                echo $resultStr;
            } elseif ($msgType == "link") {
                //回复类型，text代表文本类型
                $msgType = "text";
                //回复内容
                $contentStr = "你发送的是link消息!";
                //格式化字符串
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                //把xml数据返回给腾讯服务器在发送给手机端
                echo $resultStr;
            } elseif ($msgType == "shortvideo") {
                //回复类型，text代表文本类型
                $msgType = "text";
                //回复内容
                $contentStr = "你发送的是shortvideo消息!";
                //格式化字符串
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                //把xml数据返回给腾讯服务器在发送给手机端
                echo $resultStr;
            } elseif($msgType == "event" && $event == "CLICK"){
                if($eventKey=="product"){
                    //回复类型，text代表文本类型
                    $msgType = "text";
                    $contentStr = "你发送的是product文本!";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }elseif($eventKey=="aboutus"){
                    //回复类型，text代表文本类型
                    $msgType = "text";
                    $contentStr = "你发送的是aboutus文本!";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }
            }
        } else {
            echo "";
            exit;
        }
    }


    //该方法主要用于对接公众平台
    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if ($this->checkSignature()) {
            //如果成功则返回接收到的字符串
            echo $echoStr;
            exit;
        }
    }

    //定义checkSignature
    private function checkSignature()
    {
        //接收微信加密签名
        $signature = $_GET["signature"];
        //接收时间戳
        $timestamp = $_GET["timestamp"];
        //接收随机数
        $nonce = $_GET["nonce"];
        //把token常量赋值给$token
        $token = TOKEN;
        //组装成数组
        $tmpArr = array($token, $timestamp, $nonce);
        //进行排序
        sort($tmpArr);
        //转换成字符串
        $tmpStr = implode($tmpArr);
        //进行哈希算法加密
        $tmpStr = sha1($tmpStr);
        //与微信加密签名进行比较，相同则返回true，否则false
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}

?>