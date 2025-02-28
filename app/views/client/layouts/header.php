<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top ">
    <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index"> HB WEBSITE </a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" href="index">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms">Phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="service">Dịch vụ</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="about.php">About</a>
                </li> -->
                
            </ul>
            <div class="d-flex"> 
                <?php
                    $path = _WEB_HOST;
                    if(isLogin()) {
                        echo<<<data
                            <div>
                                <a href="logout" class="btn btn-outline-dark shadow-none me-lg-3 me-2"> Đăng xuất </a>
                            </div>
                        data;
                    } else {
                        echo<<<data
                            <div>
                                <a href="$path/client/login" class="btn btn-outline-dark shadow-none me-lg-3 me-2"> Đăng nhập </a>
                                <a href="$path/client/register" class="btn btn-outline-dark shadow-none me-lg-3 me-2"> Đăng kí </a>
                            </div>
                        data;
                    }
                ?>
            </div>
    </div>
</nav>