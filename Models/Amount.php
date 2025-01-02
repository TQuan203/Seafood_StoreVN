<?php

class ProductAmount
{
    public $Id;
    public $CategoryId;
    public $Name;
    public $Price;
    public $Sale;
    public $Image;
    public $Date;
    public $Description;
    public $Amount;  // Tồn kho sản phẩm
    public $View;

    public function __construct($id = null, $categoryId = null, $name = null, $price = null, $sale = null, $image = null, $date = null, $description = null, $amount = null, $view = null)
    {
        $this->Id = $id;
        $this->CategoryId = $categoryId;
        $this->Name = $name;
        $this->Price = $price;
        $this->Sale = $sale;
        $this->Image = $image;
        $this->Date = $date;
        $this->Description = $description;
        $this->Amount = $amount; // Khởi tạo số lượng tồn kho
        $this->View = $view;
    }

    // Hàm này sẽ nhận dữ liệu từ form POST và gán vào các thuộc tính
    public function RetrieveRequestParam()
    {
        $this->CategoryId = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
        $this->Name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $this->Price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $this->Sale = filter_input(INPUT_POST, 'sale', FILTER_SANITIZE_NUMBER_INT);
        $this->Image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $this->Date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $this->Description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $this->Amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_INT); // Nhận số lượng tồn kho
        $this->View = filter_input(INPUT_POST, 'view', FILTER_SANITIZE_NUMBER_INT);
    }
}
?>
