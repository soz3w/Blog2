<?php

spl_autoload_register("my_autoload");

function my_autoload($className)
{
	$filePath = str_replace("_","/",$className);

	$fileName=$filePath.".php";

	if (file_exists($fileName))
	{
		require_once($fileName);
	}
	else
	{
		error_log("$fileName not found",3,"error.log");
	}
}

// Connection au serveur


/*$config= new Helper_config();
$config->loadFile("config.ini");
$user = $config->get("dbuser","database");
$password = $config->get("dbpassword","database");
$dns = $config->get("dbdns","database");
$db = new PDO($dns,$user,$password);
$db->exec("SET NAMES UTF8");

$post = Model_Model::load("Model_Post",$db);

 if(!empty($_POST)){
	$post->save($_POST);
	$_GET["id"]=$message->id;
}
if(!empty($_GET["supp"])){
	$post->delete($_GET["supp"]);
}
*/

include 'index.phtml';