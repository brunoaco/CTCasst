<!DOCTYPE html>
<html>


<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
//die("hasta AQUI");
*/

require "./Functions/createToken.php";
$pdo = new PDO("sqlite:mydatabase.db");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Mostrar errores (opcional)
ini_set('display_errors', 1);
error_reporting(E_ALL);

//header('Content-Type: text/plain; charset=utf-8');// do i need to ouput everything in plain text?

//echo "=== POST PARAMETERS RECEIVED ===\n\n";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "No POST data received. Use a form to submit data.\n";
    exit;
}

if (empty($_POST)) {
    echo "POST is empty.\n";
    exit;
}

$clinicianEmail = $_POST["clinicianEmail"];
if (empty($clinicianEmail)) {
    echo "clinicianEmail is empty\n";
}

$patientEmail = $_POST["patientEmail"];
if (empty($patientEmail)) {
    //echo "patientEmail is empty\n";
}

$maxCount = $_POST["maxCount"];
if (empty($maxCount)) {
    //echo "maxCount is empty\n";
}

$assessmentslinks = [];
for ($i = 1; $i <= $maxCount; $i++) {
    $assessmentslinkI = '';
    if (isset($_POST['assessmentslink' . $i])) {
        $assessmentslinkI = $_POST["assessmentslink" . $i];
        $assessmentslinks[] = $assessmentslinkI;
    }
}


require "./Functions/formExtract.php";

//print_r($assessmentslinks);
//echo ("count()=" . count($assessmentslinks) . "\n");
if ($maxCount > count($assessmentslinks)) {
    $maxCount = count($assessmentslinks);
}
//echo ("maxcount:$maxCount\n");
//die("hasta aqui");

$formname = [];
for ($i = 0; $i <= $maxCount - 1; $i++) {
    $formnameI = formExtract($assessmentslinks[$i]);//$_POST["formname"];
    $formname[] = $formnameI;
}

$links = "";
$token = [];

for ($i = 0; $i <= $maxCount - 1; $i++) {
    $data = [
        'clinicianEmail' => $clinicianEmail,
        'patientEmail' => $patientEmail,
        'assessmentslink' => $assessmentslinks[$i],
        'formname' => $formname[$i],
    ];
    $tokenN = createToken($pdo, $data, 86400); // 24 horas

    $token[] = $tokenN;
}
require "./Functions/linkWithTokenOnly.php";

for ($i = 0; $i <= $maxCount - 1; $i++) {
    $links .= linkWithTokenOnly($assessmentslinks[$i], $token[$i]);
}

//echo "<pre>links: " . $links . "</pre>\n";


