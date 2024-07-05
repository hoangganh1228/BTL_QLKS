<?php 
    require 'configs/bootstrap.php';
?>
<h3 class="p-4 text-center">Hotel</h3>
<div class="mt-5 modal fade show" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form" method="POST"  >
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-circle"></i> Đăng kí
                    </h5>
                   
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nhập số căn cước</label>
                        <input type="text" name="socancuoc" required="" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập tên</label>
                        <input type="text" name="ten" required="" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập số điện thoại</label>
                        <input type="number" name="sodienthoai" required="" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập email</label>
                        <input type="email" name="email" required="" class="form-control shadow-none">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập mật khẩu</label>
                        <input type="password" name="matkhau" required="" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" name="xacnhanmk" required="" class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-dark shadow-none w-100">
                            Đăng kí
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
  

         