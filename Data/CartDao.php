<?php
class CartDao
{
    // Hàm khởi tạo: kiểm tra và khởi tạo giỏ hàng nếu chưa tồn tại
    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array(); // Khởi tạo giỏ hàng trống nếu chưa được tạo
        }
    }

    // Chức năng thêm sản phẩm vào giỏ hàng, áp dụng giảm giá nếu có
    public function addCart($product_id, $quantity)
    {
        // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
        $prodDao = new ProductDao();
        $product = $prodDao->FindOne($product_id);

        if ($product) {
            // Tính giá sau khi áp dụng giảm giá (nếu có)
            $salePrice = $product['discount_price'] > 0 ? 
                         $product['price'] - ($product['price'] * $product['discount_price'] / 100) : 
                         $product['price'];

            // Thêm sản phẩm vào giỏ hàng với số lượng và giá bán
            $_SESSION['cart'][$product_id] = [
                'quantity' => round($quantity, 0),
                'price' => $salePrice
            ];
        }
    }

    // Chức năng lấy tất cả sản phẩm trong giỏ hàng kèm thông tin chi tiết và tính tổng giá
    public function cartItems()
    {
        $items = array();
        foreach ($_SESSION['cart'] as $product_id => $details) {
            // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
            $prodDao = new ProductDao();
            $product = $prodDao->FindOne($product_id);

            if ($product) {
                // Sử dụng giá bán lưu trong giỏ hàng
                $price = $details['price'];
                $quantity = intval($details['quantity']);

                // Tính tổng giá cho sản phẩm
                $total = round($price * $quantity, 0);

                // Lưu thông tin sản phẩm vào mảng `items`
                $items[$product_id]['name'] = $product['name'];
                $items[$product_id]['image'] = $product['image'];
                $items[$product_id]['price'] = $price;
                $items[$product_id]['quantity'] = $quantity;
                $items[$product_id]['total'] = $total;
            }
        }
        return $items; // Trả về danh sách sản phẩm trong giỏ hàng
    }

    // Chức năng cập nhật số lượng sản phẩm trong giỏ hàng và áp dụng giảm giá nếu có
    public function updateCart($product_id, $quantity)
    {
        // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
        $prodDao = new ProductDao();
        $product = $prodDao->FindOne($product_id);

        if ($product) {
            // Tính giá sau khi áp dụng giảm giá
            $salePrice = $product['discount_price'] > 0 ? 
                         $product['price'] - ($product['price'] * $product['discount_price'] / 100) : 
                         $product['price'];

            // Cập nhật số lượng và giá bán trong giỏ hàng
            $_SESSION['cart'][$product_id] = [
                'quantity' => round($quantity, 0),
                'price' => $salePrice
            ];
        }
    }

    // Chức năng xóa một sản phẩm khỏi giỏ hàng
    public function deleteItems($product_id)
    {
        // Kiểm tra sản phẩm có trong giỏ hàng hay không và xóa nó
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
            echo "Sản phẩm đã được xóa khỏi giỏ hàng.";
        }
    }

    // Chức năng lấy số lượng sản phẩm trong giỏ hàng
    public function cartCount()
    {
        return count($_SESSION['cart']); // Trả về số lượng sản phẩm trong giỏ hàng
    }

    // Chức năng xóa toàn bộ sản phẩm trong giỏ hàng
    public function clearCart()
    {
        // Làm trống toàn bộ giỏ hàng
        $_SESSION['cart'] = array();
    }
}
