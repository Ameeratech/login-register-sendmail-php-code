<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// require 'C:\xampp\htdocs\firstobject\vendor\phpmailer\phpmailer\src\exception.php';
// require 'C:\xampp\htdocs\firstobject\vendor\phpmailer\phpmailer\src\SMTP.php';
// require 'C:\xampp\htdocs\firstobject\vendor\phpmailer\phpmailer\src\PHPMailer.php';
// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->isSMTP();  
    $mail->mailer= 'smtp';                                          // Send using SMTP
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'enter your email';                     // SMTP username
    $mail->Password   = 'your password';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('email from');
    $mail->addAddress('email to');     // Add a recipient
    // Attachments
     // Optional name

    // Content
    $mail->isHTML(true);            // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send());
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}