<?php

    // Only processing POST reqeusts
    if (isset($_REQUEST['email'])) {
        // Retrieving the form fields and removing whitespace
        $name = strip_tags(trim($_POST["name"]));
        $name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        // Checking if data sent to mailer
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Setting a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Receipient's email address
        $recipient = "jakeputts@gmail.com";

        $email = $_REQUEST['email'];

        // Setting the email subject
        $subject = $_REQUEST['subject'];

        // Building the email content
        $message = $_REQUEST['message'];

    
        // Sending the email
        mail($recipient, "$subject", $email_content, "From:" . $email);
            // Setting a 200 (okay) response code.
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
        } 

        else {
            // Setting a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
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