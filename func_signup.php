<?php

    include "connection.php";
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);

        if($password === $password1){

            $sql = "SELECT * FROM `user` WHERE  email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                header("Location:auth.php?message=user+exists");
            }else{
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql2 = 
                "INSERT INTO `user` (`username`, `email`, `password`)
                 VALUES('$name', '$email', '$hash');";

    
    
                 if(mysqli_query($conn, $sql2)){
                    header("Location:index.php?message=registration+success");
                 }else{
                    header("Location:auth.php?message=registration+failed");
                 }
            }
        }else{
            header("Location:auth.php?message=passwordnotmatch");
        }


    }else{
        header("Location:auth.php");
    }


?>