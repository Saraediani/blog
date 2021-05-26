<?php
require_once '../include/class.user.php';

    $User = new User();
    if($User->user_logout()){
        header("location: ../index.php");
    }
