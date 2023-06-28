<?php
// Bắt đầu phiên đăng nhập
session_start();

require_once "../config/config.php";

// Kiểm tra xem người dùng đã submit form đăng nhập chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Tìm kiếm người dùng trong cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Lưu thông tin người dùng vào session để sử dụng ở các trang khác
        $_SESSION['username'] = $username;
        header('Location: my_account.php'); // Chuyển đến trang chính của người dùng
    } else {
        echo "Tài khoản hoặc mật khẩu không đúng.";
    }
}
?>