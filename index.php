<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "user_status";

// الاتصال بقاعدة البيانات
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// جلب كل البيانات
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Enter User Info</h2>
    <form action="insert.php" method="POST">
        Name: <input type="text" name="name" required>
        Age: <input type="number" name="age" required>
        <input type="submit" value="Submit">
    </form>

    <h3>Users Table</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['age'] ?></td>
            <td id="status-<?= $row['id'] ?>"><?= $row['status'] ?></td>
            <td><button onclick="toggleStatus(<?= $row['id'] ?>)">Toggle</button></td>
        </tr>
        <?php } ?>
    </table>

    <script src="script.js"></script>
</body>
</html>
