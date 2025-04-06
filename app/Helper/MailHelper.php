<?php

namespace App\Helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailHelper{

    private $password_smtp;
    private $mail;

    public function __construct(){
        $this->password_smtp =  require __DIR__ ."/../config/SMTPconfig.php";
        $this->mail = new PHPMailer();
        $this->mail->SMTPDebug = 0;
        $this->mail->isSMTP();
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->SMTPAuth = true;
        $this->mail->Username = "thefestivalh@gmail.com";
        $this->mail->Password = $this->password_smtp['password'];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
        $this->mail->setFrom("thefestivalh@gmail.com","no-reply");
    }

    public function sendTicketsViaEmail($attachmentPathPDF, $customerMail){
        try{
            $this->mail->addAddress($customerMail); 
            $this->mail->isHTML(true);
            $this->mail->Subject = "TheFestival Tickets | Haarlem";
            $this->mail->Body = $this->mailBodyHtml();
            $this->mail->addAttachment($attachmentPathPDF);
            $this->mail->send();
            
        }catch(Exception $e){
            $this->mail->ErrorInfo = $e->getMessage();
            var_dump($this->mail->ErrorInfo);
        }
    }


    private function mailBodyHtml(): string {
        ob_start();
        include __DIR__ . "/../views/mail/mailTemplate.php";
        return ob_get_clean();
    }
}