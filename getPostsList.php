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

// checking connection
if (!isset($_SESSION["login"]))
{
	if ( isset($_POST["login"]) && isset($_POST["password"]) ) 
	 {
			$user = new Model_User();
			$login = $_POST["login"];
			$password = $_POST["password"];
			$userOK  = $user->authenf($login,$password);

			if ($userOK!=null)
			{
				$loginOK = $userOK->login;
				$_SESSION["login"]=$loginOK;
			}
			else
			{
				echo "<script> checkLogin('(Invalid login or password)');</script>";
				die();
			}
		}
		else
		{
			echo "<script> checkLogin('(Login and password not set)');</script>";
				die();
		}

}






//loading data
$page_number=1;
$item_per_page=50;
//$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

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
$tblist="<table class='table table-condensed table-striped'>";
$tblist.="<thead><tr><th><input type=checkbox  name=options[] id=idOptions value> Title</th><th>Category</th><th>Author</th><th>Created</th></tr></thead><tbody>";



foreach ($posts as $k=>$p) {	
		 $tblist.= "<tr><td class='td_title'>
		 <input type=checkbox  name=options[] id=idOpt_".$p["id"]." value=".$p["id"]."> ".
		 "<a class=listPostElement href=# onclick='return false;'  id=".$p["id"]."_post".">".$p["title"]."</a></td>".
   		  "<td class='td_category'>".$p["name"]."</p>".
   		  "<td class='td_login'>".$p["login"]."</td>
   		  <td class='td_login'>".$p["created"]."</td></tr>";
   		  
}
$tblist.="</tbody></table>";
echo $tblist;
echo $pagination;




//header('Content-type: application/json'); 
//echo json_encode($posts);

//echo $citiesJson;
//echo "<pre>";
//print_r(json_last_error());
//print_r($cities);
//echo "</pre>";



