<?php
    require_once '../config/config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị book_id và discount từ form
        $book_id = $_POST["book_id"];
        $discount = $_POST["discount"];

        // Cập nhật giá giảm vào bảng books
        $sql = "UPDATE books SET Discount = $discount WHERE ID = $book_id";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Chuyển hướng về trang quanlysanpham.php
            header("Location: quanlysanpham.php");
            exit(); // Dừng thực hiện các câu lệnh phía sau

        } else {
            // Xử lý lỗi nếu cần
            echo "Có lỗi xảy ra khi thêm giá giảm";
        }
    }
?>

<!-- HTML -->
<td class='discount-td' data-book-id='<?php echo $row["ID"]; ?>'>
    <?php
        if (isset($row["Discount"])) {
            echo "<span class='discount-price'>" . number_format($row['Discount'], 0, '.', ',') . ' đ' . "</span>";
            echo "<button onclick='deleteDiscount(" . $row['ID'] . ")'>Xóa giá giảm</button>";
        } else {
    ?>
    <form action='update_discount.php' method='POST'>
        <input type='hidden' name='book_id' value='<?php echo $row["ID"]; ?>'>
        <input type='number' name='discount' placeholder='Nhập giá giảm'>
        <button type='submit'>Thêm giá giảm</button>
    </form>
    <?php } ?>
</td>