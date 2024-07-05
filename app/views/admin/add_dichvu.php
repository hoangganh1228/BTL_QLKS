<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Thêm dịch vụ</title>
</head>
<body>
    <div class="container p-3 my-3">
    <div class="display-6 text-center">Thêm dịch vụ</div>
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="">Mã dịch vụ:</label>
                <input type="text" name='madichvu' id="" class="form-control" placeholder="Nhập mã dịch vụ" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Tên dịch vụ:</label>
                <input type="text" name='tendichvu' id="" class="form-control" placeholder="Nhập tên dịch vụ" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Giá:</label>
                <input type="number" name='gia' id="" class="form-control" placeholder="Nhập giá dịch vụ" required>
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
                <a href="<?= _WEB_HOST ?>/admin/dichvu/index" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
    </div>
    <script src="<?= _WEB_HOST ?>/public/script.js"></script>
</body>
</html>
