<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require_once 'configs/bootstrap.php';
    ?>
    <title>Danh sách dịch vụ</title>
    <style>
        .column {
            width: 25%;
            word-wrap: break-word;
        }
    </style>
</head>

<body>
    <i class="bi bi-0-circle-fill"></i>
    <div class="display-6 text-center">Danh sách dịch vụ</div>
    <form action="" method="get" class="row justify-content-center mt-3 mb-3">
        <div class="col-md-4 mb-2">
            <input name="search-ma" type="text" class="form-control" placeholder="Nhập mã dịch vụ">
        </div>
        <div class="col-md-4 mb-2">
            <input name="search-ten" type="text" class="form-control" placeholder="Nhập tên dịch vụ">
        </div>
        <div class="col-md-2 mb-2">
            <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
        </div>
    </form>
    <div class="">
        <a href="<?= _WEB_HOST ?>/admin/dichvu/add" class="btn btn-outline-secondary" style="width: 100px;">Thêm</a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr style="background:#efeded">
                <th>STT</th>
                <th>Mã dịch vụ</th>
                <th>Tên dịch vụ</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th class="column">Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($table)) :
            ?>
                <tr>
                    <td colspan="10">
                        <div class="alert alert-danger text-center">Không tìm thấy dịch vụ</div>
                    </td>
                </tr>
                <?php
            else :
                $i = 0;
                foreach ($table as $row) :
                ?>
                    <tr>
                        <td><?php echo (++$i); ?></td>
                        <td><?php echo $row['madichvu'] ?></td>
                        <td><?php echo $row['tendichvu'] ?></td>
                        <td><?php echo $row['gia'] ?></td>
                        <td><img style="width:100px" src="<?php echo _WEB_HOST .  '/public/img/' . $row['anh'] ?>" alt="Ảnh" /></td>
                        <td><?php echo $row['mota'] ?></td>
                        <td>
                            <a href="<?= _WEB_HOST ?>/admin/dichvu/edit_dichvu/<?= $row['madichvu'] ?>" class="btn btn-outline-secondary">Sửa</a>
                            <a href="<?= _WEB_HOST ?>/admin/dichvu/delete_dichvu/<?= $row['madichvu'] ?>" class="btn btn-outline-secondary" onclick="return comfim('Xác nhận xóa!')">Xóa</a>
                        </td>
                    </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
</body>

</html>