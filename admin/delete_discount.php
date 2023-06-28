<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Kiểm tra xem có nhận được ID sách từ yêu cầu không
    if (isset($_GET["book_id"])) {
        $book_id = $_GET["book_id"];

        // Thực hiện xóa giá giảm của sách có ID tương ứng trong cơ sở dữ liệu
        require_once '../config/config.php'; // Đường dẫn đến file cấu hình kết nối CSDL

        $sql = "UPDATE books SET Discount = 0 WHERE ID = $book_id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Xóa giá giảm thành công
            echo "success";
        } else {
            // Xóa giá giảm thất bại
            echo "error";
        }
    } else {
        // Không nhận được ID sách
        echo "error";
    }
}
?>