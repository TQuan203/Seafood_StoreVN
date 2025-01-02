<?php
$action = 'list';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_POST['action'])) {
    $action = $_POST['action'];
}

$controller = AppConstats::PRODUCT_CONTROLLER;

$prodDao = new ProductDao();
$cateDao = new CategoryDao();

switch ($action) {
    case 'view':
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $product = $prodDao->FindOne($id);

            // Tính toán giá khuyến mãi nếu có
            if ($product['sale'] > 0) {
                $originalPrice = $product['price'];
                $discount = $product['sale'];
                $discountedPrice = $originalPrice - ($originalPrice * $discount / 100);
                $product['discounted_price'] = $discountedPrice;
            } else {
                $product['discounted_price'] = $product['price'];
            }

            $category = $cateDao->FindOne($product['category_id']);
            include "./Views/Product/view.php";
        } else {
            $message = "Sản phẩm không hợp lệ.";
            include "./Views/Product/list.php";
        }
        break;

    case 'add':
        $categories = $cateDao->Find();
        include "./Views/Product/add.php";
        break;

        case 'add_save':
            $product = new Product();
            $product->RetrieveRequestParam();
            
            // Mảng lưu trữ lỗi
            $errors = []; 
        
            // Kiểm tra tên sản phẩm
            if (empty($product->Name)) {
                $errors['name'] = 'Vui lòng nhập tên sản phẩm.';
            } elseif (strlen($product->Name) > 100) {
                $errors['name'] = 'Vui lòng nhập tên dưới 100 ký tự.';
            } elseif ($prodDao->CheckProductNameExists($product->Name)) { 
                $errors['name'] = 'Tên sản phẩm đã tồn tại.';
            }
        
            // Kiểm tra giá sản phẩm
            if (!is_numeric($product->Price) || (float)$product->Price <= 0) {
                $errors['price'] = 'Vui lòng chỉ nhập số.';
            } elseif (!isset($product->Price) || trim($product->Price) === '') {
                $errors['price'] = 'Vui lòng nhập giá sản phẩm.';
            }
            
        
            // Kiểm tra giảm giá
            if (isset($product->Sale) && trim($product->Sale) !== '') {
                if (!is_numeric($product->Sale) || (float)$product->Sale < 0 || (float)$product->Sale > 100) {
                    $errors['sale'] = 'Vui lòng chỉ nhập số từ 0 đến 100.';
                }
            }
        
            // Kiểm tra số lượng sản phẩm
            if (!isset($product->Amount) || trim($product->Amount) === '') {
                $errors['amount'] = 'Vui lòng nhập số lượng sản phẩm.';
            } elseif (!ctype_digit($product->Amount) || (int)$product->Amount < 0) { // ctype_digit để kiểm tra chuỗi toàn số nguyên
                $errors['amount'] = 'Vui lòng chỉ nhập số.';
            }
        
            // Nếu không có lỗi, thực hiện thêm sản phẩm
            if (empty($errors)) {
                if ($prodDao->Insert($product)) {
                    $prodDao->upload(); // Gọi chức năng upload ảnh
                    $message = 'Thêm sản phẩm thành công!';
                } else {
                    $message = 'Thêm sản phẩm thất bại!';
                }
                include "./Views/Product/list.php"; // Chuyển hướng đến danh sách sản phẩm
            } else {
                // Nếu có lỗi, hiển thị lại form thêm cùng lỗi
                $categories = $cateDao->Find(); // Lấy danh sách danh mục
                include "./Views/Product/add.php"; 
            }
            break;
        

    case 'edit':
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $product = $prodDao->FindOne($id);
            $categories = $cateDao->Find();
            include "./Views/Product/edit.php";
        } else {
            $message = "Sản phẩm không hợp lệ.";
            include "./Views/Product/list.php";
        }
        break;

        case 'edit_save':
            $product = new Product();
            $product->RetrieveRequestParam();
        
            // Mảng lưu trữ lỗi
            $errors = [];
        
            // Kiểm tra tên sản phẩm
            if (empty($product->Name)) {
                $errors['name'] = 'Vui lòng nhập tên sản phẩm.';
            } elseif (strlen($product->Name) > 100) {
                $errors['name'] = 'Tên sản phẩm phải dưới 100 ký tự.';
            } elseif ($prodDao->CheckProductNameExists($product->Name, $product->Id)) { 
                $errors['name'] = 'Tên sản phẩm đã tồn tại.';
            }
        
            // Kiểm tra giá
            if (empty($product->Price)) {
                $errors['price'] = 'Vui lòng chỉ nhập số.';
            } elseif (!is_numeric($product->Price) || $product->Price <= 0) {
                $errors['price'] = 'Vui lòng chỉ nhập số.';
            }
        
            // Kiểm tra giảm giá
            if (!empty($product->Sale) && (!is_numeric($product->Sale) || $product->Sale < 0 || $product->Sale > 100)) {
                $errors['sale'] = 'Vui lòng chỉ nhập số.';
            }
        
            // Kiểm tra số lượng
            if (empty($product->Amount)) {
                $errors['amount'] = 'Vui lòng chỉ nhập số.';
            } elseif (!is_numeric($product->Amount) || $product->Amount < 0) {
                $errors['amount'] = 'Vui lòng chỉ nhập số và không được nhỏ hơn 0.';
            }
        
            // Nếu không có lỗi, thực hiện cập nhật
            if (empty($errors)) {
                $result = $prodDao->Update($product);
                
                // Nếu có hình ảnh mới, thực hiện upload
                if (!empty($_FILES["file"]["name"])) {
                    $prodDao->upload();
                }
        
                // Kiểm tra kết quả cập nhật
                if ($result) {
                    $message = 'Cập nhật sản phẩm thành công!';
                } else {
                    $message = 'Cập nhật sản phẩm thất bại!';
                }
        
                // Chuyển hướng đến danh sách sản phẩm
                $products = $prodDao->Find();
                include "./Views/Product/list.php";
            } else {
                // Nếu có lỗi, hiển thị lại form sửa cùng thông báo lỗi
                $categories = $cateDao->Find();
                include "./Views/Product/edit.php"; 
            }
            break;
        

    case 'delete':
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $prodDao->Delete($id);
            $message = 'Sản phẩm đã được xóa!';
        } else {
            $message = 'Không tìm thấy sản phẩm để xóa.';
        }

        $products = $prodDao->Find();
        include "./Views/Product/list.php";
        break;
// Tìm kiếm sản phẩm theo kí tự bất kì
    case 'find':
        $name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
        $categories = $cateDao->Find();
        $products = $name ? $prodDao->FindByName($name) : [];
        include "./Views/Product/find.php";
        break;

    case 'list_cate':
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        if ($category_id) {
            $products = $prodDao->FindIdCategory($category_id);
            $categories = $cateDao->Find();
            $cate = $cateDao->FindOne($category_id);
            include "./Views/Product/list_category.php";
        } else {
            $message = "Danh mục không hợp lệ.";
            $products = [];
            include "./Views/Product/list.php";
        }
        break;

    default:
        $products = $prodDao->Find();
        include('./Views/Product/list.php');
        break;
}
?>