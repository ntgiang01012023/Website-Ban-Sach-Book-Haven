<?php
require_once '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer-master/src/PHPMailer.php';
require_once '../PHPMailer-master/src/Exception.php';
require_once '../PHPMailer-master/src/SMTP.php';

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

    <main>

        <section id="product-details">

            <?php

if (isset($_POST['checkout'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];

    // Kiểm tra người dùng đã đăng nhập hay chưa
    if (!isset($_SESSION['username'])) {
        // Xử lý khi người dùng chưa đăng nhập
        header("login_register.php");
        exit();
    }

    $username = $_SESSION['username'];

    // Tìm kiếm ID dựa trên tên người dùng
    $query = "SELECT ID FROM users WHERE Username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $userID = $row['ID'];

        // Lưu đơn hàng vào bảng đơn hàng
        $total_price = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal = $item['book_price'] * $item['quantity'];
            $total_price += $subtotal;
        }
        $total_price1 = number_format($total_price, 0, '.', ',') . ' đ';
        $status = 'Chưa thanh toán'; // Trạng thái mặc định là chưa thanh toán

        $sql = "INSERT INTO orders (CustomerName, Address, Phone, Email, TotalPrice, Status, UserID)
                VALUES ('$fname $lname', '$address', '$phone', '$email', $total_price, 'Pending', '$userID')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Lấy ID đơn hàng vừa tạo
            $order_id = mysqli_insert_id($conn);

            // Lưu chi tiết đơn hàng vào bảng order_items
            foreach ($_SESSION['cart'] as $item) {
                $bookID = $item['book_id'];
                $bookTitle = $item['book_title'];
                $bookPrice = $item['book_price'];
                $quantity = $item['quantity'];

                $sql = "INSERT INTO order_items (OrderID, BookID, BookTitle, BookPrice, Quantity)
                        VALUES ('$order_id', '$bookID', '$bookTitle', '$bookPrice', '$quantity')";

                $result = mysqli_query($conn, $sql);

                $order_id = strtoupper(uniqid());

            }

            // Xóa giỏ hàng sau khi đã đặt hàng
            unset($_SESSION['cart']);

            // Gửi email thông báo đơn hàng cho khách hàng
            $mail = new PHPMailer(true);
            try {
                // Cấu hình server
                $mail->SMTPDebug = 0; // Bật chế độ debug
                $mail->isSMTP(); // Sử dụng SMTP
                $mail->Host = 'smtp.gmail.com'; // Địa chỉ SMTP server
                $mail->SMTPAuth = true; // Bật chế độ xác thực SMTP
                $mail->Username = 'dck28012001@gmail.com'; // Tên đăng nhập SMTP
                $mail->Password = 'gwnvemyltwgineia'; // Mật khẩu đăng nhập SMTP
                $mail->SMTPSecure = 'tls'; // Giao thức bảo mật
                $mail->Port = 587; // Cổng SMTP

                // Cấu hình email
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('dck28012001@gmail.com', 'Book Haven'); // Địa chỉ email và tên người gửi
                $mail->addAddress($email, $fname . ' ' . $lname); // Địa chỉ email và tên người nhận
                $mail->isHTML(true); // Gửi email dạng HTML
                $mail->Subject = 'Xác nhận đơn hàng từ Book Haven'; // Tiêu đề email

                // Nội dung email
                $mail->Body = "Chào $fname $lname,<br><br>
                            Cảm ơn bạn đã đặt hàng từ Book Haven.<br>
                            Đơn hàng của bạn có mã: $order_id.<br>
                            Tổng số tiền: $total_price1.<br>
                            Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để xác nhận và giao hàng.<br><br>
                            Trân trọng,<br>
                            Book Haven Team";

                // Gửi email
                if ($mail->send()) {
                    echo '<h1>Đặt hàng thành công. Vui lòng kiểm tra email của bạn để xem thông tin chi tiết đơn hàng.</h1>';

                } else {
                    // Xử lý khi gửi email thất bại
                    echo 'Đã xảy ra lỗi trong quá trình gửi email.';
                }
            } catch (Exception $e) {
                // Xử lý khi gặp lỗi trong quá trình gửi email
                echo 'Đã xảy ra lỗi trong quá trình gửi email: ' . $mail->ErrorInfo;
            }
        } else {
            // Xử lý khi không thể lưu đơn hàng vào cơ sở dữ liệu
            echo 'Đã xảy ra lỗi khi lưu đơn hàng.';
        }
    } else {
        // Xử lý khi không tìm thấy tên người dùng tương ứng
        echo 'Không tìm thấy tên người dùng.';
    }

    
}
        ?>

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
var lightButton = document.getElementById('light-button');
var darkButton = document.getElementById('dark-button');

lightButton.addEventListener('click', function() {
    lightButton.classList.add('active');
    darkButton.classList.remove('active');
});

