<?php

namespace App\Helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHelper{

    private $password_smtp;
    public function __construct(){
        $this->password_smtp =  require __DIR__ ."/../config/SMTPconfig.php";
    }

    public function sendTicketsViaEmail($attachmentPath){
        $mail = new PHPMailer();

        try{
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "thefestival.haarlem.events@gmail.com";
            $mail->Password = $this->password_smtp['pasword'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom("thefestival.haarlem.events@gmail.com","no-reply");
            $mail->addAddress("relaouare@gmail.com",""); //change tobe dynamic

            $mail->isHTML(true);
            $mail->Subject = "TheFestival Tickets | Haarlem";
            $mail->Body = $this->mailBodyHtml();
            
            $mail->addAttachment($attachmentPath);
            $mail->send();

        }catch(Exception $e){
            $mail->ErrorInfo = $e->getMessage();
            var_dump($mail->ErrorInfo);
        }
    }

    private function mailBodyHtml(): string {
        ob_start();
        include __DIR__ . "/../views/mail/mailTemplate.php";
        return ob_get_clean();
    }


}