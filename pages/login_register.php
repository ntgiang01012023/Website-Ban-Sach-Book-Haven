<?php require_once "../config/config.php" ?>

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
        <div class="accounts-pages-container">

            <div class="accounts-pages">
                <div class="a-p-title">
                    <h2>Trang chủ > Tài khoản</h2>
                </div>
                <div class="a-p-all">
                    <div class="a-p-circle-or">or</div>
                    <div class="a-p-login">
                        <div class="a-p-login-line">
                            <h2>Đăng nhập</h2>
                        </div>
                        <p>Chào mừng trở lại! Đăng nhập vào tài khoản của bạn.</p>
                        <form action="login.php" method="POST">
                            <label for="username">Tên người dùng hoặc địa chỉ email *</label><br>
                            <input class="input-field" type="text" id="username" name="username" required><br>

                            <label for="password">Mật khẩu *</label><br>
                            <input class="input-field" type="password" id="password" name="password" required><br>

                            <input type="checkbox" id="rememberPassword" name="rememberPassword">
                            <label for="rememberPassword">Ghi nhớ mật khẩu</label><br>

                            <button id="btn-login" type="submit">Đăng nhập</button><br>

                            <a href="">Quên mật khẩu?</a>
                        </form>
                        <div class="a-p-login-other">
                            <h3>Hoặc đăng nhập với</h3>
                            <a href="https://accounts.google.com/login" class="google-login-button">
                                <img src="../pages/images/icongg.png" alt="Google Icon">
                                Đăng nhập bằng Google
                            </a>
                            <a href="https://www.facebook.com/login" class="facebook-login-button">
                                <img src="../pages/images/iconfb.png" alt="Facebook Icon">
                                Đăng nhập bằng Facebook
                            </a>
                        </div>
                    </div>

                    <div class="a-p-register">
                        <div class="a-p-register-line">
                            <h2>Đăng ký</h2>
                        </div>
                        <p>Tạo tài khoản mới ngay hôm nay để gặt hái những lợi ích của trải nghiệm mua sắm được cá nhân
                            hóa.
                        </p>
                        <form action="register.php" method="POST">
                            <label for="username">Tên người dùng *</label><br>
                            <input class="input-field" type="text" id="username" name="username" required><br>

                            <label for="username">Địa chỉ Email *</label><br>
                            <input class="input-field" type="email" id="email" name="email" required><br>

                            <label for="password">Mật khẩu *</label><br>
                            <input class="input-field" type="password" id="password" name="password" required><br>

                            <p id="p-register">Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải nghiệm của bạn
                                trên
                                toàn bộ trang web này, để quản lý quyền truy cập vào tài khoản của bạn và cho các mục
                                đích
                                khác được mô tả trong chính sách bảo mật của chúng tôi.</p>

                            <button id="btn-register" type="submit">Register</button><br>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "../pages/includes/footer_pages.php"?>