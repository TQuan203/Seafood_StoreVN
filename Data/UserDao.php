<?php


class UserDao
{
    var $dbu; // Biến để lưu đối tượng DatabaseUtil, giúp thao tác với cơ sở dữ liệu.

    // Constructor: Mở kết nối đến cơ sở dữ liệu khi đối tượng UserDao được khởi tạo.
    public function __construct() {
        $this->dbu = new DatabaseUtil();
        $this->dbu->Open();
    }

    // Thêm một người dùng mới vào bảng "users".
    public function Insert(User $user)
    {
        $sql = "insert into users(username, email, password, fullname, image, role) 
                values(:username, :email, :password, :fullname, :image, :role)";
        
        $args = array(
            "username" => $user->Username,
            "email" => $user->Email,
            "password" => $user->Password,
            "fullname" => $user->Fullname,
            "image" => $user->Image,
            "role" => $user->Role
        );

        $this->dbu->Execute($sql, $args); // Thực thi câu lệnh SQL.
        $user->Id = $this->dbu->GetLastInsertedId(); // Lấy ID của người dùng vừa thêm.
        return $user; // Trả về đối tượng người dùng vừa được thêm.
    }

    // Xóa một người dùng khỏi bảng "users" dựa trên ID.
    public function Delete($id)
    {
        $sql = "Delete from users where id = :id";
        
        $args = array(
            'id' => $id
        );

        $result = $this->dbu->Execute($sql, $args); // Thực thi câu lệnh SQL.
        return $result; // Trả về kết quả thực thi.
    }

    // Cập nhật thông tin người dùng trong bảng "users".
    public function Update(User $user)
    {
        $sql = "update users set username = :username, password = :password, email = :email, 
                fullname = :fullname, image = :image, role = :role where id = :id";
        
        $args = array(
            'id' => $user->Id,
            "username" => $user->Username,
            "email" => $user->Email,
            "password" => $user->Password,
            "fullname" => $user->Fullname,
            "image" => $user->Image,
            "role" => $user->Role
        );

        $result = $this->dbu->Execute($sql, $args); // Thực thi câu lệnh SQL.
        return $result; // Trả về kết quả thực thi.
    }

    // Lấy danh sách tất cả người dùng từ bảng "users".
    public function Find()
    {
        $sql = "select * from users";
        $users = $this->dbu->Query($sql, array()); // Truy vấn dữ liệu.
        return $users; // Trả về danh sách người dùng.
    }

    // Tìm một người dùng theo ID.
    public function FindOne($id)
    {
        $sql = "select * from users where id = :id";
        
        $args = array(
            'id' => $id
        );

        $user = $this->dbu->Query($sql, $args, true); // Truy vấn dữ liệu, chỉ trả về một bản ghi.
        return $user; // Trả về thông tin người dùng.
    }

    // Tìm người dùng theo tên gần đúng (sử dụng LIKE).
    public function FindByName($name)
    {
        $sql = "select * from users where name like :username";
        
        $args = array(
            'name' => "%$name%"
        );

        $user = $this->dbu->Query($sql, $args); // Truy vấn danh sách người dùng.
        return $user; // Trả về kết quả tìm kiếm.
    }

    // Kiểm tra thông tin đăng nhập (username và password).
    public function CheckLogin($username, $password)
    {
        $sql = "select * from users where username = :username and password = :password";
        
        $args = array(
            'username' => $username,
            'password' => $password
        );

        $user = $this->dbu->Query($sql, $args, true); // Truy vấn dữ liệu.
        return $user != null; // Trả về true nếu đăng nhập hợp lệ, ngược lại là false.
    }

    // Kiểm tra xem email có tồn tại trong bảng "users" hay không.
    public function is_valid_email($email)
    {
        $sql = "select * from users where email = :email";
        
        $args = array(
            'email' => $email
        );

        $valid_email = $this->dbu->Query($sql, $args, true); // Truy vấn dữ liệu.
        return $valid_email; // Trả về true nếu email hợp lệ, ngược lại là false.
    }

    // Kiểm tra xem username có tồn tại trong bảng "users" hay không.
    public function is_valid_user($username)
    {
        $sql = "select * from users where username = :username";
        
        $args = array(
            'username' => $username
        );

        $valid_user = $this->dbu->Query($sql, $args, true); // Truy vấn dữ liệu.
        return $valid_user; // Trả về true nếu username hợp lệ, ngược lại là false.
    }

    // Upload hình ảnh người dùng.
    public function upload()
    {
        if (isset($_POST["ok"])) // Kiểm tra xem người dùng đã nhấn nút "ok" hay chưa.
        {
            if ($_FILES["file"]["name"] != NULL) { // Kiểm tra xem file có được tải lên hay không.
                if ($_FILES["file"]["type"] == "image/jpeg"
                    || $_FILES["file"]["type"] == "image/png"
                    || $_FILES["file"]["type"] == "image/gif"
                ) {
                    $path = "Assets/img/user/"; // Đường dẫn lưu trữ file upload.
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $name = $_FILES['file']['name'];
                    move_uploaded_file($tmp_name, $path . $name); // Thực hiện di chuyển file đến thư mục chỉ định.
                }
            }
        }
    }
}
