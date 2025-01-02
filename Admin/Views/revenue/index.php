<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Doanh Thu</title>
</head>
<body>

    <div class="container">
    <body>
    <form action="?controller=RevenueController&action=search" method="POST">
        <label for="from_date">Chọn từ:</label>
        <input type="date" id="from_date" name="from_date" value="<?php echo date('Y-m-d'); ?>">
        <br><br>
        <label for="to_date">Chọn đến </label>
        <input type="date" id="to_date" name="to_date" value="<?php echo date('Y-m-d'); ?>">
        <br><br>
        <button type="submit">Tìm kiếm</button>
    </form>
</body>
        <h1>Thống Kê Doanh Thu</h1>
        
        <h3>Doanh thu từ các đơn hàng đã hoàn thành:</h3>
        <p>Doanh thu: <?php echo number_format($revenue->TotalRevenue, 0, ',', '.'); ?> VND</p>
</body>
</html>
