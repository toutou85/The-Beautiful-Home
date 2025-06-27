<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<h2>مرحبا بك في صفحة الأدمن، <?= htmlspecialchars($_SESSION['user']) ?></h2>
<a href="logout.php">تسجيل الخروج</a>