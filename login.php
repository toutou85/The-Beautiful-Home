<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new PDO('sqlite:users.db');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $username;
        header('Location: admin.php');
        exit;
    } else {
        echo "بيانات الدخول غير صحيحة";
    }
}
?>
<form method="post">
  <input type="text" name="username" placeholder="اسم المستخدم" required>
  <input type="password" name="password" placeholder="كلمة المرور" required>
  <button type="submit">دخول</button>
</form>