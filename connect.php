<?php 
    $localhost = "localhost";
    $user = "root";
    $password = "";
    $name = "onlinebank";

    $conn = new mysqli($localhost,$user,$password,$name);

    if(mysqli_connect_errno()){
        echo "Connect ERROR";
    }
?>