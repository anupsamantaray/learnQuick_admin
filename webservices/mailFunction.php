<?php
function sendMail1($subject, $body, $to, $bcc='', $cc='') {
    
    
//require_once("class.phpmailer.php");//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;

//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';

//Set the hostname of the mail server
 $mail->Host = 'smtp.gmail.com';
//$mail->Host = 'www.bkcdiamonds.com';
//$mail->Host = 'smtp.ipage.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;
//$mail->Port = 587;


//Set the encryption system to use - ssl (deprecated) or tls
//$mail->SMTPSecure = 'tls';
$mail->SMTPSecure = 'ssl';


//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail

 $mail->Username = 'salesandroapps@gmail.com';
//$mail->Username = "info@bkcdiamonds.com";
//$mail->Username = "noreply@ryde.co.in";

//Password to use for SMTP authentication
$mail->Password = 'androappstech@123'; 
//$mail->Password = "Pwd@1234";
 //$mail->Password = "bkc@123";

//Set who the message is to be sent from
 //$mail->setFrom('info@bkcdiamonds.com','BKC DIAMONDS');

$mail->setFrom('salesandroapps@gmail.com', 'androApps');
//$mail->setFrom('noreply@ryde.co.in', 'Ryde');


//Set an alternative reply-to address
//$mail->addReplyTo('salesandroapps@gmail.com', 'Ryde');
//$mail->addReplyTo('noreply@ryde.co.in', 'Ryde');

//Set who the message is to be sent to
$mail->addAddress($to);
if($bcc!=''){
$mail->AddBCC($bcc);
}else{
    //$mail->AddBCC('abcd@gmail.com');
}
//Set the subject line
$mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($body);

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
}}

?>