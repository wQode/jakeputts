<?php
if(isset($_POST['submit'])){
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $message = $_POST['message'];
    $subject = "Contact from wqode.space";    
    if($name !="" && $msg != ""){
        $ip_address = $_SERVER['REMOTE_ADDR'];
        send_mail("wqodes@gmail.com", "New Message from wqode.space","The IP ($ip_address) has sent you a message: <blockquote>$msg</blockquote>");
        echo "<h2 style='color:green;'>Your message Has Been Sent</h2>";
    }else{
        echo "<h2 style='color:red;'>Please check all fields</h2>";
    }
}
?>