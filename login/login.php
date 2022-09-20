
<?php
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $passwd = md5($passwd);
    
    $conn = new mysqli('localhost', 'root', '', 'eventdb');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("select * from users where username = ? and password = ?");
        $stmt->bind_param("ss", $username, $passwd);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['username'] == $username && $data['password'] == $passwd){
                echo "<script> 
                    alert('Login Successful');
                    window.location.href = 'http://localhost/event/index.php?page=venue';
                    </script>";

            }
        
        }
        else{
            echo "<script> 
                    alert('Incorrect Username or Password. Retry loggin in.');
                    window.location.href = 'http://localhost/event/login/login.html';
                </script>";


        }

    }

?>