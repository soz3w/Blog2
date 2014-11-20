<?php
include("config.inc.php");

$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM paginate");
$get_total_rows = mysqli_fetch_array($results); //total records

//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page);   

//create pagination
$pagination = '';
if($pages > 1)
{
    $pagination .= '<ul class="paginate">';
    for($i = 1; $i<$pages; $i++)
    {
        $pagination .= '<li><a href="#" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
    }
    $pagination .= '</ul>';
}



<?php echo $pagination; ?>
<div id="results"></div>




<?php
include("config.inc.php"); //include config file

//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//validate page number is really numaric
if(!is_numeric($page_number)){die('Invalid page number!');}

//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = mysqli_query($connecDB,"SELECT id,name,message FROM paginate ORDER BY id DESC LIMIT $position, $item_per_page");

//output results from database
echo '<ul class="page_result">';
while($row = mysqli_fetch_array($results))
{
    echo '<li id="item_'.$row["id"].'">'.$row["id"].' <span class="page_name">'.$row["name"].'</span><span class="page_message">'.$row["message"].'</span></li>';
}
echo '</ul>';
?>