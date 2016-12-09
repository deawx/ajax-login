<?php

include "db.php";


if ( isset($_REQUEST['email']) && !empty($_REQUEST['email']) ) {

    $email = trim($_REQUEST['email']);
    $email = strip_tags($email);

    $query = "SELECT COUNT(user_id) FROM tbl_users WHERE email='$email'";
    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_assoc($result);
    $result = $row['COUNT(user_id)'];
    if ($result >= 1 ){
        echo 'false';
    }
    else {
        echo 'true';
    }


}

if ( isset($_REQUEST['username']) && !empty($_REQUEST['username']) ) {

    $username = trim($_REQUEST['username']);
    $username = strip_tags($username);

    $query = "SELECT COUNT(user_id) FROM tbl_users WHERE username='$username'";
    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_assoc($result);
    $result = $row['COUNT(user_id)'];
    if ($result >= 1 ){
        echo 'false';
    }
    else {
        echo 'true';
    }
}
