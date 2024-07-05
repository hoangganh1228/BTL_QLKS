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

            <div class="col-12 my-5 mb-3 px-4">
                <h2 class="fw-bold">Trạng thái thanh toán</h2>
                
            </div>

            <?php
                
                if($filterAll['message']=="Successful.") {
                    echo<<<data
                        <div class="col=12 px-4">
                            <p class="fw-bold alert alert-success">
                            <i class="bi bi-check-circle-fill"></i> 
                            Thanh toán thành công! Đã đặt được phòng thành công.
                            <br>
                            <a href='index'>Trở về trang chủ</a>
                            </p>
                        </div>
                    data;
                } else {
                    echo<<<data
                        <div class="col=12 px-4">
                            <p class="fw-bold alert alert-danger">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                                Thanh toán thất bại! 
                                <br>
                                <a href='index'>Trở về trang chủ</a>
                            </p>
                        </div>
                    data;
                }
                
            ?>

            

            
        </div>
    </div>
</body>
</html>