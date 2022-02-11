<?php

    session_start();

    $email = $_POST['email'];
    $password = $_POST['pwd'];
    
    // Database connection
    $con = new mysqli("localhost","root","","user");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    } else{
        $stmt = $con->prepare("SELECT * FROM user_info WHERE email = ?");
        $stmt-> bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows>0){
            $data = $stmt_result->fetch_assoc();
            if($data['pwd'] === $password){
                echo "<h2>Login Successfully<h2>";
                header("location: prod.php");
            }else{
                echo "<h2>Invalid Email or password<h2>";
            }
        }else{
            echo "<h2>Invalid Email or password<h2>";
        }
    }
?>