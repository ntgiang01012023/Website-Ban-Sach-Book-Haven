<?php require_once "../config/config.php" ?>

<?php include_once "../pages/includes/header_pages.php"?>

<main>
    <section id="slider">
        <div class="light-dark">
            <button id="light-button" class="active">Light</button>
            <button id="dark-button">Dark</button>
        </div>
        <div class="slider-container">
            <div class="slider-content">
                <div class="content-left">
                    <ul id="content-left-ul">
                        <li><a id="ul-black1" href="">Khuyến mãi lớn</a></li>
                        <li><a id="ul-black2" href="">100 ưu đãi hàng đầu</a></li>
                        <li><a id="ul-black3" href="">Sách mới về</a></li>

                        <?php 
                            $sql = "SELECT * from categories";

                            $result = $conn->query($sql);
                            
                            if($result -> num_rows > 0) {
                                while($row = $result -> fetch_assoc()) {
                                    echo "<li><a href='category.php?id=".$row['ID']."'>".$row["Name"]."<i class='fa-solid fa-angle-right'></i></a></li>";
                                }
                            }
                        ?>

                    </ul>
                </div>
                <div class="content-right">
                    <div class="slider-container">
                        <div class="content-right-slider">
                            <div class="slider-card">
                                <div class="slider-text">
                                    <div class="slider-text-details">
                                        <h1>ĐẮC NHÂN TÂM</h1>
                                        <h3>Khám phá bí quyết thành công trong giao tiếp và con người</h3>
                                        <h4>99.000đ</h4>
                                        <a href="">Bắt đầu mua sắm</a>
                                    </div>
                                </div>
                                <div class="slider-img" data-aos="fade-left" data-aos-durantion="1000">
                                    <img src="../pages/images/DacNhanTamBM.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="content-right-slider">
                            <div class="slider-card">
                                <div class="slider-text">
                                    <div class="slider-text-details">
                                        <h1>NGHĨ VÀ LÀM GIÀU</h1>
                                        <h3>13 nguyên tắc nghĩ và làm giàu</h3>
                                        <h4>143.000đ</h4>
                                        <a href="">Bắt đầu mua sắm</a>
                                    </div>
                                </div>
                                <div class="slider-img">
                                    <img src="../pages/images/suynghivalamgiau.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="content-right-slider">
                            <div class="slider-card">
                                <div class="slider-text">
                                    <div class="slider-text-details">
                                        <h1>NHÀ GIẢ KIM</h1>
                                        <h3>Tìm kiếm giá trị đích thực của cuộc sống và bản thân
                                            diệu</h3>
                                        <h4>199.000đ</h4>
                                        <a href="">Bắt đầu mua sắm</a>
                                    </div>
                                </div>
                                <div class="slider-img">
                                    <img src="../pages/images/nha-gia-kim.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-dots">
                        <span class="slider-dot active"></span>
                        <span class="slider-dot"></span>
                        <span class="slider-dot"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="popular">
        <div class="popular-container">
            <div class="p-card">
                <div class="p-card-img">
                    <img src="../pages/images/luotsuthoigian.jpg" alt="">
                </div>
                <div class="p-card-title">
                    <h2>TIỂU THUYẾT LÔI CUỐN</h2>
                    <a href="">Xem ngay<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>

            <div class="p-card">
                <div class="p-card-img">
                    <img src="../pages/images/hieuvetraitim.jpg" alt="">
                </div>
                <div class="p-card-title">
                    <h2>KỸ NĂNG SỐNG VÀ PHÁT TRIỂN</h2>
                    <a href="">Xem ngay<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>

            <div class="p-card">
                <div class="p-card-img">
                    <img src="../pages/images/khoahocvacongnghe.png" alt="">
                </div>
                <div class="p-card-title">
                    <h2>KHOA HỌC VÀ CÔNG NGHỆ</h2>
                    <a href="">Xem ngay<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <div id="p-card-none" class="p-card">
                <div class="p-card-last-child">
                    <div class="p-card-img">
                        <img src="../pages/images/laptrinh.png" alt="">
                    </div>
                    <div class="p-card-title">
                        <h2>HƯỚNG DẪN VÀ TỰ HỌC</h2>
                        <a href="">Xem ngay<i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features">
        <div class="features-container">
            <div class="features-left">
                <h2>Ưu đãi đặc biệt</h2>
                <img src="../pages/images/nha-gia-kim.png" alt="">
                <p>Truyện Nhà Giả Kim của tác giả Paulo Coelho là một truyện hot trong tháng</p>
                <h3>139.000đ</h3>
            </div>
            <div class="features-right">
                <div class="features-right-title">
                    <a class="tab active" data-category="1" href="">Tiểu thuyết nổi bật<div class="tab-circle"></div>
                    </a>

                    <a class="tab" data-category="2" href="">Giảm giá<div class="tab-circle"></div></a>
                    <a class="tab" data-category="3" href="">Đánh giá hàng đầu<div class="tab-circle"></div></a>
                </div>
                <div id="products-container" class="features-right-product">

                    <?php 
