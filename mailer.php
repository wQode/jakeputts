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

        //if ($_POST["message"]) {
            
            // Receipient's email address
            $email_to = "wqueit@gmail.com";
            // Setting the email subject
            $email_subject = "Mail from jakeputts herokuapp";
            // Form data
            $name = $_POST['name'];
            $email_from = $_POST['email'];
            $comment = $_POST['message'];

            

            // Building the email content
            //$email_content = "Name: $name\n";
            //$email_content .= "Email: $email\n\n";
            //$email_content = "Message:\n$message\n";
            $email_content = "Message details below.\r\n";

            // Building the email headers
            //$email_headers = "From: $name <$email>";
           
           function clean_string($string)
           {
            $bad = array("content-type","bcc:","to:","cc:","href");
            return str_replace($bad,"",$string);
           }

           $email_content .= "Name: ".clean_string($name)."\r\n";
           $email_content .= "Email: ".clean_string($email)."\r\n";
           $email_content .= "Message: ".clean_string($comment)."\r\n";

           $headers = 'From '.$email_from"\r\n".
           'Reply-To: '.$email_from."\r\n" .
           'X-Mailer: PHP/' . phpversion();
           @mail($email_to, $email_subject, $email_message, $headers);
           header("Location: Thanks")

        // Sending the email
           
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