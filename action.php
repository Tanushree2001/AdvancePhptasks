<?php
use PHPMailer\PHPMailer\PHPMailer;  //composer

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';  //composer
require 'vendor/phpmailer/phpmailer/src/SMTP.php'; //composer

class Myclass{  //created class Myclass
  private $mail;  //variable created in class 

  //constructor created 
  public function __construct(PHPMailer $mail){
      $this->mail = $mail;
  }

  //function myMethod created
  public function myMethod(){
    $this->mail->isSMTP();  //$this->mailer = SMTP; Send using SMTP
    $this->mail->Host = 'smtp.gmail.com';   //Set the SMTP server to send through
    $this->mail->SMTPAuth  = true;  //Enable SMTP authentication
    $this->mail->Username = 'tanushree.gupta@innoraft.com'; //SMTP username
    $this->mail->Password = 'zpxqrjrbrfdammao'; //SMTP password
    $this->mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
    $this->mail->Port =  587; //port number

    $this->mail->setFrom('tanushree.gupta@innoraft.com');  //email sent from this email id
    $this->mail->addAddress($_POST['emailid']); //email send to

    $this->mail->isHTML(true);
    $this->mail->Body = 'Thank you for your submission';  //content of the mail
    $this->mail->send(); //Function for sending
    echo "Sent Successfully"; 
  }
}

if(isset($_POST["submit"])){
    $mail = new PHPMailer(true);  
    $myobj = new Myclass($mail); //object created
    $myobj->myMethod(); //calling function
}
?>