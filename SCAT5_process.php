<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
//die("hasta aqui");


$clinicianEmail = $_POST['clinicianEmail'] ?? '';
if (empty($clinicianEmail)) {
    die("clinicianEmail required");
}
$patientEmail = $_POST['patientEmail'] ?? '';
if (empty($patientEmail)) {
    die("patientEmail required");
}
$assessmentslink = $_POST['assessmentslink'] ?? '';
if (empty($assessmentslink)) {
    die("assessmentslink required");
}

$screen = [];
for ($i = 1; $i <= 22; $i++) {
    $screen[] = $_POST["screen" . $i];
}
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

//echo $emailBody;

require './Functions/mainMail.php';

$config = require './inc/config.php';

$host = $config['host'];
$username = $config['username'];
$fromName = $config['fromName'];
$password = $config['password'];
$subject = $config['subject'];


$destinationEmail = $clinicianEmail;

$emailResult = mainMail(
    $host,
    $username,
    $fromName,
    $password,
    $destinationEmail,
    $subject,
    $emailBody
);
if ($emailResult == "email sent") { ?>

    <head>
        <title>Redirection</title>
        <script>
            setTimeout(function () {
                window.location.href = "index.html";
            }, 2000); // 2,000 ms = 2 segundos
        </script>
    </head>

    <body>
        <img src="./Assets/Loading.gif" alt="loading">
        <p>You will be redirected to the home page in 2 seconds...</p>
    </body>
    <?php
} else {
    die($emailResult); ?>

    <head>
        <title>Error</title>
    </head>

    <body>
        <p>Your email could not be send...</p>
    </body>
    <?php

}
?>