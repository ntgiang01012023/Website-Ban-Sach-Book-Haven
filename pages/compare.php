<?php require_once "../config/config.php"; 

session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven</title>
    <link rel="stylesheet" href="../pages/assets/css/product_detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="../pages/assets/js/home_pages.js"></script>
</head>

<body>
    <header id="header">
        <div class="header-top-container">
            <div class="header-top">
                <div class="top-left">
                    <ul>
                        <li><a href="index_home.php">Chào mừng đến với cửa hàng Sách</a></li>
                    </ul>
                </div>
                <div class="top-right">
                    <ul>
                        <li><a href=""><i class="fa-solid fa-location-dot"></i>Vị trí</a></li>
                        <li><a href="">|<i class="fa-solid fa-truck-fast"></i>Theo dõi đơn hàng</a></li>
                        <li><a href="">|<i class="fa-solid fa-bag-shopping"></i>Cửa hàng</a></li>
                        <?php
                        
                        if(isset($_SESSION['username'])){?>
                        <li><a href="my_account.php">|<i class="fa-solid fa-user"></i>Tài khoản</a>
                            <?php } else{?>
                        <li><a href="login_register.php">|<i class="fa-solid fa-user"></i>Tài khoản</a>
                            <?php }?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-main-container">
            <div class="header-main">
                <div class="main-logo">
                    <a href="index_home.php">
                        <div class="circle"></div>
                        <h1>BookHaven</h1>
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </div>
                <div class="main-search">
                    <form action="category_details.php" method="GET">
                        <input id="input-header" type="text" placeholder="Tìm kiếm sách tại đây...">

                        <?php 

// Truy vấn để lấy danh sách các danh mục
$sql = "SELECT ID, Name FROM categories";
$result = $conn->query($sql);

// Kiểm tra và hiển thị danh mục trong thẻ select
if ($result->num_rows > 0) {
    echo '<select name="categories" id="categories">';
    echo '<option value="">Tất cả danh mục</option>';

    while ($row = $result->fetch_assoc()) {
        $categoryID = $row["ID"];
        $categoryName = $row["Name"];
        echo '<option value="' . $categoryID . '">' . $categoryName . '</option>';
    }

    echo '</select>';
} else {
    echo "Không có danh mục nào.";
}

?>


                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="main-contact">
                    <form method="post" action="compare.php">
                        <button type="submit" name="compare" class="tooltip" data-tooltip="So sánh"
                            style="border:none; background-color: transparent; cursor: pointer;"><i
                                class="fa-solid fa-code-compare"></i></button>
                    </form>
                    <div class="triangle"></div>
                    <form method="post" action="wishlist.php">
                        <button type="submit" name="wishlist" class="tooltip" data-tooltip="Yêu thích"
                            style="border:none; background-color: transparent; cursor: pointer;"><i
                                class="fa-regular fa-heart"></i></button>
                    </form> <?php
                        if(isset($_SESSION['username'])){?>
                    <button id="dropdown-account-active" onclick="showMenuAccount()"><i
                            class="fa-regular fa-user"></i></button>
                    <div id="dropdown-account" class="dropdown-account">
                        <a class="dropdown-account-a" href="my_account.php">Bảng điều khiển</a>
                        <a class="dropdown-account-a" href="">Đơn hàng</a>
                        <a class="dropdown-account-a" href="">Tải về</a>
                        <a class="dropdown-account-a" href="">Địa chỉ</a>
                        <a class="dropdown-account-a" href="">Thanh toán</a>
                        <a class="dropdown-account-a" href="">Hồ sơ cá nhân</a>
                        <a class="dropdown-account-a" href="logout.php">Đăng xuất</a>
                    </div>
                    <?php } else{?>
                    <a href="login_register.php" class="tooltip" data-tooltip="Tài khoản"><i
                            class="fa-regular fa-user"></i></a>
                    <?php }?>

                    <div class="main-contact-cart">
                        <a href="../pages/cart.php" class="tooltip-cart" data-tooltip="Giỏ hàng"><i
                                class="fa-solid fa-bag-shopping"></i></a>

                        <?php
    // Kiểm tra xem 'cart' đã tồn tại trong $_SESSION hay chưa
    $totalQuantity = 0;
    if (isset($_SESSION['cart'])) {
        $totalQuantity = array_sum(array_column($_SESSION['cart'], 'quantity'));
    }
    ?>

                        <div class="quantity">
                            <p><?php echo $totalQuantity; ?></p>
                        </div>

                        <?php
    $totalPrice = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $book_price = floatval($item['book_price']);
            $quantity = intval($item['quantity']);
            $subtotal = $book_price * $quantity;
            $totalPrice += $subtotal;
        }
    }
    ?>
                        <p><?php echo number_format($totalPrice, 0, '.', ',') . 'đ'; ?></p>
                    </div>

                </div>



            </div>
        </div>
        <div class="header-bottom-2">
            <div class="h-b-container">
                <ul>
                    <li><a href="index_home.php">Trang chủ<i class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="category_details.php?categories=22">Tiểu thuyết<i
                                class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="category_details.php?categories=25">Khoa học<i
                                class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="category_details.php?categories=26">Tâm lý học<i
                                class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="category_details.php?categories=29">Kinh doanh<i
                                class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="category_details.php?categories=30">Hướng dẫn<i
                                class="fa-solid fa-chevron-down"></i></a></li>
                </ul>
            </div>
        </div>
        </div>

    </header>

    <main>

        <section id="wishlist">
            <div class="w-container">
                <div class="w-c-title">
                    <a href="">Trang chủ</a>
                    <i class="fa-solid fa-chevron-right"></i>
                    <a href="">So sánh</a>
                </div>
                <div class="w-c-all-compare">
                    <?php
                
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare'])) {
    $bookId = $_POST['compare'];
    $_SESSION['compare'][] = $bookId;
}

