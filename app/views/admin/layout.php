<?php
    // require('admin/inc/db_config.php');
    // require('admin/inc/essentials.php');
    require_once 'configs/bootstrap.php';

?>
<style>
    .dropdown-item:hover {
    background-color: #5f6063 !important;
}
</style>

<div class=" container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font"> Quản lý khách sạn </h3>
    <a href="logout.php" class="btn btn-light btn-sm"> Đăng xuất </a>
</div>
<div class="row w-100">
    <div class="col-lg-2 bg-dark border-top border-1 border-secondary position-fixed" style="min-height: 100vh;" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light text-center">Chức năng</h4>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/phong">Phòng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/datphong">Đặt phòng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/dichvu">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/khach_hang">Khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/lien_he">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/tang">Tầng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/loaiphong">Loại phòng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/thong_ke">Thống kê</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/nhan_vien">Nhân viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/thietbi">Thiết bị</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/kho">Kho sản phẩm</a>
                        </li>
                        <li class="nav-">
                            <div class="dropdown">
                                <button type="button" class="nav-link text-white  dropdown-toggle" data-bs-toggle="dropdown">
                                    Hóa đơn
                                </button>
                                <ul class="dropdown-menu bg-dark p-0">
                                    <li><a class="dropdown-item nav-link text-white" href="<?=_WEB_HOST?>/admin/hoadon">Hóa đơn phòng</a></li>
                                    <li><a class="dropdown-item nav-link text-white" href="<?=_WEB_HOST?>/admin/hoadon/list/dichvu">Hóa đơn dịch vụ</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/hoadon">Hóa đơn phòng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/hoadon/list/dichvu">Hóa đơn dịch vụ</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/thongke">Thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <div class="col-lg-10 ms-auto">
        <div class="container p-3 my-3 border">
            <?php $this->view($page, $data);?>
        </div>
    </div>
</div>