<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['removedBookID'])) {
    $removedBookID = $_GET['removedBookID'];

    // Lưu thông tin sách đã xóa vào session để hiển thị thông báo sau khi chuyển hướng
    $_SESSION['removedBookID'] = $removedBookID;

    // Chuyển hướng sang trang wishlist.php với phương thức GET
    header("Location: wishlist.php");
    exit();
} else {
    // Xử lý lỗi hoặc yêu cầu không hợp lệ
    echo "Lỗi: Yêu cầu không hợp lệ";
}
?>