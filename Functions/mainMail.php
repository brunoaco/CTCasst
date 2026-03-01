<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function mainMail($host, $username, $fromName, $password, $patientEmail, $subject, $emailBody)
{


    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = $host;//"smtp-mail.outlook.com";//'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $username;//'Assessments@creativetherapyconsultants.ca'//'brunoaco@gmail.com';
        $mail->Password = $password;//'@7@!Ass3ssm3n7s';//'qomu csty rxve vfsi'; // OJO: NO es tu contraseña normal
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Datos del email
        $mail->setFrom($username, $fromName);//'Automatic Assessment Request Service' //origin
        $mail->addAddress($patientEmail);//destination
        $mail->Subject = $subject;//'Assessment Request';
/*
        $emailBody = str_replace("{{assessmentsList}}", $links, $emailBody);
*/
        $mail->Body = $emailBody;
        $mail->IsHTML(true);       // <=== call IsHTML() after $mail->Body has been set.

        $mail->send();//this is where the magic happens
        echo "Correo enviado correctamente\n";

        echo 'email sent' . '<br>';
    } catch (Exception $e) {
        echo "Error : {$mail->ErrorInfo}";
    }
}
?>