[code] <?php
require(“vendor/autoload.php”);
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;

require(“phpMQTT.php”);

$mqtt = new phpMQTT(“m12.cloudmqtt.com”, 10184, “phpMQTT Pub Example”); //เปลี่ยน www.yourmqttserver.com ไปที่ mqtt server ที่เราสมัครไว้นะครับ

$token = “IrN10smd9lGZGp0JtOOoBJpAvSvDPFVNnDbTdxVbnU2Xv9YNaABrfKI2LxXxRH59XxerqJx3otWj0OqohFtMLiwSJy6fEEYarDN9KVKol7CqHo1GzqPST1DJI4hvg04yIDQiNwa2M1UD8K4SRn4XawdB04t89/1O/w1cDnyilFU=”; //นำ token ที่มาจาก line developer account ของเรามาใส่ครับ

$httpClient = new CurlHTTPClient($token);
$bot = new LINEBot($httpClient, [‘channelSecret’ => $token]);
// webhook
$httpClient = new CurlHTTPClient($token);
$bot = new LINEBot($httpClient, [‘channelSecret’ => $token]);
// webhook
$jsonStr = file_get_contents(‘php://input’);
$jsonObj = json_decode($jsonStr);
print_r($jsonStr);
foreach ($jsonObj->events as $event) {
if(‘message’ == $event->type){
// debug
//file_put_contents(“message.json”, json_encode($event));
$text = $event->message->text;

if (preg_match(“/สวัสดี/”, $text)) {
$text = “มีอะไรให้จ่ารับใช้ครับ”;
}
if (preg_match(“/เปิดไฟ/”, $text)) {     //หากในแชตที่ส่งมามีคำว่า เปิดทีวี ก็ให้ส่ง mqtt ไปแจ้ง server เราครับ
if ($mqtt->connect()) {
$mqtt->publish(“/ESP/LED”,”GET”); // ตัวอย่างคำสั่งเปิดทีวีที่จะส่งไปยัง mqtt server
$mqtt->close();
}
$text = “เปิดไฟให้แล้วคร้าบบบบ”;
}
if (preg_match(“/ปิดไฟ/”, $text) and !preg_match(“/เปิดไฟ/”, $text)) {
if ($mqtt->connect()) {
$mqtt->publish(“/ESP/LED”,”GET”);
$mqtt->close();
}
$text = “จ่าปิดไฟให้แล้วนะครับ!!”;
}
$response = $bot->replyText($event->replyToken, $text); // ส่งคำ reply กลับไปยัง line application

}
}

?>
[/code]

 
