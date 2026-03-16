<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
die("hasta aqui");
*/




$clinicianEmail = $_POST["clinicianEmail"];
$patientEmail = $_POST["patientEmail"];
$assessmentslink = $_POST["assessmentslink"];



$overall = $_POST["overall"];
$difficulty = $_POST["difficulty"];
$pd = [];
for ($i = 1; $i <= 15; $i++) {//keep in mind arrays start at 0!!!!
    $pd[] = $_POST["pd" . $i];
}
//$i = 0;

/*
echo "<pre>pd:";
print_r($pd);
echo "</pre>";*/

$phq = [];
for ($i = 1; $i <= 9; $i++) {//keep in mind arrays start at 0!!!!
    $phq[] = $_POST["phq" . $i];
}
//$i = 0;

/*
echo "<pre>phq:";
print_r($phq);
echo "</pre>";*/

$di = [];
for ($i = 1; $i <= 5; $i++) {//keep in mind arrays start at 0!!!!
    $di[] = $_POST["di" . $i];
}
//$i = 0;

/*
echo "<pre>phq:";
print_r($phq);
echo "</pre>";*/

$ffq = [];
for ($i = 1; $i <= 10; $i++) {//keep in mind arrays start at 0!!!!
    $ffq[] = $_POST["ffq" . $i];
}
//$i = 0;

/*
echo "<pre>ffq:";
print_r($ffq);
echo "</pre>";*/

$cieq = [];
for ($i = 1; $i <= 12; $i++) {//keep in mind arrays start at 0!!!!
    $cieq[] = $_POST["cieq" . $i];
}

/*
echo "<pre>cieq:";
print_r($cieq);
echo "</pre>";*/


function pdMeaning($val)
{
    switch ($val) {
        case 0:
            return "No Pain";
            break;
        case 1:
            return "Mild";
            break;
        case 2:
            return "Discomforting";
            break;
        case 3:
            return "Distressing";
            break;
        case 4:
            return "Horrible";
            break;
        case 5:
            return "Excruciating";
            break;
        // ... more cases
        default:
            return "Defeult";
    }
}
function overallPMeaning($val)
{
    switch ($val) {
        case 0:
            return "No Pain";
            break;
        case 1:
            return "Mild";
            break;
        case 2:
            return "Discomforting";
            break;
        case 3:
            return "Distressing";
            break;
        case 4:
            return "Horrible";
            break;
        case 5:
            return "Excruciating";
            break;
        // ... more cases
        default:
            return "Defeult";
    }
}
function PHQMeaning($val)
{
    switch ($val) {
        case 0:
            return "Not at all";
            break;
        case 1:
            return "Several days";
            break;
        case 2:
            return "More than half the days";
            break;
        case 3:
            return "Nearly every day";
            break;
        default:
            return "Defeult";
    }
}
function FFQMeaning($val)
{
    switch ($val) {
        case 0:
            return "do not agree";
            break;
        case 1:
            return "somewhat agree";
            break;
        case 2:
            return "completely agree";
            break;
        default:
            return "Defeult";
    }
}
function CIEQMeaning($val)
{
    switch ($val) {
        case 0:
            return "never";
            break;
        case 1:
            return "sometimes ";
            break;
        case 2:
            return "often";
            break;
        default:
            return "Defeult";
    }
}
$i = 1;
$ii = 1;
$iii = 1;
$iv = 1;
$v = 1;

