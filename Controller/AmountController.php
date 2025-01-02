<?php
require_once "../Models/Amount.php"; // Đảm bảo đường dẫn đúng
require_once "../Data/AmountDao.php"; // Đảm bảo đường dẫn đúng

$action = 'list';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$controller = AppConstats::AMOUNT_CONTROLLER;

$prodDao = new ProductDao();
$cateDao = new CategoryDao();

switch ($action) {
    case 'view':
        $id = filter_input(INPUT_GET, 'id');
        $product = $prodDao->FindOne($id);

        // Lấy tên sản phẩm và số lượng tồn kho
        $productInfo = [
            'name' => $product['name'],
            'amount' => $product['amount']
        ];

        include "./Views/Amount/product_inventory.php";
        break;

    case 'find':
        $name = filter_input(INPUT_GET, 'name');
        if ($name != null) {
            // Lọc sản phẩm theo tên
            $products = $prodDao->FindByName($name);
        } else {
            $products = $prodDao->Find();
        }

        // Lọc chỉ lấy tên và số lượng tồn kho
        $productList = array_map(function($product) {
            return [
                'name' => $product['name'],
                'amount' => $product['amount']
            ];
        }, $products);

        include "./Views/Amount/product_inventory.php";
        break;

    case 'update_stock':
        $id = filter_input(INPUT_GET, 'id');
        $newAmount = filter_input(INPUT_GET, 'amount', FILTER_SANITIZE_NUMBER_INT);
        
        // Cập nhật số lượng tồn kho
        //$prodDao->UpdateAmount($id, $newAmount);
        
        $message = 'Cập nhật tồn kho thành công!';
        include "./Views/Amount/product_inventory.php";
        break;

    default:
        // Lấy danh sách tất cả sản phẩm và chỉ cần tên và số lượng tồn kho
        $products = $prodDao->Find();
        $productList = array_map(function($product) {
            return [
                'name' => $product['name'],
                'amount' => $product['amount']
            ];
        }, $products);

        include('./Views/Amount/product_inventory.php');
        break;
}
?>
