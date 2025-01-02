<?php

$action = 'list';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$controller = AppConstats::ORDER_CONTROLLER;
$orderDao = new OrderDao();

$productDao = new ProductDao();

switch ($action) {
    case 'list':
        $orders = $orderDao->Find();
        include './Views/Orders/list.php';
        break;

    case 'view':
        $order_id = filter_input(INPUT_GET, 'id');

        $details = $orderDao->FindId($order_id);

        include './Views/Orders/view.php';
        break;
    case 'delete':
        $id = filter_input(INPUT_GET, 'id');
        $orderDao->Delete($id);

        $message = "Xoá thành công";

        $orders = $orderDao->Find();
        include('./Views/Orders/list.php');
        break;

    case 'update':
        $id = filter_input(INPUT_GET, 'id');
        $orderDao->updateStatus($id);
        $orders = $orderDao->FindOrderId($id);
        $orderDetail = $orderDao->FindId( $id );
        foreach ($orderDetail as $key => $value) {
            $productId = $value['product_id'];
            $amount = $value['amount'];
            $productDao ->UpdateAmount($productId, $amount);
        }
        $orders = $orderDao->Find();
        include('./Views/Orders/list.php');
        break;

}