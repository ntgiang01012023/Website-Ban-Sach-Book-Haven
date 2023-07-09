<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Haven</title>
    <link rel="stylesheet" href="../pages/assets/css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- <script src="../pages/assets/js/home_pages.js"></script> -->
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
                        session_start();
                        require_once "../config/config.php";
                        if(isset($_SESSION['username'])){?>
                        <li><a href="my_account.php">|<i class="fa-solid fa-user"></i>Tài khoản</a>
                            <?php } else{
                                header("Location: login_register.php"); // Chuyển hướng đến trang đăng nhập
    exit; // Dừng việc thực thi mã ngay sau khi chuyển hướng
                             }?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-main-container">
            <div class="header-main">
                <div class="main-logo">
                    <div class="circle"></div>
                    <h1>BookHaven</h1>
                    <i class="fa-solid fa-bars"></i>
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

        <section id="checkout">
            <div class="checkout-container">
                <div class="c-c-title">
                    <a href="index_home.php">Trang chủ</a>
                    <p><i class="fa-solid fa-angle-right"></i></p>
                    <p>Thanh toán</p>
                </div>
                <div class="c-c-check">
                    <h1>Thanh toán</h1>
                </div>
                <div class="c-c-login">
                    <p>Phản hồi của khách hàng?</p><a href="">Nhấn vào đây để đăng nhập</a>
                </div>
                <div class="c-c-code">
                    <p>Có phiếu giảm giá?</p><a href="">Nhấn vào đây để nhập mã của bạn</a>
                </div>
                <div class="c-c-checkout">
                    <form class="checkout-post" method="post" action="checkout_process.php">
                        <div class="c-c-c-billing">
                            <div class="c-c-c-b-title">
                                <h1>Thông tin chi tiết</h1>
                            </div>
                            <div class="c-c-name">
                                <div class="c-c-n-f">
                                    <label for="">Họ *</label>
                                    <input name="fname" type="text" placeholder="Nhập Họ khách hàng">
                                </div>
                                <div class="c-c-n-l">
                                    <label for="">Tên *</label>
                                    <input name="lname" type="text" placeholder="Nhập Tên khách hàng">
                                </div>
                            </div>
                            <div class="c-c-e">
                                <label for="">Địa chỉ Email *</label>
                                <input type="email" name="email" id="" placeholder="Nhập Email khách hàng">
                            </div>
                            <div class="c-c-p">
                                <label for="">Số điện thoại *</label>
                                <input type="tel" name="phone" id="" placeholder="Nhập Số điện thoại khách hàng">
                            </div>
                            <div class="c-c-ad">
                                <label for="">Địa chỉ giao hàng *</label>
                                <input type="text" name="address" id="" placeholder="Nhập địa chỉ giao hàng">
                            </div>
                            <div class="c-c-note">
                                <label for="">Ghi chú</label>
                                <textarea name="note" id="" cols="30" rows="10"
                                    placeholder="Nhập ghi chú của khách hàng"></textarea>
                            </div>
                        </div>
                        <div class="c-c-c-totals">
                            <div class="c-c-c-t-title-head">
                                <h2>Đơn hàng</h2>
                            </div>
                            <div class="c-c-c-t-title">
                                <h4>Sách</h4>
                                <h4>Tổng tiền</h4>
                            </div>
                            <div class="c-c-c-t-details-book">
                                <?php
        foreach ($_SESSION['cart'] as $item) {
            $book_title = $item['book_title'];
            $book_price = floatval($item['book_price']);
            $quantity = intval($item['quantity']);
            $subtotal = $book_price * $quantity;
            ?>
                                <div class="details-book">
                                    <div class="c-c-c-t-d-b-d">
                                        <h4><?php echo $book_title; ?></h4>
                                        <h5>x <?php echo $quantity; ?></h5>
                                    </div>

                                    <div class="c-c-c-t-d-b-p">
                                        <h4><?php echo number_format($subtotal, 0); ?>đ</h4>
                                    </div>
                                </div>
                                <?php
        }
        ?>
                            </div>
                            <?php
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $book_price = floatval($item['book_price']);
        $quantity = intval($item['quantity']);
        $subtotal = $book_price * $quantity;
        $total += $subtotal;
    }
    ?>
                            <div class="c-c-c-t-sub">
                                <h3>Tổng tiền giỏ hàng</h3>
                                <h4><?php echo number_format($total, 0); ?>đ</h4>
                            </div>
                            <div class="c-c-c-t-ship">
                                <h3>Phí vận chuyển</h3>
                                <h4>50.000đ</h4>
                            </div>
                            <div class="c-c-c-t-total">
                                <h3>Tổng thanh toán</h3>
                                <h4 id="total"><?php echo number_format($total + 50000, 0); ?>đ</h4>
                            </div>
                            <button id="btn-checkout" type="submit" name="checkout">Thanh toán</button>
                        </div>

                </div>
                </form>
            </div>
        </section>

    </main>

    <?php include_once "../pages/includes/footer_pages.php"?>