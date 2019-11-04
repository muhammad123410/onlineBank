<?php
    include_once "connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "insert into users(username,password) values ('$username','$password')";

    if($conn->query($sql)){
        echo "Success";
    }

?>