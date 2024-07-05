<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Thêm khách hàng</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Thêm khách hàng </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <!-- <div class="col"> -->

                <div class="form-group mt-3">
                    <label for="socancuoc">Số căn cước:</label>
                    <input type="number" name='socancuoc' id="socancuoc" class="form-control"
                        placeholder=" Nhập số căn cước công dân" required>
                </div>
                <div class="form-group mt-3">
                    <label for="ten">Tên khách hàng:</label>
                    <input type="text" name='ten' id="ten" class="form-control" placeholder="Nhập tên khách hàng"
                        required>
                </div>

                <div class="form-group mt-3">
                    <label for="sodienthoai">Số điện thoại:</label>
                    <input type="number" name='sodienthoai' id="sodienthoai" class="form-control"
                        placeholder="Nhập số điện thoại" required>
                </div>

                <!-- </div> -->
                <!-- <div class=" col"> -->
                <div class="form-group mt-3">
                    <label for="email">Email:</label>
                    <input type="email" name='email' id="email" class="form-control" placeholder="Nhập email" required>
                </div>


                <div class="form-group mt-3">
                    <label for="matkhau">Mật khẩu:</label>
                    <input type="text" name='matkhau' id="matkhau" class="form-control" placeholder="Nhập mật khẩu"
                        required>
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