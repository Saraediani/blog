<?php
    include "../include/db_config.php";
    require "../include/class.article.php";

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $body = $_POST['body'];
    $image = $_POST['image'];
    $Article = new Article();
    if($Article->add($title,$slug,$body,$image)){
        header("location: ../dashboard.php?msg=Article added successfully");
    }else{
        echo "unknown Error!";
    }
}