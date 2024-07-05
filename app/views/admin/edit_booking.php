<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Sửa đặt phòng</title>
</head>

<body>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="id">Id :</label>
                <input type="text" name='id' id="id" class="form-control" value="<?php echo $table[0]['id']?>" required
                    disabled>
            </div>
            <div class="form-group mt-3">
                <label for="check_in">Ngày đặt:</label>
                <input type="date" name='check_in' id="check_in" class="form-control"
                    value="<?php echo $table[0]['check_in']?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="check_out">Ngày trả:</label>
                <input type="date" name='check_out' id="check_out" class="form-control"
                    value="<?php echo $table[0]['check_out']?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="sophong">Số phòng:</label>
                <input type="text" name='sophong' id="sophong" class="form-control" placeholder="Nhập trạng thái"
                    value="<?php echo $table[0]['sophong']?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="makhachhang">Mã khách hàng:</label>
                <input type="text" name='makhachhang' id="makhachhang" class="form-control" placeholder="Nhập mã khách"
                    value="<?php echo $table[0]['makhachhang']?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="trangthaidat">Trạng thái đặt :</label>
                <input type="text" name='trangthaidat' id="trangthaidat" class="form-control"
                    placeholder="Nhập số tầng:" value="<?php echo $table[0]['trangthaidat']?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="trangthaitt">Trạng thái thanh toán:</label>
                <input type="text" name='trangthaitt' id="trangthaitt" class="form-control" placeholder="Nhập ảnh:"
                    required value="<?php echo $table[0]['trangthaitt']?>">
            </div>
            <div class="mt-5 d-flex align-items-center">
                <button type="submit" id="btnLuu" class="btn btn-success mx-auto">Sửa </button>
                <a href="<?=_WEB_HOST?>/admin/datphong" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>
    <script src="<?=_WEB_HOST?>/public/script.js">
    </script>
</body>

</html>