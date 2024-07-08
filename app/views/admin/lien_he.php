<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng</title>
    <?php
        require_once 'configs/bootstrap.php';
    ?>

</head>

<body>
        <div class="display-6 text-center mt-3">Danh sách phòng</div>
        <form action="" method="get" class="d-flex" style="margin-top: 20px;">
            <input name="keyword" type="text" class="form-control" style="width: 40%;" placeholder="Nhập tên khách hàng">
            <button class="btn btn-primary " type="submit">Tìm kiếm</button>
        </form>
        <div class="">
            <a href="<?=_WEB_HOST?>/admin/phong/add" class="btn btn-success mt-3" style="width: 100px;">Thêm</a>
        </div>
        <table class="mt-2 table table-bordered table-hover">
            <thead>
                <tr class="text-bg-dark">
                    <th>#</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Chủ đề</th>
                    <th>Nội dung</th>
                    <th>Ngày</th>
                    <th style="width: 10%;">Phản hồi</th>
                    <th style="width: 5%;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($data as $row) {
                        $path =  _WEB_HOST;
                        echo<<<data
                            <tr>
                                <td>$i</td>
                                <td>$row[ten]</td>
                                <td>$row[email]</td>
                                <td>$row[chude]</td>
                                <td>$row[noidung]</td>
                                <td>$row[ngay]</td>
                                <td>
                                    <a href="$path/admin/response_lienhe?id=$row[id]"
                                    class="btn btn-primary">Phản hồi</a>
                                </td>
                                <td>
                                    <a href="$path/admin/delete_lienhe?id=$row[id]"
                                    class="btn btn-danger" onclick="return confirm('Xác nhận xóa!')">Xóa</a>
                                </td>
                             </tr>
                        data;
                        $i++;
                    }

                ?>               
            </tbody>
        </table>
</body>

</html>