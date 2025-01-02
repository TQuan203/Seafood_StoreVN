<?php

class FeedbackDao
{
    private $dbu;

    public function __construct() {
        $this->dbu = new DatabaseUtil();
        $this->dbu->Open();
    }

    // Xóa góp ý
    public function Delete($id)
    {
        $sql = "DELETE FROM feedback WHERE id = :id";
        $args = array('id' => $id);

        // Thực thi câu lệnh DELETE và trả về kết quả
        return $this->dbu->Execute($sql, $args);
    }

    // Lấy tất cả các góp ý
    public function Find()
    {
        $sql = "SELECT * FROM feedback ORDER BY created_at DESC"; // Sắp xếp theo thời gian góp ý mới nhất
        return $this->dbu->Query($sql, array());
    }

    // Lấy góp ý theo id
    public function FindOne($id)
    {
        $sql = "SELECT * FROM feedback WHERE id = :id";
        $args = array('id' => $id);

        // Truy vấn và lấy một kết quả duy nhất
        return $this->dbu->Query($sql, $args, true);
    }

    // Thêm góp ý mới vào cơ sở dữ liệu
    public function AddFeedback($feedback)
{
    $sql = "INSERT INTO feedback (name, email, message, created_at) VALUES (:name, :email, :message, :created_at)";
    $args = [
        ':name' => $feedback->Name,
        ':email' => $feedback->Email,
        ':message' => $feedback->Message,
        ':created_at' => $feedback->CreatedAt
    ];

    return $this->dbu->Execute($sql, $args);
}

}
?>
