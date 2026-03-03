<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/


$clinicianEmail = $_POST["clinicianEmail"];
$patientEmail = $_POST["patientEmail"];
$assessmentslink = $_POST["assessmentslink"];

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


$print_name1 = validPost("print_name1");
$date = validPost("date");
$print_name2 = validPost("print_name2");
$phone = validPost("phone");
$email = validPost("email");
$initials_ltd = validPost("initials_ltd");
$initials_private = validPost("initials_private");


$html_rtrn = "  " .
    " <!DOCTYPE html> " .
    " <html lang=\"en\"> " .
    " <head> " .
    "     <meta charset=\"UTF-8\"> " .
    "     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"> " .
    "     <title>CTC Consent, Privacy and Service Agreement</title> " .
    "     <!-- Bootstrap 5 --> " .
    "     <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\"> " .
    "     <style> " .
    "         body { " .
    "             font-family: Arial, Helvetica, sans-serif; " .
    "             line-height: 1.6; " .
    "             background: #f8f9fa; " .
    "         } " .
    "         .page-wrapper { " .
    "             max-width: 900px; " .
    "             margin: auto; " .
    "             background: white; " .
    "             padding: 20px; " .
    "             border-radius: 8px; " .
    "         } " .
    "         h1, " .
    "         h2, " .
    "         h3 { " .
    "             color: #2b2b2b; " .
    "         } " .
    "         .section { " .
    "             margin-bottom: 2rem; " .
    "         } " .
    "         ul { " .
    "             padding-left: 1.2rem; " .
    "         } " .
    "         .small { " .
    "             font-size: 0.9em; " .
    "             color: #444; " .
    "         } " .
    "         .signature-line input { " .
    "             margin-bottom: 10px; " .
    "         } " .
    "         @media (min-width: 768px) { " .
    "             .label-col { " .
    "                 text-align: left; " .
    "                 padding-top: 6px; " .
    "             } " .
    "         } " .
    "     </style> " .
    " </head> " .
    " <body> " .
    "     <div class=\"container my-4\"> " .
    "         <div class=\"page-wrapper\"> " .
    "             <form  " .
    // "             action=\"ConsentAgreement_process.php\" " .
    "             id=\"myForm\" method=\"post\"> " .
    "                 <h1 class=\"text-center\">Creative Therapy Consultants</h1> " .
    "                 <p class=\"small text-center\"> " .
    "                     102-208 Ellis Street, Penticton, BC, V2A 4L6 " .
    "                     (<a href=\"https://maps.google.com/?q=102-208+Ellis+Street,+Penticton,+BC,+V2A+4L6\" target=\"_blank\">Find Us</a>)<br> " .
    "                     Phone: <a href=\"tel:2364224778\">(236) 422-4778</a> | " .
    "                     Email: <a href=\"mailto:info@creativetherapyconsultants.ca\">info@creativetherapyconsultants.ca</a> " .
    "                 </p> " .
    "                 <hr> " .
    "                 <h2 class=\"text-center mb-4\">Client Consent, Privacy and Service Agreement</h2> " .
    "                 <!-- Hidden Inputs --> " .
    "                 <input type=\"hidden\" name=\"clinicianEmail\" value=\"$clinicianEmail\"> " .
    "                 <input type=\"hidden\" name=\"patientEmail\" value=\"$patientEmail\"> " .
    "                 <input type=\"hidden\" name=\"assessmentslink\" value=\"$assessmentslink\"> " .
    "                 <!-- Privacy Section --> " .
    "                 <div class=\"section\"> " .
    "                     <!--<h3>Privacy & Confidentiality</h3> " .
    "         <ul> " .
    "             <li>Creative Therapy Consultants (CTC) protects personal information under BC PIPA.</li> " .
    "             <li>Information is collected only as necessary to provide services.</li> " .
    "             <li>Strict safeguards protect information.</li> " .
    "             <li>Clients may access and correct personal information.</li> " .
    "         </ul> " .
    "     </div>--> " .
    "                     <div class=\"section\"> " .
    "                         <h3>Privacy &amp; Confidentiality</h3> " .
    "                         <ul> " .
    "                             <li>Creative Therapy Consultants (CTC) protects personal information under British " .
    "                                 Columbia&apos;s Personal  " .
    "                                 Information Protection Act (PIPA) and relevant regulatory bodies.</li> " .
    "                             <li>Personal information includes identifiable details provided for occupational therapy and " .
    "                                 rehabilitation " .
    "                                 services.</li> " .
    "                             <li>Information is collected, used, and disclosed only as necessary to provide services, " .
    "                                 comply with " .
    "                                 legal " .
    "                                 requirements, and ensure client safety.</li> " .
    "                             <li>Consent is obtained before collecting, using, or sharing personal information, except " .
    "                                 where " .
    "                                 permitted by " .
    "                                 law. Consent may be withdrawn at any time.</li> " .
    "                             <li>Strict safeguards are used to protect information against unauthorized access, loss, or " .
    "                                 misuse.</li> " .
    "                             <li>Clients may access and request corrections to their personal information.</li> " .
    "                             <li>A Privacy Officer oversees compliance and handles inquiries.</li> " .
    "                             <li>CTC has maintained professional and privacy standards since 1986.</li> " .
    "                         </ul> " .
    "                     </div> " .
    "                     <!-- Consent Section --> " .
    "                     <div class=\"section\"><!-- " .
    "         <h3>Consent to Treatment & Services</h3> " .
    "         <ul> " .
    "             <li>I voluntarily consent to occupational therapy services.</li> " .
    "             <li>I understand treatments may involve risks.</li> " .
    "             <li>I agree to participate respectfully.</li> " .
    "         </ul> " .
    "         <div class=\"section\">--> " .
    "                         <h3>Consent to Treatment &amp; Services</h3> " .
    "                         <ul> " .
    "                             <li>I voluntarily consent to occupational therapy and/or kinesiology services provided by " .
    "                                 CTC.</li> " .
    "                             <li>I understand treatments may involve risks and I may ask questions at any time.</li> " .
    "                             <li>I have the right to know who is providing my treatment and their qualifications.</li> " .
    "                             <li>I agree to participate actively and respectfully in the treatment process.</li> " .
    "                             <li>I consent to photographs for assessment purposes only.</li> " .
    "                             <li>I acknowledge that session note-taking assistants may be used and that I may opt out. " .
    "                             </li> " .
    "                         </ul> " .
    "                         <!-- " .
    "             <p class=\"signature-line\"> " .
    "                 <label class=\"label-width\">Print Name</label> " .
    "                 <input type=\"text\" name=\"print_name1\" required=\"\" value=\"$print_name1\"><br> " .
    "                 <label>Signature</label><input type=\"text\" name=\"signature\"><br>// no!! " .
    "                 <label class=\"label-width\">Date</label> " .
    "                 <input type=\"date\" name=\"date\" required=\"\" value=\"$date\"> " .
    "             </p> " .
    "         </div> " .
    "         <div class=\"row signature-line\">--> " .
    "                         <div class=\"col-12 col-md-3 label-col\"><label for=\"print_name1\">Print Name</label></div> " .
    "                         <div class=\"col-12 col-md-9\"><input type=\"text\" class=\"form-control\" name=\"print_name1\" value=\"$print_name1\"" .
    "                                 required=\"\"></div> " .
    "                         <div class=\"col-12 col-md-3 label-col\"><label for=\"date\">Date</label></div> " .
    "                         <div class=\"col-12 col-md-9\"><input type=\"date\" class=\"form-control\" name=\"date\" required=\"\" value=\"$date\"> " .
    "                         </div> " .
    "                     </div> " .
    "                 </div> " .
    "                 <!-- Release Section --> " .
    "                 <div class=\"section\"><!-- " .
    "         <h3>Release & Disclosure</h3> " .
    "         <ul> " .
    "             <li>I authorize CTC to share relevant medical information.</li> " .
    "             <li>Electronic records are securely stored.</li> " .
    "         </ul>--> " .
    "                     <div class=\"section\"> " .
    "                         <h3>Release &amp; Disclosure of Information</h3> " .
    "                         <ul> " .
    "                             <li>I authorize CTC to release and obtain relevant medical and rehabilitation information " .
    "                                 for the " .
    "                                 duration " .
    "                                 of my claim.</li> " .
    "                             <li>Information may be shared with health professionals involved in my care.</li> " .
    "                             <li>This information supports accurate evaluation and treatment.</li> " .
    "                             <li>I waive claims against parties providing information in good faith.</li> " .
    "                             <li>Electronic records are securely stored for at least 16 years in compliance with BC law. " .
    "                             </li> " .
    "                             <li>Telehealth services may be used and carry potential technical limitations.</li> " .
    "                             <li>This consent remains valid until my file is discharged unless revoked in writing.</li> " .
    "                         </ul> " .
    "                         <p class=\"signature-line\"> " .
    "                         </p> " .
    "                         <div class=\"col-12 col-md-3 label-col\"> " .
    "                             <label class=\"label-width\">Print Name</label> " .
    "                         </div> " .
    "                         <div class=\"col-12 col-md-9\"> " .
    "                             <input type=\"text\" name=\"print_name2\" required=\"\" class=\"form-control\" value=\"$print_name2\"> " .
    "                         </div> " .
    "                         <br> " .
    "                         <!--<label>Signature</label> " .
    "                 <input type=\"text\" name=\"signature\"><br>--> " .
    "                         <div class=\"col-12 col-md-3 label-col\"> " .
    "                             <label class=\"label-width\" for=\"phoneMasked\" " .
    "                                 title=\"Phone number must be in the format: (123) 456-7890\">Telephone</label> " .
    "                         </div> " .
    "                         <!--<input type=\"text\" name=\"telephone\" placeholder=\"(###) ###-####\" pattern=\"\(\d{3}\) \d{3}-\d{4}\"><br>--> " .
    "                         <div class=\"col-12 col-md-9\"> " .
    "                             <input type=\"text\" id=\"phoneMasked\" name=\"phone\" placeholder=\"(###) ###-####\" maxlength=\"14\" " .
    "                                 inputmode=\"numeric\" required=\"\" class=\"form-control\" value=\"$phone\"> " .
    "                         </div><br> " .
    "                         <script> " .
    "                             document.getElementById('phoneMasked').addEventListener('input', function (e) { " .
    "                                 var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/); " .
    "                                 e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : ''); " .
    "                             }); " .
    "                         </script> " .
    "                         <div class=\"col-12 col-md-3 label-col\"> " .
    "                             <label class=\"label-width\">Email</label> " .
    "                         </div> " .
    "                         <div class=\"col-12 col-md-9\"> " .
    "                             <input type=\"email\" name=\"email\" class=\"form-control\" value=\"$email\" required=\"\"> " .
    "                         </div> " .
    "                         <p></p> " .
    "                     </div> " .
    "                     <div class=\"section\"> " .
    "                         <h3>Cancellation &amp; Appointment Policy</h3> " .
    "                         <ul> " .
    "                             <li>24-hour business-day notice is required to cancel or reschedule appointments.</li> " .
    "                             <li>Repeated late cancellations may result in service cessation.</li> " .
    "                             <li>LTD clients may be billed by insurers for late cancellations.</li> " .
    "                             <li>Private pay clients may be charged for missed appointments.</li> " .
    "                         </ul> " .
    "                         <p class=\"signature-line\"> " .
    "                         </p> " .
    "                         <div class=\"col-12 col-md-3 label-col\"> " .
    "                             <label class=\"label-width\">Initials (LTD)</label> " .
    "                         </div> " .
    "                         <div class=\"col-12 col-md-9\"> " .
    "                             <input type=\"text\" class=\"form-control\" name=\"initials_ltd\" maxlength=\"4\" value=\"$initials_ltd\" required=\"\"> " .
    "                         </div> " .
    "                         <div class=\"col-12 col-md-3 label-col\"> " .
    "                             <label class=\"label-width\">Initials (Private Pay)</label> " .
    "                         </div> " .
    "                        <div class=\"col-12 col-md-9\"> " .
    "                             <input type=\"text\" class=\"form-control\" name=\"initials_private\" maxlength=\"4\" value=\"$initials_private\" required=\"\"> " .
    "                         </div> " .
    "                         <!--<label>Signature</label> " .
    "                 <input type=\"text\" name=\"signature\">--> " .
    "                         <p></p> " .
    "                     </div> " .
    "                     <!-- " .
    "         <div class=\"row signature-line\"> " .
    "             <div class=\"col-12 col-md-3 label-col\"><label>Print Name</label></div> " .
    "             <div class=\"col-12 col-md-9\"><input type=\"text\" class=\"form-control\" name=\"print_name2\" value=\"$print_name2\" required></div> " .
    "             <div class=\"col-12 col-md-3 label-col\"><label>Telephone</label></div> " .
    "             <div class=\"col-12 col-md-9\"><input type=\"text\" id=\"phoneMasked\" class=\"form-control\" value=\"$phone\" required></div> " .
    "             <div class=\"col-12 col-md-3 label-col\"><label>Email</label></div> " .
    "             <div class=\"col-12 col-md-9\"><input type=\"email\" class=\"form-control\" value=\"$email\" required></div> " .
    "         </div>--> " .
    "                 </div> " .
    //    "                 <!-- Buttons --> " .
