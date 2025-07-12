<?php
namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        
        // Server settings (Mailtrap configuration)
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
        $this->mail->isSMTP();
        $this->mail->Host = 'sandbox.smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'c612ea540fbc1f'; // Your Mailtrap username
        $this->mail->Password = '54afd59fa93bc1';   // Your Mailtrap password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = '2525';
    }

    public function sendEmail(string $body): bool
    {
        try {
            // Recipients
            $this->mail->setFrom('info@mailtrap.club', 'Car_Rent_App');
            $this->mail->addAddress('mailtrap.club@gmail.com'); // Your default recipient
            
            // Content
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Car Rent App';
            $this->mail->Body = $body;
            $this->mail->AltBody = strip_tags($body); // Create text version automatically

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Mailer Error: {$this->mail->ErrorInfo}");
            return false;
        }
    }
}