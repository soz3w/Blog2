<?php
session_start();

if(isset($_POST["username"]))
  		$_SESSION["username"]=$_POST["username"];


if (!isset($_SESSION["username"]))
	header("location:login.php");

require "core.php";
 $message = Model::load("message");

 if(!empty($_POST)){
	$message->save($_POST);
	$_GET["id"]=$message->id;
}
if(!empty($_GET["supp"])){
	$message->delete($_GET["supp"]);
}

if(isset($_GET["id"])){
	$id=$_GET["id"];
	$message->id=$id;
 	$message->read();
 	$username=$message->username;
 	$mess=$message->message;
 	$timestamp=$message->timestamp;
}
else
{
	$id=$username=$timestamp=$mess="";
}


header('Content-type: application/json'); 

$data =array("id" => $id,"message" => $mess,"username" => $username,"timestamp" => $timestamp);

echo json_encode($data);

