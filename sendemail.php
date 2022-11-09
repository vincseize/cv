<?php

    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }


$name       = @trim(stripslashes($_POST['name'])); 
$from       = @trim(stripslashes($_POST['email'])); 
$subject    = @trim(stripslashes($_POST['subject'])); 

$subject    = "VINCSEIZE.NET MAIL subject : ".$subject; 

$message    = @trim(stripslashes($_POST['message'])); 

$message    .= "\n\n\n".$from; 

$to   		= 'vincseize@gmail.com';//replace with your email

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: {$name} <{$from}>";
$headers[] = "Reply-To: <{$from}>";
$headers[] = "Subject: {$subject}";
$headers[] = "X-Mailer: PHP/".phpversion();

// mail($to, $subject, $message, $headers);

//$to   		= 'vincseize@gmail.com';//replace with your email
//$message = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
//$message = wordwrap($msg,70);

// send email
// mail($to ,$subject,$message);


if(mail($to ,$subject,$message)) echo json_encode(['success'=>true]); 
else echo json_encode(['success'=>false]);
exit;



// die;