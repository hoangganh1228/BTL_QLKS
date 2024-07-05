<?php
    // $this->view('client/layouts/header', []);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - HOME</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php 
        require 'configs/bootstrap.php'; 
        $this->view('client/layouts/inc/links', []);
    ?>

    <link rel="stylesheet" href="./css/main.css">
</head>


<body class="bg-light">
    <?php $this->view('inc/header', []);?>
    <!-- Carousel  -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?=_WEB_HOST?>/app/views/images/carousel/1.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="<?=_WEB_HOST?>/app/views/images/carousel/2.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="<?=_WEB_HOST?>/app/views/images/carousel/3.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="<?=_WEB_HOST?>/app/views/images/carousel/4.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="<?=_WEB_HOST?>/app/views/images/carousel/5.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="<?=_WEB_HOST?>/app/views/images/carousel/6.png" class="w-100 d-block" />
                </div>

            </div>

        </div>
    </div>

    <!-- Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Phòng</h2>

    <div class="container">
        <div class="row">
            <?php
                $path = _WEB_HOST.'/public/img/rooms/';
                foreach($roomData as $room) {
                    $roomPriceFormat = formatNumber($room['gia']);
                    if($room['trangthai'] == 'Trống') {
                        echo <<<data
                            <div class="col-lg-4 col-md-6 my-3">
                                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;" >
                                    <img src="$path$room[anh]" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5>$room[tenloaiphong]</h5>
                                        <h6 class="mb-4">$roomPriceFormat mỗi đêm</h6>
                                        
                                        <div class="guests mb-4">
                                            <h6 class="mb-1">Guests</h6>
                                            <span class="badge bg-light text-dark text-wrap ">
                                                Số phòng: $room[sophong] 
                                            </span>
                                            <span class="badge bg-light text-dark text-wrap ">
                                                Số lượng: $room[soluongkhach] 
                                            </span>
                                             <span class="badge bg-light text-dark text-wrap ">
                                                Trạng thái: $room[trangthai] 
                                            </span>
                                        </div>
                                        
                                        <div class="d-flex justify-content-evenly mb-2">
                                            <a href="confirm_bookings?sophong=$room[sophong]" class="btn btn-sm w-100 mt-2 btn-outline-dark">Đặt ngay</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                        data;
            }   
        }
            ?>
        </div>
    </div>
    <!-- Facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Dịch vụ</h2>


    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <?php
                $path = _WEB_HOST.'/public/img/service/';
                foreach($serviceData as $service) {
                    echo<<<data
                        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                            <img src="$path$service[anh].png" width="60px">
                            <h5 class="mt-3">$service[tendichvu]</h5>
                        </div>
                    data;
                }
               
            ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="service" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> Xem thêm >>></a>
            </div>
        </div>
    </div>


    <!-- Gg map(Embed) -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Liên hệ</h2>
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14898.565702963178!2d105.7831221!3d21.007006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acacbb621a31%3A0x6b9d241f84cd960!2sJW%20Marriott%20Hotel%20Hanoi!5e0!3m2!1svi!2s!4v1714406252436!5m2!1svi!2s"
                    height="360" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Liên hệ với chúng tôi</h5>
                    <a href="tel:+842438335588" class="d-inline-block mb-2 text-decoration-none text-dark"><i
                            class="bi bi-telephone-fill"></i>+842438335588</a>
                    <br />
                    <a href="tel:+842438335588" class=" mb-2 text-decoration-none text-dark"><i
                            class="bi bi-telephone-fill"></i>+842438335588</a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Theo dõi chúng tôi</h5>
                    <a href="#" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-twitter me-1"></i>Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook me-1"></i>Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block  ">
                        <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i>Instagram
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <?php $this->view('inc/footer', []);?>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- initialize Swiper -->
    <script>
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }
    });
    var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,

        },
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },

        }
    });
    </script>



</body>

</html>