<?php

function createToken(PDO $pdo, array $data, int $ttlSeconds = 3600)
{
    $token = bin2hex(random_bytes(32)); // 64 hex chars => 256 bits
    $now = time();
    $expires = $now + $ttlSeconds;
    $payload = json_encode($data, JSON_UNESCAPED_UNICODE);

    $stmt = $pdo->prepare("INSERT INTO tokens (token, payload, created_at, expires_at) VALUES (?, ?, ?, ?)");
    $stmt->execute([$token, $payload, $now, $expires]);

    return $token;
}
?>