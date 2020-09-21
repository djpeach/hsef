<?php

  // PHP Mailer documentation/libraries
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  include_once('PHPMailer/src/PHPMailer.php');
  include_once('PHPMailer/src/SMTP.php');
  include_once('PHPMailer/src/Exception.php');


 class Mailer {
   private static $instance;

   private function __construct(){

   }

   public static function get() {
     if(!isset(self::$instance )){
       self::$instance = new Mailer();
     }
     return self::$instance;
   }

   // sends email to judge who has registered and been accepted by judge
   public function sendNewJudgeEmailApproved($email, $args) {
     $to = $email;

     $body = "
      <div style='text-align: center; margin: auto;'>
       <div style='height: 3%; top: 0; right: 0; left: 0; bottom: 2%; position: fixed;background-color: #184d47;'> </div>

      <div>
        <img style='align-items: center; margin: auto;padding-top: 2%;max-width: 50%;' src='logo.jpg' alt='HSEF logo'>
      </div>

      <div style=' max-width: 600px; margin: auto; background-color: #f5f5f5; padding: 8%;'>
       <h4>APPLICATION HAS BEEN APPROVED!</h4>
        <h1>Your registration is complete.</h1>
      </div>

      <div style='max-width: 600px; margin: auto; padding: 8%;'>
      
        <button style='background-color: #f2af00;width: 100%;border-radius: 5px;border: solid;border-color: #f2af00; margin: 2%;padding: 2%;' type='button' name='login'> HSEF Login</button>
       
        <button style='background-color: #f2af00;width: 100%;border-radius: 5px;border: solid;border-color: #f2af00; margin: 2%;padding: 2%;' type='button' name='sefi'>SEFI Home Page</button>
      </div>
     </div>
     ";
     $body .= "";


     sendMail($to, $body);
   }

   // send email to judge who has been INVITED and has confirmed account information
   // email should include randomly generated password
   public function sendNewJudgeEmailConfirmed($email, $args) {
     $to = $email;

     $body = "
      <div style='text-align: center; margin: auto;'>
       <div style='height: 3%; top: 0; right: 0; left: 0; bottom: 2%; position: fixed;background-color: #184d47;'> </div>

      <div>
        <img style='align-items: center; margin: auto;padding-top: 2%;max-width: 50%;' src='logo.jpg' alt='HSEF logo'>
      </div>

      <div style=' max-width: 600px; margin: auto; background-color: #f5f5f5; padding: 8%;'>
       <h4>THANKS FOR JOINING!</h4>
        <h1>Your registration is complete.</h1>
      </div>

      <div style='max-width: 600px; margin: auto; padding: 8%;'>
      
        <button style='background-color: #f2af00;width: 100%;border-radius: 5px;border: solid;border-color: #f2af00; margin: 2%;padding: 2%;' type='button' name='login'> HSEF Login</button>
       
        <button style='background-color: #f2af00;width: 100%;border-radius: 5px;border: solid;border-color: #f2af00; margin: 2%;padding: 2%;' type='button' name='sefi'>SEFI Home Page</button>
      </div>
     </div>
     
     ";


     sendMail($to, $body);
   }

 }