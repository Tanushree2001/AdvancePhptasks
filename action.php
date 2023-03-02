<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class Myclass{
  private $mail;

  public function __construct(PHPMailer $mail){
      $this->mail = $mail;
  }
  public function myMethod(){
    $this->mail->isSMTP();  //$this->mailer = SMTP; Send using SMTP
    $this->mail->Host = 'smtp.gmail.com';   //Set the SMTP server to send through
    $this->mail->SMTPAuth  = true;  //Enable SMTP authentication
    $this->mail->Username = 'tanushree.gupta@innoraft.com'; //SMTP username
    $this->mail->Password = 'zpxqrjrbrfdammao'; //SMTP password
    $this->mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
    $this->mail->Port =  587;

    $this->mail->setFrom('tanushree.gupta@innoraft.com');
    $this->mail->addAddress($_POST['emailid']);

    $this->mail->isHTML(true);
    $this->mail->Body = 'Thank you for your submission';

    $this->mail->send();
    echo "Sent Successfully";
  }
}

if(isset($_POST["submit"])){
    $mail = new PHPMailer(true);
    $myobj = new Myclass($mail);
    $myobj->myMethod(); 
}
?>