<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel - CONTACT</title>
    <?php require 'configs/bootstrap.php';?>
</head>

<body class="bg-light">

    <?php $this->view('inc/header', []);?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Liên hệ</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Liên hệ với chúng tôi để được tư vấn những tiện ích , ưu đãi của khách sạn và trải nghiệm những dịch vụ tốt
            nhất .
        </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <iframe class="w-100 rounded mb-4" height="320"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.195675873867!2d105.79625170941975!3d20.98479198057284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6bdc7f95f%3A0x58ffc66343a45247!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgR2lhbyB0aMO0bmcgVuG6rW4gdOG6o2k!5e0!3m2!1svi!2s!4v1714317470076!5m2!1svi!2s"
                        loading="lazy"></iframe>
                    <h5>Địa chỉ</h5>
                    <a href="https://maps.app.goo.gl/HACP2jWFnQc6JGTcA" target="_blank"
                        class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i>
                    </a>
                    <h5>Liên hệ chúng tôi</h5>
                    <a href="tel: +84123456789" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+84123456789
                    </a>
                    <br>
                    <a href="tel: +84123456789" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+84123456789
                    </a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: ask.tjwebdev@gmail.com" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i> ask.tjwebdev@gmail.com
                    </a>
                    <h5 class="mt-4 ">Theo dõi chúng tôi</h5>
                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-twitter me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-5 me-2 ">

                        <i class="bi bi-facebook me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-5">
                        <i class="bi bi-instagram me-1  "></i>
                    </a>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <form>
                        <h5>Send a message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Họ tên</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email </label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;"> Chủ đề </label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Ghi chú </label>
                            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>

                        </div>
                        <button type="submit" class="btn text-white custom-bg mt-3">
                            Gửi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php $this->view('inc/footer', []);?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>






</body>

</html>