<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

if(isset($_POST['email'])) {

    $emailTo = $_POST['email'];
    $code = uniqid(true);
    $sql =("INSERT INTO resetpasswords (code, email) VALUES (:code,:email)");
    $stmt = $pdo->prepare($sql); 
    $stmt->bindValue(':code',$code);   
    $stmt->bindValue(':email',$emailTo);  
    $result =$stmt->execute();    


    $statement = $pdo->prepare("SELECT * FROM resetpasswords");
    $statement->execute();  
    $bb = $statement->fetchAll();
    echo print_r("<pre>");
    echo print_r($bb, true); 
    $code = $bb[0]['code'];
   
    $mail = new PHPMailer(true);
    try {
<<<<<<< HEAD
        // Server settings
        $mail->isSMTP();  //Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth   = true;  //Enable SMTP authentication
        $mail->Username   = 'htaylail.hcis@gmail.com';  //SMTP username
        $mail->Password   = '@htaylailhcis@';  //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //Enable implicit TLS encryption
=======
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'htaylail.hcis@gmail.com';                     //SMTP username
        $mail->Password   = 'password';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
>>>>>>> a069863fc81e87878a20eb5a857b7ad9ead21b70
        $mail ->SMTPSecure = "tls";
        $mail->Port       = 587;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('htaylail.hcis@gmail.com', 'Mailer');
        $mail->addAddress("$emailTo");
    

        // Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = "<h1> Your requested a pssword reset</h1>
                            Click <a href='$url'>this link </a> to reset password";
                           
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
          echo 'Reset password link has been sent to your email';
    } catch (Exception $e) {
       
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
  <div class="form-control">
   <h2>Reset password</h2>    
    <h4>Enter your email to reset your password.</h4>
    <form class="" action="requestReset.php" method="post">
      <div class="form-group">
        <input type="text" name="email" placeholder="Email" autocomplete="off">
      </div>     
      <input class="btn-resetemail" type="submit" name="submit" value="Reset Email">
    </form>
  </div>
</div>
</body>
</html>
