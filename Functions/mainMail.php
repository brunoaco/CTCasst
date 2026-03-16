<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function mainMail(
    $host,
    $username,
    $fromName,
    $password,
    $destinationEmail,
    $subject,
    $emailBody
) {

    if (!filter_var($destinationEmail, FILTER_VALIDATE_EMAIL)) {
        return "invalid email address";
    }

    $mail = new PHPMailer(true);

    try {

        $mail->CharSet = 'UTF-8';

        $mail->isSMTP();
        $mail->Host = $host;
        $mail->SMTPAuth = true;

        $mail->Username = $username;
        $mail->Password = $password;

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Timeout = 30;
        $mail->SMTPDebug = 0;

        $mail->setFrom($username, $fromName);
        $mail->addAddress($destinationEmail);

        $mail->Subject = $subject;
        $mail->Body = $emailBody;
        $mail->isHTML(true);

        $mail->SMTPKeepAlive = false;

        $mail->send();

        return "email sent";

    } catch (Exception $e) {

        return "email error: " . $mail->ErrorInfo;

    }
}
?>