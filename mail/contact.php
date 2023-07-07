<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "dabangayush369@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$headers = "From: ".$name." <".$email.">\r\n"; $headers = "Reply-To: ".$email."\r\n"; 
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
'X-Mailer: PHP/' . phpversion();

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>