<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        require_once 'configs/bootstrap.php';
        require_once('layout.php');
    ?>

    <title>Danh sách nhân viên</title>
</head>


<body>
    <div class="container-fluid">
        <div class="col-lg-10 w-100 p-4 overflow-hidden ml-0">
            <h3 class="mb-4">Danh sách nhân viên</h3>
            <hr>
            <div class="container_css ">
                <div class="">
                    <a href="<?=_WEB_HOST?>/admin/nhan_vien/add" class="btn btn-success btn-sm">Thêm mới <i
                            class=" fa-solid fa-plus"></i></a>
                </div>
                <div class="col-md-6">
                    <form action="" method="get" style="margin-top: 20px;">
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-auto">
                                <input name="search-ma" type="text" class="form-control"
                                    placeholder="Nhập mã nhân viên">
                            </div>
                            <div class="col-auto">
                                <input name="search-ten" type="text" class="form-control"
                                    placeholder="Nhập tên nhân viên">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="table-responsive-lg">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr class="bg-dark text-light">
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Số điện thoại</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th style="width: 11%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if(empty($table)):
                ?>
                        <tr>
                            <td colspan="10">
                                <div class="alert alert-danger text-center">Không tìm thấy nhân viên nào</div>
                            </td>
                        </tr>
                        <?php
                    else:
                    foreach ($table as $row) :
                ?>

                        <tr>
                            <td><?php echo $row['ma_nhanvien'] ?></td>
                            <td><?php echo $row['ten_nhanvien'] ?></td>
                            <td><?php echo $row['sodienthoai'] ?></td>
                            <td><?php echo $row['gioitinh'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['taikhoan'] ?></td>
                            <td><?php echo $row['matkhau'] ?></td>
                            <td>
                                <a href="<?= _WEB_HOST ?>/admin/nhan_vien/edit_nhanvien/<?= $row['ma_nhanvien'] ?>"
                                    class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="<?= _WEB_HOST ?>/admin/nhan_vien/delete_nhanvien/<?= $row['ma_nhanvien'] ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    endif;
                ?>

                    </tbody>
                </table>
            </div>

        </div>

    </div>
</body>


</html>