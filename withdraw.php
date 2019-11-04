<?php
    include_once "connect.php";

    $withdraw = $_POST['withdraw'];

    $filename = "myfile.txt";
    $fp = fopen($filename,'r');
    $filesize = filesize($filename);
    $username = fread($fp,$filesize);

    $sql = "select balance from accounts where username='$username'";
    $balance = $conn->query($sql);

    if($withdraw > $balance){
        echo "Sorry withdraw account exceeds the avaible Balance";
    }else{
        $newbalance = $balance->fetch_object()->balance - $withdraw;
        $sql2 = "update accounts set balance='$newbalance' where username='$username'";
        $conn->query($sql2);
    }
    $date = date("yyyy-mm-dd");
    $sql3 = "insert into transaction(username,withdraw,date) values ('$username','$withdraw',$date)";
    $conn->query($sql3);

?>