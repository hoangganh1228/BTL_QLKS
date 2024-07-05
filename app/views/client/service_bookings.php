<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'configs/bootstrap.php'?>
    <title>Document</title>
</head>
<body>
    <?php $this->view('inc/header', []);?>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 px-4">
                <div class="card-body">
                    <form action="payAtmMomoService" method="POST" id="booking_form">
                        <h6 class="mb-3">Chi tiết đặt dịch vụ</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tên dịch vụ</label>
                                <input name="tendichvu" type="text" value="<?php echo $thongTinDichVu['tendichvu']?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Giá: </label>
                                <input name="gia" type="text" value="<?php echo $thongTinDichVu['gia']?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Số lượng: </label>
                                <input name="soluong" type="number" class="form-control shadow-none" value="1" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Mô tả</label>
                                <textarea name="mota" class="form-control shadow-none" rows="5"><?php echo $thongTinDichVu['mota']?></textarea>
                            </div>
                            <input type="hidden" name="madichvu" value="<?php echo $thongTinDichVu['madichvu']?>">
                            <div class="col-12">
                                <button name="pay_now" class="btn w-100 " >Thanh toán ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 px-4 ">
                <?php
                    $path = _WEB_HOST.'/public/img/service/' . $thongTinDichVu['anh'];

                    echo<<<data

                        <div class="card p-3 shadow-sm rounded">
                            <img style="width: 200px; height: 200px;" src="$path.png" class="img-fluid rounded mb-3">
                            <h5>$thongTinDichVu[tendichvu]</h5>
                            <h6>$thongTinDichVu[gia] VND  </h6>
                        </div>

                    data;
                ?>
            </div>
        </div>
    </div>

    

    
</body>
</html>