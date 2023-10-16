<?php

// Load Composer's autoloader
require_once("phpmailer/class.smtp.php");
require_once("phpmailer/class.phpmailer.php");
 ob_start();
include "email.php";
$templatemail = ob_get_clean();
$submit = ($submit) ?? isset($_REQUEST['submit']);
if($submit){
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
 
    $no_invoice         = (($_REQUEST['no_invoice']) ?? "123");
    $nama_pengirim      = (($_REQUEST['nama_pengirim']) ?? "Jauhari");
    $email              = ($email) ?? (($_REQUEST['email'])?? "jauharimalikupil@gmail.com");
    $judul = ($judul) ?? (($_REQUEST['email']) ?? "Notifikasi Action Plan");
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'srv59.niagahoster.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'no-repply@dne.zone';                     // SMTP username
    $mail->Password   = 'Angkasapura8481';                               // SMTP password
    $mail->SMTPSecure = 'ssl';
    //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
 
    //Recipients
    $mail->setFrom('no-repply@dne.zone', $judul);
    $mail->addAddress($email, $nama_pengirim);     // Add a recipient
   
    $mail->addReplyTo('no-repply@dne.zone', $judul);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
 
    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Notifikasi Action Plan Pandurasa Kharisma';
    $mail->Body    = $templatemail;    
    $mail->send();
 
}
else{
    echo "Tekan dulu tombolnya bos";
}