<?php

     
        $recipient = "jakeputts@gmail.com";
        $name = $_POST['name']
        $email = $_POST['email'];
        $message = $_POST['message'];
?>

<?php    
        // Sending the email
        mail($recipient, "Mail for Jake Putts", $message, "From:" . $email);
        echo "Thank You! Your message has been sent.";
?>