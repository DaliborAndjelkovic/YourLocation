<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=developerdb', 'root', '');

if (!$pdo) {
    die("Connection failed: " . $pdo->errorInfo());
}

$stmt = $pdo->query("SELECT * FROM users");

if (!$stmt) {
    die("Query failed: " . $pdo->errorInfo());
}

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Overview</title>
</head>
<body>
    <h1>User Data Overview</h1>

    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street/Number</th>
            <th>City</th>
            <th>Country</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['firstName'] ?></td>
                <td><?= $user['lastName'] ?></td>
                <td><?= $user['streetNumber'] ?></td>
                <td><?= $user['city'] ?></td>
                <td><?= $user['country'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
