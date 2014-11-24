<?php
session_start();

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



$item_per_page=6;


$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
if(!is_numeric($page_number)){die('Invalid page number!');}

$position = ($page_number * $item_per_page);


$post = new Model_Post();
$postCount = $post->getRowsCount();
$total_rows = $postCount[0]["totalRows"];
$pages = ceil($total_rows/$item_per_page); 

//create pagination
$pagination = '';
if($pages > 1)
{

    $pagination .= '<ul class="paginate pagination pagination-sm"><li><a href="#">&larr; Previous</a></li>';
    for($i = 1; $i<$pages; $i++)
    {
        $pagination .= '<li><a href="#" onclick="return false;" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
    }
    $pagination .= '<li ><a href="#">Next &rarr;</a></li></ul>';
}



//output results from database
$posts=$post->getPosts($position,$item_per_page);
foreach ($posts as $k=>$p) {
	echo "<article class='col-sm-6'>
	       <div class='panel panel-warning'>
			  <div class='panel-heading'>
			    <h3 class='panel-title'>".$p["title"]."---".$p["id"]."</h3>
			  </div>
			  <div class='panel-body'><p><img src='images/actu.jpg' class='col-sm-3'>".substr($p["content"],0,500)."...</p>
			  <p class='text-right'><a href='#' onclick='return false;' class='continueReading pull-right' id=".$p["id"].">continue reading...</a></p></div>".
		   	"<div class='panel-footer'><small><p class='created'><span class='glyphicon glyphicon-time'></span> ".$p["created"].
		   	"<span class='pull-right'>by ".$p["login"]." <span class='glyphicon glyphicon-user'></span></span></p></small></div>
		   </div>
		 </article>";
}

echo $pagination;




//header('Content-type: application/json'); 
//echo json_encode($posts);

//echo $citiesJson;
//echo "<pre>";
//print_r(json_last_error());
//print_r($cities);
//echo "</pre>";



