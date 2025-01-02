<!-- update.php -->
<div class="container">
    <h2>Sửa Bài Viết</h2>
    <?php
                if (isset($message)):
                    ?>
                    <div class="text-danger" role="alert">
                        <h5><?= $message ?></h5>
                    </div>
                <?php
                endif;
                ?>
    <form  action="?controller=NewsController&action=update&news_id=<?php echo $news_id; ?>"  method="POST">
    <input type="hidden" name="action" value="update&news_id=<?php echo $news_id; ?>">
    <input type="hidden" name="controller" value="NewsController">
        <input type="hidden" name="news_id" value="<?= $news_id ?>" />
        <div class="form-group">
            <label for="title">Tiêu Đề:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $title ?>" required>
        </div>
        <div class="form-group">
            <label for="content">Nội Dung:</label>
            <input class="form-control" id="content" name="content" rows="5" value="<?= $content ?>" required></input>
        </div>
        <button type="submit" class="btn btn-primary" >Cập Nhật Bài Viết</button>
    </form>
</div>
