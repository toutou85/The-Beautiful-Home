<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<h2>صفحة الطلبات</h2>
<a href="logout.php">تسجيل الخروج</a>