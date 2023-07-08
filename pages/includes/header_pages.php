<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven</title>
    <link rel="stylesheet" href="../pages/assets/css/home_pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="../assets/js/home_pages.js"></script>
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
                        <li><a href="https://www.google.com/maps/@21.0010802,105.8400229,16z?entry=ttu"><i
                                    class="fa-solid fa-location-dot"></i>Vị trí</a></li>
                        <li><a href="">|<i class="fa-solid fa-truck-fast"></i>Theo dõi đơn hàng</a></li>
                        <li><a href="https://www.youtube.com/watch?v=8Ev2LrVaUfA">|<i
                                    class="fa-solid fa-bag-shopping"></i>Cửa hàng</a></li>
                        <?php
                        session_start();
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
                    <a href="compare.php" class="tooltip" data-tooltip="Compare"><i
                            class="fa-solid fa-code-compare"></i></a>
                    <div class="triangle"></div>
                    <a href="wishlist.php" class="tooltip" data-tooltip="Wishlist"><i
                            class="fa-regular fa-heart"></i></a>
                    <?php
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
                    <a href="login_register.php" class="tooltip" data-tooltip="My Account"><i
                            class="fa-regular fa-user"></i></a>
                    <?php }?>


                    <div class="main-contact-cart">
                        <a href="../pages/cart.php" class="tooltip-cart" data-tooltip="Cart"><i
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
        <div class="header-bottom">
            <div class="header-bottom-left">
                <ul>
                    <li><a href=""><span><i class="fa-solid fa-list-ul"></i>Tất cả danh mục</span></a></li>
                </ul>
            </div>
            <div class="header-bottom-right">
                <ul class="left">
                    <li><a id="all-pages" href="">Tất cả trang<i class="fa-solid fa-angle-down"></i></a>
                        <div id="nav-open">
                            <nav>
                                <ul>
                                    <li><a class="li-first" href="">Home & static pages</a></li>
                                    <li><a href="">Home v1</a></li>
                                    <li><a href="">Home v2</a></li>
                                    <li><a href="">Home v3</a></li>
                                    <li><a href="">Home v4</a></li>
                                    <li><a href="">Home v5</a></li>
                                </ul>
                                <ul>
                                    <li><a class="li-first" href="">Shop pages</a></li>
                                    <li><a href="">Shop Grid</a></li>
                                    <li><a href="">Shop Grid Extended</a></li>
                                    <li><a href="">Shop List View</a></li>
                                    <li><a href="">Shop List View Small</a></li>
                                    <li><a href="">Shop Left Sidebar</a></li>
                                </ul>
                                <ul>
                                    <li><a class="li-first" href="">Mobile Home Pages</a></li>
                                    <li><a href="">Home v1</a></li>
                                    <li><a href="">Home v2</a></li>
                                    <li><a href="">Single Product Pages</a></li>
                                    <li><a href="">Single Product Extended</a></li>
                                    <li><a href="">Single Product Fullwidth</a></li>
                                </ul>
                                <ul>
                                    <li><a class="li-first" href="">Blog Pages</a></li>
                                    <li><a href="">Blog v1</a></li>
                                    <li><a href="">Blog v2</a></li>
                                    <li><a href="">Blog v3</a></li>
                                    <li><a href="">Blog Full Width</a></li>
                                    <li><a href="">Single Blog Post</a></li>
                                </ul>
                                <ul>
                                    <li><a class="li-first" href="">Blog Pages</a></li>
                                    <li><a href="">Blog v1</a></li>
                                    <li><a href="">Blog v2</a></li>
                                    <li><a href="">Blog v3</a></li>
                                    <li><a href="">Blog Full Width</a></li>
                                    <li><a href="">Single Blog Post</a></li>
                                </ul>
                                <ul>
                                    <li><a class="li-first" href="">Blog Pages</a></li>
                                    <li><a href="">Blog v1</a></li>
                                    <li><a href="">Blog v2</a></li>
                                    <li><a href="">Blog v3</a></li>
                                    <li><a href="">Blog Full Width</a></li>
                                    <li><a href="">Single Blog Post</a></li>
                                </ul>
                            </nav>
                        </div>
                    </li>
                    <li><a href="https://vnexpress.net/4-thuong-hieu-lam-sach-tai-viet-nam-3210823.html">Thương hiệu nổi
                            bật</a></li>
                    <li><a href="https://baophutho.vn/van-de-hom-nay/xu-huong-doc-sach-hien-nay/157147.html">Xu hướng
                            phong cách</a></li>
                    <li><a href="https://www.facebook.com/mcbooksvn/posts/1165316650293091/">Quà tặng</a></li>
                </ul>
                <ul class="right">
                    <li><a id="free-right" href="">Giao hàng miễn phí cho đơn hàng 500.000đ trở lên</a></li>
                </ul>
            </div>
        </div>
        </div>

    </header>