<?php
session_start();
require_once "../config/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];
    $book_price = $_POST['book_price'];
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Cập nhật số lượng sách trong giỏ hàng
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['book_id'] == $book_id) {
            $item['quantity'] = $quantity;
            break;
        }
    }

    header("Location: cart.php");
    exit();
}
?>