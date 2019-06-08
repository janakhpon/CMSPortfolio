<?php 


if(isset($_POST['submit'])){
    



    $to      =  $_POST['email'];
    $subject = 'Inform';
    $message = 'Thank u for subscribing janakhpon.tech,http://www.janakhpon.tech/Page_display.php';
    $headers = 'From: noreplay@jtech.com' . "\r\n" .
    'Reply-To: noreplay@jtech.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);


   header("Location:index.php?subscribed!");



}


    

?>