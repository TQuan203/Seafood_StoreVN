<?php
class Product
{
    public $Id;
    public $CategoryId;
    public $Name;
    public $Price;
    public $Sale;
    public $Image;
    public $Date;
    public $Description;
    public $Amount;
    public $View;
    public $DiscountedPrice; // Thêm thuộc tính để lưu giá sau khuyến mãi
    public $errors = []; // Thêm biến để lưu lỗi

    // Phương thức lấy thông tin từ form
    public function RetrieveRequestParam()
    {
        $this->CategoryId = filter_input(INPUT_POST, 'category_id');
        $this->Name = filter_input(INPUT_POST, 'name');
        $this->Price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $this->Sale = filter_input(INPUT_POST, 'sale', FILTER_VALIDATE_FLOAT);  // Khuyến mãi
        if ($_FILES['file']['name'] != null) {
            $this->Image = $_FILES['file']['name'];
        } else {
            $this->Image = filter_input(INPUT_POST, 'image');
        }
        $this->Date = filter_input(INPUT_POST, 'date');
        $this->Description = filter_input(INPUT_POST, 'description');
        $this->Amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT); // Kiểm tra kiểu số nguyên
        $this->View = filter_input(INPUT_POST, 'view');

        $id = filter_input(INPUT_POST, 'id');
        if ($id != null) $this->Id = $id;

        // Kiểm tra và xử lý nếu các thông tin quan trọng bị thiếu hoặc sai
        $this->validateFields();
        
        // Tính giá sau khuyến mãi khi nhận được thông tin
        $this->calculateDiscountedPrice();
    }

    // Kiểm tra dữ liệu đầu vào
    private function validateFields()
    {
        // Kiểm tra tên sản phẩm
        if (empty($this->Name)) {
            $this->errors['name'] = 'Tên sản phẩm không được để trống.';
        }

        // Kiểm tra số lượng
        if (empty($this->Amount) || !is_numeric($this->Amount) || $this->Amount < 0) {
            $this->errors['amount'] = 'Số lượng phải là một số hợp lệ và không được âm.';
        }

        // Kiểm tra giá
        if (empty($this->Price) || !is_numeric($this->Price) || $this->Price < 0) {
            $this->errors['price'] = 'Giá phải là một số hợp lệ và không được âm.';
        }

        // Kiểm tra khuyến mãi
        if ($this->Sale < 0 || $this->Sale > 100) {
            $this->errors['sale'] = 'Khuyến mãi phải từ 0 đến 100.';
        }
    }

    // Phương thức tính giá sau khuyến mãi
    public function calculateDiscountedPrice()
    {
        // Nếu có khuyến mãi, tính giá sau khuyến mãi
        if (isset($this->Price) && isset($this->Sale) && $this->Sale > 0) {
            $this->DiscountedPrice = $this->Price - ($this->Price * $this->Sale / 100);
        } else {
            $this->DiscountedPrice = $this->Price; // Nếu không có khuyến mãi, giá giữ nguyên
        }
    }
}

