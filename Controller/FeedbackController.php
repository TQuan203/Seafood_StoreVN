<?php

// Start output buffering to handle header redirects
ob_start();

// Require the necessary classes
require_once __DIR__ . "/../Data/FeedbackDao.php";
require_once __DIR__ . "/../Models/Feedback.php";

// Start the session if it isn't already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Set default action to 'list'
$action = 'list';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} elseif (isset($_POST['action'])) {
    $action = $_POST['action'];
}

// Create an instance of FeedbackDao
$feedbackDao = new FeedbackDao();

switch ($action) {
    case 'list': // Display all feedbacks
        $feedbacks = $feedbackDao->Find(); // Fetch all feedback
        include './Views/feedback/list.php'; // Display the feedback list view
        break;

    case 'view': // View a single feedback
        $feedback_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); // Get the ID from URL
        if ($feedback_id) {
            $feedback = $feedbackDao->FindOne($feedback_id); // Fetch specific feedback details
            include './Views/feedback/view.php'; // Display the feedback view
        } else {
            $_SESSION['message'] = "Feedback not found."; // Error message if ID is invalid
            exit();
        }
        break;

    case 'delete': // Delete a feedback entry
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); // Get ID from URL
        if ($id) {
            $result = $feedbackDao->Delete($id); // Delete the feedback
            $_SESSION['message'] = $result ? "Xóa thành công." : "Lỗi khi xóa."; // Message after deletion
        } else {
            $_SESSION['message'] = "Feedback not found."; // Error if ID is invalid
        }
        exit();
        break;

        case 'submit_feedback': // Xử lý gửi góp ý
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    
            if (!empty($name) && !empty($email) && !empty($message)) {
                // Tạo đối tượng Feedback
                $feedback = new Feedback();
                $feedback->Name = $name;
                $feedback->Email = $email;
                $feedback->Message = $message;
                $feedback->CreatedAt = date('Y-m-d H:i:s'); // Thêm thời gian tạo
    
                // Lưu góp ý vào cơ sở dữ liệu
                $result = $feedbackDao->AddFeedback($feedback);  // Thực thi thêm góp ý
                $_SESSION['message'] = $result
                    ? ""
                    : "Có lỗi xảy ra. Vui lòng thử lại.";
            } else {
                $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin.";
            }
    
            exit();
            break;
    
}

// End output buffering
ob_end_flush();

?>
