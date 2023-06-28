<?php
session_start();
require_once "../config/config.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];
    $book_image = $_POST['book_image'];
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $book_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['book_id'] == $book_id) {
            $item['quantity'] += $quantity;
            $book_exists = true;
            break;
        }
    }

    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm vào giỏ hàng
    if (!$book_exists) {
        $new_item = array(
            'book_id' => $book_id,
            'book_title' => $book_title,
            'book_price' => $book_price,
            'book_image' => $book_image,
            'quantity' => $quantity
        );
        $_SESSION['cart'][] = $new_item;
    }

     // Thiết lập thông báo thành công trong biến session
     $_SESSION['cart_success_message'] = 'Sách đã được thêm vào giỏ hàng thành công.';

    header("Location: book_detail.php?bookID=$book_id");
    exit();
}

// Xử lý sự kiện xóa sách khỏi giỏ hàng
if (isset($_GET['action']) && isset($_GET['book_id'])) {
    $action = $_GET['action'];
    $book_id = $_GET['book_id'];

    // Xóa sách khỏi giỏ hàng
    if ($action === 'delete') {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['book_id'] == $book_id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }

    header("Location: cart.php");
    exit();
}

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
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Thao tác</th>
        </tr>
        <?php
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $book_id = $item['book_id'];
        $book_title = $item['book_title'];
        $book_price = floatval($item['book_price']);
        $book_image = $item['book_image'];
        $quantity = intval($item['quantity']);
        $subtotal = $book_price * $quantity;

        $total += $subtotal;
        ?>
        <tr>
            <td>
                <img src="<?php echo $book_image; ?>" alt="Hình ảnh sách">
            </td>
            <td><?php echo $book_title; ?></td>
            <td><?php echo number_format($book_price, 0, '.', ',') . 'đ'; ?> </td>

            <td>
                <form method="post" action="update_cart.php">
                    <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                    <input type="hidden" name="book_title" value="<?php echo $book_title; ?>">
                    <input type="hidden" name="book_price" value="<?php echo $book_price; ?>">
                    <input type="hidden" name="book_image" value="<?php echo $book_image; ?>">
                    <input type="number" min="1" name="quantity" value="<?php echo $quantity; ?>">
                    <button type="submit">Cập nhật</button>
                </form>
            </td>
            <td><?php echo number_format($subtotal, 0, '.', ',') . 'đ'; ?></td>
            <td>
                <a href="cart.php?action=delete&book_id=<?php echo $book_id; ?>">Xóa</a>
            </td>
        </tr>
        <?php
    }
    ?>
        <tr>
            <td colspan="4">Tổng cộng</td>
            <td><?php echo number_format($total, 0, '.', ',') . 'đ'; ?></td>
            <td></td>
        </tr>
    </table>



    <a href="index_home.php">Trở về trang chủ</a>

</body>

</html>