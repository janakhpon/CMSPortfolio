<?php 


if(isset($_POST['submit'])){
    


    $name = $_POST['name'];
    $email      =  $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $to = 'minchanhtutoo@gmail.com';
    $headers = 'From:'.$email. "\r\n" .
    'Reply-To:'.$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);


   header("Location:index.php?subscribed!");



}


    

?>