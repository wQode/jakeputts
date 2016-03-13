<?php

    // Only processing POST reqeusts
  /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        */

        $msg="";
        if(isset($_POST['send']))
        {
        //if ($_POST["message"]) {
            $from_add = "for@jakeputts.herokuapp.com";
            // Receipient's email address
            $to = "wqueit@gmail.com";
            // Form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            // Setting the email subject
            $subject = "New contact from $name, of $email";

            // Building the email content
            //$email_content = "Name: $name\n";
            //$email_content .= "Email: $email\n\n";
            //$email_content = "Message:\n$message\n";
            $email_content = "Message: $message";

            // Building the email headers
            //$email_headers = "From: $name <$email>";
            $headers = "From: $from_addt\r\n";
            $headers .= "Reply-To: $from_addt\r\n";
            $headers .= "Return-Path: $from_add\r\n";
            $headers .= "X-Mailer: PHP \r\n";

        // Sending the email
            if (mail($to, $subject, $email_content, $headers))
            {
                $msg = "Email successfully sent.";
            }
            else
            {
                $msg = "Error sending.";
            }
        }
            // Setting a 200 (okay) response code.
            //http_response_code(200);
            //echo "Thank You! Your message has been sent.";
    //} 
    /*else {
            // Setting a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    /*
    } else {
        // Setting  a 403 (forbidden) response code if not a POST request
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }
    */

?>