darkButton.addEventListener('click', function() {
    darkButton.classList.add('active');
    lightButton.classList.remove('active');
});



const sliders = document.getElementsByClassName('content-right-slider');
const dotss = document.getElementsByClassName('slider-dot');
let currentSlideIndex = 0;

function showSlide(index) {
    for (let i = 0; i < sliders.length; i++) {
        sliders[i].classList.remove('active');
    }

    sliders[index].classList.add('active');

    for (let i = 0; i < dotss.length; i++) {
        dotss[i].classList.remove('active');
    }
    dotss[index].classList.add('active');

    const sliderCards = sliders[index].getElementsByClassName('slider-card');
    for (let i = 0; i < sliderCards.length; i++) {
        sliderCards[i].classList.add('active');
        sliderCards[i].style.opacity = '1';
        sliderCards[i].style.transform = 'translateX(0)';
    }

    // Tự động xóa lớp active và ẩn phần tử sau 3 giây
    const delay = 3000; // Thời gian hiển thị (3 giây)
    setTimeout(() => {
        for (let i = 0; i < sliderCards.length; i++) {
            sliderCards[i].classList.remove('active');
        }
        setTimeout(() => {
            for (let i = 0; i < sliderCards.length; i++) {
                sliderCards[i].style.opacity = '0';
                sliderCards[i].style.transform = 'translateX(0)';
            }
        }, 500); // Delay 0.5 giây để kết thúc hiệu ứng trước khi ẩn phần tử
    }, delay);
}

function nextSlide() {
    currentSlideIndex++;
    if (currentSlideIndex >= sliders.length) {
        currentSlideIndex = 0;
    }
    showSlide(currentSlideIndex);
}

function startSlider() {
    showSlide(currentSlideIndex);
    setInterval(nextSlide, 4550);
}

startSlider();

// Gắn sự kiện click cho từng nút dots
for (let i = 0; i < dotss.length; i++) {
    dotss[i].addEventListener('click', () => {
        showSlide(i);
    });
}





const tabs = document.querySelectorAll('.tab');
const productsContainer = document.getElementById('products-container');
const products = productsContainer.querySelectorAll('.features-right-product-details');
const fRpdLines = document.querySelectorAll('.f-r-p-d-line');

tabs.forEach(tab => {
    tab.addEventListener('click', function(event) {
        event.preventDefault();

        const category = this.getAttribute('data-category');

        tabs.forEach(tab => {
            tab.classList.remove('active');
        });
        this.classList.add('active');

        products.forEach(product => {
            product.classList.remove('active');
            if (product.classList.contains(`category-${category}`)) {
                product.classList.add('active');
            }
        });

        fRpdLines.forEach(line => {
            line.classList.remove('active');
        });

        let startIndex = 0;
        if (category === '1') {
            startIndex = 0;
        } else if (category === '2') {
            startIndex = 6;
        } else if (category === '3') {
            startIndex = 12;
        }

        const activeLines = Array.from(fRpdLines).slice(startIndex, startIndex + 6);
        activeLines.forEach(line => {
            line.classList.add('active');
        });


    });
});

// Hiển thị mặc định Category 1 khi tải trang
products.forEach(product => {
    if (product.classList.contains('category-1')) {
        product.classList.add('active');
    }
});




const slidesContainer = document.querySelector('.best-sellers-product-all-card');
const slides = slidesContainer.children;
const dots = document.querySelectorAll('.b-s-p-dot');
const slideWidth = slides[0].offsetWidth;

let currentIndex = 0;

function setActiveDot(index) {
    dots.forEach(dot => dot.classList.remove('active'));
    dots[index].classList.add('active');
}

function goToSlide(index) {
    const slideOffset = slideWidth + 100; // Tăng 10px so với giá trị gốc

    slidesContainer.style.transform = `translateX(-${slideOffset * index}px)`;
    currentIndex = index;
    setActiveDot(index);
}


dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        goToSlide(index);
    });
});

goToSlide(0);

// Xử lý vuốt trái/phải trên slider
let touchStartX = 0;
let touchEndX = 0;

slidesContainer.addEventListener('touchstart', e => {
    touchStartX = e.touches[0].clientX;
});

slidesContainer.addEventListener('touchend', e => {
    touchEndX = e.changedTouches[0].clientX;
    handleSwipe();
});

function handleSwipe() {
    const swipeDistance = touchEndX - touchStartX;
    if (swipeDistance > 0 && currentIndex > 0) {
        // Swipe sang phải
        goToSlide(currentIndex - 1);
    } else if (swipeDistance < 0 && currentIndex < slides.length - 1) {
        // Swipe sang trái
        goToSlide(currentIndex + 1);
    }
    slidesContainer.style.transition = 'transform 0.3s ease-in-out';
    slidesContainer.style.transform = `translateX(-${slideWidth * currentIndex}px)`;
}
</script>

</html>