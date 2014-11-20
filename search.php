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

//$db = new Helper_database();
//$posts=$db->queryAll("select * from posts order by created desc");

$post = new Model_Post();
$posts=$post->getPosts(0,100);

header('Content-type: application/json');  

echo json_encode($posts);

//echo $citiesJson;
//echo "<pre>";
//print_r(json_last_error());
//print_r($cities);
//echo "</pre>";



