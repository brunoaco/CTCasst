<?php

$action = $_GET['action'] ?? 'list';
$page = max(1, intval($_GET['page'] ?? 1));
$limit = 10;
$offset = ($page - 1) * $limit;

// LIST
if ($action === 'list') {

    $total = $db->query("SELECT COUNT(*) FROM tokens")->fetchColumn();
    $stmt = $db->query("SELECT * FROM tokens LIMIT $limit OFFSET $offset");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Tokens</h2>";

    echo "<table border='1' cellpadding='5'>";
    echo "<tr>
            <th>Token</th>
            <th>Payload</th>
            <th>Created</th>
            <th>Expires</th>
            <th>Used</th>
            <th>Actions</th>
          </tr>";

    foreach ($rows as $r) {
        echo "<tr>";
        echo "<td>" . e($r['token']) . "</td>";
        echo "<td>" . formatPayload($r['payload']) . "</td>";
        echo "<td>" . e($r['created_at']) . "<br>" . formatDate($r['created_at']) . "</td>";
        echo "<td>" . e($r['expires_at']) . "<br>" . formatDate($r['expires_at']) . "</td>";
        echo "<td>" . e($r['used']) . "</td>";
        echo "<td>
                <a href='?table=tokens&action=edit&id=" . e($r['token']) . "'>Edit</a> |
                <a href='?table=tokens&action=delete&id=" . e($r['token']) . "' onclick=\"return confirm('Delete?')\">Delete</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";

    // pagination
    for ($i = 1; $i <= ceil($total / $limit); $i++) {
        echo "<a href='?table=tokens&page=$i'>$i</a> ";
    }
}

// EDIT
if ($action === 'edit') {

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $db->prepare("UPDATE tokens SET payload=?, used=? WHERE token=?");
        $stmt->execute([$_POST['payload'], $_POST['used'], $id]);

        header("Location: ?table=tokens");
        exit;
    }

    $stmt = $db->prepare("SELECT * FROM tokens WHERE token=?");
    $stmt->execute([$id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<h3>Edit Token</h3>";
    echo "<form method='post'>";

    echo "token: " . e($r['token']) . "<br>";
    echo "payload: <input name='payload' value='" . e($r['payload']) . "'><br>";
    echo "used: <input name='used' value='" . e($r['used']) . "'><br>";

    echo "<button type='submit'>Save</button>";
    echo "</form>";
}

// DELETE
if ($action === 'delete') {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM tokens WHERE token=?");
    $stmt->execute([$id]);

    header("Location: ?table=tokens");
}
