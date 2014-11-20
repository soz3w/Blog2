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



$item_per_page=5;


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
    $pagination .= '<ul class="paginate">';
    for($i = 1; $i<$pages; $i++)
    {
        $pagination .= '<li><a href="#" onclick="return false;" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
    }
    $pagination .= '</ul>';
}

//output results from database
$posts=$post->getPosts($position,$item_per_page);
foreach ($posts as $k=>$p) {
	echo "<article><h4 class='title'>".$p["title"]."---".$p["id"]."</h2>".
   		  "<p class='content'>".$p["content"]."</p>".
   		  "<p class='created'>".$p["created"]."</p></article>";
}

echo $pagination;




//header('Content-type: application/json'); 
//echo json_encode($posts);

//echo $citiesJson;
//echo "<pre>";
//print_r(json_last_error());
//print_r($cities);
//echo "</pre>";



