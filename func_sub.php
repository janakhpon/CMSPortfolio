<?php 


if(isset($_POST['submit'])){
    



    $to      =  $_POST['email'];
    $subject = 'Inform';
    $message = 'Thank u for subscribing janakhpon.tech,http://www.janakhpon.tech/index.php';
    $headers = 'From: minchanhtutoo@gmail.com' . "\r\n" .
    'Reply-To: minchanhtutoo@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);


   header("Location:index.php?subscribed!");



}


    

?>