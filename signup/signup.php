<?php
    $name = $_POST['name'];
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $passwd = md5($passwd);
    $confirm_passwd = $_POST['confirm_passwd'];
    $email = $_POST['email'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'eventdb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into signup(fname, username, email,password) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $username,  $email,$passwd);
        $stmt->execute();
        
        echo "New Record Inserted Successfully";
        $stmt->close();
        $conn->close();
    }
?>