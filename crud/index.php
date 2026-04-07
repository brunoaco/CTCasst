<?php
require 'config.php';

$table = $_GET['table'] ?? 'tokens';

echo "<h1>CRUD Panel</h1>";
echo "<a href='?table=tokens'>Tokens</a> | ";
echo "<a href='?table=mytable'>MyTable</a>";
echo "<hr>";

if ($table === 'tokens') {
    require 'tokens.php';
} else {
    require 'mytable.php';
}
