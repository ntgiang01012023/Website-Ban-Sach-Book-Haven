<?php require_once "../config/config.php";

if (isset($_SESSION['cart_success_message'])) {
    $success_message = $_SESSION['cart_success_message'];
    unset($_SESSION['cart_success_message']); // Xóa thông báo sau khi đã hiển thị
}

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

        <section id="product-details">
            <div class="p-d-container">




                <?php

$bookID = $_GET['bookID']; // Lấy giá trị bookID từ tham số trên URL

// Truy vấn để lấy danh mục và tên sách của sách
$sqlBook = "SELECT books.Title AS bookTitle, categories.Name AS categoryName
            FROM books
            JOIN categories ON categories.ID = books.CategoryID
            WHERE books.ID = $bookID";

$resultBook = $conn->query($sqlBook);

// Kiểm tra xem có kết quả từ truy vấn hay không
if ($resultBook->num_rows > 0) {
    $rowBook = $resultBook->fetch_assoc();
    $bookTitle = $rowBook['bookTitle'];
    $categoryName = $rowBook['categoryName'];

    // Truy vấn để lấy tổng số sách trong danh mục tương ứng
    $sqlTotalBooks = "SELECT COUNT(*) AS totalBooks
                      FROM books
                      WHERE CategoryID = (SELECT CategoryID FROM books WHERE ID = $bookID)";

    $resultTotalBooks = $conn->query($sqlTotalBooks);

    // Kiểm tra xem có kết quả từ truy vấn hay không
    if ($resultTotalBooks->num_rows > 0) {
        $rowTotalBooks = $resultTotalBooks->fetch_assoc();
        $totalBooks = $rowTotalBooks['totalBooks'];
    }
}

// Hiển thị tên sách, danh mục và tổng số sách
if ($bookTitle && $categoryName && $totalBooks) {
?>


                <div class="p-d-c-title">
                    <a href="index_home.php">Trang chủ</a>
                    <h3><i class="fa-solid fa-angle-right"></i></h3>
                    <span><a href=""><?php echo $categoryName; ?></a></span>
                    <h3><i class="fa-solid fa-angle-right"></i></h3>
                    <h3><?php echo $bookTitle; ?></h3>
                </div>
                <div class="p-d-c-main">
                    <div class="p-c-d-m-sidebar">
                        <ul class="p-d-c-m-s-showcate">
                            <li><a href="">Tất cả danh mục <i class="fa-solid fa-angle-right"></i></a></li>
                            <li><a href=""><?php echo $categoryName; ?> (<?php echo $totalBooks; ?>)</a></li>
                            <?php } ?>

                        </ul>
                        <div class="p-d-c-m-s-banner">
                            <img src="../pages/images/banner.jpg" alt="">
                        </div>
                        <div class="p-d-c-m-s-last-pro">
                            <div class="p-d-c-m-s-last-pro-title">
                                <h2>Sản phẩm mới nhất</h2>
                                <div class="p-d-c-m-s-last-pro-title-line"></div>
                            </div>


                            <?php
// Truy vấn để lấy 3 sản phẩm được thêm mới gần nhất
$sqlNewProducts = "SELECT books.Title, books.Price, books_images.ImageURL
                   FROM books
                   JOIN books_images ON books.ID = books_images.BookID
                   ORDER BY books.CreatedAt DESC
                   LIMIT 3";


$resultNewProducts = $conn->query($sqlNewProducts);

