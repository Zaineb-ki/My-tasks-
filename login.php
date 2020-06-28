<?php
session_start();
include "conn.php";
    if (isset($_POST['name']) && isset($_POST['pass'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $name = validate($_POST['name']);
        $pass = validate($_POST['pass']);

        if (empty($name)) {
            header("location:index.php?error=User Name is required ");
            exit();
        }elseif (empty($pass)) {
            header("location:index.php?error=Password is required ");
            exit();
        }else {
            $sql = "SELECT * FROM users WHERE user_name = '$name' AND password = '$pass'";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);

                if ($row['user_name'] === $name && $row['password'] === $pass) {
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("location:todo.php");
                }else {
                    header("location:index.php?error=Incorect User Name or Password ");
                    exit();
                }
            } else {
                header("location:index.php?error=Incorect User Name or Password ");
                exit();
            }
            
        }

    }else {
        header("location:index.php");
        exit();
    }



?>