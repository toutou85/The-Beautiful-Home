
<?php include("auth.php"); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>إضافة منتج جديد - Beautiful Home</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    header {
      background: #003366;
      color: white;
      padding: 1rem;
      text-align: center;
      font-size: 1.5rem;
    }
    header img {
      width: 100px;
      margin-bottom: 10px;
    }
    main {
      max-width: 600px;
      margin: auto;
      padding: 2rem;
      background: white;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      margin-top: 40px;
      border-radius: 10px;
    }
    h2 {
      color: #003366;
      text-align: center;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }
    button {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 12px 24px;
      font-size: 1rem;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
    }
    button:disabled {
      background-color: #ccc;
    }
    .success {
      color: green;
      font-weight: bold;
      margin-top: 10px;
      text-align: center;
    }
    img#preview {
      max-width: 100%;
      margin-top: 10px;
      display: none;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .link-btn {
      display: block;
      text-align: center;
      margin-top: 20px;
    }
    .link-btn a {
      color: #003366;
      font-weight: bold;
      text-decoration: none;
    }
    a.button {
      display: block;
      text-align: center;
      background-color: #003366;
      color: white;
      padding: 10px 20px;
      margin-top: 15px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
    }
    .logout {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <header>
    <img src="logo.png" alt="Logo">
    مرحبًا بكم في Beautiful Home
  </header>
  <main>
    <h2>إضافة منتج جديد</h2>
    <input type="text" id="name" placeholder="اسم المنتج">
    <input type="text" id="image" placeholder="رابط صورة المنتج">
    <input type="text" id="price" placeholder="السعر (دج)">
    <img id="preview" alt="معاينة الصورة">
    <button onclick="addProduct()" id="submitBtn">إضافة</button>
    <div class="success" id="successMsg"></div>
    <a href="orders.php" class="button">📋 عرض طلبات الزبائن</a>
    <div class="link-btn">
      <a href="produits.html">عرض قائمة المنتجات</a>
    </div>
    <div class="logout">
      <a href="logout.php" style="color:red; text-decoration: none;">🔒 تسجيل الخروج</a>
    </div>
  </main>

  <script>
    const apiUrl = "https://script.google.com/macros/s/AKfycbxhbbzs0owqt8SxhCD4aqmABFHIL3QxnL1q1D4ggW3lflL--5ilPrvzM9UUez1tL0L-/exec";
    const imageInput = document.getElementById("image");
    const preview = document.getElementById("preview");

    imageInput.addEventListener("input", () => {
      const url = imageInput.value.trim();
      if (url.match(/\.(jpeg|jpg|gif|png)$/i)) {
        preview.src = url;
        preview.style.display = "block";
      } else {
        preview.style.display = "none";
      }
    });

    function addProduct() {
      const name = document.getElementById("name").value.trim();
      const image = document.getElementById("image").value.trim();
      const price = document.getElementById("price").value.trim();
      if (!name || !image || !price) {
        alert("يرجى ملء جميع الحقول.");
        return;
      }

      document.getElementById("submitBtn").disabled = true;
      fetch(apiUrl, {
        method: "POST",
        body: new URLSearchParams({ name, image, price })
      })
      .then(res => res.text())
      .then(() => {
        document.getElementById("successMsg").textContent = "✅ تم إضافة المنتج بنجاح!";
        document.getElementById("submitBtn").disabled = false;
      })
      .catch(() => {
        document.getElementById("successMsg").textContent = "❌ فشل في الإضافة.";
        document.getElementById("submitBtn").disabled = false;
      });
    }
  </script>
</body>
</html>
