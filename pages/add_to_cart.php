<?php
session_start();
require_once "../config/config.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $product_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $product_id) {
            $item['quantity'] += $quantity;
            $product_exists = true;
            break;
        }
    }

    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
    if (!$product_exists) {
        $new_item = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'quantity' => $quantity
        );
        $_SESSION['cart'][] = $new_item;
    }

    header("Location: cart.php");
    exit();
}

// Hiển thị giỏ hàng
?>

<!DOCTYPE html>
<html>

<head>
    <title>Giỏ hàng</title>
</head>

<body>
    <h1>Giỏ hàng</h1>

    <table>
        <tr>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['product_id'];
            $product_name = $item['product_name'];
            $product_price = $item['product_price'];
            $quantity = $item['quantity'];
            $subtotal = $product_price * $quantity;
            $total += $subtotal;
            ?>
        <tr>
            <td><?php echo $product_name; ?></td>
            <td><?php echo number_format($product_price, 0, '.', ',') . 'đ'; ?></td>
            <td><?php echo $quantity; ?></td>
            <td><?php echo number_format($subtotal, 0, '.', ',') . 'đ'; ?></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="3">Tổng cộng</td>
            <td><?php echo number_format($total, 0, '.', ',') . 'đ'; ?></td>
        </tr>
    </table>
</body>

</html>