<?php
require 'phpmailer/phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/autoload.php';

$mail = new PHPMailer(true);

  if(isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
     $mesg = htmlspecialchars(trim($_POST['message']));
    $spammail =  htmlspecialchars(trim($_POST['spammail']));
     if (isset($spammail) & !empty($spammail)) {
      die(header('location:index.php'));
      // echo'spam';
    } else {
    
    $message = "<html><body>
            <p>This email from {$name}</p>
           <table border=1 style='width:500px;' cellpadding=5 cellspacing=0>
           <tr><td>Name</td><td>{$name}</td></tr>
           <tr><td>Email</td><td>{$email}</td></tr>
           <tr><td>Subject.</td><td>{$subject}</td></tr>
          // <tr><td>Message</td><td>{$mesg}</td></tr>
     </table></body></html>";

    try {
            //Server settings
            $mail->isSMTP('smtp');                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';        //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                               //Enable SMTP authentication
            $mail->SMTPDebug   = 0;
            $mail->Username   = 'rimpaljeetkaur3@gmail.com';                             //SMTP username
            $mail->Password   = 'Arsh@123456';     //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                     //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
           $mail->setFrom($email, $name);
           $mail->addAddress('rimpaljeetkaur3@gmail.com');     //Add a recipient
                      //Name is optional
           $mail->addReplyTo($email, 'thanku for sending mail');
//            $mail->addCC('atwimmigration@yahoo.com');
        #    $mail->addBCC('bcc@example.com');

            //Attachments
          //  $mail->addAttachment('thanku for sending mail');         //Add attachments
        #    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject ;
            $mail->Body    = $message;
        #    $mail->AltBody = 'hello';

           if( $mail->send()){
             echo "<script> alert('Mail sent successfull ,Thanks $name');
              window.setTimeout(function(){
              window.location.href = 'index.php';
              }, 1);
              </script>";
               exit();
              }
          else{
             echo '<script type="text/javascript">';
             echo ' alert("Mail Faild ,try again ")';  //not showing an alert box.
             echo '</script>';
             exit();
            }
        
        } catch (Exception $e) {
            echo $e->getMessage();
        }
  }
  }
  
  if(isset($_POST['send'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    // $phone = htmlspecialchars(trim($_POST['phone']));
     $mesg = htmlspecialchars(trim($_POST['message']));
   $subject = "student enquiary";
   
      if (isset($spammail) & !empty($spammail)) {
      die(header('location:index.php'));
      // echo'spam';
    } else {
    $message = "<html><body>
    <p>This email sent from {$name} </p>
    <table border=1 style='width:500px;' cellpadding=5 cellspacing=0>
    <tr><td>Name</td><td>{$name}</td></tr>
    <tr><td>Email</td><td>{$email}</td></tr>
    <tr><td>Subject.</td><td>{$subject}</td></tr>
    //  <tr><td>Contact No.</td><td>{$phone}</td></tr>
    <tr><td>Message</td><td>{$mesg}</td></tr>
    </table></body></html>";

    try {
            //Server settings
            $mail->isSMTP('smtp');                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';         //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                //Enable SMTP authentication
            $mail->Username   = 'gcmuktsarenquiry';     //SMTP username
            $mail->Password   = 'ajmylpyicsxuceek';                  //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                     //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
           $mail->setFrom($email, $name);
           $mail->addAddress('rimpaljeetkaur3@gmail.com');     //Add a recipient
                         //Name is optional
           $mail->addReplyTo($email, 'thanku for sending mail');
//            $mail->addCC('atwimmigration@yahoo.com');
        #    $mail->addBCC('bcc@example.com');

            //Attachments
        #    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        #    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
        #    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

           if( $mail->send()){
             echo "<script> alert('Mail sent successfull ,Thanks $name');
           window.setTimeout(function(){
           window.location.href = 'index.php';
            }, 1);
           </script>";
            exit();
             }
          else{
             echo '<script type="text/javascript">';
             echo ' alert("Mail Faild ,try again ")';  //not showing an alert box.
             echo '</script>';
             exit();
            }
         }  
          catch (Exception $e) {
             echo $e->getMessage();
            
        }
        
}
}