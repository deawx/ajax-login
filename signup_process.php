<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 9/12/16
 * Time: 4:37 PM
 */
require_once "db.php";

if (!empty($_POST)){
    $username = trim($_POST['username']);
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $username = strip_tags($username);
    $full_name = strip_tags($full_name);
    $email = strip_tags($email);
    $password = strip_tags($password);

    $password = hash("sha256",$password);

    $query = "INSERT INTO tbl_users (`username`,`full_name`,`email`,`password`) VALUES ('$username','$full_name','$email','$password')";
    $result = mysqli_query($conn,$query);

    if ($result){
        echo "ok";
    }
    else{
        echo "Some Error";
    }

}
