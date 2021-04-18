<?php
ob_start();
define('API_KEY','your tokin ');

/// conect function for host

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

// variabls
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$data = $update->callback_query->data;
$message_id = $update->message->message_id;
$text           = $message->text;
$chat_id     = $message->chat->id;
$sudo         = 1059305698; //اyour id
$from_id     = $message->from->id;
$type       = $update->message->chat->type;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;




if($text=="/start" ){
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>" -* Hi Dear : *@" . $username . "
        
- _Welcome To Site ScreenShot Bot_ 

- _I Can Send You The Site Content As a :_ " . "

                   ( *PDF & İMG* )" . "
                   
- _Just Send Me The _" . "*LİNK*",
         'reply_to_message_id'=>$message->message_id,
         'parse_mode'=>'markdown',
        ]);
        

}


//// api 


$uk = preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text)  ;
if($uk and $text !=="/start"){
$pdf = "https://shot.screenshotapi.net/screenshot?&url=$text&full_page=true&output=image&file_type=pdf";
$img = "https://shot.screenshotapi.net/screenshot?&url=$text&full_page=true&output=image&file_type=jpeg&image_quality=100"; 

 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️0%
 '.
"

_Wait .._",
'reply_to_message_id'=>$message->message_id, 
 'parse_mode'=>'markdown',
 ]);
 sleep(1);
 bot('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'⬛️⬛️⬛️⬛️⬜️⬜️⬜️⬜️50%
 '.
"

_Wait .._",
'reply_to_message_id'=>$message->message_id, 
 'parse_mode'=>'markdown',
 ]);
 sleep(1);
 bot('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'⬛️⬛️⬛️⬛️⬛️⬛️⬛️⬛️100%
 '.
"

_Wait .._",
'reply_to_message_id'=>$message->message_id, 
 'parse_mode'=>'markdown', 
 ]);
  bot('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>
"

*DONE ..*",
'reply_to_message_id'=>$message->message_id, 
 'parse_mode'=>'markdown', 
 ]);

    bot('sendphoto',[
        'chat_id'=>$chat_id,
        'photo'=>$img,
        'caption'=>"-
        
" . " - _your link as a img _ " . "

 - *share bot : @Sshot4you_bot*",
        'reply_to_message_id'=>$message->message_id,
        'parse_mode'=>'markdown', 
        ]);
    bot('senddocument',[
        'chat_id'=>$chat_id,
        'document'=>$pdf,
        'caption'=>"-
        
" . " - _your link as a pdf _ " . "

 - *share bot : @Sshot4you_bot*",
        'reply_to_message_id'=>$message->message_id,
        'parse_mode'=>'markdown', 
        ]);
}if($text !=="/start" and $text==$uk and $chat_id !== $sudo){
     bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"*Wrong Request ..*",
'reply_to_message_id'=>$message->message_id,
        'parse_mode'=>'markdown', 
        ]);
         sleep(1);
 bot('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>"*Please Send Me a Link*",
'reply_to_message_id'=>$message->message_id, 
 'parse_mode'=>'markdown', 
 ]);
}













