<?php
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";*/

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
} /*else {
echo "clinicianEmail has data " . $clinicianEmail . "<br>\n";
}*/

$patientEmail = $_POST["patientEmail"];
if (empty($patientEmail)) {
    echo "patientEmail is empty\n";
} /*else {
echo "patientEmail has data " . $patientEmail . "<br>\n";
}*/

$assessmentslink = $_POST["assessmentslink"];
if (empty($assessmentslink)) {
    echo "assessmentslink is empty\n";
} /*else {
echo "assessmentslink has data " . $assessmentslink . "<br>\n";
}*/
//$clinicianEmail,$patientEmail,$assessmentslink 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HIT-6 Headache Impact Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .question {
            margin-bottom: 25px;
        }

        .options label {
            display: block;
            margin: 6px 0;
            cursor: pointer;
        }

        footer {
            margin-top: 40px;
            font-size: 0.9em;
            color: #555;
        }

        .note {
            margin-top: 20px;
            padding: 15px;
            background: #eef2f5;
            border-left: 4px solid #007bff;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>HIT-6 Headache Impact Test</h1>

        <p>
            HIT is a tool used to measure the impact headaches have on your ability to function
            on the job, at school, at home, and in social situations. Your score shows the effect
            that headaches have on normal daily life and your ability to function.
        </p>

        <p>
            This questionnaire was designed to help you describe and communicate the way you feel
            and what you cannot do because of headaches.
        </p>

        <p><strong>Instructions:</strong> Please select one answer for each question.</p>

        <form action="HIT-6_process.php" id="myForm" method="post">

            <!-- Hidden Inputs -->
            <input type="hidden" name="clinicianEmail" value="<?php echo $clinicianEmail ?>">
            <input type="hidden" name="patientEmail" value="<?php echo $patientEmail ?>">
            <input type="hidden" name="assessmentslink" value="<?php echo $assessmentslink ?>">

            <div class="question">
                <p><strong>1. When you have headaches, how often is the pain severe?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q1" value="0"> Never</label>
                    <label><input type="radio" name="q1" value="1"> Rarely</label>
                    <label><input type="radio" name="q1" value="2"> Sometimes</label>
                    <label><input type="radio" name="q1" value="3"> Very Often</label>
                    <label><input type="radio" name="q1" value="4"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>2. How often do headaches limit your ability to do usual daily activities including household
                        work, work, school, or social activities?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q2" value="0"> Never</label>
                    <label><input type="radio" name="q2" value="1"> Rarely</label>
                    <label><input type="radio" name="q2" value="2"> Sometimes</label>
                    <label><input type="radio" name="q2" value="3"> Very Often</label>
                    <label><input type="radio" name="q2" value="4"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>3. When you have a headache, how often do you wish you could lie down?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q3" value="0"> Never</label>
                    <label><input type="radio" name="q3" value="1"> Rarely</label>
                    <label><input type="radio" name="q3" value="2"> Sometimes</label>
                    <label><input type="radio" name="q3" value="3"> Very Often</label>
                    <label><input type="radio" name="q3" value="4"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>4. In the past 4 weeks, how often have you felt too tired to do work or daily activities
                        because of your headaches?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q4" value="0"> Never</label>
                    <label><input type="radio" name="q4" value="1"> Rarely</label>
                    <label><input type="radio" name="q4" value="2"> Sometimes</label>
                    <label><input type="radio" name="q4" value="3"> Very Often</label>
                    <label><input type="radio" name="q4" value="4"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>5. In the past 4 weeks, how often have you felt fed up or irritated because of your
                        headaches?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q5" value="0"> Never</label>
                    <label><input type="radio" name="q5" value="1"> Rarely</label>
                    <label><input type="radio" name="q5" value="2"> Sometimes</label>
                    <label><input type="radio" name="q5" value="3"> Very Often</label>
                    <label><input type="radio" name="q5" value="4"> Always</label>
                </div>
            </div>

            <div class="question">
                <p><strong>6. In the past 4 weeks, how often did headaches limit your ability to concentrate on work or
                        daily activities?</strong></p>
                <div class="options">
                    <label><input type="radio" name="q6" value="0"> Never</label>
                    <label><input type="radio" name="q6" value="1"> Rarely</label>
                    <label><input type="radio" name="q6" value="2"> Sometimes</label>
                    <label><input type="radio" name="q6" value="3"> Very Often</label>
                    <label><input type="radio" name="q6" value="4"> Always</label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-4 d-flex justify-content-end gap-2 flex-wrap">
                <button type="button" class="btn btn-secondary" onclick="myForm.reset()">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

        <!--
        <div class="note">
            <strong>Scoring:</strong><br>
            Never = 6 points<br>
            Rarely = 8 points<br>
            Sometimes = 10 points<br>
            Very Often = 11 points<br>
            Always = 13 points
        </div>-->
        <!--
        <div class="note">
            <strong>Interpretation:</strong><br>
            If your HIT-6 score is 50 or higher, you should share your results with your doctor.
            Headaches that interfere with family, work, school, or social activities could be migraine.
        </div>-->

        <footer>
            ©2001 QualityMetric, Inc. and GlaxoSmithKline Group of Companies. All rights reserved.
        </footer>

    </div>

</body>

</html>