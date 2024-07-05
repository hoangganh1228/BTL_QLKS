<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel - ROOMS</title>
    <?php require 'configs/bootstrap.php';?>
</head>
<?php
    if(isLogin()) {
        echo<<<dataService


        dataService;
    }
?>

<body class="bg-light">

    <?php $this->view('inc/header', []);?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Dịch vụ</h2>
        <div class="h-line bg-dark"></div>

    </div>
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-9 col-md-12 px-4 mb-lg-0 mb-md-0 mb-3"> -->
                <?php
                    $path = _WEB_HOST.'/public/img/service/';
                    if(isLogin()) {
                        foreach($serviceData as $service) {
                            // echo $path.$service['anh'];
                            $servicePriceFormat = formatNumber($service['gia']);
                            echo <<<data
                                <div class="card mb-4 border-0 shadow" >
                                    <div class="row g-0 p-3 align-items-center">
                                        <div class="col-md-5 mb-lg-0 mb-3">
                                            <img src="$path$service[anh].png" class="img-fluid rounded">
                                        </div>
    
                                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                            <h5 class="mb-3">$service[tendichvu]</h5>
    
                                        </div>
                                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                            <h6 class="mb-4">$servicePriceFormat VND / người</h6>
                                            <a href="service_bookings?id=$service[madichvu]" class="btn btn-sm w-100 mt-2 btn-outline-dark">Chi tiết dịch vụ</a>
                                        </div>
                                    </div>
                                </div>
                    
    
                            data;
                        }  
                    } else {
                        
                        foreach($serviceData as $service) {
                            echo<<<data
                                <div class="col-lg-4 col-md-6 mb-5 px-4">
                                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop" style="height:204px">
                                        <div class="d-flex align-items-center mb-2">
                                            <img src=$path$service[anh].png width="40px">
                                            <h5 class="m-0 ms-3"$service[tendichvu]</h5>
                                        </div>
                                        <p>$service[mota]</p>
                                    </div>
                                </div>
                            data;
                        }
                    }
                    
 

                
                ?>
            </div>

        </div>
    </div>







</body>

</html>