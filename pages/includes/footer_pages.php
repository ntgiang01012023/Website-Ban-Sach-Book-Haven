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

function showMenuAccount() {
    var dropdown = document.getElementById("dropdown-account");
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
}
</script>

</html>