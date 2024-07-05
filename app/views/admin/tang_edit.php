<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tầng</title>
    <?php
    require_once 'configs/bootstrap.php';
    ?>
</head>

<body>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="sotang">Số tầng:</label>
                <input type="number" name='sotang' class="form-control" value="<?= $tang['sotang'] ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="soluongphong">Số lượng phòng:</label>
                <input type="number" name='soluongphong' class="form-control" value="<?= $tang['soluongphong'] ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="trangthai">Trạng thái:</label>
                <select name="trangthai" id="">
                    <option value="Hoạt động" <?php if ($tang['trangthai'] == 'Hoạt động') echo 'selected'; ?>>Hoạt động</option>
                    <option value="Dừng hoạt động" <?php if ($tang['trangthai'] == 'Dừng hoạt động') echo 'selected'; ?>>Dừng hoạt động</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="ghichu">Ghi chú:</label>
                <input type="text" name='ghichu' class="form-control" value="<?= $tang['ghichu'] ?>">
            </div>
            <div class="mt-5 d-flex align-items-center">
                <button type="submit" class="btn btn-warning mx-auto">Sửa</button>
                <a href="<?= _WEB_HOST ?>/admin/tang/tang_list" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>
    <script src="<?= _WEB_HOST ?>/public/script.js">
    </script>
</body>

</html>