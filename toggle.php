<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "user_status";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

// جلب الحالة الحالية
$res = $conn->query("SELECT status FROM users WHERE id = $id");
$row = $res->fetch_assoc();
$currentStatus = $row['status'];

// تبديل الحالة
$newStatus = $currentStatus == 1 ? 0 : 1;

// تحديث الحالة
$conn->query("UPDATE users SET status = $newStatus WHERE id = $id");

echo $newStatus;
?>
