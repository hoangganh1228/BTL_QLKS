<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng</title>

</head>

<body>
        <div class="display-6 text-center mt-3">Danh sách phòng</div>
        <form action="" method="get" class="d-flex" style="margin-top: 20px;">
            <input name="search-ma" type="text" class="form-control" style="width: 40%;" placeholder="Nhập số phòng">
            <input name="search-ten" type="text" class="form-control" style="width: 40%;" placeholder="Nhập loại phòng">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form>
        <div class="">
            <a href="<?=_WEB_HOST?>/admin/phong/add" class="btn btn-success mt-3" style="width: 100px;">Thêm</a>
        </div>
        <table class="mt-2 table table-bordered table-hover">
            <thead>
                <tr class="text-bg-dark">
                    <th>Số phòng</th>
                    <th>Tên loại phòng</th>
                    <th>Trạng thái</th>
                    <th>Tên khách</th>
                    <th>Số tầng</th>
                    <th>Ảnh</th>
                    <th style="width: 5%;">Sửa</th>
                    <th style="width: 5%;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                            foreach ($table as $row) :
                            ?>
                <tr>
                    <td><?php echo $row['sophong'] ?></td>
                    <td><?php echo $row['tenloaiphong'] ?></td>
                    <td><?php echo $row['trangthai'] ?></td>
                    <td><?php echo $row['ten'] ?></td>
                    <td><?php echo $row['sotang'] ?></td>
                    <td><img style="width:100px" src="<?php echo _WEB_HOST .  '/public/img/rooms/' . $row['anh'] ?>" alt="Ảnh" /></td>
                    <td><a class="btn btn-warning"
                            href="<?= _WEB_HOST ?>/admin/phong/edit_phong/<?= $row['sophong'] ?>">Sửa</a>
                    </td>
                    <td><a href="<?= _WEB_HOST ?>/admin/phong/delete_phong/<?= $row['sophong'] ?>"
                            class="btn btn-danger" onclick="return confirm('Xác nhận xóa!')">Xóa</a></td>
                </tr>
                <?php
                            endforeach;
                            ?>
            </tbody>
        </table>
</body>

</html>