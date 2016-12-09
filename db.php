<?php

$err = "connection Errors";

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ajax") or die($err);