// Kiểm tra xem có kết quả từ truy vấn hay không
if ($resultNewProducts->num_rows > 0) {
    while ($rowNewProduct = $resultNewProducts->fetch_assoc()) {
        $imageURL = $rowNewProduct['ImageURL'];
        $title = $rowNewProduct['Title'];
        $price = $rowNewProduct['Price'];
        ?>



                            <div class="p-d-c-m-s-last-pro-details">
                                <div class="p-d-c-m-s-last-pro-details-img">
                                    <img src="<?php echo $imageURL; ?>" alt="">
                                </div>
                                <div class="p-d-c-m-s-last-pro-content">
                                    <h4><?php echo $title; ?></h4>
                                    <div class="p-d-c-m-s-last-pro-content-rating">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <h5><?php echo number_format($price, 0, '.', ',') . 'đ'; ?></h5>
                                </div>
                            </div>


                            <?php } ?>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="p-c-d-m-pro-container">

                        <?php

if (isset($_SESSION['cart_success_message'])) {
    $success_message = $_SESSION['cart_success_message'];
    unset($_SESSION['cart_success_message']); // Xóa thông báo sau khi đã hiển thị
}

?>

                        <!-- Hiển thị thông báo thành công (nếu có) -->
                        <?php if (isset($success_message)): ?>
                        <div class="success-message">
                            <?php echo $success_message; ?>
                            <a href="cart.php">Xem giỏ hàng<i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <?php endif; ?>











                        <?php
$bookID = $_GET['bookID']; // Nhận giá trị bookID từ tham số trên URL

// Thực hiện truy vấn để lấy thông tin của sách
$sql = "SELECT books.ID, books.Title, books.Price, books.Discount, books.Description, books_images.ImageURL, categories.Name
        FROM books
        JOIN books_images ON books.ID = books_images.BookID
        JOIN categories ON books.CategoryID = categories.ID
        WHERE books.ID = $bookID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['ID'];
    $title = $row['Title'];
    $price = $row['Price'];
    $discount = $row['Discount'];
    $description = $row['Description'];
    $imageURL = $row['ImageURL'];
    $category = $row['Name'];

    // Hiển thị thông tin của sách trong HTML
    ?>





                        <div class="p-c-d-m-pro-c-top">



                            <div class="p-c-d-m-pro-c-top-img">
                                <div class="zoom" class="zoom" onmousemove="zoom(event)"
                                    style="background-image: url(<?php echo $imageURL; ?>)">

                                    <img src="<?php echo $imageURL; ?>" alt="">
                                </div>

                            </div>


                            <form id="form-add-to-cart" method="post" action="cart.php">



                                <div class="p-c-d-m-pro-c-top-info">
                                    <a href=""><?php echo $category; ?></a>
                                    <h2><?php echo $title; ?></h2>
                                    <div class="p-d-c-m-s-last-pro-content-rating">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="p-c-d-m-pro-c-top-info-line"></div>
                                    <div class="p-c-d-m-pro-c-top-info-wishlist">
                                        <li><a href=""><i class="fa-regular fa-heart"></i>Wishlist</a></li>
                                        <li><a href=""><i class="fa-solid fa-code-compare"></i>Compare</a></li>
                                    </div>
                                    <div class="p-c-d-m-pro-c-top-info-des">
                                        <p><?php echo $description; ?></p>
                                    </div>
                                    <div class="p-c-d-m-pro-c-top-info-price">
                                        <?php
                                        if ($discount > 0) {
                                            $final_price = $price - $discount;
                                            echo '<h1>' . number_format($final_price, 0, '.', ',') . 'đ</h1>';
                                            echo '<h3>' . number_format($price, 0, '.', ',') . 'đ</h3>';
                                        } else {
                                            $final_price = $price;
                                            echo '<h1>' . number_format($final_price, 0, '.', ',') . 'đ</h1>';
                                        }
                                        ?>
                                    </div>


                                    <!-- Thêm các trường ẩn để truyền thông tin sản phẩm -->
                                    <input type="hidden" name="book_id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="book_title" value="<?php echo $title; ?>">
                                    <input type="hidden" name="book_price" value="<?php echo $final_price; ?>">
                                    <input type="hidden" name="book_image" value="<?php echo $imageURL; ?>">

                                    <div class="p-c-d-m-pro-c-top-info-checkout">
                                        <input type="number" max="100" min="1" value="1" name="quantity" id="quantity">
                                        <button type="submit"><i class="fa-solid fa-cart-plus"></i>Thêm vào giỏ
                                            hàng</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <?php
} else {
    echo "Không tìm thấy sách!";
}
?>

                        <div class="p-c-d-m-pro-c-center">
                            <div class="p-c-d-m-pro-c-center-title">
                                <div id="p-c-t-t-active" class="p-c-t-text">
                                    <h2>Đánh giá</h2>
                                    <div class="p-c-line"></div>
                                </div>
                                <div class="p-c-t-text">
                                    <h2>Mô tả</h2>
                                    <div class="p-c-line"></div>
                                </div>
                                <div class="p-c-t-text">
                                    <h2>Ưu đãi</h2>
                                    <div class="p-c-line"></div>
                                </div>
                            </div>
                            <div class="p-c-d-m-pro-c-center-main">
                                <div class="p-c-d-m-pro-c-center-main-all">


                                    <div class="p-c-d-m-pro-c-c-m-rating">
                                        <h3>Dựa trên tất cả đánh giá</h3>
                                        <h4>0.0</h4>
                                        <div class="p-c-d-m-pro-c-c-m-r-cord">
                                            <div class="p-c-d-m-pro-c-c-m-r-c-star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="p-c-d-m-pro-c-c-m-r-c-line"></div>
                                            <p>0</p>
                                        </div>
                                        <div class="p-c-d-m-pro-c-c-m-r-cord">
                                            <div class="p-c-d-m-pro-c-c-m-r-c-star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                            <div class="p-c-d-m-pro-c-c-m-r-c-line"></div>
                                            <p>0</p>
                                        </div>
                                        <div class="p-c-d-m-pro-c-c-m-r-cord">
                                            <div class="p-c-d-m-pro-c-c-m-r-c-star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                            <div class="p-c-d-m-pro-c-c-m-r-c-line"></div>
                                            <p>0</p>
                                        </div>
                                        <div class="p-c-d-m-pro-c-c-m-r-cord">
                                            <div class="p-c-d-m-pro-c-c-m-r-c-star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                            <div class="p-c-d-m-pro-c-c-m-r-c-line"></div>
                                            <p>0</p>
                                        </div>
                                        <div class="p-c-d-m-pro-c-c-m-r-cord">
                                            <div class="p-c-d-m-pro-c-c-m-r-c-star">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                            <div class="p-c-d-m-pro-c-c-m-r-c-line"></div>
                                            <p>0</p>
                                        </div>
                                    </div>
                                    <div class="p-c-d-m-pro-c-c-m-reviews">
                                        <h3>Hãy là người đầu tiên nhận xét</h3>
                                        <div class="p-c-d-m-pro-c-c-m-r-rating">
                                            <h4>Đánh giá</h4>
                                            <div class="p-c-d-m-pro-c-c-m-r-c-star">
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="p-c-d-m-pro-c-c-m-r-review">
                                            <h4>Nhận xét</h4>
                                            <textarea name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="p-c-d-m-pro-c-c-m-r-name">
                                            <h4>Tên khách hàng *</h4>
                                            <input type="text">
                                        </div>
                                        <div class="p-c-d-m-pro-c-c-m-r-email">
                                            <h4>Địa chỉ Email *</h4>
                                            <input type="email">
                                        </div>
                                        <div class="p-c-d-m-pro-c-c-m-r-save-email">
                                            <input type="checkbox">
                                            <h4>Lưu tên, email và trang web của tôi trong trình duyệt này cho lần tôi
                                                bình luận tiếp theo.</h4>
                                        </div>
                                        <button type="button">Thêm đánh giá</button>
                                    </div>
                                </div>
                                <div class="p-c-d-m-pro-c-c-m-nobio">
                                    <p>Hiện tại không có đánh giá nào.</p>
                                </div>
                            </div>

                        </div>
                        <div class="p-c-d-m-pro-c-bottom">
                            <div class="p-c-d-m-pro-c-bottom-title">
                                <h3>Sách tương tự</h3>
                            </div>
                            <div class="p-c-d-m-pro-c-bottom-all">
                                <?php
