<?php
/**
 * Created by PhpStorm.
 * User: pcsaini
 * Date: 9/12/16
 * Time: 12:54 PM
 */
session_start();
unset($_SESSION['user_session']);

if(session_destroy())
{
    header("Location: login.php");
}