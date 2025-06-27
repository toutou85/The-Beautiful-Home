<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>طلبيات الزبائن</title>
  <style>
    body { font-family: Tahoma, sans-serif; background: #f4f4f4; padding: 2rem; }
    h1 { text-align: center; color: #005f73; margin-bottom: 1.5rem; }
    table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; font-size: 0.9rem; }
    th { background-color: #0a9396; color: white; }
    tr:nth-child(even) { background-color: #f9f9f9; }
    .controls { text-align: center; margin: 20px 0; }
    button { margin: 5px; padding: 10px 15px; background-color: #005f73; color: white; border: none; border-radius: 5px; cursor: pointer; }
    button:hover { background-color: #0a9396; }
    .pagination { text-align: center; margin-top: 1rem; }
    .pagination button { margin: 3px; background: #ccc; color: #000; }
    .pagination button.active { background: #005f73; color: white; }
    header {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }
  </style>
</head>
<body>

<header>
  <img src="logo.png" style="height: 40px;">
  <h1 style="margin: 0; font-size: 1.6rem;">طلبات الزبائن - <?= htmlspecialchars($_SESSION['user']) ?></h1>
</header>

<div style="padding: 1rem;">
  <a href="admin.php" style="text-decoration: none; background: #005f73; color: white; padding: 0.5rem 1rem; border-radius: 5px;">🔙 الرجوع</a>
</div>

<div class="controls">
  <button onclick="print()">🖨️ طباعة</button>
  <button onclick="downloadCSV()">⬇️ تحميل كـ Excel</button>
</div>

<table>
  <thead>
    <tr>
      <th>التاريخ</th>
      <th>الاسم</th>
      <th>الهاتف</th>
      <th>الولاية</th>
      <th>نوع التوصيل</th>
      <th>العنوان</th>
      <th>المنتج</th>
    </tr>
  </thead>
  <tbody id="orderTable">
    <tr><td colspan="7">⏳ جاري التحميل...</td></tr>
  </tbody>
</table>

<div class="pagination">
  <button onclick="prevPage()" id="prevBtn">السابق</button>
  <span id="pageInfo"></span>
  <button onclick="nextPage()" id="nextBtn">التالي</button>
</div>

<script>
  const sheetURL = "https://docs.google.com/spreadsheets/d/e/2PACX-1vRYCb9P6-QwBUwBA6ijpq2LoH3ErA1sXmCxJFDZC5ayx0tO8deHuvo8vorNTokkXGtbr7_1QFXQ2Lb3/pub?gid=0&single=true&output=csv";
  let currentPage = 1;
  const rowsPerPage = 20;
  let orders = [];

  function renderTable(page) {
    const tbody = document.getElementById("orderTable");
    tbody.innerHTML = "";

    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const pageOrders = orders.slice(start, end);

    if (pageOrders.length === 0) {
      tbody.innerHTML = '<tr><td colspan="7">لا توجد طلبات</td></tr>';
    } else {
      pageOrders.forEach(row => {
        const tr = document.createElement("tr");
        row.forEach(cell => {
          const td = document.createElement("td");
          td.textContent = cell;
          tr.appendChild(td);
        });
        tbody.appendChild(tr);
      });
    }

    document.getElementById("pageInfo").textContent = `الصفحة ${page} من ${Math.ceil(orders.length / rowsPerPage)}`;
    document.getElementById("prevBtn").disabled = page === 1;
    document.getElementById("nextBtn").disabled = end >= orders.length;
  }

  function prevPage() {
    if (currentPage > 1) {
      currentPage--;
      renderTable(currentPage);
    }
  }

  function nextPage() {
    if (currentPage * rowsPerPage < orders.length) {
      currentPage++;
      renderTable(currentPage);
    }
  }

  function downloadCSV() {
    let csvContent = "data:text/csv;charset=utf-8," + orders.map(e => e.join(",")).join("\\n");
    let link = document.createElement("a");
    link.setAttribute("href", encodeURI(csvContent));
    link.setAttribute("download", "orders.csv");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }

  fetch(sheetURL)
    .then(res => res.text())
    .then(text => {
      const rows = text.trim().split("\\n").map(row => row.split(","));
      orders = rows.slice(1);
      renderTable(currentPage);
    })
    .catch(err => {
      console.error("فشل في تحميل البيانات:", err);
      const tbody = document.getElementById("orderTable");
      tbody.innerHTML = '<tr><td colspan="7">⚠️ فشل في تحميل البيانات.</td></tr>';
    });
</script>

</body>
</html>
