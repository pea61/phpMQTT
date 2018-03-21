<?php

require("../phpMQTT.php");


$server = "m12.cloudmqtt.com";     // change if necessary
$port = 10184;                     // change if necessary
$username = "TEST";                   // set your username
$password = "12345";                   // set your password
$client_id = "xqzkunxq"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if(!$mqtt->connect(true, NULL, $username, $password)) {
	exit(1);
}

$topics['pea61/phpMQTT/examples/publishtest'] = array("qos" => 0, "function" => "procmsg");
$mqtt->subscribe($topics, 0);

while($mqtt->proc()){
		
}


$mqtt->close();

function procmsg($topic, $msg){
		echo "Msg Recieved: " . date("r") . "\n";
		echo "Topic: {$topic}\n\n";
		echo "\t$msg\n\n";
}