$emailBody = " <!DOCTYPE html><html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">" .
    " <link rel=\"stylesheet\" type=\"text/css\" href=\"cid:css-0f70a980-93a4-4eb1-9653-8445db8b283d@mhtml.blink\" />" .
    "     <title>PGAP Assessment Measures</title>" .
    "     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">" .
    " </head>" .
    " <body>" .
    "         <form id=\"myForm\" method=\"post\">" .
    "         <br>" .
    "         <div class=\"section\"><h3>Patient Email: $patientEmail</h3>" .
    "             " .
    "             <table border=\"1\">" .
    "                 <tbody>" .
    "                 <tr><th colspan=2><h2>Short-Form McGill Pain Questionnaire</h2>" .
    "             <p>Indicate the severity of the pain you experience at this moment.</p></th></tr>" .
    "                 <tr><th>Pain Descriptor</th><th><p>0= No Pain<br>1= Mild<br>2= Discomforting<br>3= Distressing<br>4= Horrible<br>5= Excruciating</p></th></tr>" .
    "                 <tr><td>Throbbing</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Shooting</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Stabbing</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Sharp</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Cramping</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Gnawing</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Hot-Burning</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Aching</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Heavy</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Tender</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Splitting</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Tiring-Exhausting</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Sickening</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Fearful</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td>Punishing-Cruel</td><td>" . $pd[($i) - 1] . " " . pdMeaning($pd[($i++) - 1]) . "</td></tr>" .
    "                 <tr><td><h3>Overall Pain Intensity</h3></td><td><h3>$overall " . overallPMeaning($overall) . "</h3></td></tr>" .
    "                 <tr><td colspan=2>&nbsp;</td></tr>" .
    "                 <tr><th colspan=2><h2>PHQ-9 – Patient Health Questionnaire</h2>" .
    "                 <p>Over the last 2 weeks, how often have you been bothered by the following problems?</p></th></tr>" .
    "                 <tr><th>Question</th><th>0= Not at all<br>1= Several days<br>2= More than half the days<br>3= Nearly every day</th></tr>" .
    "                 <tr><td>1. Little interest or pleasure in doing things</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td>2. Feeling down, depressed, or hopeless</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td>3. Trouble falling or staying asleep, or sleeping too much</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td>4. Feeling tired or having little energy</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td>5. Poor appetite or overeating</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td>6. Feeling bad about yourself, or that you are a failure</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td>7. Trouble concentrating on things</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td>8. Moving or speaking slowly or being restless</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td>9. Thoughts that you would be better off dead or of hurting yourself</td><td>" . $phq[($ii) - 1] . " " . PHQMeaning($phq[($ii++) - 1]) . "</td></tr>" .
    "                 <tr><td><h3>Difficulty Level</h3></td><td><h3>$difficulty " . PHQMeaning($difficulty) . "</h3></td></tr>" .
    "                 <tr><td colspan=2>&nbsp;</td></tr>" .
    "                 <tr><th colspan=\"2\"><h2>Disability Index</h2></th></tr>" .
    "                 <tr><td colspan=\"2\"><p>Rate how disabled you are due to your health condition (0= no disability, 10= total disability).</p></td></tr>" .
    "                 <tr><td><label>Family / Home responsibilities</label></td><td>" . $di[($iii++) - 1] . "/10</td></tr>" .
    "                 <tr><td><label>Recreation</label></td><td>" . $di[($iii++) - 1] . "/10</td></tr>" .
    "                 <tr><td><label>Social Activity</label></td><td>" . $di[($iii++) - 1] . "/10</td></tr>" .
    "                 <tr><td><label>Occupation</label></td><td>" . $di[($iii++) - 1] . "/10</td></tr>" .
    "                 <tr><td><label>Self-care</label></td><td>" . $di[($iii++) - 1] . "/10</td></tr>" .
    "                 <tr><td colspan=2>&nbsp;</td></tr>" .
    "                 <tr><th colspan=2><h2>FFQ-Chr</h2><p>0= do not agree | 1= somewhat agree | 2 = completely agree</p></th></tr>" .
    "                 <tr><td><label>1. I'm afraid that I might injure myself if I exercise.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>2. My body is telling me I have something dangerously wrong.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>3. My health condition has put my body at risk for the rest of my life.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>4. It's really not safe for a person with my condition to be physically active.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>5. No one should have to exercise when he/she is not feeling well.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>6. I feel tired all the time.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>7. I never seem to have the energy I need to do things.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>8. As soon as I start something, I feel weak all over.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>9. I don't seem to have any strength in my muscles.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>10. Just getting through the day leaves me feeling completely worn out.</label></td><td>" . $ffq[($iv) - 1] . " " . FFQMeaning($ffq[($iv++) - 1]) . "</td></tr>" .
    "                 <tr><td colspan=2>&nbsp;</td></tr>" .
    "                 <tr><th colspan=2><h2>CIEQ-Chr</h2><p>0= never | 1= sometimes | 2= often</p></th></tr>" .
    "                 <tr><td><label>1. Most people – understand how severe my condition is.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>2. My life will never be the same.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>3. No one should have to live this way.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>4. I can't believe this has happened to me.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>5. Nothing will ever make up for all that I have gone through.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>6. I become afraid that my condition will get worse.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>7. I feel I can't stand it anymore.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>8. I can't seem to keep my condition out of my mind.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>9. There's nothing I can do to reduce the intensity of my symptoms.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>10. I wonder whether something serious may happen.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>11. My symptoms are awful and overwhelm me.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "                 <tr><td><label>12. I worry all the time about whether my symptoms will end.</label></td><td>" . $cieq[($v) - 1] . " " . CIEQMeaning($cieq[($v++) - 1]) . "</td></tr>" .
    "             </tbody></table>" .
    "         </div>" .
    "     </form>" .
    " </body></html>" .
    " ";


//echo "<pre>$emailBody</pre>";

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