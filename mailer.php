<?php
    
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

if(isset($_POST['submit'])){
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $msg = $_POST['message'];
    $subject = "Contact from wqode.space";   
    $emailaddr = "wqodes@gmail.com";

    # Instantiate the client.
    $mgClient = new Mailgun("key-aa3fb247e126efcd34632167d6633e63");
    $domain = "wqode.space";

    $result = $mgClient->sendMessage($domain, array(
            "from"    => "$name <$email>",
            "to"      => $emailaddr,
            "subject" => $subject,
            "text"    => $msg
        ));
http_response_code(200);
echo "<script>alert('Email sent.');</script>";
} 

?>
