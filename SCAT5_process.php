<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
//die("hasta aqui");


$clinicianEmail = $_POST["clinicianEmail"];
$patientEmail = $_POST["patientEmail"];
$assessmentslink = $_POST["assessmentslink"];

$screen = [];
for ($i = 1; $i <= 22; $i++) {
    $screen[] = $_POST["screen" . $i];
}
//print_r($screen);
//die("hasta aqui");
$i = 0;

$emailBody = "<!doctype html>";
$emailBody = $emailBody . " ";
$emailBody = $emailBody . "<html><head>";
$emailBody = $emailBody . "    <meta charset=\"UTF-8\">";
$emailBody = $emailBody . "    <title>Symptoms Table</title>";
$emailBody = $emailBody . "</head>";
$emailBody = $emailBody . "<body>";
$emailBody = $emailBody . "        <div>";
$emailBody = $emailBody . "        <div class=\"row \">";
$emailBody = $emailBody . "            <div class=\"col-auto\">";
$emailBody = $emailBody . "                <h1>Excerpt from SCAT 5</h1>";
$emailBody = $emailBody . "                <h3>Patient Email: $patientEmail</h3>";
$emailBody = $emailBody . "                <form >";
$emailBody = $emailBody . "                    <table border=\"1\">";
$emailBody = $emailBody . "                        <thead >";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <th class=\"text-start\">Symptom</th>";
$emailBody = $emailBody . "                                <th>Severity</th>";
$emailBody = $emailBody . "                            </tr>";
$emailBody = $emailBody . "                        </thead>";
$emailBody = $emailBody . "                        <tbody>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Headache</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "                            </tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Pressure in Head</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Neck Pain</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "                            </tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Nausea or vomiting</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Dizziness</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Blurred Vision</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Balance Problems</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Sensitivity to Light</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Sensitivity to noise</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Feeling slowed down</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Feeling like &ldquo;in a fog&rdquo;</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >&ldquo;Don't feel right&rdquo;</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Difficulty concentrating</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Difficulty remembering</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Fatigue or low energy</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Confusion</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Drowsiness</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >More emotional</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Irritability</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Sadness</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Nervous or Anxious</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "                            <tr>";
$emailBody = $emailBody . "                                <td >Trouble falling asleep</td>";
$emailBody = $emailBody . "                                <td>" . $screen[$i++] . "</td>";
$emailBody = $emailBody . "							</tr>";
$emailBody = $emailBody . "							<tr><td>Do the symptoms get worse with <b>physical</b> activity?</td><td>";
if ($_POST["physical"] == 1) {
    $emailBody = $emailBody . "	Yes ";
} else {
    $emailBody = $emailBody . "	No ";

}

$emailBody = $emailBody . "	</td></tr>";
$emailBody = $emailBody . "							<tr><td>Do the symptoms get worse with <b>mental</b> activity? </td><td>";
if ($_POST["mental"] == 1) {
    $emailBody = $emailBody . "	Yes ";
} else {
    $emailBody = $emailBody . "	No ";

}
$emailBody = $emailBody . "	</td></tr>";
$emailBody = $emailBody . "							<tr><td>If 100% is feeling perfectly normal, what percent of normal do you feel?</td><td>" . $_POST["painScale"] . "/100</td></tr>";
$emailBody = $emailBody . "							<tr><td>If not 100%, why?</td><td>" . $_POST["comments"] . "</td></tr>";
$emailBody = $emailBody . "                        </tbody>";
$emailBody = $emailBody . "                    </table>";
$emailBody = $emailBody . "                </form>";
$emailBody = $emailBody . "            </div>";
$emailBody = $emailBody . "        </div>";
$emailBody = $emailBody . "    </div>";
$emailBody = $emailBody . "</body> ";
$emailBody = $emailBody . "</html>";

//echo "<pre>" . $emailBody . "</pre>";
//die("hasta aqui");

//echo 'send email from google email' . '<br>';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
//die("hasta aqui");
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'brunoaco@gmail.com';
    $mail->Password = 'qomu csty rxve vfsi'; // OJO: NO es tu contraseña normal
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Datos del email
    $mail->setFrom($clinicianEmail, 'Patient');//origin
    $mail->addAddress($clinicianEmail);//destination//$patientEmail
    $mail->Subject = 'Requested PHQ-9';
    $mail->Body = $emailBody;
    $mail->IsHTML(true);       // <=== call IsHTML() after $mail->Body has been set.
    //die("hasta aqui");
    $mail->send();//this is where the magic happens
    echo "Email sent.\n<br><br><br><button onclick=\"window.close()\">Close Window</button>";
    //die("hasta aqui!");
} catch (Exception $e) {
    echo "Error : {$mail->ErrorInfo}";
}
?>