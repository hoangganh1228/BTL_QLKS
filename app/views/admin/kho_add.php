<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once 'configs/bootstrap.php';
    ?>
    <title>Thêm sản phẩm</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center text-uppercase">Thêm sản phẩm </h2>
        <hr>
        <form action="" method="post">
            <div class="row">
                <!-- <div class="col"> -->
                <div class="form-group mt-3">
                    <label for="masanpham">Mã sản phẩm:</label>
                    <input type="text" name='masanpham' id="masanpham" class="form-control"
                        placeholder=" Nhập mã sản phẩm" required>
                </div>
                <div class="form-group mt-3">
                    <label for="tensanpham">Tên sản phẩm:</label>
                    <input type="text" name='tensanpham' id="tensanpham" class="form-control"
                        placeholder="Nhập tên sản phẩm" required>
                </div>



                <!-- </div> -->
                <!-- <div class=" col"> -->
                <div class="form-group mt-3">
                    <label for="soluong">Số lượng:</label>
                    <input type="number" name='soluong' id="soluong" class="form-control" placeholder="Nhập số lượng"
                        required>
                </div>

                <div class="form-group mt-3">
                    <label for="gia">Giá:</label>
                    <input type="number" name='gia' id="gia" class="form-control" placeholder="Nhập giá" required>
                </div>


                <!-- </div> -->
            </div>


            <div class="mt-4  align-items-center">
                <button type="submit" id="btnThem" class="btn btn-success mx-auto">Lưu thông tin</button>
                <a href="<?=_WEB_HOST?>/admin/kho/list_kho" class="btn btn-danger">Quay lại</a>
            </div>
        </form>
    </div>

</body>

</html>