if (isset($_SESSION['compare']) && !empty($_SESSION['compare'])) {
    $compareIds = implode(',', array_unique(array_filter($_SESSION['compare'])));
    
    if (!empty($compareIds)) {
        $sql = "SELECT books.ID, books.Title, books.Price, books.Discount, books.Description, books_images.ImageURL
                FROM books
                JOIN books_images ON books.ID = books_images.BookID
                WHERE books.ID IN ($compareIds)";
    
        $result = $conn->query($sql);
    
        if ($result && $result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Hình ảnh</th>";
            echo "<th>Tên sách</th>";
            echo "<th>Mô tả</th>";
            echo "<th>Giá</th>";
            echo "<th>Thêm vào giỏ hàng</th>";
            echo "<th></th>";
            echo "</tr>";
        
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='{$row['ImageURL']}' alt='Book Image'></td>";
                echo "<td>{$row['Title']}</td>";
                echo "<td>{$row['Description']}</td>";
                $final_price = $row['Price'];
                echo "<td style='color: #dc3545; font-weight: 700;'>" . number_format($final_price, 0, '.', ',') . "</td>";
                echo "<td><a id='seemore-compare' href='book_detail.php?bookID={$row['ID']}'>Xem chi tiết</a></td>";
                echo "<td><form action='remove_compare.php' method='POST'><input type='hidden' name='bookID' value='" . $row['ID'] . "'><button type='submit' class='remove-button' style='background-color: transparent; border: none; cursor: pointer;'><i class='fa-solid fa-xmark'></i></button></form></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
         else {
            echo "<h3 style='font-size: 29px; font-weight: 400; color: #333e48; text-align: center;'>Không có sản phẩm nào được thêm vào bảng so sánh</h3>";
            echo "<a href='index_home.php'>Trở về trang chủ</a>";
        }
    } else {
        echo "<h3 style='font-size: 29px; font-weight: 400; color: #333e48; text-align: center; margin: 30px 0px;'>Không có sản phẩm nào được thêm vào bảng so sánh</h3>";
        echo "<a href='index_home.php' style='display: block; margin: 0 auto; text-decoration: none; font-size: 14px; font-weight: 400; width: 216px; height: 46px; padding-top: 12px; padding-left: 50px;  background-color: #EFECEC; border-radius: 20px;'>Trở về trang chủ</a>";
    }
} else {
    echo "<h1>Wishlist is empty</h1>";
}
?>



                </div>
            </div>

        </section>

    </main>


    <?php include_once "../pages/includes/footer_pages.php"?>