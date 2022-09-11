<?php

    $username = $_POST['username'];
    $passwd = $_POST['passwd'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'eventdb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into logged_in(username, password) values(?, ?)");
        $stmt->bind_param("ss", $username, $passwd);
        $stmt->execute();
        
        echo "New Record Inserted Successfully";
        $stmt->close();
        $conn->close();
    }
    
?>