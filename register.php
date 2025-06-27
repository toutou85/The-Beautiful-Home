<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new PDO('sqlite:users.db');
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        echo "تم التسجيل بنجاح";
    } else {
        echo "فشل التسجيل أو المستخدم موجود مسبقاً";
    }
}
?>
<form method="post">
  <input type="text" name="username" placeholder="اسم المستخدم" required>
  <input type="password" name="password" placeholder="كلمة المرور" required>
  <button type="submit">تسجيل</button>
</form>