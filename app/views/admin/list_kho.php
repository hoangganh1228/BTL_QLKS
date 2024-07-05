<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        require_once 'configs/bootstrap.php';
        require_once('layout.php');
    ?>
    <title>Danh sách sản phẩm</title>
</head>


<body>
    <div class="container-fluid">
        <div class="col-lg-10 w-100 p-4 overflow-hidden ml-0">
            <h3 class="mb-4">Danh sách sản phẩm</h3>
            <hr>
            <div class="container_css ">
                <div class="">
                    <a href="<?=_WEB_HOST?>/admin/kho/add" class="btn btn-success btn-sm">Thêm mới <i
                            class=" fa-solid fa-plus"></i></a>
                </div>
                <div class="col-md-6">
                    <form action="" method="get" style="margin-top: 20px;">
                        <div class="row g-3 align-items-center mb-3">
                            <div class="col-auto">
                                <input name="search-ma" type="text" class="form-control" placeholder="Nhập mã sản phẩm">
                            </div>
                            <div class="col-auto">
                                <input name="search-ten" type="text" class="form-control"
                                    placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;;">
                <table class="table table-hover border text-center ">
                    <thead class="thead-dark">
                        <tr class="bg-dark text-light">
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>

                            <th>Số lượng</th>
                            <th>Giá</th>

                            <th style="width: 9%;">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if(empty($table)):
                ?>
                        <tr>
                            <td colspan="10">
                                <div class="alert alert-danger text-center">Không tìm thấy sản phẩm nào</div>
                            </td>
                        </tr>
                        <?php
                    else:
                    foreach ($table as $row) :
                ?>
                        <tr>
                            <td><?php echo $row['masanpham'] ?></td>
                            <td><?php echo $row['tensanpham'] ?></td>

                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['gia'] ?></td>

                            <td>
                                <a href="<?= _WEB_HOST ?>/admin/kho/edit_kho/<?= $row['masanpham'] ?>"
                                    class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="<?= _WEB_HOST ?>/admin/kho/delete_kho/<?= $row['masanpham'] ?>"
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