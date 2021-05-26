<?php
require_once '../include/class.user.php';
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $User = new User();

    if($User->check_login($email,$password)){
    x;
    }else{
        header('location: ../index.php');
    }

}