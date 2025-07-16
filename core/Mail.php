<?php
namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require base_path('vendor/autoload.php');
class Mail
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        
        // Server settings (Mailtrap configuration)
        $this->mail->SMTPDebug = 0;  // Enable verbose debug output
        $this->mail->isSMTP();
        $this->mail->Host = 'sandbox.smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'a7bd0c701c4316'; // Your Mailtrap username
        $this->mail->Password = '007135b907e7f8';   // Your Mailtrap password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
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
           
            return false;
        }
    }
}