<?php 
session_start();
	$messages = $message->find(array(
		"order"=>" timestamp DESC",
		"fields"=>"username,message,timestamp,id"
		));
	
	header('Content-type: application/json');  

   echo json_encode($messages;