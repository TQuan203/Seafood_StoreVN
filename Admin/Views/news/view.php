<!-- view.php -->
<div class="container">
    <h2>Danh Sách Bài Viết</h2>
    <?php
                if (isset($message)):
                    ?>
                    <div class="text-danger" role="alert">
                        <h5><?= $message ?></h5>
                    </div>
                <?php
                endif;
                ?>
    <a href="?controller=NewsController&action=add" class="btn btn-success">Thêm Bài Viết</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu Đề</th>
                <th>Nội Dung</th>
                <th>Ngày Tạo</th>
                <th>Ngày Cập Nhật</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $article): ?>
                <tr>
                    <td><?= $article['id'] ?></td>
                    <td><?= $article['title'] ?></td>
                    <td><?= substr($article['content'], 0, 100) ?>...</td>
                    <td><?= $article['created_at'] ?></td>
                    <td><?= $article['updated_at'] ?></td>
                    <td>
                        <a href="?controller=NewsController&action=edit&news_id=<?= $article['id'] ?>" class="fa fa-edit"></a>
                        <a href="?controller=NewsController&action=remove&news_id=<?= $article['id'] ?>" class="pe-7s-trash"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
