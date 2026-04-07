<?php

$action = $_GET['action'] ?? 'list';
$page = max(1, intval($_GET['page'] ?? 1));
$limit = 10;
$offset = ($page - 1) * $limit;

// LIST
if ($action === 'list') {

    $total = $db->query("SELECT COUNT(*) FROM mytable")->fetchColumn();
    $stmt = $db->query("SELECT * FROM mytable LIMIT $limit OFFSET $offset");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>MyTable</h2>";

    echo "<table border='1' cellpadding='5'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Form</th>
            <th>Valid</th>
            <th>FormName</th>
            <th>Actions</th>
          </tr>";

    foreach ($rows as $r) {
        echo "<tr>";
        echo "<td>" . e($r['id']) . "</td>";
        echo "<td>" . e($r['name']) . "</td>";
        echo "<td>" . e($r['form']) . "</td>";
        echo "<td>" . e($r['valid']) . "</td>";
        echo "<td>" . e($r['formname']) . "</td>";
        echo "<td>
                <a href='?table=mytable&action=edit&id=" . e($r['id']) . "'>Edit</a> |
                <a href='?table=mytable&action=delete&id=" . e($r['id']) . "' onclick=\"return confirm('Delete?')\">Delete</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";

    // pagination
    for ($i = 1; $i <= ceil($total / $limit); $i++) {
        echo "<a href='?table=mytable&page=$i'>$i</a> ";
    }
}

// EDIT
if ($action === 'edit') {

    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $db->prepare("UPDATE mytable SET name=?, form=?, valid=?, formname=? WHERE id=?");
        $stmt->execute([
            $_POST['name'],
            $_POST['form'],
            $_POST['valid'],
            $_POST['formname'],
            $id
        ]);

        header("Location: ?table=mytable");
        exit;
    }

    $stmt = $db->prepare("SELECT * FROM mytable WHERE id=?");
    $stmt->execute([$id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<h3>Edit Record</h3>";
    echo "<form method='post'>";

    echo "id: " . e($r['id']) . "<br>";
    echo "name: <input name='name' value='" . e($r['name']) . "'><br>";
    echo "form: <input name='form' value='" . e($r['form']) . "'><br>";
    echo "valid: <input name='valid' value='" . e($r['valid']) . "'><br>";
    echo "formname: <input name='formname' value='" . e($r['formname']) . "'><br>";

    echo "<button type='submit'>Save</button>";
    echo "</form>";
}

// DELETE
if ($action === 'delete') {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM mytable WHERE id=?");
    $stmt->execute([$id]);

    header("Location: ?table=mytable");
}
