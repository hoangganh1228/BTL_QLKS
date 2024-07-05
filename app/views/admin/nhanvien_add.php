<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Thêm nhân viên</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Thêm nhân viên </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="ma_nhanvien">Mã nhân viên:</label>
                        <input type="text" name='ma_nhanvien' id="ma_nhanvien" class="form-control"
                            placeholder="Nhập mã nhân viên" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="ten_nhanvien">Tên nhân viên:</label>
                        <input type="text" name='ten_nhanvien' id="ten_nhanvien" class="form-control"
                            placeholder="Nhập tên nhân viên" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="sodienthoai">Số điện thoại:</label>
                        <input type="number" name='sodienthoai' id="sodienthoai" class="form-control"
                            placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="Giới tính">Giới tính</label>
                        <select name="gioitinh" id="gioitinh" class="form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>

                        </select>
                    </div>
                </div>
                <div class=" col">
                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name='email' id="email" class="form-control" placeholder="Nhập email"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="diachi">Địa chỉ:</label>
                        <input type="text" name='diachi' id="diachi" class="form-control" placeholder="Nhập địa chỉ"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="taikhoan">Tài khoản:</label>
                        <input type="text" name='taikhoan' id="taikhoan" class="form-control"
                            placeholder="Nhập tài khoản" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="text" name='matkhau' id="matkhau" class="form-control" placeholder="Nhập mật khẩu"
                            required>
                    </div>

                </div>
            </div>


            <div class="mt-4  align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success mx-auto">Lưu thông tin</button>
                <a href="<?=_WEB_HOST?>/admin/nhan_vien/list_nhanvien" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

</body>

</html>