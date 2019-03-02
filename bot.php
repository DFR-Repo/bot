<?php
// رقم 4 توكن بوتك رقم 169 رابط استضافتك // ALI RAHIM // @AlMouss3wi // @PhpFilesTv //
ob_start();
define('API_KEY','727321407:AAF3EJxP-o39tZamF2foS-x3fZs9YPDsvVk
');
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



$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$ch1 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@phpfilestv&user_id=$from_id");
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@phpfilestv&user_id=$from_id");
$check_token = file_get_contents("https://api.telegram.org/bot$text/getWebhookInfo");
$check = json_decode($check_token);
$get_file = file_get_contents('T.php');
$get_done = file_get_contents('ALI_RAHIM/ex.txt');
$done = explode("\n", $get_done);
$get_id = file_get_contents('ALI_RAHIM/ALI_RAHIM.txt');
$getid = explode("\n", $get_id);
$mid = $message->message_id;

$inlineqt = $update->inline_query->query;
bot('answerInlineQuery',[
        'inline_query_id'=>$update->inline_query->id,    
        'results' => json_encode([[
            'type'=>'article',
            'id'=>base64_encode(rand(5,555)),
            'title'=>'مشاركة مع اصدقائك',
            'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"اهلا بك 🍁 في بوت انشاء بوتات تواصل ♻️ يمكنك انشاء بوت خاص بك 🚹 او لفريقك مجانا مع العديد ✳️ من المميزات الرائعة كل هاذا مجانا مالذي تنتضره ؟ انشأ بوتك الان 🔆"],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>'⚙ انـشـاء بـوت تـواصـل','url'=>'https://telegram.me/tzobot']
                ],
             ]]
        ]])
    ]);


if (strpos($ch1 , '"status":"left"') !== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'parse_mode'=>'Markdown',
'text'=>"",
'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'', 'url'=>"https://telegram.me/phpfilestv"]
        ],
         [
          ['text'=>'' , 'url'=>"https://telegram.me/phpfilestv"]
        ],
]

])
]);
}



if($text == '/start' and !in_array($from_id, $getid) and !strpos($ch1 , '"status":"left"') !== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'
اهـلا بـك فـي بـوت انشاء بوتات تواصل
يمكنك انشاء بوت خاص بـك او لـفريقك
مـجـانـا مـع الـعـديـد مـن الـمـمـيـزات 💯
',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⚙ انـشـاء بـوت تـواصـل','callback_data'=>'maka']],
[
['text'=>'','callback_data'=>'info'],
['text'=>'','callback_data'=>'buy']
],
[['text'=>'','callback_data'=>'channel'] ,
['text'=>'⤴️ شـارك الـبـوت','switch_inline_query'=>'']
],

[['text'=>'❌ حــــذف بــوتي','callback_data'=>'delete']],

]
])
]);
}

if($data == 'maka' and !in_array($chat_id2,$done) and !strpos($ch1 , '"status":"left"') !== false){
file_put_contents('ALI_RAHIM/ALI_RAHIM.txt', "\n" . $chat_id2 . "\n",FILE_APPEND);    
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'ارسـل الـان تـوكـن الـبـوت خـاصـتـك 🤓',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🤭 تــراجـع','callback_data'=>'cancle']]
]
])
]);
}

if($data == 'maka' and in_array($chat_id2,$done) and !strpos($ch1 , '"status":"left"') !== false){

bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'لــا يـمـكــن انـشـاء اكـثـر مـن بـوت 😕',
 'show_alert'=>true
 ]);      
}


if($text and in_array($from_id, $getid) and $check->ok == "true"){

for($i = $mid - 3; $i < $mid; $i++){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$i
]);
}

$str = str_replace($from_id, '', $get_id);    

file_put_contents('ALI_RAHIM/ALI_RAHIM.txt', $str);    

file_put_contents('ALI_RAHIM/ex.txt', $from_id . "\n", FILE_APPEND);
    
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'تـم انـشـاء الـبـوت بـنـجـاح ☑️',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'🏠 الـرئـيـسـيـة' , 'callback_data'=>"home"]
],
]
])

]); 


mkdir("PhpFilesTv/$from_id");

file_put_contents("PhpFilesTv/$from_id/info.txt",$text . "\n" . $from_id);

file_put_contents("PhpFilesTv/$from_id/bot.php", $get_file);

file_put_contents("PhpFilesTv/$from_id/chat.txt", $from_id . "\n");

