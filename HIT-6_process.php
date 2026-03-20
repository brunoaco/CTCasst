<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/




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

//$oneSum = 0;
//$twoSum = 0;
//$threeSum = 0;

function validPost($name)
{

    if (isset($_POST[$name]) && ctype_digit($_POST[$name])) {
        //echo $name . " es un entero positivo: " . $_POST[$name] . "<br>\n";
        return $_POST[$name];
    } else {
        if (isset($_POST[$name])) {
            //echo $name . " no es un entero positivo: " . $_POST[$name] . "<br>\n";
            return $_POST[$name];

        } else {
            //echo $name . " no existe.<br>\n";
            return null;

        }
    }


}

/*
$print_name1 = validPost("print_name1");
$date = validPost("date");
$print_name2 = validPost("print_name2");
$phone = validPost("phone");
$email = validPost("email");
$initials_ltd = validPost("initials_ltd");
$initials_private = validPost("initials_private");*/
$q1 = validPost("q1");
$q2 = validPost("q2");
$q3 = validPost("q3");
$q4 = validPost("q4");
$q5 = validPost("q5");
$q6 = validPost("q6");

$html_rtrn = "  " .
    " <!DOCTYPE html> " .
    " <html lang=\"en\"> " .
    " <head> " .
    "     <meta charset=\"UTF-8\"> " .
    "     <title>HIT-6 Headache Impact Test</title> " .
    "     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"> " .
    "     <style> " .
    "         body { " .
    "             font-family: Arial, Helvetica, sans-serif; " .
    "             background-color: #f8f9fa; " .
    "             margin: 0; " .
    "             padding: 20px; " .
    "         } " .
    "         .container { " .
    "             max-width: 900px; " .
    "             margin: auto; " .
    "             background: #ffffff; " .
    "             padding: 25px; " .
    "             border-radius: 6px; " .
    "             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); " .
    "         } " .
    "         h1 { " .
    "             text-align: center; " .
    "         } " .
    "         .question { " .
    "             margin-bottom: 25px; " .
    "         } " .
    "         .options label { " .
    "             display: block; " .
    "             margin: 6px 0; " .
    "             cursor: pointer; " .
    "         } " .
    "         footer { " .
    "             margin-top: 40px; " .
    "             font-size: 0.9em; " .
    "             color: #555; " .
    "         } " .
    "         .note { " .
    "             margin-top: 20px; " .
    "             padding: 15px; " .
    "             background: #eef2f5; " .
    "             border-left: 4px solid #007bff; " .
    "         } " .
    "     </style> " .
    " </head> " .
    " <body> " .
    "     <div class=\"container\"> " .
    "            <label for=\"patientEmail\" class=\"form-label\">Patient Email: " . $patientEmail . "</label>" .
    "         <h1>HIT-6 Headache Impact Test</h1> " .
    "         <!-- Hidden Inputs --> " .
    "         <input type=\"hidden\" name=\"clinicianEmail\" value=\"$clinicianEmail\"> " .
    "         <input type=\"hidden\" name=\"patientEmail\" value=\"$patientEmail\"> " .
    "         <input type=\"hidden\" name=\"assessmentslink\" value=\"$assessmentslink\"> " .
    "         <p> " .
    "             HIT is a tool used to measure the impact headaches have on your ability to function " .
    "             on the job, at school, at home, and in social situations. Your score shows the effect " .
    "             that headaches have on normal daily life and your ability to function. " .
    "         </p> " .
    "         <p> " .
    "             This questionnaire was designed to help you describe and communicate the way you feel " .
    "             and what you cannot do because of headaches. " .
    "         </p> " .
    "         <p><strong>Instructions:</strong> Please select one answer for each question.</p> " .
    "         <form action=\"HIT-6_process.php\" id=\"myForm\" method=\"post\"> " .
    "             <div class=\"question\"> " .
    "                 <p><strong>1. When you have headaches, how often is the pain severe?</strong></p> " .
    "                 <div class=\"options\"> ";
switch ($q1) {
    case 0:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q1\"> Never</label> ";
        break;
    case 1:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q1\"> Rarely</label> ";
        break;
    case 2:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q1\"> Sometimes</label> ";
        break;
    case 3:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q1\"> Very Often</label> ";
        break;
    case 4:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q1\"> Always</label> ";
        break;
    default:
        break;
}
$html_rtrn = $html_rtrn . "                 </div> " .
    "             </div> " .
    "             <div class=\"question\"> " .
    "                 <p><strong>2. How often do headaches limit your ability to do usual daily activities including household " .
    "                         work, work, school, or social activities?</strong></p> " .
    "                 <div class=\"options\"> ";
