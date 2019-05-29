<?php
session_start();
include('connection.php');



if(isset($_POST['submit'])){
    



    $user_id = $_SESSION['id'];
    $image = $_POST['image'];  
    $language=$_POST['language'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $hosted = $_POST['hosted'];
    $date = time();
    $link = $_POST['link'];



   //run a query to create new note
    $sql = "INSERT INTO project (`user_id`, `image`, `language`,`name`, `description`, `hosted`,`date`, `link`) VALUES
     ($user_id, '$image', '$language', '$name', '$description', '$hosted', '$date', '$link')";

    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo 'error';
    }else{
        header("Location:projects.php?");
    }

}



?>