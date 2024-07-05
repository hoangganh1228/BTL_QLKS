<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'configs/bootstrap.php'?>
    <title>Document</title>
</head>
<body>
    <?php $this->view('client/layouts/header', [])?>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 px-4">
                <div class="card-body">
                    <form action="payAtmMomo" method="POST" id="booking_form">
                        <h6 class="mb-3">Chi tiết phòng</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Số phòng</label>
                                <input name="sophong" type="text" value="<?php echo $thongTinPhong['sophong']?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Loại phòng</label>
                                <input name="loaiphong" type="text" value="<?php echo $thongTinPhong['tenloaiphong']?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Số tầng: </label>
                                <input name="sotang" type="number" value="<?php echo $thongTinPhong['sotang']?>" class="form-control shadow-none" required>
                            </div><div class="col-md-6 mb-3">
                                <label class="form-label">Số lượng: </label>
                                <input name="soluong" type="number" value="<?php echo $thongTinPhong['soluongkhach']?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Trạng thái</label>
                                <textarea name="trangthai" class="form-control shadow-none" rows="1"><?php echo $thongTinPhong['trangthai']?></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Giá</label>
                                <textarea name="gia" class="form-control shadow-none" rows="1"><?php echo $thongTinPhong['gia']?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Check-in</label>
                                <input name="checkin" type="date" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Check-out</label>
                                <input name="checkout" type="date" class="form-control shadow-none" required>
                            </div>
                            <?php
                                if(isLogin()) {
                                    echo<<<data

                                    <div class="col-12">
                                        <button name="pay_now" class="btn w-100 " >Thanh toán ngay</button>
                                    </div>

                                    data;
                                } else {
                                    echo<<<data

                                    <div class="col-12">
                                        <button class="btn w-100"> <a href="login">Thanh toán ngay</a> </button>
                                    </div>

                                    data;
                                }
                            ?>
                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 px-4 ">
                
                <?php
                    $path = $path = _WEB_HOST.'/public/img/rooms/';
                    $roomPriceFormat = formatNumber($thongTinPhong['gia']);
                    echo<<<data

                        <div class="card p-3 shadow-sm rounded">
                            <img src="$path$thongTinPhong[anh]" class="img-fluid rounded mb-3">
                           
                        </div>

                    data;
                ?>

            </div>
        </div>
    </div>

    
</body>
</html>