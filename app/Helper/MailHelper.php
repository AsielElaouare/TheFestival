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

            $mail->setFrom("thefestival.haarlem.events@gmail.com","Test");
            $mail->addAddress("elaouareasiel82@gmail.com","Asiel  test");

            $mail->isHTML(true);
            $mail->Subject = "TEsting from php app";
            $mail->Body = "
            <html>
                <h1>
                    this is a test inside a h1
                </h1>
            </html>
            ";
            
            $mail->addAttachment($attachmentPath);

            $mail->send();

        }catch(Exception $e){
            $mail->ErrorInfo = $e->getMessage();
            var_dump($mail->ErrorInfo);
        }
    }


}