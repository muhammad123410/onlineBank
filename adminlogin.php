<?php
    include_once "connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from admin where username='$username' and password= '$password'";
    $result = $conn->query($sql);
    
    if(mysqli_num_rows($result)==1){
        header("Location:adminMain.html");
    }



?>