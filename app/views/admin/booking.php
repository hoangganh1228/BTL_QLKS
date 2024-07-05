<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt phòng</title>

</head>

<body>
        <div class="display-6 text-center mt-3 ">Danh sách đặt phòng</div>
        <form action="" method="get" style="margin-top: 20px;" class="d-flex">
            <input name="search-ma" type="text" class="form-control " style="width: 40%;" placeholder="Nhập số phòng">
            <input name="search-ten" type="text" class="form-control " style="width: 40%;"placeholder="Nhập mã khách hàng">
            <button class="btn btn-primary " type="submit">Tìm kiếm</button>
        </form>
        <!-- <div class="">
            <a href="<?=_WEB_HOST?>/admin/datphong/add" class="btn btn-success mt-3" style="width: 100px;">Thêm</a>
        </div> -->
        <table class="mt-2 table table-bordered table-hover">
            <thead>
                <tr class="text-bg-dark">
                    <th>Id</th>
                    <th>Ngày đặt </th>
                    <th>Ngày trả</th>
                    <th>Số phòng</th>
                    <th>Mã khách</th>
                    <th>Trạng thái đặt</th>
                    <th>Trạng thái thanh toán</th>
                    <th style="width: 5%;">Sửa</th>
                    <th style="width: 5%;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                            foreach ($table as $row) :
                            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['check_in'] ?></td>
                    <td><?php echo $row['check_out'] ?></td>
                    <td><?php echo $row['sophong'] ?></td>
                    <td><?php echo $row['makhachhang'] ?></td>
                    <td><?php echo $row['trangthaidat'] ?></td>
                    <td><?php echo $row['trangthaitt'] ?></td>
                    <td><a class="btn btn-warning"
                            href="<?= _WEB_HOST ?>/admin/datphong/edit_datphong/<?= $row['id'] ?>">Sửa</a>
                    </td>
                    <td><a href="<?= _WEB_HOST ?>/admin/datphong/delete_datphong/<?= $row['id'] ?>"
                            class="btn btn-danger" onclick="return confirm('Xác nhận xóa!')">Xóa</a></td>
                </tr>
                <?php
                            endforeach;
                            ?>
            </tbody>
        </table>
</body>

</html>