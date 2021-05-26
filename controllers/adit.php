<?php
    include "../include/db_config.php";
    require "../include/class.article.php";

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $body = $_POST['body'];
    $image = $_POST['image'];
    $Article = new Article();
    if($Article->update($id,$title,$slug,$body,$image)){
        header("location: ../dashboard.php?msg=Article updated successfully");
    }else{
        echo "unknown Error!";
    }
}