<?php

class News
{
    public $Id;
    public $Title;
    public $Content;
    public $CreatedAt;
    public $UpdatedAt;

    public function __construct()
    {
        $this->Id = 0;
        $this->Title = '';
        $this->Content = '';
        $this->CreatedAt = null;
        $this->UpdatedAt = null;
    }

    // Phương thức lấy dữ liệu từ POST và gán vào các thuộc tính của đối tượng
    public function RetrieveRequestParam()
    {
        $this->Title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $this->Content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
        $this->CreatedAt = date('Y-m-d H:i:s'); // Gán thời gian hiện tại khi tạo tin tức
        $this->UpdatedAt = date('Y-m-d H:i:s'); // Gán thời gian hiện tại khi tạo tin tức
    }

    // Phương thức để cập nhật thời gian cập nhật mỗi khi chỉnh sửa tin tức
    public function UpdateTime()
    {
        $this->UpdatedAt = date('Y-m-d H:i:s'); // Cập nhật thời gian khi sửa tin tức
    }
}
?>
