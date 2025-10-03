<?php
require_once '../config/connection.php';
$db = new Database;
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);

    header("Location: login.php");
    exit;
}
?>
<form method="post">
  <input type="text" name="name" placeholder="Nama" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Register</button>
</form>
