<?php
    include_once "connect.php";

    $withdraw = $_POST['withdraw'];

    $filename = "myfile.txt";
    $fp = fopen($filename,'r');
    $filesize = filesize($filename);
    $username = fread($fp,$filesize);

    $sql = "select balance from accounts";
    $balance = $conn->query($sql);

    if($withdraw > $balance){
        echo "Sorry withdraw account exceeds the avaible Balance";
    }else{
        $newbalance = $balance - $withdraw;
        $sql2 = "update account set balance='$newbalance' where username = '$username'";
    }
    $sql3 = "insert into transaction(username,withdraw) values ('$username','$withdraw')";
    $conn->query($sql3);

?>