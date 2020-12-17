<?php
require_once __DIR__ . "/config.php";
////////The God Hacker//////
//Create By: @GodHackerOwO////
error_reporting(0);

set_time_limit(0);

flush();
##------------------------------##
define('API_KEY',$BOT_TOKEN);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
//==============GOD======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$name = $from_id = $message->from->first_name;
$from_id = $message->from->id;
$text = $message->text;
//===============GOD=============//
if($text == "/start") 

            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"$START_MESSAGE",
 'parse_mode'=>'HTML',
]);
if($text !== '/start'){

$get = json_decode(file_get_contents("https://gplinks.in/api?api=$GP_API_KEY&url=$text"),true);
$short = $get['shortenedUrl'];

if($get['shortenedUrl']){
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text'=>"<b>Thank you for using me☺

YOUR SHORTEN URL: </b> <code>$short</code>

<b>LONG URL:</b> <code>$text</code>

<b>Shorten by $BOT_USERNAME</b>",
   'parse_mode'=>"HTML",
]);
   
}else {
bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"<b>PLEASE GIVE ME A VALID URL</b>",
                'parse_mode'=>"HTML",
               
]);
}
}
?>
