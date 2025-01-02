<?php
class ProductDao
{
    var $dbu;

    // Constructor: Mở kết nối với cơ sở dữ liệu
    public function __construct() {
        $this->dbu = new DatabaseUtil();
        $this->dbu->Open();
    }

    // Chức năng thêm sản phẩm mới vào cơ sở dữ liệu
    public function Insert(Product $product)
    {
        $sql = "INSERT INTO product(category_id, name, price, sale, image, date, description, amount, view) 
                VALUES (:category_id, :name, :price, :sale, :image, :date, :description, :amount, :view)";

        $args = array(
            "category_id" => $product->CategoryId,
            "name" => $product->Name,
            "price" => $product->Price,
            "sale" => $product->Sale,
            "image" => $product->Image,
            "date" => $product->Date,
            "description" => $product->Description,
            "amount" => $product->Amount,
            "view" => $product->View
        );

        $this->dbu->Execute($sql, $args);
        $product->Id = $this->dbu->GetLastInsertedId(); // Lấy ID sản phẩm vừa thêm

        return $product;
    }

    // Chức năng xóa sản phẩm theo ID
    public function Delete($id)
    {
        $sql = "DELETE FROM product WHERE id = :id";

        $args = array('id' => $id);
        $result = $this->dbu->Execute($sql, $args);

        return $result;
    }

    // Chức năng cập nhật thông tin sản phẩm
    public function Update(Product $product)
    {
        $sql = "UPDATE product SET 
                    category_id = :category_id, 
                    name = :name, 
                    price = :price, 
                    sale = :sale, 
                    image = :image, 
                    date = :date, 
                    description = :description, 
                    amount = :amount, 
                    view = :view  
                WHERE id = :id";

        $args = array(
            'id' => $product->Id,
            "category_id" => $product->CategoryId,
            "name" => $product->Name,
            "price" => $product->Price,
            "sale" => $product->Sale,
            "image" => $product->Image,
            "date" => $product->Date,
            "description" => $product->Description,
            "amount" => $product->Amount,
            "view" => $product->View
        );

        $result = $this->dbu->Execute($sql, $args);

        return $result;
    }

    // Chức năng lấy danh sách tất cả sản phẩm
    public function Find()
    {
        $sql = "SELECT * FROM product ORDER BY id DESC";
        $products = $this->dbu->Query($sql, array());

        return $products;
    }

    // Chức năng tìm sản phẩm theo ID
    public function FindOne($id)
    {
        $sql = "SELECT * FROM product WHERE id = :id";

        $args = array('id' => $id);
        $product = $this->dbu->Query($sql, $args, true);

        return $product;
    }

    // Chức năng tìm sản phẩm theo loại sản phẩm (category_id)
    public function FindIdCategory($category_id)
    {
        $sql = "SELECT * FROM product WHERE category_id = :category_id";

        $args = array('category_id' => $category_id);
        $products = $this->dbu->Query($sql, $args, false);

        return $products;
    }

    // Chức năng tìm sản phẩm theo tên
    public function FindByName($name)
    {
        $sql = "SELECT * FROM product WHERE name LIKE :name";

        $args = array('name' => "%$name%");
        $products = $this->dbu->Query($sql, $args);

        return $products;
    }

    // Chức năng tải lên hình ảnh sản phẩm
    public function upload()
    {
        if (isset($_POST["ok"])) { // Kiểm tra nếu người dùng nhấn nút tải lên
            if ($_FILES["file"]["name"] != NULL) { // Kiểm tra xem file có được chọn không
                if ($_FILES["file"]["type"] == "image/jpeg"
                    || $_FILES["file"]["type"] == "image/png"
                    || $_FILES["file"]["type"] == "image/gif"
                ) {
                    $path = "Assets/img/products/"; // Đường dẫn lưu trữ file
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $name = $_FILES['file']['name'];
                    move_uploaded_file($tmp_name, $path . $name); // Di chuyển file tải lên thư mục
                }
            }
        }
    }

    // Chức năng tính giá sau khuyến mãi
    public function getDiscountedPrice($product) {
        $originalPrice = $product['price'];   // Giá gốc
        $discountPercent = $product['sale'];  // % khuyến mãi
        
        return $originalPrice * (1 - $discountPercent / 100); // Giá sau khi giảm
    }

    // Chức năng lấy số lượng tồn kho của sản phẩm
    public function getStockLevel($productId)
    {
        $sql = "SELECT amount FROM product WHERE id = :id";
        $args = array('id' => $productId);
        $result = $this->dbu->Query($sql, $args, true);

        return $result['amount']; // Trả về số lượng tồn kho
    }

    // Chức năng cập nhật số lượng tồn kho (giảm số lượng sau khi bán)
    public function UpdateAmount($productId, $quantity)
    {
        $sql = "UPDATE product SET amount = amount - :quantity WHERE id = :product_id";

        $args = array(
            'quantity' => $quantity,
            'product_id' => $productId
        );

        $result = $this->dbu->Execute($sql, $args);

        return $result;
    }
public function CheckProductNameExists($name, $excludeId = null)
{
    // Loại bỏ khoảng trắng thừa ở đầu/cuối và so khớp chính xác tên
    $sql = "SELECT COUNT(*) as count 
            FROM product 
            WHERE BINARY TRIM(name) = :name";

    $args = ['name' => trim($name)];

    // Nếu có `excludeId`, loại trừ sản phẩm hiện tại khi kiểm tra (khi sửa)
    if ($excludeId !== null) {
        $sql .= " AND id != :id";
        $args['id'] = $excludeId;
    }

    $result = $this->dbu->Execute($sql, $args);

    // Trả về true nếu tìm thấy sản phẩm, ngược lại false
    return $result[0]['count'] > 0;
}

    
}