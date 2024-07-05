<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $("#tbForm #check_all").click(function() {
                $("#tbForm input[type='checkbox']").prop('checked', this.checked);
            });
        });
    </script>
</head>

<body>
    <div class="display-6 text-center">Hóa đơn phòng</div>
    <form action="" method="get" style="margin-top: 20px;">
        <input name="ten-khach" type="text" class="form-controll" style="width: 30%;" placeholder="Nhập tên khách">
        <input name="so-phong" type="text" class="form-controll" style="width: 30%;" placeholder="Nhập số phòng">
        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
    </form>
    <form id="tbForm" action="<?= _WEB_HOST ?>/admin/export/hoadondatphong" method="get">
        <button class="btn btn-success" type="submit" href="">Xuất excel</button>
        <table class="mt-2 table table-bordered table-hover">
            <thead>
                <tr class="text-bg-dark">
                    <th><input type="checkbox" name="check_all" id="check_all"></th>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Số phòng</th>
                    <th>Check in</th>
                    <th>Check out</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th>Ngày thanh toán</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($table)) :
                ?>
                    <tr>
                        <td colspan="10">
                            <div class="alert alert-danger text-center">Không tìm thấy hóa đơn</div>
                        </td>
                    </tr>
                    <?php
                else :
                    foreach ($table as $row) :
                    ?>
                        <tr>
                            <td><input type="checkbox" name="check[]" value="<?= $row['id'] ?>"></td>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['ten'] ?></td>
                            <td><?php echo $row['sophong'] ?></td>
                            <td><?php echo $row['check_in'] ?></td>
                            <td><?php echo $row['check_out'] ?></td>
                            <td><?php echo $row['gia'] ?></td>
                            <td><?php echo $row['thanhtien'] ?></td>
                            <td><?php echo $row['ngaythanhtoan'] ?></td>
                        </tr>
                <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
    </form>
</body>

</html>