//    "                 <div class=\"mt-4 d-flex justify-content-end gap-2 flex-wrap\"> " .
//    "                     <button type=\"button\" class=\"btn btn-secondary\" onclick=\"myForm.reset()\">Cancel</button> " .
//    "                     <button type=\"submit\" class=\"btn btn-primary\">Submit</button> " .
    //   "                 </div> " .
    "             </form> " .
    "             <hr> " .
    "             <p class=\"small text-center\">CTC v.13Mar2025</p> " .
    "         </div> " .
    "     </div> " .
    "     <script> " .
    "         document.getElementById('phoneMasked').addEventListener('input', function (e) { " .
    "             var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/); " .
    "             e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : ''); " .
    "         }); " .
    "     </script> " .
    "     <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script> " .
    " </body> " .
    " </html> " .
    " ";

//echo $html_rtrn;
//die("hasta aqui");

//echo $emailBody;

echo 'send email from google email' . '<br>';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = "smtp-mail.outlook.com";//'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Assessments@creativetherapyconsultants.ca';//'brunoaco@gmail.com';
    $mail->Password = '@7@!Ass3ssm3n7s';//'qomu csty rxve vfsi'; // OJO: NO es tu contraseña normal
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Datos del email
    $mail->setFrom('Assessments@creativetherapyconsultants.ca', 'Automatic Assessment Request Service');//origin
    $mail->addAddress($clinicianEmail);//destination
    $mail->Subject = 'Assessment Request';

    //$html_rtrn = str_replace("{{assessmentsList}}", $links, $html_rtrn);

    $mail->Body = $html_rtrn;
    $mail->IsHTML(true);       // <=== call IsHTML() after $mail->Body has been set.

    $mail->send();//this is where the magic happens
    echo "Email sent.\n<br><br><br><button onclick=\"window.close()\">Close Window</button>";
} catch (Exception $e) {
    echo "Error : {$mail->ErrorInfo}";
}
?>