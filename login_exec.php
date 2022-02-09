<?php

session_start();

if (isset($_POST['email'], $_POST['pwd'])) {
    $email = $_POST['email'];
    $pass = $_POST['pwd'];

    $db = new PDO('mysql:host=localhost;dbname=user', 'root', '');

    $sql = "SELECT * FROM user_info where email = $email";
    $result = $db->prepare($sql);
    $result->execute($email);

    if ($result->rowCount() > 0) {
        $data = $result->fetch();

        if (password_verify($pass, $data['pwd'])) {
            echo "Connexion effectuée";
            header("location: dashboard.php");
            $_SESSION['email'] = $email;
        }
    } else {
        echo "Connexion failled";
        header("location: products.php");
    }
}