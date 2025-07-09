<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "user_status";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$age = $_POST['age'];

// إدخال البيانات مع الحالة الافتراضية 0
$sql = "INSERT INTO users (name, age, status) VALUES ('$name', '$age', 0)";
$conn->query($sql);

// الرجوع للصفحة الرئيسية
header("Location: index.php");
exit();
?>
