<?php
    include_once 'connect.php';

    $filename = "myfile.txt";
    $fp = fopen($filename,'r');
    $filesize = filesize($filename);
    $username = fread($fp,$filesize);

    $sql = "select * from users inner join accounts on users.id = accounts.id where users.username='$username' and accounts.username='$username'";
    $result = $conn->query($sql);

?>

<html>
    <head></head>
    <body>
    <table>
        <thead>
            <td>username</td>
            <td>balance</td>
            
        </thead>
        <?php if(mysqli_num_rows($result)>0){ ?>
            <?php while($row = mysqli_fetch_array($result)){ ?>
        <tr>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['balance']?></td>
        </tr>
            <?php } }?>
    </table>
    </body>
</html>