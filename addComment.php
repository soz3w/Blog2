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
//var_dump($_POST);
if (isset($_POST["post_id"]) && isset($_POST["content"]))
{
    $id=$_POST["post_id"];
    $comm=$_POST["content"];
    $_POST["user_id"]=$_SESSION["user_Id"];
    $comment = new Model_Comment();
    $commId=$comment->save($_POST);
    //echo($commId);
}
else
{
    die("unknown post");
}



