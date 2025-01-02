<!-- Views/Feedback/list.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Góp Ý</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .message {
            color: red;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            text-decoration: none;
            color: #0066cc;
        }
        td a:hover {
            text-decoration: underline;
        }
        .action-links {
            display: flex;
            gap: 10px;
        }
        .action-links a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        .action-links a:hover {
            background-color: #0056b3;
        }
        .delete-link {
            background-color: #dc3545;
        }
        .delete-link:hover {
            background-color: #c82333;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert -->
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = event.target.href;
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Gắn sự kiện vào tất cả các liên kết xóa
            document.querySelectorAll('.delete-link').forEach((link) => {
                link.addEventListener('click', confirmDelete);
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Danh Sách Góp Ý</h2>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info">
                <?php echo $_SESSION['message']; ?>
                <?php unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị ?>
            </div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Nội dung</th>
                    <th>Ngày gửi</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feedbacks as $feedback): ?>
                    <tr>
                        <td><?php echo $feedback['id']; ?></td>
                        <td><?php echo $feedback['name']; ?></td>
                        <td><?php echo $feedback['email']; ?></td>
                        <td><?php echo $feedback['message']; ?></td>
                        <td><?php echo $feedback['created_at']; ?></td>
                        <td>
                            <!-- <a href="index.php?controller=FeedbackController&action=view&id=<?php echo $feedback['id']; ?>" class="btn btn-info">Xem</a> -->
                            <a href="index.php?controller=FeedbackController&action=delete&id=<?php echo $feedback['id']; ?>" class="pe-7s-trash" onclick="return confirm('Bạn chắc chắn muốn xóa?')"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
