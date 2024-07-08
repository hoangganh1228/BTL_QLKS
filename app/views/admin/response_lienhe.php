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
        <h2 class="text-center text-uppercase">Phản hồi khách hàng </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <!-- <div class="col"> -->

                <div class="form-group mt-3">
                    <label for="ten">Tên khách hàng:</label>
                    <input type="text" name='tenkhachhang' id="tenkhachhang" class="form-control"
                        value="<?php echo $data['ten']?>">
                </div>
                <div class="form-group mt-3">
                    <label for="gmail">Gmail:</label>
                    <input type="gmail" name='gmail' id="gmail" class="form-control"
                        value="<?php echo $data['email']?> "> 
                </div>

                <div class="form-group mt-3">
                    <label for="noidung">Nội dung:</label>
                    <textarea name="noidung" id="noidung" rows="5" style="width: 100%; height: 150px;" required></textarea>
                </div>

                <!-- </div> -->
            </div>


            <div class="mt-4  align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success mx-auto">Phản hồi đến khách hàng</button>
                <a href="<?=_WEB_HOST?>/admin/lien_he" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

</body>

</html>