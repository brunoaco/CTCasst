<?php
// timezone
date_default_timezone_set('America/Vancouver');

// AUTH
$USER = "//user//";
$PASS = "//pass//";

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="CRUD"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Auth required';
    exit;
} else {
    if ($_SERVER['PHP_AUTH_USER'] !== $USER || $_SERVER['PHP_AUTH_PW'] !== $PASS) {
        die('Invalid credentials');
    }
}

// DB CONNECTION
try {
    $db = new PDO('sqlite:../mydatabase.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("DB Error: " . $e->getMessage());
}

// escape
function e($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// timestamp formatter
function formatDate($ts)
{
    if (!$ts)
        return '';

    if (is_numeric($ts)) {
        return date('Y-m-d H:i:s', (int) $ts);
    }

    return date('Y-m-d H:i:s', strtotime($ts));
}

// payload formatter
function formatPayload($payload)
{
    $data = json_decode($payload, true);

    if (is_array($data)) {
        $out = '';
        foreach ($data as $k => $v) {
            $out .= "<b>" . e($k) . "</b>: " . e($v) . "<br>";
        }
        return $out;
    }

    $parts = explode(',', $payload);
    $out = '';
    foreach ($parts as $p) {
        $out .= e(trim($p)) . "<br>";
    }

    return $out;
}
