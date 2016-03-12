<?php

    // Only processing POST reqeusts
    if (isset($_REQUEST['email'])) {


        // Receipient's email address
        $recipient = "jakeputts@gmail.com";

        $email = $_REQUEST['email'];

        // Setting the email subject
        $subject = $_REQUEST['subject'];

        // Building the email content
        $message = $_REQUEST['message'];

    
        // Sending the email
        mail($recipient, "$subject", $message, "From:" . $email);
            // Setting a 200 (okay) response code.
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
        } 

        else {
      
?>

<form method="post">
 Email: <input name="email" type="text" /><br />
 Subject: <input name="subject" type="text" /><br />
 Message:<br />
 <textarea name="message" rows="15" cols="40"></textarea><br />
 <input type="submit" value="Submit" />    
 </form>

 <?php 
  }
?>