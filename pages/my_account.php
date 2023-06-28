<?php require_once "../config/config.php" ?>

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
                        <a href="" class="tooltip-cart" data-tooltip="Cart"><i class="fa-solid fa-bag-shopping"></i></a>
                        <div class="quantity">
                            <p>0</p>
                        </div>
                        <p>0.00đ</p>
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

    <main>
        <div class="ac">
            <div class="ac-title">
                <h3>Trang chủ > Tài khoản</h3>
            </div>
            <div class="ac-main">
                <div class="ac-m-title">
                    <h1>Tài khoản của tôi</h1>
                </div>
                <div class="ac-m-content">
                    <div class="ac-m-c-left">
                        <ul>
                            <li><a class="menu-link active" href="">Bảng điều khiển</a><i
                                    class="fa-solid fa-gauge active"></i></li>
                            <li><a class="menu-link" href="">Đơn hàng</a><i class="fa-solid fa-cart-arrow-down"></i>
                            </li>
                            <li><a class="menu-link" href="">Địa chỉ</a><i class="fa-solid fa-location-dot"></i></li>
                            <li><a class="menu-link" href="">Phương thức thanh toán</a><i
                                    class="fa-solid fa-credit-card"></i></li>
                            <li><a class="menu-link" href="">Hồ sơ cá nhân</a><i class="fa-solid fa-user"></i></li>
                            <li id="logout-ac"><a href="">Đăng xuất</a><i class="fa-solid fa-right-from-bracket"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="ac-m-c-right">
                        <?php if(isset($_SESSION['username'])){?>
                        <h3>Xin chào <span><?= $_SESSION['username'];?></span> (nếu không phải
                            <span><?= $_SESSION['username'];?></span>? <a href="logout.php">Đăng
                                xuất</a>)
                        </h3>
                        <?php }?>
                        <p>Từ bảng điều khiển tài khoản của mình, bạn có thể xem các đơn đặt hàng gần đây, quản lý địa
                            chỉ giao hàng và thanh toán, đồng thời chỉnh sửa mật khẩu và chi tiết tài khoản của mình.
                        </p>
                    </div>
                </div>
            </div>
        </div>
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