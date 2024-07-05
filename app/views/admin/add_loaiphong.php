<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Thêm loại phòng</title>
</head>
<body>
    <div class="container p-3 my-3">
    <div class="display-6 text-center">Thêm loại phòng</div>
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="">Mã loại phòng:</label>
                <input type="text" name='maloaiphong' id="" class="form-control" placeholder="Nhập mã loại phòng" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Tên loại phòng:</label>
                <input type="text" name='tenloaiphong' id="" class="form-control" placeholder="Nhập tên loại phòng" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Số lượng khách:</label>
                <input type="number" name='soluongkhach' id="" class="form-control" placeholder="Nhập số lượng khách" >
            </div>
            <div class="form-group mt-3">
                <label for="">Giá:</label>
                <input type="number" name='gia' id="" class="form-control" placeholder="Nhập giá loại phòng" required>
            </div>
            <div class="form-group mt-3">
                <label for="">Mô tả:</label>
                <input type="text" name='mota' id="" class="form-control" placeholder="Mô tả" >
            </div>
            <br>
            <div>
                <button type="submit" id="btnThem" class="btn btn-outline-secondary">Lưu</button>
                <a href="<?= _WEB_HOST ?>/admin/loaiphong/index" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </form>
    </div>
    <script src="<?=_WEB_HOST?>/public/script.js">
    </script>
</body>
</html>