$emailBody = "<!doctype html>";
$emailBody = $emailBody . "<html lang=\"en\">";
$emailBody = $emailBody . "<head>";
$emailBody = $emailBody . "  <meta charset=\"utf-8\">";
$emailBody = $emailBody . "  <meta name=\"viewport\" content=\"width=device-width\">";
$emailBody = $emailBody . "  <title>Your Assessment Documents</title>";
$emailBody = $emailBody . "  <style>";
$emailBody = $emailBody . "    body { margin:0; padding:0; background-color:#f4f4f6; font-family: Arial, sans-serif; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }";
$emailBody = $emailBody . "    table { border-collapse: collapse; }";
$emailBody = $emailBody . "    .container { width:100%; max-width:600px; margin:0 auto; background:#ffffff; }";
$emailBody = $emailBody . "    .pad { padding:20px; }";
$emailBody = $emailBody . "    h1 { font-size:20px; margin:0 0 12px 0; color:#111827; }";
$emailBody = $emailBody . "    p { margin:0 0 12px 0; color:#374151; line-height:1.4; }";
$emailBody = $emailBody . "    .btn { display:inline-block; padding:10px 18px; background:#0d6efd; color:#ffffff; text-decoration:none; border-radius:6px; font-weight:600; }";
$emailBody = $emailBody . "    .muted { color:#6b7280; font-size:13px; }";
$emailBody = $emailBody . "    .list { margin:12px 0; padding-left:18px; color:#374151; }";
$emailBody = $emailBody . "    .footer { font-size:12px; color:#9ca3af; padding:16px 20px; text-align:center; }";
$emailBody = $emailBody . "    @media only screen and (max-width:420px) {";
$emailBody = $emailBody . "      .pad { padding:14px; }";
$emailBody = $emailBody . "      .btn { padding:10px 14px; display:block; text-align:center; }";
$emailBody = $emailBody . "    }";
$emailBody = $emailBody . "  </style>";
$emailBody = $emailBody . "</head>";
$emailBody = $emailBody . "<body>";
$emailBody = $emailBody . "  <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\">";
$emailBody = $emailBody . "    <tr>";
$emailBody = $emailBody . "      <td align=\"center\" style=\"padding:24px 12px;\">";
$emailBody = $emailBody . "        <table class=\"container\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\">";
$emailBody = $emailBody . "          ";
$emailBody = $emailBody . "          <!-- Header -->";
$emailBody = $emailBody . "          <tr>";
$emailBody = $emailBody . "            <td class=\"pad\" style=\"border-bottom:1px solid #eef2f7;\">";
$emailBody = $emailBody . "              <h1>Your Assessment Documents</h1>";
//$emailBody = $emailBody . "              <p class=\"muted\">Sent by: <strong>{{clinicianName}}</strong></p>";
$emailBody = $emailBody . "            </td>";
$emailBody = $emailBody . "          </tr>";
$emailBody = $emailBody . "          <!-- Body -->";
$emailBody = $emailBody . "          <tr>";
$emailBody = $emailBody . "            <td class=\"pad\">";
$emailBody = $emailBody . "              <p>Hello <strong>$patientEmail</strong>,</p>";
$emailBody = $emailBody . "              <p>The following assessments/forms have been prepared for you:</p>";
$emailBody = $emailBody . "              <!-- Dynamically generated list -->";
$emailBody = $emailBody . "              <ul class=\"list\">";
$emailBody = $emailBody . "                {{assessmentsList}}";
$emailBody = $emailBody . "                <!-- Example:";
$emailBody = $emailBody . "                <li>PHQ-9 — <span class=\"muted\">Depression Assessment</span></li>";
$emailBody = $emailBody . "                -->";
$emailBody = $emailBody . "              </ul>";
//$emailBody = $emailBody . "              <p>You can access them through the link below:</p>";
//$emailBody = $emailBody . "              <p style=\"text-align:center; margin:18px 0;\">";
//$emailBody = $emailBody . "                <a class=\"btn\" href=\"{{ctaUrl}}\" target=\"_blank\" rel=\"noopener\">View My Assessments</a>";
//$emailBody = $emailBody . "              </p>";
$emailBody = $emailBody . "              <p class=\"muted\">";
$emailBody = $emailBody . "                If you did not request this or believe it was sent in error, please reply to this email or contact ";
$emailBody = $emailBody . "                <a href=\"mailto:$clinicianEmail\">$clinicianEmail</a>.";
$emailBody = $emailBody . "              </p>";
$emailBody = $emailBody . "            </td>";
$emailBody = $emailBody . "          </tr>";
$emailBody = $emailBody . "          <!-- Footer -->";
$emailBody = $emailBody . "          <tr>";
$emailBody = $emailBody . "            <td style=\"background:#fafafa; border-top:1px solid #eef2f7;\">";
$emailBody = $emailBody . "              <div class=\"footer\">";
$emailBody = $emailBody . "                <div>Creative Therapy Consultants - Phone: <a href=\"tel:+1-236-422-4778\">+1 (236) 422-4778</div>";
$emailBody = $emailBody . "                <div style=\"margin-top:6px;\">&copy; <span id=\"year\">2026</span> All rights reserved</div>";
$emailBody = $emailBody . "              </div>";
$emailBody = $emailBody . "            </td>";
$emailBody = $emailBody . "          </tr>";
$emailBody = $emailBody . "        </table>";
$emailBody = $emailBody . "      </td>";
$emailBody = $emailBody . "    </tr>";
$emailBody = $emailBody . "  </table>";
$emailBody = $emailBody . "</body>";
$emailBody = $emailBody . "</html>";
$emailBody = $emailBody . "";
$emailBody = $emailBody . "";
$emailBody = $emailBody . "";

$emailBody = str_replace("{{assessmentsList}}", $links, $emailBody);


require './Functions/mainMail.php';

$config = require './inc/config.php';

$host = $config['host'];
$username = $config['username'];
$fromName = $config['fromName'];
$password = $config['password'];
$subject = $config['subject'];

if (empty($links)) {
    ?><button type="button" onclick="javascript:history.back()">Back</button>
    <?php
} else {


    if (
        "email sent" == mainMail(
            $host,
            $username,
            $fromName,
            $password,
            $patientEmail,
            $subject,
            $emailBody
        )
    ) { ?>


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


        <?

    } else { ?>


        <head>
            <title>Error</title>
        </head>

        <body>
            <p>Your email could not be send...</p>
        </body>


        <?

    }

}

//die("done checking");


?>

</html>