<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        require_once 'configs/bootstrap.php';
    ?>
    <title>Danh sách tầng</title>
</head>
<body>
    <div class="display-6 text-center">Danh sách tầng</div>
    <form action="" method="get" class="row justify-content-center mt-3 p-0">
            <div class="col-md-4 mb-2">
                <input name="sotang" type="number" class="form-controll w-100 h-100" placeholder="Nhập số tầng">
            </div>
            <div class="col-md-4">
                <select class="form-controll h-100" name="trangthai">
                    <option value="" selected>Chọn trạng thái</option>
                    <?php
                    foreach ($trangthai as $value)
                    {
                        echo '<option value="' . $value . '" >' .$value . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <button class="btn btn-outline-secondary" type="submit" >Tìm kiếm</button>
            </div>
    </form>
    <div class="">
            <a href="<?=_WEB_HOST?>/admin/tang/tang_add" class="btn btn-outline-secondary mt-3" style="width: 100px;">Thêm</a>
    </div>
    <table class="mt-2 table table-bordered table-hover">
        <thead>
            <tr class="text-bg-dark">
                <th>Số tầng</th>
                <th>Số lượng phòng</th>
                <th>Trạng thái</th>
                <th>Ghi chú</th>
                <th style="width: 15%;">Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if (empty($table)) :
            ?>
                <tr>
                    <td colspan="10">
                        <div class="alert alert-danger text-center">Không tìm thấy tầng</div>
                    </td>
                </tr>
                <?php
            else :
            foreach ($table as $row) :
            ?>
                <tr>
                    <td><?php echo $row['sotang'] ?></td>
                    <td><?php echo $row['soluongphong'] ?></td>
                    <td><?php echo $row['trangthai'] ?></td>
                    <td><?php echo $row['ghichu'] ?></td>
                    <td>
                        <a href="<?= _WEB_HOST ?>/admin/tang/tang_edit/<?= $row['sotang'] ?>" class="btn btn-warning">Sửa</a>
                        <a href="<?= _WEB_HOST ?>/admin/tang/tang_delete/<?= $row['sotang'] ?>" class="btn btn-danger" onclick="return comfim('Xác nhận xóa!')">Xóa</a>
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