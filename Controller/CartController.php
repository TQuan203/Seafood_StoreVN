<?php

$action = 'view';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    // echo json_encode($action);

} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
    // echo json_encode($action);

}


$controller = AppConstats::CART_CONTROLLER;
$cartDao = new CartDao();
$orderDao = new OrderDao();

switch ($action) {
    
    case 'add':
        // Thêm sản phẩm vào giỏ hàng
        if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
            $product_id = (int)$_GET['product_id']; // Chuyển sang kiểu int để bảo mật
            $quantity = (int)$_GET['quantity'];

            // Kiểm tra số lượng hợp lệ và sản phẩm tồn tại
            if ($quantity > 0 && $product_id > 0) {
                // Kiểm tra xem sản phẩm có tồn tại trong cơ sở dữ liệu
                $prodDao = new ProductDao();
                $product = $prodDao->FindOne($product_id);
                if ($product) {
                    $cartDao->addCart($product_id, $quantity);
                    $_SESSION['message'] = "Đã thêm sản phẩm vào giỏ hàng.";
                } else {
                    $_SESSION['message'] = "Sản phẩm không tồn tại.";
                }
            } else {
                $_SESSION['message'] = "Số lượng sản phẩm không hợp lệ.";
            }
        } else {
            $_SESSION['message'] = "Thiếu thông tin sản phẩm hoặc số lượng.";
        }

        header("Location: ./"); // Điều hướng lại sau khi thêm sản phẩm
        break;

    case 'view':
        // Hiển thị giỏ hàng
        $cart = $cartDao->cartItems();
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        include './Views/Cart/view.php';
        break;

    case 'update':
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        if (isset($_POST['items']) && is_array($_POST['items'])) {
            $items = $_POST['items'];
            foreach ($items as $product_id => $quantity) {
                $product_id = (int)$product_id;
                $quantity = (int)$quantity;

                // Kiểm tra nếu số lượng = 0 thì xóa sản phẩm
                if ($quantity == 0) {
                    $cartDao->deleteItems($product_id);
                } elseif ($quantity > 0) {
                    // Cập nhật số lượng nếu hợp lệ
                    $cartDao->updateCart($product_id, $quantity);
                } else {
                    $_SESSION['message'] = "Số lượng không hợp lệ.";
                }
            }
            $_SESSION['message'] = "Giỏ hàng đã được cập nhật.";
        } else {
            $_SESSION['message'] = "Không có sản phẩm nào để cập nhật.";
        }

        $cart = $cartDao->cartItems();
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        include './Views/Cart/view.php';
        break;

    
        // break;
    case 'remove':
        
        // Kiểm tra nếu có product_id
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            // Xóa sản phẩm khỏi giỏ hàng
            echo "Sản phẩm đã được xóa khỏi giỏ hàng.";

            $cartDao->deleteItems($product_id);

            
        }
        // Không chuyển hướng mà chỉ trả về giỏ hàng đã được cập nhật
        break;
    case 'clear_cart':
        // Xóa toàn bộ giỏ hàng
            $cartDao->clearCart();

    break;
    case 'check_out1':
            // Xử lý thanh toán
            $status = '0';  // Trạng thái mặc định là chưa thanh toán
            $order = new Order();
            $order->RetrieveRequestParam();  // Lấy thông tin đơn hàng từ request
    
            // Kiểm tra thông tin người nhận
            if (empty($order->Name) && empty($order->Telephone) && empty($order->Address)) {
                // $_SESSION['message'] = "Vui lòng cung cấp đầy đủ thông tin đơn hàng.";
                // echo "<script>alert('Vui lòng cung cấp đầy đủ thông tin đơn hàng.!');</script>";
                echo "<script>
                alert('Vui lòng cung cấp đầy đủ thông tin đơn hàng.!');
                window.location.href = './?controller=CartController';
              </script>";
                // header("Location: ./?controller=CartController");
                exit();
                
            }
        // Thêm đơn hàng vào cơ sở dữ liệu
        $order_id = $orderDao->addOrder($order);

        // Nếu đơn hàng được thêm thành công
        if ($order_id) {
            // Thêm chi tiết đơn hàng vào cơ sở dữ liệu
            $cart = $cartDao->cartItems();
            foreach ($cart as $product_id => $item) {
                $price = $item['price'];
                $amount = $item['quantity'];
                $orderDao->addOrderDetails($order_id, $product_id, $price, $amount);
            }

            // Làm sạch giỏ hàng
            $cartDao->clearCart();

            // Thêm thông báo thanh toán thành công vào session
            echo "<script>
            alert('Thanh toán thành công.!');
            window.location.href = './?controller=CartController';
          </script>";

            // Chuyển hướng người dùng về trang giỏ hàng hoặc trang chủ
            // header("Location: ./");
            exit();
        } else {
            // Nếu có lỗi khi thêm đơn hàng, thông báo lỗi
            $_SESSION['message'] = "Có lỗi xảy ra trong quá trình thanh toán.";
            header("Location: ./");
            exit();
        }
       break;
}
