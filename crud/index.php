<?php
require 'config.php';

$table = $_GET['table'] ?? 'tokens';
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container-fluid mt-4 px-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>CRUD Panel</h2>
            <div>
                <a class="btn btn-primary btn-sm" href="?table=tokens">Tokens</a>
                <a class="btn btn-secondary btn-sm" href="?table=mytable">MyTable</a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <?php
                if ($table === 'tokens') {
                    require 'tokens.php';
                } else {
                    require 'mytable.php';
                }
                ?>

            </div>
        </div>

    </div>

</body>

</html>