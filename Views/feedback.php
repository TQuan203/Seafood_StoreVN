<?php include "./Views/Common/header.php"; ?>
<?php include "./Views/Common/menu.php"; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi Góp Ý</title>
</head>
<body>
    <div class="container">
        <h2>Gửi Góp Ý</h2>
        <form action="./" method="post">
            <input type="hidden" name="controller" value="FeedbackController">
            <input type="hidden" name="action" value="submit_feedback">

            <div class="form-group">
                <label for="name">Tên:</label>
                <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Tên của bạn" required>
                </div>

            <div class="form-group">
                <label for="email">Email:</label>
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email của bạn" required>
            </div>

            <div class="form-group">
                <label for="message">Nội dung góp ý:</label>
                <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Nội dung" required></textarea>
                </div>

            <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">Gửi Góp Ý</button>
        </form>
    </div>
</body>
</html>

<?php include "./Views/Common/footer.php"; ?>
