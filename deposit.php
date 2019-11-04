<?php
    include_once 'connect.php';

    $deposit = $_POST['deposit'];

    $filename = "myfile.txt";
    $fp = fopen($filename,'r');
    $filesize = filesize($filename);
    $username = fread($fp,$filesize);

    $sql = "select balance from accounts where username='$username'";
    $balance = $conn->query($sql);

    $newbalance = $balance->fetch_object()->balance + $deposit;
    $sql2 = "update accounts set balance='$newbalance' where username='$username'";
    $conn->query($sql2);

    $date = date("yyyy-mm-dd");
    $sql3 = "insert into transaction(username,deposit,date) values ('$username','$deposit',$date)";
    $conn->query($sql3);
?>