switch ($q2) {
    case 0:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q2\"> Never</label> ";
        break;
    case 1:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q2\"> Rarely</label> ";
        break;
    case 2:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q2\"> Sometimes</label> ";
        break;
    case 3:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q2\"> Very Often</label> ";
        break;
    case 4:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q2\"> Always</label> ";
        break;
    default:
        break;
}
$html_rtrn = $html_rtrn .
    "                 </div> " .
    "             </div> " .
    "             <div class=\"question\"> " .
    "                 <p><strong>3. When you have a headache, how often do you wish you could lie down?</strong></p> " .
    "                 <div class=\"options\"> ";
switch ($q3) {
    case 0:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q3\"> Never</label> ";
        break;
    case 1:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q3\"> Rarely</label> ";
        break;
    case 2:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q3\"> Sometimes</label> ";
        break;
    case 3:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q3\"> Very Often</label> ";
        break;
    case 4:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q3\"> Always</label> ";
        break;
    default:
        break;
}
$html_rtrn = $html_rtrn .
    "                 </div> " .
    "             </div> " .
    "             <div class=\"question\"> " .
    "                 <p><strong>4. In the past 4 weeks, how often have you felt too tired to do work or daily activities " .
    "                         because of your headaches?</strong></p> " .
    "                 <div class=\"options\"> ";
switch ($q4) {
    case 0:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q4\"> Never</label> ";
        break;
    case 1:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q4\"> Rarely</label> ";
        break;
    case 2:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q4\"> Sometimes</label> ";
        break;
    case 3:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q4\"> Very Often</label> ";
        break;
    case 4:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q4\"> Always</label> ";
        break;
    default:
        break;
}
$html_rtrn = $html_rtrn .
    "                 </div> " .
    "             </div> " .
    "            <div class=\"question\"> " .
    "                 <p><strong>5. In the past 4 weeks, how often have you felt fed up or irritated because of your " .
    "                         headaches?</strong></p> " .
    "                 <div class=\"options\"> ";
switch ($q5) {
    case 0:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q5\"> Never</label> ";
        break;
    case 1:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q5\"> Rarely</label> ";
        break;
    case 2:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q5\"> Sometimes</label> ";
        break;
    case 3:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q5\"> Very Often</label> ";
        break;
    case 4:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q5\"> Always</label> ";
        break;
    default:
        break;
}
$html_rtrn = $html_rtrn .
    "                 </div> " .
    "             </div> " .
    "             <div class=\"question\"> " .
    "                 <p><strong>6. In the past 4 weeks, how often did headaches limit your ability to concentrate on work or " .
    "                         daily activities?</strong></p> " .
    "                 <div class=\"options\"> ";
switch ($q6) {
    case 0:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q6\"> Never</label> ";
        break;
    case 1:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q6\"> Rarely</label> ";
        break;
    case 2:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q6\"> Sometimes</label> ";
        break;
    case 3:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q6\"> Very Often</label> ";
        break;
    case 4:
        $html_rtrn = $html_rtrn .
            "                     <label><input type=\"radio\" name=\"q6\"> Always</label> ";
        break;
    default:
        break;
}
$html_rtrn = $html_rtrn .
    "                 </div> " .
    "             </div> " .
    //"             <!-- Buttons --> " .
    //"             <div class=\"mt-4 d-flex justify-content-end gap-2 flex-wrap\"> " .
    //"                 <button type=\"button\" class=\"btn btn-secondary\" onclick=\"myForm.reset()\">Cancel</button> " .
    //"                 <button type=\"submit\" class=\"btn btn-primary\">Submit</button> " .
    //"             </div> " .
    "         </form> " .
    "         <footer> " .
    "             ©2001 QualityMetric, Inc. and GlaxoSmithKline Group of Companies. All rights reserved. " .
    "         </footer> " .
    "     </div> " .
    " </body> " .
    " </html> ";
//echo $html_rtrn;
//die("hasta aqui");
//echo $html_rtrn;
//die("hasta aqui");
$emailBody = $html_rtrn;
//echo $emailBody;

require './Functions/mainMail.php';

$config = require './inc/config.php';

$host = $config['host'];
$username = $config['username'];
$fromName = $config['fromName'];
$password = $config['password'];
$subject = $config['subject'];

/*
echo "<pre>";
echo ("host:" . $host . ",\n<br>" .
    "username:" . $username . ",\n<br>" .
    "fromName:" . $fromName . ",\n<br>" .
    "password:" . $password . ",\n<br>" .
    "destinationEmail:" . $clinicianEmail . ",\n<br>" .
    "subject:" . $subject . ",\n<br>" .
    //"emailBody:" . $emailBody.
    ""
);
echo "</pre>";
*/

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