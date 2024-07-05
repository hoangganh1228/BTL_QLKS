<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa dịch vụ</title>
    <?php
        require_once 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container p-3 my-3">
    <div class="display-6 text-center">Sửa dịch vụ</div>
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="">Mã dịch vụ:</label>
                <input type="text" name='madichvu' id="" class="form-control" value="<?php echo $table[0]['madichvu'] ?>" readonly>
            </div>
            <div class="form-group mt-3">
                <label for="">Tên dịch vụ:</label>
                <input type="text" name='tendichvu' id="" class="form-control" value="<?php echo $table[0]['tendichvu'] ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Giá:</label>
                <input type="number" name='gia' id="" class="form-control" value="<?php echo $table[0]['gia'] ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Ảnh:</label>
                <input type="file" name='anh' id="" class="form-control" value="<?php echo $table[0]['anh'] ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Mô tả:</label>
                <textarea name='mota' id="" class="form-control"><?php echo $table[0]['mota'] ?></textarea>
            </div>
            <br>
            <div>
                <button type="submit" id="btnThem" class="btn btn-outline-secondary">Sửa</button>
                <a href="<?=_WEB_HOST?>/admin/dichvu/index" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
    </div>
    <script src="<?=_WEB_HOST?>/public/script.js">
    </script>
</body>

</html>