<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 9/12/16
 * Time: 12:54 PM
 */
 session_start();
 require_once 'db.php';


 if(isset($_POST['btn-login'])) {
     $username = trim($_POST['username']);
     $password = trim($_POST['password']);

     $password = hash("sha256",$password);

     $query = "SELECT COUNT(user_id) FROM tbl_users WHERE username = '$username' AND password = '$password'";
     $result = mysqli_query($conn,$query);

     $num = mysqli_fetch_assoc($result);
     $result = ($num['COUNT(user_id)']);

     $query1 = "SELECT user_id FROM tbl_users WHERE username = '$username' AND password = '$password'";
     $result1 = mysqli_query($conn,$query1);

     $row = mysqli_fetch_assoc($result1);

     if ($result == 1) {
         echo "ok"; // log in
         $_SESSION['user_session'] = $row['user_id'];
     } else {

         echo "email or password does not exist."; // wrong details
     }

 }
 ?>