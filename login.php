<?php 
session_start();
if(isset($_POST['login']))
{

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $db = new PDO('mysql: host=localhost; dbname=mytasks', 'root', '');

    $sql = "SELECT email FROM user where email = '$email'";
    $result = $db->prepare($sql);
    $result->execute();

    if( $result->rowCount() > 0)
    {
        $data = $result->fetchAll();
        if (password_verify($pass, $data[0]["password"])) 
        {
            echo "connection effectué";
            $_SESSION['email'] = $email;
        }
    }
    else
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql2 = "INSERT INTO user (email, password) VALUES ('$email', '$pass')";
        $req = $db->prepare($sql2);
        $req->execute();
        echo "Enregistrement Effectué";
    }

}



?>