<?php
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Xóa hình ảnh liên kết từ bảng images_category
    $sqlDeleteImages = "DELETE FROM books_images WHERE BookID='$id'";
    mysqli_query($conn, $sqlDeleteImages);

    // Xóa sản phẩm từ bảng books
    $sqlDeleteProduct = "DELETE FROM books WHERE ID='$id'";
    
    if (mysqli_query($conn, $sqlDeleteProduct)) {
        // Trả về thông báo về kết quả trả về cho client-side
        echo "Product with id=$id has been deleted successfully";
    } else {
        echo 'Xóa sản phẩm thất bại: ' . mysqli_error($conn);
    }
}
?>