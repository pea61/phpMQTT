<?php
$access_token = 'IrN10smd9lGZGp0JtOOoBJpAvSvDPFVNnDbTdxVbnU2Xv9YNaABrfKI2LxXxRH59XxerqJx3otWj0OqohFtMLiwSJy6fEEYarDN9KVKol7CqHo1GzqPST1DJI4hvg04yIDQiNwa2M1UD8K4SRn4XawdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
