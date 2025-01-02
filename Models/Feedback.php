<?php

class Feedback
{
    public $Id;
    public $Name;
    public $Email;
    public $Message;
    public $CreatedAt;
    

    public function __construct()
    {
        $this->Id = 0;
        $this->Name = '';
        $this->Email = '';
        $this->Message = '';
        $this->CreatedAt = null;  // Đặt giá trị mặc định là null
    }

    // Phương thức lấy dữ liệu từ POST hoặc GET và gán vào các thuộc tính của đối tượng
    public function RetrieveRequestParam()
    {
        $this->Name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $this->Email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $this->Message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
        $this->CreatedAt = date('Y-m-d H:i:s'); // Gán thời gian hiện tại khi nhận được góp ý
    }
}