// Câu truy vấn SQL để lấy 3 sách tương tự
$sql_similar_books = "SELECT books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
                      FROM books
                      JOIN books_images ON books.ID = books_images.BookID
                      JOIN categories ON books.CategoryID = categories.ID
                      WHERE categories.Name = '$category' AND books.ID <> $bookID
                      LIMIT 5";
$similar_books_result = $conn->query($sql_similar_books);

// Hiển thị thông tin của 3 sách tương tự
if ($similar_books_result->num_rows > 0) {
    while ($similar_book_row = $similar_books_result->fetch_assoc()) {
        $similar_book_title = $similar_book_row['Title'];
        $similar_book_price = $similar_book_row['Price'];
        $similar_book_imageURL = $similar_book_row['ImageURL'];
        ?>

                                <div class="p-c-d-m-pro-c-b-a-card">
                                    <h4><?php echo $category; ?></h4>
                                    <h5><?php echo $similar_book_title; ?></h5>
                                    <div class="p-c-d-m-pro-c-b-a-c-img">
                                        <img src="<?php echo $similar_book_imageURL; ?>" alt="Hình ảnh sách">
                                    </div>
                                    <div class="p-c-d-m-pro-c-b-a-c-price">
                                        <h2><?php echo number_format($similar_book_price, 0, '.', ','); ?>đ</h2>
                                        <a href="book_detail.php?bookID=<?php echo $similar_book_row['ID']; ?>"><i
                                                class="fa-solid fa-cart-plus"></i></a>

                                    </div>
                                    <div class="p-c-d-m-pro-c-b-a-c-wishlist">
                                        <div class="d-t-w-c">
                                            <!-- Trong wishlist.php -->
                                            <form method="post" action="wishlist.php">
                                                <button class="wishlist" type="submit" name="wishlist"
                                                    value="<?php echo $row['ID']; ?>"><i
                                                        class="fa-regular fa-heart"></i>Wishlist</button>
                                                <!-- ... -->
                                            </form>

                                            <!-- Trong compare.php -->
                                            <form method="POST" action="compare.php">
                                                <button class="compare" type="submit" name="compare"
                                                    value="<?php echo $row['ID']; ?>"><i
                                                        class="fa-solid fa-code-compare"></i>Compare</button>
                                                <!-- ... -->
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php
    }
}
?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>

    </main>




    <?php include_once "../pages/includes/footer_pages.php"?>