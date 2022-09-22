<?php

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'eventdb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into feedback(fname, email, message) values(?, ?, ?)");
        $stmt->bind_param("sss", $fname, $email, $message);
        $stmt->execute();
        
        echo "New Record Inserted Successfully";
        $stmt->close();
        $conn->close();
    }
?>