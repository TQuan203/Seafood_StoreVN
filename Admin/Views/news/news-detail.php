<?php include "./Views/Common/header.php" ?>
<?php include "./Views/Common/menu.php" ?>

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <!-- Tiêu đề bài viết -->
            <div class="col-md-12 p-b-30">
                <h2 class="m-text26 p-b-36">
                    <?= htmlspecialchars($news['title']) ?>
                </h2>
            </div>
        </div>

        <div class="row">
            <!-- Nội dung bài viết -->
            <div class="col-md-12 p-b-30">
                <div class="news-detail">
                    <p class="s-text7">
                        <?= nl2br(htmlspecialchars($news['content'])) ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Form đăng ký nhận tin tức -->
            <div class="col-md-12 p-b-30">
                <h4 class="m-text26 p-b-36">
                    Đăng Ký Nhận Tin Tức
                </h4>
                <form action="" method="post" class="leave-comment">
                    <input type="hidden" name="action" value="subscribe_news">
                    <input type="hidden" name="controller" value="Controller">
                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email của bạn" required>
                    </div>

                    <div class="w-size25">
                        <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            Đăng Ký
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include "./Views/Common/footer.php" ?>
