<?php 
    require 'configs/bootstrap.php';
?>
<h3 class="p-4 text-center">Khách sạn</h3>
<div class="mt-5 modal fade show" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                    <i class="bi bi-person-circle"></i> Đăng nhập
                    </h5>
                   
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email/SĐT</label>
                        <input type="text" name="email_mob" required="" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="matkhau" required="" class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" class="btn btn-dark shadow-none">
                            Đăng nhập
                        </button>
                        <button type="button" class="btn text-secondary text-decoration-none shadow-none p-0" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal"> 
                           <a class="btn text-secondary text-decoration-none shadow-none p-0" href="<?=_WEB_HOST?>/client/index"> Quay lại</a>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
  

         