<?php
function clean($data)
{
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}




$pdo = new PDO("sqlite:mydatabase.db");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$token = $_GET['token'] ?? '';


if (empty($token)) {
    http_response_code(400);
    exit("Missing token.");
}

$sql = "SELECT payload, expires_at, used FROM tokens WHERE token = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$token]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$row) {
    http_response_code(404);
    exit("Invalid token.");
}

if ($row['used']) {
    http_response_code(403);
    exit("Token already used. Contact your clinitian and ask for a new form email.");
}

if ($row['expires_at'] && time() > (int) $row['expires_at']) {
    http_response_code(410);
    exit("Token expired.");
}

// marcar como usado (si quieres que sea uso único)
$mark = $pdo->prepare("UPDATE tokens SET used = 1 WHERE token = ?");//--------------------------------------------------------------
$mark->execute([$token]);

$payload = json_decode($row['payload'], true);


// ahora $payload contiene los datos; puedes tratarlos como si vinieran por POST
// p.ej. popular $_POST para compatibilidad con código existente:
$_POST = $payload;

// o procesar directamente:
$clinicianEmail = $payload['clinicianEmail'] ?? [];
$patientEmail = $payload['patientEmail'] ?? '';
$assessmentslink = $payload['assessmentslink'] ?? '';
function formExtract($assessmentslink)
{
    $piece = substr($assessmentslink, strpos($assessmentslink, "&formname"));

    $pos = strpos($piece, "=");

    $formname = substr($piece, $pos + 1);

    return $formname;

}

function linkWithTokenOnly($assessmentslink, $token, $isHref = true)
{
    if (empty($assessmentslink)) {
        echo "assessmentslink1 is empty\n";
        return "";
    } else {

        if (str_contains($assessmentslink, "&formname")) {
            $assessmentslink1 = substr($assessmentslink, 0, strpos($assessmentslink, "&formname"));
        }

        $newLink = str_replace("xyz", $token, $assessmentslink1);

        if ($isHref)
            return "<a href=\"" . $newLink . "\">  assessment link </a><br>\n";
        else
            return $newLink;
    }

}



$formname = $payload["formname"];

// continúa con lógica: mostrar página, generar PDF, iniciar descarga, etc.
///echo "Token valid. assessments: " . implode(', ', $payload) . "\n";

switch ($formname) {
    case "PHQ-9.php":
    case "GAD-7.php":
    case "ConsentAgreement.php";
    case "HIT-6.php";
    case "SCAT5.php";
    case "PGAP.php":

        ?>
        <html>

        <body>
            <img src="Assets/Loading.gif" alt="Loading"><br>
            <form method="post" action="<?= $formname ?>" name="assessments" id="assessments">
                <input type="hidden" class="form-control" id="clinicianEmail" name="clinicianEmail"
                    value="<?= $clinicianEmail ?>" required><br>
                <input type="hidden" class="form-control" id="patientEmail" name="patientEmail" value="<?= $patientEmail ?>"
                    required><br>
                <input type="hidden" class="form-control" id="assessmentslink" name="assessmentslink"
                    value="<?= linkWithTokenOnly($assessmentslink, $token, false) ?>" required><br>
                <input type="hidden" class="form-control" id="formname" name="formname" value="<?= $formname ?>" required><br>

            </form>
        </body>
        <script>
            // wait for a couple of seconds and redirect as post
            setTimeout(function () {
                document.getElementById("assessments").submit();
            }, 1000); // 5000 ms = 5 seconds
        </script>

        </html>
        <?php
        exit();
        break;

    default:
        //code block
        echo $formname . " -> nope!";
}