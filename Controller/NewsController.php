<?php
require_once __DIR__ . "/../Data/NewsDao.php";
require_once __DIR__ . "/../Models/News.php";
$action = 'view';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
}
$news_id = isset($_GET['news_id']) ? (int)$_GET['news_id'] : null;
$news_id1 = isset($_POST['news_id']) ? (int)$_POST['news_id'] : null;


$controller = AppConstats::NEWS_CONTROLLER;
$newsDao = new NewsDao();

switch ($action) {

    case 'add':
        // Thêm bài viết mới
        
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
    
            // Kiểm tra dữ liệu hợp lệ
            if ($title && $content) {
                // Tạo đối tượng News
                $news = new News();
                $news->Title = $title;
                $news->Content = $content;
                $news->CreatedAt = date("Y-m-d H:i:s"); // Thiết lập thời gian tạo
                $news->UpdatedAt = date("Y-m-d H:i:s"); // Thiết lập thời gian cập nhật
    
                // Thêm bài viết vào cơ sở dữ liệu
                $news_id = $newsDao->AddNews($news);
                if ($news_id) {
                    $message = "Đã thêm bài viết mới.";
                    include "./Views/news/add.php";

                } else {
                    $message = "Có lỗi xảy ra khi thêm bài viết.";
                }
            } else {
                $message = "Thông tin bài viết không hợp lệ.";
            }
        }
        include "./Views/news/add.php";
        break;

        case 'view':
            // Lấy danh sách tin tức
            $news = $newsDao->GetAllNews(); // Lấy tất cả tin tức từ cơ sở dữ liệu
            include './Views/news/view.php'; // Hiển thị danh sách tin tức
            break;
        case 'edit':
                $news_id = filter_input(INPUT_GET, 'news_id', FILTER_VALIDATE_INT);
                if ($news_id) {
                    $news_db = $newsDao->GetNewsById($news_id);
                    $title = $news_db['title'];    // Lấy tiêu đề bài viết
                    $content = $news_db['content']; 
                    include "./Views/news/update.php";
                } else {
                    $message = "Sản phẩm không hợp lệ.";
                    include "./Views/news/view.php";
                }
                break;
        case 'update':
            // Cập nhật bài viết
                if ($news_id1) {
                    $news = new News();
                    $news->Id = $news_id1;
                    $news->RetrieveRequestParam();
                    // Cập nhật bài viết
                    $updated = $newsDao->UpdateNews($news);
    
                    if ($updated) {
                        $message = "Bài viết đã được cập nhật.";
                        $title = $news->Title;   
                        $content = $news->Content;   // Lấy tiêu đề bài viết
                        // Lấy tiêu đề bài viết
                        include "./Views/news/update.php";

                    } else {
                        $message = "Có lỗi xảy ra khi cập nhật bài viết.";
                        include "./Views/news/update.php";
                    }
                }
            break;
        

            case 'remove':
                // Xóa bài viết
                if (isset($_GET['news_id'])) {
                    $news_id = (int)$_GET['news_id'];
                    // Xóa bài viết khỏi cơ sở dữ liệu
                    $deleted = $newsDao->DeleteNews($news_id);
            
                    if ($deleted) {
                        $message = "Bài viết đã được xóa.";
                        $news = $newsDao->GetAllNews(); // Lấy tất cả tin tức từ cơ sở dữ liệu
                        include './Views/news/view.php';

                    } else {
                        $message  = "Có lỗi xảy ra khi xóa bài viết.";
                    }
                }
            
                break;
                case 'detail':
                    if (isset($_GET['id'])) {
                        $news_id = (int)$_GET['id'];
                        $news = $newsDao->GetNewsById($news_id); // Hàm lấy bài viết theo ID
                        if ($news) {
                            include './Views/news/news-detail.php'; // Hiển thị chi tiết bài viết
                        } else {
                            $_SESSION['message'] = "Bài viết không tồn tại.";
                            header("Location: ./?controller=NewsController&action=view"); // Quay lại trang danh sách tin tức nếu không tìm thấy bài viết
                        }
                    }
                    break;

                default:
                    $news = $newsDao->GetAllNews(); // Lấy tất cả tin tức từ cơ sở dữ liệu
                    include './Views/news/view.php'; // Hiển thị danh sách tin tức
                    break;
}
?>
