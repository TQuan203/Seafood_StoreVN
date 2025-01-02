<?php
// Bao gồm các file cần thiết
require_once "../Models/Revenue.php"; // Đảm bảo đường dẫn đúng
require_once "../Data/RevenueDao.php"; // Đảm bảo đường dẫn đúng

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$controller = AppConstats::REVENUE_CONTROLLER;
$revenueDao = new RevenueDao(); // Khởi tạo đối tượng RevenueDao
$revenue = new Revenue(); // Khởi tạo đối tượng Revenue

switch ($action) {
    case 'index':
        // Lấy dữ liệu doanh thu từ RevenueDao
        $from_date = filter_input(INPUT_GET, 'from_date');
        $to_date = filter_input(INPUT_GET, 'to_date');
        $revenueData = $revenueDao->getRevenueData($to_date, $from_date);  // Không cần ngày, lấy tất cả đơn hàng đã hoàn thành

        // Tính tổng doanh thu
        $revenue->calculateRevenue($revenueData);

        // Hiển thị kết quả trong view
        include './Views/Revenue/index.php';  // Đảm bảo view có tồn tại
        break;
    case 'search':
        $from_date = isset($_POST['from_date']) ? $_POST['from_date'] : null;
        $to_date = isset($_POST['to_date']) ? $_POST['to_date'] : null;
        $revenueData = $revenueDao->getRevenueData($to_date, $from_date);  // Không cần ngày, lấy tất cả đơn hàng đã hoàn thành
        // Tính tổng doanh thu
        $revenue->calculateRevenue($revenueData);

        // Hiển thị kết quả trong view
        // include './Views/Revenue/index.php';
    // Các case khác nếu cần
    default:
        include './Views/Revenue/index.php';  // Mặc định hiển thị trang thống kê doanh thu
        break;
        
}

// Hàm xuất dữ liệu doanh thu ra CSV (nếu muốn)
function exportRevenueDataToCSV($data) {
    $filename = "revenue_data.csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');
    // Thêm tiêu đề cho các cột trong CSV
    fputcsv($output, array('ID Đơn Hàng', 'Ngày', 'Tổng Tiền'));

    // Thêm dữ liệu
    foreach ($data as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
}
