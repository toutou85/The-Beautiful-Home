<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول - لوحة الإدارة</title>
  <style>
    body {
      font-family: Tahoma, sans-serif;
      background: #f8f8f8;
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
    }
    .login-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
      width: 300px;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-top: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
    }
    button {
      margin-top: 20px;
      padding: 10px 20px;
      width: 100%;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
    }
    .error {
      color: red;
      margin-top: 10px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h2>🔐 دخول الإدارة</h2>
  <input type="password" id="password" placeholder="أدخل كلمة المرور" />
  <button onclick="login()">دخول</button>
  <div id="errorMsg" class="error"></div>
</div>

<script>
  const correctPassword = "adminhalima"; // ← غيّر كلمة السر من هنا

  function login() {
    const input = document.getElementById("password").value;
    const errorMsg = document.getElementById("errorMsg");

    if (input === correctPassword) {
      sessionStorage.setItem("loggedIn", "true");
      window.location.href = "tahalaid.html";
    } else {
      errorMsg.textContent = "❌ كلمة المرور غير صحيحة!";
    }
  }
</script>

</body>
</html>
