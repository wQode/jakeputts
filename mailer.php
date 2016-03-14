<?php
/*
function send_mail($email, $subject, $msg) {
    $api_key = "pubkey-bf4d623ad021b625f38bee21e8fb305b";
    $domain ="wqode.space";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/'.$domain.'/messages');
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
        'from' => 'Open <sayhi@wqode.space>',
        'to' => $email,
        'subject' => $subject,
        'html' => $msg
    ));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result; 
}
*/
    
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

if(isset($_POST['submit'])){
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $msg = $_POST['message'];
    $subject = "Contact from wqode.space";    

    # Instantiate the client.
    $mgClient = new Mailgun("key-aa3fb247e126efcd34632167d6633e63");
    $domain = "wqode.space";

    $result = $mgClient->sendMessage($domain, array(
            "from"    => "$name <mailgun@wqode.space>",
            "to"      => $email,
            "subject" => $subject,
            "text"    => $msg
        ));
echo "<script>alert('Email sent.');</script>";
} 
?>