<?php

class NewsDao
{
    private $dbu;

    public function __construct() {
        $this->dbu = new DatabaseUtil();
        $this->dbu->Open();
    }

    // Thêm tin tức mới
    public function AddNews($news)
    {
        $sql = "INSERT INTO news (title, content, created_at, updated_at) VALUES (:title, :content, :created_at, :updated_at)";
        $args = [
            ':title' => $news->Title,
            ':content' => $news->Content,
            ':created_at' => $news->CreatedAt,
            ':updated_at' => $news->UpdatedAt
        ];
        return $this->dbu->Execute($sql, $args);
    }

    // Cập nhật tin tức
    public function UpdateNews($news)
    {
        $sql = "UPDATE news SET title = :title, content = :content, updated_at = :updated_at WHERE id = :id";
        $args = [
            ':id' => $news->Id,
            ':title' => $news->Title,
            ':content' => $news->Content,
            ':updated_at' => $news->UpdatedAt
        ];
        return $this->dbu->Execute($sql, $args);
    }

    // Xóa tin tức
    public function DeleteNews($id)
    {
        $sql = "DELETE FROM news WHERE id = :id";
        $args = [':id' => $id];
        return $this->dbu->Execute($sql, $args);
    }

    // Lấy tất cả tin tức
    public function GetAllNews()
    {
        $sql = "SELECT * FROM news ORDER BY created_at DESC";
        return $this->dbu->Query($sql, []);
    }

    // Lấy tin tức theo ID
    public function GetNewsById($id)
    {
        $sql = "SELECT * FROM news WHERE id = :id";
        $args = [':id' => $id];
        return $this->dbu->Query($sql, $args, true);
    }
    
}
?>
