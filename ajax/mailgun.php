<?php
if(empty($_POST) || !isset($_POST)) {
  
  ajaxRespsonse('error', 'Post cannot be empty.');

} else {
  
  $postData = $_POST;
  $dataString = implode($postData,",");

  $mailgun = sendMailgun($postData);

  if($mailgun) {

    ajaxResponse('success', 'Success - Mailgun connected', $postData, $mailgun);

  } else {

    ajaxResponse('error', 'Mailgun did not connect.', $postData, $mailgun);

  }

}

function ajaxResponse($status, $message, $data = NULL, $mg = NULL) {
  $response = array (
    'status' => $status,
    'message' => $message,
    'data' => $data,
    'mailgun' => $mg
  );
  $output = json_encode($response);
  exit($output);
}

function sendMailgun($data) {
  
  $api_key = 'key-aa3fb247e126efcd34632167d6633e63';
  $api_domain = 'wqode.space';
  $send_to = 'wqodes@gmail.com';

  $name = $data['name'];
  $email = $data['email'];
  $content = $data['message'];

  $messageBody = "Contact: $name ($email)\n\nMessage: $content";

  $config = array();
  $config['api_key'] = $api_key;
  $config['api_url'] = 'https://api.mailgun.net/v3/'.$api_domain.'/messages';

  $message = array();
  $message['from'] = $email;
  $message['to'] = $send_to;
  $message['h:Reply-To'] = $email;
  $message['subject'] = $data['subject'];
  $message['text'] = $messageBody;

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, $config['api_url']);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($curl, CURLOPT_USERPWD, "api:{$config['api_key']}");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curl, CURLOPT_SSL_VERFIYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERFIYHOST, 0);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $message);

  $result = curl_exec($curl);

  curl_close($curl);
  return $result;

}
?>