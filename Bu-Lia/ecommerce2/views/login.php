<?php
session_start();
require_once '../config/connection.php';
$db = new Database;
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $data = $stmt->fetch();

    if ($data && password_verify($password, $data['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['user_name'] = $data['name'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>
<form method="post">
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