file_put_contents("PhpFilesTv/$from_id/welcome.txt", 'اهلا بك في بوت التواصل' . "\n");


file_get_contents("https://matrexboy55.000webhostapp.com/ok.php");


}


if($text and in_array($from_id, $getid) and $check->ok != "true" and !strpos($ch1 , '"status":"left"') !== false){

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'عــذرا هـذا الـتـوكن غـير صـحيح 😕',
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🤭 تــراجـع','callback_data'=>'cancle']]
]
])
]);
}    

if($data == 'cancle' and in_array($from_id, $getid)){

$str = str_replace($chat_id2, "", $get_id) ;
file_put_contents('ALI_RAHIM/ALI_RAHIM.txt', $str);
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'اهـلا بـك فـي بـوت انشاء بوتات تواصل
يمكنك انشاء بوت خاص بـك او لـفريقك
مـجـانـا مـع الـعـديـد مـن الـمـمـيـزات 💯',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⚙ انـشـاء بـوت تـواصـل','callback_data'=>'maka']],
[
['text'=>'','callback_data'=>'info'],
['text'=>'','callback_data'=>'buy']
],
[['text'=>'','callback_data'=>'channel'] ,
['text'=>'⤴️ شـارك الـبـوت','switch_inline_query'=>'']
],
[['text'=>'❌ حــــذف بــوتي','callback_data'=>'delete']],

]    
])
]);
}

if($data == 'home'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'اهـلا بـك فـي بـوت انشاء بوتات تواصل
يمكنك انشاء بوت خاص بـك او لـفريقك
مـجـانـا مـع الـعـديـد مـن الـمـمـيـزات 💯',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'⚙ انـشـاء بـوت تـواصـل','callback_data'=>'maka']],
[
['text'=>'','callback_data'=>'info'],
['text'=>'','callback_data'=>'buy']
],
[['text'=>'','callback_data'=>'channel'] ,
['text'=>'⤴️ شـارك الـبـوت','switch_inline_query'=>'']
],

[['text'=>'❌ حــــذف بــوتي','callback_data'=>'delete']],


]    
])
]);
}

if($data == 'delete' and in_array($chat_id2,$done)){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'هـل انـت مـتـاكـد مـن حـذف الـبـوت ⁉️',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'❎ لـــــا', 'callback_data'=>'home'],
['text'=>'✅ نــعــم','callback_data'=>'yesdel'],
]    
]])
]);    
}

if($data == 'yesdel' and in_array($chat_id2, $done)){


bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"تــم حــذف الــبــوت بــنــجــاح 📛",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'🏠 الـرئـيـسـيـة' , 'callback_data'=>"home"]
]
]
])
]);



$str1 = str_replace($chat_id2, '', $get_done);

file_put_contents('ALI_RAHIM/ex.txt', $str1);

$get_token = file_get_contents("PhpFilesTv/$chat_id2/info.txt");

$get_url = file_get_contents("https://api.telegram.org/bot$get_token/getWebhookInfo");

$json = json_decode($get_url);

$url = $json->result->url;

file_get_contents("https://https://api.telegram.org/bot$get_token/deletewebhook?url=$url");

unlink("PhpFilesTv/$chat_id2/bot.php");
unlink("PhpFilesTv/$chat_id2/info.txt");

}


if($data == 'delete' and !in_array($chat_id2,$done)){

bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'انـشـاء بـوت اولـا 😄',
 'show_alert'=>true
 ]);  
 
}




if($data == 'info' and in_array($chat_id2,$done)){
    
$get_info = file_get_contents("PhpFilesTv/$chat_id2/info.txt");

$url_info = file_get_contents("https://api.telegram.org/bot$get_info/getMe");

$json_info = json_decode($url_info);

$id = $json_info->result->id;

$user = $json_info->result->username;

$name = $json_info->result->first_name;

bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'' , 'callback_data'=>"home"]
]
]
])
]);    
}

if($data == 'info' and !in_array($chat_id2,$done)){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'انـشـاء بـوت اولـا 😄',
 'show_alert'=>true
 ]);  
}

if($data == 'buy'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'','url'=>'https://telegram.me/']],
[['text'=>'','url'=>'https://telegram.me/']],
[['text'=>'' , 'callback_data'=>"home"]]
]])
]);
}

if($data=="channel"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>'',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'', 'url'=>"https://telegram.me/phpfilestv"]
],
[
['text'=>'', 'url'=>"https://telegram.me/phpfilestv"]
],
[
['text'=>'', 'callback_data'=>"home"]
],
]
])
]);
}