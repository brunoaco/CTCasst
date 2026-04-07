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

    echo "<h4 class='mb-3'>MyTable</h4>";

    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped table-hover'>";
    echo "<thead class='table-dark'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Form</th>
                <th>Valid</th>
                <th>FormName</th>
                <th>Actions</th>
            </tr>
          </thead><tbody>";

    foreach ($rows as $r) {
        echo "<tr>";
        echo "<td>" . e($r['id']) . "</td>";
        echo "<td>" . e($r['name']) . "</td>";
        echo "<td>" . e($r['form']) . "</td>";
        echo "<td>" . ($r['valid'] ? "<span class='badge bg-success'>Valid</span>" : "<span class='badge bg-danger'>Invalid</span>") . "</td>";
        echo "<td>" . e($r['formname']) . "</td>";
        echo "<td>
                <a class='btn btn-sm btn-primary' href='?table=mytable&action=edit&id=" . e($r['id']) . "'>Edit</a>
                <a class='btn btn-sm btn-danger' href='?table=mytable&action=delete&id=" . e($r['id']) . "' onclick=\"return confirm('Delete?')\">Delete</a>
              </td>";
        echo "</tr>";
    }

    echo "</tbody></table></div>";

    // pagination
    for ($i = 1; $i <= ceil($total / $limit); $i++) {
        echo "<a class='btn btn-sm btn-outline-primary me-1' href='?table=mytable&page=$i'>$i</a>";
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

    echo "<h4>Edit Record</h4>";
    echo "<form method='post' class='mt-3'>";

    echo "<div class='mb-3'>
            <label class='form-label'>ID</label>
            <input class='form-control' value='" . e($r['id']) . "' disabled>
          </div>";

    echo "<div class='mb-3'>
            <label class='form-label'>Name</label>
            <input name='name' class='form-control' value='" . e($r['name']) . "'>
          </div>";

    echo "<div class='mb-3'>
            <label class='form-label'>Form</label>
            <input name='form' class='form-control' value='" . e($r['form']) . "'>
          </div>";

    echo "<div class='mb-3'>
            <label class='form-label'>Valid</label>
            <input name='valid' class='form-control' value='" . e($r['valid']) . "'>
          </div>";

    echo "<div class='mb-3'>
            <label class='form-label'>FormName</label>
            <input name='formname' class='form-control' value='" . e($r['formname']) . "'>
          </div>";

    echo "<button class='btn btn-success'>Save</button>";
    echo " <a class='btn btn-secondary' href='?table=mytable'>Back</a>";

    echo "</form>";
}

// DELETE
if ($action === 'delete') {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM mytable WHERE id=?");
    $stmt->execute([$id]);

    header("Location: ?table=mytable");
}
