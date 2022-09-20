<?php

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $passwd = md5($passwd);
    $confirm_passwd = $_POST['confirm_passwd'];
    $email = $_POST['email'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'registered');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into users(username, passwd, confirm_passwd, email) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $passwd, $confirm_passwd, $email);
        $stmt->execute();
        
        echo "New Record Inserted Successfully";
        $stmt->close();
        $conn->close();
    }
?>