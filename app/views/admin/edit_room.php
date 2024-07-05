<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Sửa phòng</title>
</head>

<body>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="form-group mt-3">
                <label for="sophong">Số phòng:</label>
                <input type="text" name='sophong' id="sophong" class="form-control" placeholder="Nhập số phòng"
                    value="<?php echo $table[0]['sophong']?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="maloaiphong">Mã loại phòng:</label>
                <select name="maloaiphong" id="maloaiphong">
                    <?php
                    foreach ($loaiphong as $row):
                    ?>
                    <option value="<?=$row['maloaiphong']?>"><?=$row['tenloaiphong']?></option>
                    <?php
                    endforeach
                    ?>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="trangthai">Trạng thái:</label>
                <select name="trangthai" id="">
                    <option value="Trống">Trống</option>
                    <option value="Hết">Hết</option>
                </select>
            </div>
            <div class="form-group mt-3" style="position: absolute; visibility: hidden;">
                <label for="makhach">Mã khách:</label>
                <input type="text" name='makhach' id="makhach" class="form-control" placeholder="Nhập mã khách"
                    value="<?php echo $table[0]['makhach']?>">
            </div>
            <div class="form-group mt-3">
                <label for="sotang">Số tầng:</label>
                <select name="sotang" id="sotang">
                    <?php
                    foreach ($tang as $row):
                    ?>
                    <option value="<?=$row['sotang']?>"><?=$row['sotang']?></option>
                    <?php
                    endforeach
                    ?>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="anh">Ảnh:</label>
                <input type="file" name='anh' id="anh" class="form-control" placeholder="Nhập ảnh:" required
                    value="<?php echo $table[0]['anh']?>">
            </div>
            <div class="mt-5 d-flex align-items-center">
                <button type="submit" id="btnLuu" class="btn btn-success mx-auto">Sửa </button>
                <a href="<?=_WEB_HOST?>/admin/phong" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>
    <script src="<?=_WEB_HOST?>/public/script.js">
    </script>
</body>

</html>