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

# Instantiate the client.
$mgClient = new Mailgun("pubkey-bf4d623ad021b625f38bee21e8fb305b");
$domain = "wqode.space";



if(isset($_POST['submit'])){
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $msg = $_POST['message'];
    $subject = "Contact from wqode.space";    
    if($name !="" && $msg != ""){
        # Make the call to the client.
        $mg->sendMessage($domain, array(
            'from'    => $name,
            'to'      => $email,
            'subject' => $subject,
            'text'    => $msg
        ));

/*
        $ip_address = $_SERVER['REMOTE_ADDR'];
        send_mail("wqodes@gmail.com", "New Message from wqode.space","The IP ($ip_address) has sent you a message: <blockquote>$msg</blockquote>");
*/
        echo "<h2 style='color:green;'>Your message Has Been Sent</h2>";
    }else{
        echo "<h2 style='color:red;'>Please check all fields</h2>";
    }
} 
?>