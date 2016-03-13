<?php
// use actual sendgrid username and password in this section
$url = 'https://api.sendgrid.com/'; 
$user = 'jakeputts'; // place SG username here
$pass = '3b0ny15myd0g'; // place SG password here
// grabs HTML form's post data; if you customize the form.html parameters then you will need to reference their new new names here
$name = $_POST['name']; 
$email = $_POST['email']; 
$message = $_POST['message'];
$subject = "Contact from jakeputts herokuapp";

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

$params = array(
    'api-user' => "$user",
    'api_key'  => "$pass",
    'to'       => "jakeputts@gmail.com",
    'subject'  => "Contact from jakeputts herokuapp",
    'html'     => "<html><head><title> Contact Form</title><body>
    Name: $name\n<br>
    Email: $email\n<br>
    Message: $message</body></title></head></html>",
    'text'     => "
    Name: $name\n
    Email: $email\n
    Subject: $subject\n
    $message",
    'from'     => "for@jakeputts.com",
    );

curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
$request = $url.'api/mail.send.json';

//Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

//Redirect to Thank you page
header('Location: thanks.html');
exit();

// print everything out
print_r($response);

        //if ($_POST["message"]) {
           
            // Receipient's email address
            
            // Form data
            // $name = $_POST['name'];
            // $email = $_POST['email'];
            // $message = $_POST['message'];

            // Setting the email subject
            // $subject = "New contact from $name, of $email";

            // Building the email content
            //$email_content = "Name: $name\n";
            //$email_content .= "Email: $email\n\n";
            //$email_content = "Message:\n$message\n";
            // $email_content = "Message: $message";

            // Building the email headers
            //$email_headers = "From: $name <$email>";


        // Sending the email
        //     if (mail($to, $subject, $email_content, $headers))
        //     {
        //         $msg = "Email successfully sent.";
        //     }
        //     else
        //     {
        //         $msg = "Error sending.";
        //     }
        // }
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