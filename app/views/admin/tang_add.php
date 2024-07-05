<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Thêm tầng</title>
</head>
<body>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="sotang">Số tầng:</label>
                <input type="number" name='sotang' class="form-control" placeholder="Nhập số tầng" required>
            </div>
            <div class="form-group mt-3">
                <label for="soluongphong">Số lượng phòng:</label>
                <input type="number" name='soluongphong' class="form-control" placeholder="Nhập số lượng phòng" required>
            </div>
            <div class="form-group mt-3">
                <label for="trangthai">Trạng thái:</label>
                <select name="trangthai" id="">
                    <option value="Hoạt động">Hoạt động</option>
                    <option value="Dừng hoạt động">Dừng hoạt động</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="ghichu">Ghi chú:</label>
                <input type="text" name='ghichu' class="form-control" placeholder="Nhập ghi chú">
            </div>
            <div class="mt-5 d-flex align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success">Lưu</button>
                <a href="<?=_WEB_HOST?>/admin/tang/tang_list" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>
    </script>
</body>
</html>