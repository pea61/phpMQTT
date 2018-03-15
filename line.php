 lines (27 sloc)  1.06 KB
<?php
  
function send_LINE($msg){
 $access_token = 'IrN10smd9lGZGp0JtOOoBJpAvSvDPFVNnDbTdxVbnU2Xv9YNaABrfKI2LxXxRH59XxerqJx3otWj0OqohFtMLiwSJy6fEEYarDN9KVKol7CqHo1GzqPST1DJI4hvg04yIDQiNwa2M1UD8K4SRn4XawdB04t89/1O/w1cDnyilFU='; 
  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];
      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => 'Ubad8b113cf6ac7f1062c945f3d858664',
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);
      echo $result . "\r\n"; 
}
?>
