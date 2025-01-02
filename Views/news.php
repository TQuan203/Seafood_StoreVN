<?php
require_once __DIR__ . "/../Data/NewsDao.php"; // Đảm bảo đường dẫn đúng đến NewsDao
require_once __DIR__ . "/../Models/News.php"; // Đảm bảo bạn đã có mô hình News

// Khởi tạo đối tượng NewsDao để lấy dữ liệu
$newsDao = new NewsDao();

// Lấy tất cả tin tức từ cơ sở dữ liệu
$newsList = $newsDao->GetAllNews(); // Phương thức này sẽ trả về tất cả các bài viết tin tức từ cơ sở dữ liệu

// Nếu không có tin tức, sẽ hiển thị thông báo
if (empty($newsList)) {
    $message = "Hiện tại không có bài viết tin tức.";
}

include './Views/Common/header.php'; // Bao gồm header
include './Views/Common/menu.php'; // Bao gồm menu
?>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <!-- Tiêu đề trang tin tức -->
            <div class="col-md-12 p-b-30">
                <h2 class="m-text26 p-b-36 text-center">
                    Tin Tức Mới Nhất
                </h2>
            </div>
        </div>

        <div class="row">
            <!-- Hiển thị danh sách bài viết -->
            <div class="col-md-12 p-b-30">
                <div class="news-list">
                    <?php
                    if (!empty($newsList)) {
                        foreach ($newsList as $news) {
                    ?>
                        <div class="news-item mb-4 p-4 border rounded shadow-sm">
                            <h3 class="m-text24 p-b-20"><?= htmlspecialchars($news['title']) ?></h3>
                            <p class="s-text7 text-muted">
                                <?= htmlspecialchars(substr($news['content'], 0, 150)) ?>... <!-- Tóm tắt nội dung -->
                            </p>
                            <a href="?controller=NewsController&action=view&id=<?= $news['id'] ?>" class="s-text7 text-primary">Xem chi tiết</a>
                        </div>
                    <?php
                        }
                    } else {
                        echo '<p class="s-text7">' . $message . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Đăng ký nhận tin tức -->
        <div class="row mt-5">
            <div class="col-md-12 p-b-30">
                <h4 class="m-text26 p-b-36 text-center">
                    Đăng Ký Nhận Tin Tức
                </h4>
                <form action="." method="post" class="leave-comment">
                    <input type="hidden" name="action" value="subscribe_news">
                    <input type="hidden" name="controller" value="Controller">
                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22 form-control" type="email" name="email" placeholder="Email của bạn" required>
                    </div>

                    <div class="w-size25 text-center">
                        <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4 btn btn-primary">
                            Đăng Ký
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include './Views/Common/footer.php'; 
?>
