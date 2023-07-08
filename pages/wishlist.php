<?php
session_start();

require_once "../config/config.php";

// Kiểm tra yêu cầu POST từ nút "Compare"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist'])) {
    // Lấy giá trị ID sách từ yêu cầu POST
    $bookId = $_POST['wishlist'];

    // Thêm ID sách vào mảng $_SESSION['compare']
    $_SESSION['wishlist'][] = $bookId;



// Kiểm tra xem có danh sách so sánh hay không
if (isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist'])) {
    echo "<h1>Wishlist</h1>";
    echo "<ul>";

    $wishlistIds = implode(',', $_SESSION['wishlist']); // Chuyển danh sách id thành chuỗi phân cách bằng dấu phẩy

    // Truy vấn SQL để lấy thông tin sách từ danh sách so sánh
    $sql = "SELECT books.Title, books_images.ImageURL
            FROM books
            JOIN books_images ON books.ID = books_images.BookID
            WHERE books.ID IN ($wishlistIds)";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<h3>{$row['Title']}</h3>";
            echo "<img src='{$row['ImageURL']}' alt='Book Image'>";
            echo "</li>";
        }
    } else {
        echo "<li>No books found</li>";
    }

    echo "</ul>";
} else {
    echo "<h1>Wishlist is empty</h1>";
}
}

?>