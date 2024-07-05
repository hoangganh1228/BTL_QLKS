<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa lớp học</title>
    <?php
        require_once 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Sửa thông tin nhân viên </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group mt-3">
                        <label for="ma_nhanvien">Mã nhân viên:</label>
                        <input type="text" name='ma_nhanvien' id="ma_nhanvien" class="form-control"
                            placeholder="Nhập mã nhân viên" value="<?php echo $table[0]['ma_nhanvien'] ?>" disabled>
                    </div>
                    <div class="form-group mt-3">
                        <label for="ten_nhanvien">Tên nhân viên:</label>
                        <input type="text" name='ten_nhanvien' id="ten_nhanvien" class="form-control"
                            placeholder="Nhập tên nhân viên" value="<?php echo $table[0]['ten_nhanvien'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="sodienthoai">Số điện thoại:</label>
                        <input type="number" name='sodienthoai' id="sodienthoai" class="form-control"
                            placeholder="Nhập số điện thoại" value="<?php echo $table[0]['sodienthoai'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="Giới tính">Giới tính</label>
                        <select name="gioitinh" id="gioitinh" class="form-control">
                            <option value="Nam" <?php if ($table[0]['gioitinh'] == 'Nam') echo 'selected'; ?>>Nam
                            </option>
                            <option value="Nữ" <?php if ($table[0]['gioitinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                            <option value="Khác" <?php if ($table[0]['gioitinh'] == 'Khác') echo 'selected'; ?>>Khác
                            </option>

                        </select>
                    </div>
                </div>
                <div class=" col">
                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name='email' id="email" class="form-control" placeholder="Nhập email"
                            value="<?php echo $table[0]['email'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="diachi">Địa chỉ:</label>
                        <input type="text" name='diachi' id="diachi" class="form-control" placeholder="Nhập địa chỉ"
                            value="<?php echo $table[0]['diachi'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="taikhoan">Tài khoản:</label>
                        <input type="text" name='taikhoan' id="taikhoan" class="form-control"
                            placeholder="Nhập tài khoản" value="<?php echo $table[0]['taikhoan']?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="matkhau">Mật khẩu:</label>
                        <input type="text" name='matkhau' id="matkhau" class="form-control" placeholder="Nhập mật khẩu"
                            value="<?php echo $table[0]['matkhau'] ?>">
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