<?php
// grabs HTML form's post data; if you customize the form.html parameters then you will need to reference their new new names here
$name = $_POST['name']; 
$email = $_POST['email']; 
$message = $_POST['message'];
$subject = "Contact from wqode.space";

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-aa3fb247e126efcd34632167d6633e63');
$domain = "wqode.space";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Excited User <mailgun@wqode.space>',
    'to'      => 'Baz <hello@wqode.space>',
    'subject' => 'Hello',
    'text'    => 'Testing some Mailgun awesomness!'
));

?>