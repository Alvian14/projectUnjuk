<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender {
    private $smtpHost = 'smtp.gmail.com';
    private $smtpUsername = 'arenafinder.app@gmail.com';
    private $smtpPassword = 'hftf uheb ztey nokf';
    private $smtpPort = 587;
    private $fromEmail = 'arenafinder.app@gmail.com';
    private $fromName = 'ArenaFinder Dev';

    public function generateOTP($length = 6) {
        $otp = '';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, $charactersLength - 1)];
        }
        return $otp;
    }

    public function sendEmail($email, $type, $otp) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = $this->smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $this->smtpUsername;
            $mail->Password = $this->smtpPassword;
            $mail->SMTPSecure = 'tls';
            $mail->Port = $this->smtpPort;

            $mail->setFrom($this->fromEmail, $this->fromName);
            $mail->addAddress($email);
            $mail->Subject = "$otp adalah Kode OTP Anda";

            if ($type === "SignUp") {
                $mail->Body = 'Gunakan kode otp berikut untuk memverifikasi akun anda: ' . $otp;
            } else if ($type === "ForgotPass") {
                $mail->Body = 'Gunakan kode otp berikut untuk mengganti password anda: ' . $otp;
            }

            // kirim email
            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

?>