$sql = "SELECT categories.Name, books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
        FROM categories
        JOIN books ON categories.ID = books.CategoryID
        JOIN books_images ON books.ID = books_images.BookID
        WHERE categories.Name = 'Tiểu thuyết';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $discountedPrice = $row["Price"] - $row["Discount"]; // Tính giá sau giảm
        $isDiscounted = $row["Discount"] > 0; // Kiểm tra sách có giảm giá hay không

        ?>
                    <div class="features-right-product-details category-1 active">
                        <h3><?php echo $row['Name']; ?></h3>
                        <p><?php echo $row['Title']; ?></p>
                        <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        <div class="details-money-shop">
                            <?php if ($isDiscounted) { ?>
                            <div class="d-m-shop-discount">
                                <h4 class="discounted-price">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . ' đ'; ?></h4>
                                <span
                                    class="original-price"><?php echo number_format($row["Price"], 0, '.', ',') . ' đ'; ?></span>
                            </div>
                            <?php } else { ?>
                            <h3><?php echo number_format($row["Price"], 0, '.', ',') . ' đ'; ?>
                            </h3>
                            <?php } ?>
                            <a href="book_detail.php?bookID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>

                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <?php
    }
}
?>



                    <?php
$sql = "SELECT categories.Name, books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
        FROM categories
        JOIN books ON categories.ID = books.CategoryID
        JOIN books_images ON books.ID = books_images.BookID 
        AND books.Discount > 0
        LIMIT 8";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $discountedPrice = $row["Price"] - $row["Discount"]; // Tính giá sau giảm
        ?>
                    <div class="features-right-product-details category-2">
                        <h3><?php echo $row['Name']; ?></h3>
                        <p><?php echo $row['Title']; ?></p>
                        <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        <div class="details-money-shop">
                            <div class="d-m-shop-discount">
                                <h4 class="discounted-price">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . ' đ'; ?></h4>
                                <span
                                    class="original-price"><?php echo number_format($row["Price"], 0, '.', ',') . ' đ'; ?></span>
                            </div>
                            <a href="book_detail.php?bookID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <?php
    }
}
?>



                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                    <div class="features-right-product-details category-3">
                        <h3>Sức mạnh của hiện tại</h3>
                        <p>Sức mạnh của hiện tại” của Eckhart Tolle có tên gốc là “The power of now”</p>
                        <img src="../pages/images/7-thoi-quen-hieu-qua_1200x1200.png" alt="">
                        <div class="details-money-shop">
                            <h3>199.000đ</h3>
                            <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="details-whislits">
                            <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                            <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="best-deals">
        <div class="best-deals-container">
            <div class="b-d-c-title">
                <ul>
                    <li><a id="best-deals-active" href="">Best Deals<div class="best-deals-circle"></div></a></li>
                    <li><a href="">Science fiction books</a></li>
                    <li><a href="">Self-help books</a></li>
                    <li><a href="">History books</a></li>
                    <li><a href="">Anime manga</a></li>
                    <li><a href="">Manual and self-study books</a></li>
                    <li><a href="">Book of Poetry and Prose</a></li>
                </ul>
            </div>
            <div class="b-d-c-main">
                <div class="b-d-c-m-box-left">

                    <?php
                        // Truy vấn SQL để lấy 4 sản phẩm best deals từ sản phẩm thứ 2 đến 5
                        $sql = "SELECT categories.Name, books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
                                FROM categories
                                JOIN books ON categories.ID = books.CategoryID
                                JOIN books_images ON books.ID = books_images.BookID 
                                WHERE books.Discount > 0
                                ORDER BY books.Discount DESC
                                LIMIT 2, 4";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lặp qua các sản phẩm best deals và hiển thị thông tin
                            while ($row = $result->fetch_assoc()) {
                                $discountedPrice = $row["Price"] - $row["Discount"];
                                ?>
                    <div class="b-d-c-m-box-left-card">
                        <h3><?php echo $row['Name']; ?></h3>
                        <h4><?php echo $row['Title']; ?></h4>
                        <div class="b-d-c-b-l-c-img">
                            <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        </div>
                        <div class="b-d-c-b-l-c-price">
                            <div class="b-d-c-b-l-c-p-discount">
                                <h5 class="discounted-price">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h5>
                                <span><?php echo number_format($row['Price'], 0, '.', ',') . 'đ'; ?></span>
                            </div>
                            <a href="book_detail.php?bookID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="b-d-c-b-l-c-wishlist">
                            <div class="b-d-c-b-l-c-wishlist-all">
                                <a href=""><i class="fa-regular fa-heart"></i>Wishlist</a>
                                <a href=""><i class="fa-solid fa-code-compare"></i>Compare</a>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            echo "Không có sản phẩm best deals.";
                        }
                    ?>

                </div>

                <div class="b-d-c-m-box-center">
                    <?php
                        // Truy vấn SQL để lấy 1 sản phẩm giảm giá nhiều nhất
                        $sql = "SELECT categories.Name, books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
                                FROM categories
                                JOIN books ON categories.ID = books.CategoryID
                                JOIN books_images ON books.ID = books_images.BookID 
                                WHERE books.Discount > 0
                                ORDER BY books.Discount DESC
                                LIMIT 1";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lấy thông tin sản phẩm
                            $row = $result->fetch_assoc();
                            $discountedPrice = $row["Price"] - $row["Discount"];
                            ?>
                    <div class="b-d-c-m-box-left-card-center">
                        <h3><?php echo $row['Name']; ?></h3>
                        <h4><?php echo $row['Title']; ?></h4>
                        <div class="b-d-c-b-l-c-img-center">
                            <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        </div>
                        <div class="b-d-c-b-l-c-price-center">
                            <div class="b-d-c-b-l-c-p-discount-center">
                                <h5 class="discounted-price-center">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h5>
                                <span><?php echo number_format($row['Price'], 0, '.', ',') . 'đ'; ?></span>
                            </div>
                            <a href="book_detail.php?bookID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="b-d-c-b-l-c-wishlist-center">
                            <div class="b-d-c-b-l-c-wishlist-all-center">
                                <a href=""><i class="fa-regular fa-heart"></i>Wishlist</a>
                                <a href=""><i class="fa-solid fa-code-compare"></i>Compare</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        } else {
                            echo "Không có sản phẩm.";
                        }
                    ?>
                </div>

                <div class="b-d-c-m-box-left">

                    <?php
                        // Truy vấn SQL để lấy 4 sản phẩm best deals từ sản phẩm thứ 6 đến 9
                        $sql = "SELECT categories.Name, books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
                        FROM categories
                        JOIN books ON categories.ID = books.CategoryID
                        JOIN books_images ON books.ID = books_images.BookID
                        WHERE books.Discount > 0
                        ORDER BY books.Discount DESC
                        LIMIT 6, 4
                        ";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lặp qua các sản phẩm best deals và hiển thị thông tin
                            while ($row = $result->fetch_assoc()) {
                                $discountedPrice = $row["Price"] - $row["Discount"];
                                ?>
                    <div class="b-d-c-m-box-left-card">
                        <h3><?php echo $row['Name']; ?></h3>
                        <h4><?php echo $row['Title']; ?></h4>
                        <div class="b-d-c-b-l-c-img">
                            <img src="<?php echo $row['ImageURL']; ?>" alt="">
                        </div>
                        <div class="b-d-c-b-l-c-price">
                            <div class="b-d-c-b-l-c-p-discount">
                                <h5 class="discounted-price">
                                    <?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h5>
                                <span><?php echo number_format($row['Price'], 0, '.', ',') . 'đ'; ?></span>
                            </div>
                            <a href="book_detail.php?bookID=<?php echo $row['ID']; ?>"><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="b-d-c-b-l-c-wishlist">
                            <div class="b-d-c-b-l-c-wishlist-all">
                                <a href=""><i class="fa-regular fa-heart"></i>Wishlist</a>
                                <a href=""><i class="fa-solid fa-code-compare"></i>Compare</a>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            echo "Không có sản phẩm best deals.";
                        }
                    ?>

                </div>

            </div>
        </div>
    </section>

    <section id="best-sellers">
        <div class="best-sellers-container">
            <div class="best-sellers-title">
                <div class="b-s-title-left">
                    <ul>
                        <li><a href="">Best Sellers</a></li>
                    </ul>
                </div>
                <div class="b-s-title-right">
                    <ul>
                        <li><a id="b-s-title-right-active" href="">Top 20</a></li>
                        <li><a href="">Science fiction books</a></li>
                        <li><a href="">Self-help books</a></li>
                        <li><a href="">History books</a></li>
                    </ul>
                </div>
            </div>
            <div class="best-sellers-products-container">
                <div class="best-sellers-product-all">
                    <div class="best-sellers-product-all-card">
                        <div class="best-sellers-product-card-details">

                            <?php
                            // Truy vấn SQL để lấy 20 sản phẩm ngẫu nhiên và sắp xếp ngẫu nhiên
                            $sql = "SELECT categories.Name, books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
                                    FROM categories
                                    JOIN books ON categories.ID = books.CategoryID
                                    JOIN books_images ON books.ID = books_images.BookID
                                    ORDER BY RAND()
                                    LIMIT 8";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $discountedPrice = $row["Price"] - $row["Discount"];
                                    ?>
                            <div class="best-sellers-product-card-details-main">
                                <div class="b-s-p-c-d-m-img">
                                    <img src="<?php echo $row['ImageURL']; ?>" alt="">
                                </div>
                                <div class="b-s-p-c-d-m-content">
                                    <a href=""><?php echo $row['Name']; ?></a>
                                    <p><?php echo $row['Title']; ?></p>
                                    <div class="b-s-p-c-d-m-content-money">
                                        <h3><?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h3>
                                        <a href="book_detail.php?bookID=<?php echo $row['ID']; ?>"><i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                    <div class="b-s-details-whislits">
                                        <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                                        <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "Không có sản phẩm.";
                            }
                        ?>

                        </div>

                        <div class="best-sellers-product-card-details">

                            <?php
                            // Truy vấn SQL để lấy 20 sản phẩm ngẫu nhiên và sắp xếp ngẫu nhiên
                            $sql = "SELECT categories.Name, books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
                                    FROM categories
                                    JOIN books ON categories.ID = books.CategoryID
                                    JOIN books_images ON books.ID = books_images.BookID
                                    ORDER BY RAND()
                                    LIMIT 8";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $discountedPrice = $row["Price"] - $row["Discount"];
                                    ?>
                            <div class="best-sellers-product-card-details-main">
                                <div class="b-s-p-c-d-m-img">
                                    <img src="<?php echo $row['ImageURL']; ?>" alt="">
                                </div>
                                <div class="b-s-p-c-d-m-content">
                                    <a href=""><?php echo $row['Name']; ?></a>
                                    <p><?php echo $row['Title']; ?></p>
                                    <div class="b-s-p-c-d-m-content-money">
                                        <h3><?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h3>
                                        <a href="book_detail.php?bookID=<?php echo $row['ID']; ?>"><i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                    <div class="b-s-details-whislits">
                                        <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                                        <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "Không có sản phẩm.";
                            }
                        ?>
                            <div class="b-s-p-c-d-m-img">
                                <img src="../pages/images/sa3-removebg-preview.png" alt="">
                            </div>
                            <div class="b-s-p-c-d-m-content">
                                <a href="">Sức mạnh của hiện tại</a>
                                <p>Sức mạnh của hiện tại” của Eckhart Tolle</p>
                                <div class="b-s-p-c-d-m-content-money">
                                    <h3>199.000đ</h3>
                                    <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                                <div class="b-s-details-whislits">
                                    <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                                    <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                                </div>
                            </div>
                        </div>




                        <div class="best-sellers-product-card-details">

                            <?php
                            // Truy vấn SQL để lấy 20 sản phẩm ngẫu nhiên và sắp xếp ngẫu nhiên
                            $sql = "SELECT categories.Name, books.ID, books.Title, books.Price, books.Discount, books_images.ImageURL
                                    FROM categories
                                    JOIN books ON categories.ID = books.CategoryID
                                    JOIN books_images ON books.ID = books_images.BookID
                                    ORDER BY RAND()
                                    LIMIT 4";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $discountedPrice = $row["Price"] - $row["Discount"];
                                    ?>
                            <div class="best-sellers-product-card-details-main">
                                <div class="b-s-p-c-d-m-img">
                                    <img src="<?php echo $row['ImageURL']; ?>" alt="">
                                </div>
                                <div class="b-s-p-c-d-m-content">
                                    <a href=""><?php echo $row['Name']; ?></a>
                                    <p><?php echo $row['Title']; ?></p>
                                    <div class="b-s-p-c-d-m-content-money">
                                        <h3><?php echo number_format($discountedPrice, 0, '.', ',') . 'đ'; ?></h3>
                                        <a href="book_detail.php?bookID=<?php echo $row['ID']; ?>"><i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                    <div class="b-s-details-whislits">
                                        <i class="fa-regular fa-heart"></i><a href="">Wishlist</a>
                                        <i class="fa-solid fa-code-compare"></i><a href="">Compare</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                echo "Không có sản phẩm.";
                            }
                        ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="best-sellers-product-dots">
            <span class="b-s-p-dot active"></span>
            <span class="b-s-p-dot"></span>
            <span class="b-s-p-dot"></span>
        </div>
        </div>
        </div>
    </section>

</main>

<?php include_once "../pages/includes/footer_pages.php"?>