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

if (isset($_POST["id"]))
{
    $id=$_POST["id"];
}
else
{
    die("unknown post");
}

$post = new Model_Post();

$p=$post->getPost($id);

$keywords=$post->getPostKeywords($id);
$comments=$post->getPostComments($id);
$nbcomments=count($comments);


include "post.phtml";

if (isset($_SESSION["login"]))
{
    include "comment.phtml";
}
