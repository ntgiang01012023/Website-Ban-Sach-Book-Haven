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
                    <div class="circle"></div>
                    <h1>BookHaven</h1>
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="main-search">
                    <input id="input-header" type="text" placeholder="Search for Products">
                    <select name="books" id="books">
                        <option value="">Tất cả danh mục</option>
                        <option value="">Book 1</option>
                        <option value="">Book 2</option>
                        <option value="">Book 3</option>
                    </select>
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="main-contact">
                    <a href="" class="tooltip" data-tooltip="Compare"><i class="fa-solid fa-code-compare"></i></a>
                    <div class="triangle"></div>
                    <a href="" class="tooltip" data-tooltip="Wishlist"><i class="fa-regular fa-heart"></i></a>
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
        <div class="header-bottom-2">
            <div class="h-b-container">
                <ul>
                    <li><a href="">Trang chủ<i class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="">Tiểu thuyết<i class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="">Khoa học<i class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="">Phiêu lưu<i class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="">Lịch sử<i class="fa-solid fa-chevron-down"></i></a></li>
                    <li><a href="">Tâm lý<i class="fa-solid fa-chevron-down"></i></a></li>
                </ul>
            </div>
        </div>
        </div>

    </header>

    <body>
        <main>

            <section id="cart">
                <div class="cart-container">
                    <div class="c-c-title">
                        <a href="index_home.php">Trang chủ</a>
                        <p><i class="fa-solid fa-angle-right"></i></p>
                        <p>Giỏ hàng</p>
                    </div>
                    <div class="c-c-main">
                        <div class="c-c-m-title">
                            <h1>Giỏ hàng</h1>
                        </div>
                        <div class="c-c-m-views-cart">
                            <table>
                                <thead>
                                    <th></th>
                                    <th></th>
                                    <th>Tên sách</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </thead>
                                <tbody>


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
                                        <td><a href="cart.php?action=delete&book_id=<?php echo $book_id; ?>"><i
                                                    class="fa-solid fa-xmark"></i></a></td>
                                        <td><img src="<?php echo $book_image; ?>" alt=""></td>
                                        <td><?php echo $book_title; ?></td>
                                        <td><?php echo number_format($book_price, 0, '.', ',') . 'đ'; ?></td>
                                        <td>
                                            <form method="post" action="update_cart.php">
                                                <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                                                <input type="hidden" name="book_title"
                                                    value="<?php echo $book_title; ?>">
                                                <input type="hidden" name="book_price"
                                                    value="<?php echo $book_price; ?>">
                                                <input type="hidden" name="book_image"
                                                    value="<?php echo $book_image; ?>">
                                                <input type="number" min="1" name="quantity" class="cart-quantity"
                                                    value="<?php echo $quantity; ?>">
                                                <button type="submit" class="btn-update"><i
                                                        class="fa-solid fa-rotate-right"></i></button>
                                            </form>
                                        </td>
                                        <td><?php echo number_format($subtotal, 0, '.', ',') . 'đ'; ?></td>
                                        <?php
                                        
    }
    ?>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="c-c-checkout">
                        <div class="c-c-c-coupon">
                            <input type="text" placeholder="Nhập mã giảm giá">
                            <button type="button">Áp dụng</button>
                        </div>
                        <div class="c-c-c-cart-totals">
                            <div class="c-c-c-c-t-title">
                                <h2>Chi tiết</h2>
                            </div>

                            <?php
    // Kiểm tra nếu giỏ hàng rỗng
    if ($total == 0) {
        echo '<div class="c-c-c-c-t-sub">';
        echo '<h3>Tổng tiền giỏ hàng</h3>';
        echo '<h4>0đ</h4>';
        echo '</div>';

        echo '<div class="c-c-c-c-t-ship">';
        echo '<h3>Phí vận chuyển</h3>';
        echo '<h4>0đ</h4>';
        echo '</div>';

        echo '<div class="c-c-c-c-t-total">';
        echo '<h3>Tổng thanh toán</h3>';
        echo '<h4 id="total">0đ</h4>';
        echo '</div>';
    } else {
        echo '<div class="c-c-c-c-t-sub">';
        echo '<h3>Tổng tiền giỏ hàng</h3>';
        echo '<h4>'.number_format($total, 0, '.', ',').'đ</h4>';
        echo '</div>';

        echo '<div class="c-c-c-c-t-ship">';
        echo '<h3>Phí vận chuyển</h3>';
        echo '<h4>50.000đ</h4>';
        echo '</div>';

        echo '<div class="c-c-c-c-t-total">';
        echo '<h3>Tổng thanh toán</h3>';
        echo '<h4 id="total">'.number_format($total+50000, 0, '.', ',').'đ</h4>';
        echo '</div>';
    }
    ?>

                            <a href="checkout.php">Thanh toán</a>
                        </div>

                    </div>
                </div>
            </section>

        </main>



        <footer>
            <div class="footer-container-fluid">
                <div class="footer-container">
                    <div class="f-c-top">
                        <div class="f-c-top-left">
                            <div class="f-c-top-left-left">
                                <i class="fa-regular fa-paper-plane"></i>
                                <h3>Sign up to Newsletter</h3>
                            </div>
                            <div class="f-c-top-left-right">
                                <h3>...and receive <span>$20 coupon for first shopping</span></h3>
                            </div>
                        </div>
                        <div class="f-c-top-right">
                            <input type="text" placeholder="Enter your emails address">
                            <button>SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-container-main">
                <div class="f-c-main">
                    <div class="f-c-main-left">
                        <div class="main-logo-f">
                            <div class="circle"></div>
                            <h1>BookHaven</h1>
                        </div>
                        <div class="f-c-main-left-phone">
                            <i class="fa-solid fa-headphones-simple"></i>
                            <p>(800) 8001-8588, (0600) 874 548</p>
                        </div>
                        <div class="f-c-main-left-info">
                            <h3>Contact Info</h3>
                            <p>17 Princess Road, London, Greater London NW1 8JR, UK</p>
                        </div>
                        <div class="f-c-main-left-icon">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-pinterest"></i>
                            <i class="fa-brands fa-linkedin-in"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-youtube"></i>
                            <i class="fa-solid fa-wifi"></i>
                        </div>
                    </div>

                    <div class="f-c-main-right">
                        <div class="f-c-main-right-column">
                            <h3>Find It Fast</h3>
                            <li><a href="">Science fiction books</a></li>
                            <li><a href="">Self-help books</a></li>
                            <li><a href="">History books</a></li>
                            <li><a href="">Anime manga</a></li>
                            <li><a href="">Manual and self-study books</a></li>
                            <li><a href="">Book of Poetry and Prose</a></li>
                        </div>
                        <div class="f-c-main-right-column">
                            <h3>All pages</h3>
                            <li><a href="">About</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Compare</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Store Directory</a></li>
                        </div>
                        <div class="f-c-main-right-column-right">
                            <h3>Customer Care</h3>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Track your Order</a></li>
                            <li><a href="">Customer Service</a></li>
                            <li><a href="">Returns/Exchange</a></li>
                            <li><a href="">FAQs</a></li>
                            <li><a href="">Product Support</a></li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-container-bottom">
                <div class="f-c-bottom">
                    <h3><i class="fa-regular fa-copyright"></i><span>BookHaven</span> - All Rights Reserved</h3>
                    <img src="../pages/images/patment-icon1.png" alt="">
                </div>
            </div>

        </footer>

    </body>
    <script>
    var menuLinks = document.querySelectorAll('.menu-link');

    function setActiveLink() {
        // Loại bỏ lớp 'active' từ tất cả các liên kết
        menuLinks.forEach(function(link) {
            link.classList.remove('active');
        });

        // Thêm lớp 'active' cho liên kết đã được click
        this.classList.add('active');
    }

    // Gắn sự kiện click cho mỗi liên kết
    menuLinks.forEach(function(link) {
        link.addEventListener('click', setActiveLink);
    });
    </script>

</html>


</body>

</html>