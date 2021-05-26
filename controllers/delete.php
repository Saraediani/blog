<?php
    include "../include/db_config.php";
    require "../include/class.article.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $Article = new Article();

        if($Article->delete($id)){
            header("location: ../dashboard.php?msg=Article Deleted successfully");
        }else{
            echo "unknown Error!";
        }

    }