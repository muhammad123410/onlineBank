<?php
    include_once "connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username,password from users
    where username='$username' and password='$password'";
   
    $result = $conn->query($sql);
    $filename = "myfile.txt";
    $fp = fopen($filename,'w');
    fwrite($fp,$username);

    if(mysqli_num_rows($result)==1){

        header("Location:displayuser.php");
    }



?>