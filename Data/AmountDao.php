<?php

class AmountDao
{
    var $dbu;

    public function __construct() {
        $this->dbu = new DatabaseUtil();
        $this->dbu->Open();
    }

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
            "amount" => $product->Amount, // Lưu số lượng tồn kho
            "view" => $product->View
        );

        $this->dbu->Execute($sql, $args);

        $product->Id = $this->dbu->GetLastInsertedId();

        return $product;
    }

    // Cập nhật số lượng tồn kho khi có sự thay đổi
    public function UpdateAmount($id, $amount)
    {
        $sql = "UPDATE product SET amount = :amount WHERE id = :id";

        $args = array(
            'id' => $id,
            'amount' => $amount
        );

        return $this->dbu->Execute($sql, $args);
    }

    // Kiểm tra tồn kho
    public function CheckStock($id)
    {
        $sql = "SELECT amount FROM product WHERE id = :id";

        $args = array('id' => $id);

        $result = $this->dbu->Query($sql, $args, true);

        return $result ? $result['amount'] : 0;
    }

    public function Find()
    {
        $sql = "SELECT * FROM product ORDER BY id DESC";

        $products = $this->dbu->Query($sql, array());

        return $products;
    }

    // Tính toán giá sau khi áp dụng khuyến mãi
    public function getDiscountedPrice($product) {
        $originalPrice = $product['price'];   // Giá gốc
        $discountPercent = $product['sale']; // % khuyến mãi

        return $originalPrice * (1 - $discountPercent / 100);
    }

    // Các phương thức khác như FindOne, FindByName vẫn giữ nguyên...
}
?>
