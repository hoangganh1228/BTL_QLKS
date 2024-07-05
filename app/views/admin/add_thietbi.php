<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Thêm thiết bị</title>
</head>
<body>
    <div class="container p-3 my-3">
    <div class="display-6 text-center">Thêm thiết bị</div>
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="">Mã thiết bị:</label>
                <input type="text" name='mathietbi' id="" class="form-control" placeholder="Nhập mã thiết bị" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Tên thiết bị:</label>
                <input type="text" name='tenthietbi' id="" class="form-control" placeholder="Nhập tên thiết bị" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Ảnh:</label>
                <input type="file" name='anh' id="" class="form-control" placeholder="chọn file" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Mô tả:</label>
                <input type="text" name='mota' id="" class="form-control" placeholder="Mô tả" >
            </div>
            <br>
            <div>
                <button type="submit" id="btnThem" class="btn btn-outline-secondary">Lưu</button>
                <a href="<?= _WEB_HOST ?>/admin/thietbi/index" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
    </div>
    <script src="<?= _WEB_HOST ?>/public/script.js"></script>
</body>
</html>
