<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin khách hàng</title>
    <?php
        require_once 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Sửa thông tin khách hàng </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <!-- <div class="col"> -->

                <div class="form-group mt-3">
                    <label for="socancuoc">Số căn cước công dân:</label>
                    <input type="number" name='socancuoc' id="socancuoc" class="form-control"
                        placeholder="Nhập số căn cước công dân" value="<?php echo $table[0]['socancuoc'] ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="ten">Tên khách hàng:</label>
                    <input type="text" name='ten' id="ten" class=" form-control" placeholder="Nhập tên khách hàng"
                        value="<?php echo $table[0]['ten'] ?>">
                </div>

                <div class="form-group mt-3">
                    <label for="sodienthoai">Số điện thoại:</label>
                    <input type="number" name='sodienthoai' id="sodienthoai" class="form-control"
                        placeholder="Nhập số điện thoại" value="<?php echo $table[0]['sodienthoai'] ?>">
                </div>
                <!-- </div> -->
                <!-- <div class=" col"> -->
                <div class="form-group mt-3">
                    <label for="email">Email:</label>
                    <input type="email" name='email' id="email" class="form-control" placeholder="Nhập email"
                        value="<?php echo $table[0]['email'] ?>">
                </div>


                <div class="form-group mt-3">
                    <label for="matkhau">Mật khẩu:</label>
                    <input type="text" name='matkhau' id="matkhau" class="form-control" placeholder="Nhập mật khẩu"
                        value="<?php echo $table[0]['matkhau'] ?>">
                </div>

                <!-- </div> -->
            </div>


            <div class="mt-4  align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success mx-auto">Lưu thông tin</button>
                <a href="<?=_WEB_HOST?>/admin/khach_hang/list_khachhang" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

</body>

</html>