<?php
require_once "../config/config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookID'])) {
    $bookID = $_POST['bookID'];

    // Xóa sách yêu thích từ danh sách $_SESSION['wishlist']
    if (isset($_SESSION['compare']) && in_array($bookID, $_SESSION['compare'])) {
        $index = array_search($bookID, $_SESSION['compare']);
        unset($_SESSION['compare'][$index]);
        $_SESSION['compare'] = array_values($_SESSION['compare']); // Cập nhật lại chỉ mục của mảng
    }

    // Chuyển hướng người dùng trung gian với phương thức GET
    header("Location: remove_compare_redirect.php?removedBookID=" . $bookID);
    exit();
} else {
    // Xử lý lỗi hoặc yêu cầu không hợp lệ
    echo "Lỗi: Yêu cầu không hợp lệ";
}
?>