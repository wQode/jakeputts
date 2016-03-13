<?php

     
        $recipient = "jakeputts@gmail.com";
        $name = $_POST['name']; 
        $email = $_POST['email'];
        $message = $_POST['message'];
        $subject = "Email for Jake";
        $headers = "From: $name \r\n";
?>

<?php    
        // Sending the email
        mail($recipient, $subject, $message, $headers);
        echo "Thank You! Your message has been sent.";
?>