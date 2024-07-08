<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once 'configs/bootstrap.php';

        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';     

 
        
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart1);

        function drawChart1() {
            <?php if(!empty($data)): ?>
                var data = google.visualization.arrayToDataTable([
                    ['Dịch vụ', 'Doanh thu'],
                    <?php
                        foreach($data as $row) {
                            echo "['{$row['ten_dich_vu']}', {$row['doanh_thu']}],";
                        }
                    ?>
                ]);

                var options = {
                title: 'Biểu đồ thống kê doanh thu từng dịch vụ'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            <?php else: ?>
                document.getElementById('piechart').innerHTML = '<h3>Không có dữ liệu</h3>';
            <?php endif;?>
        }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                <?php if(!empty($data)):?>

                    var data = google.visualization.arrayToDataTable([
                        ['Dịch vụ', 'Số lượng'],
                        <?php
                            foreach($data as $row) {
                                echo "['{$row['ten_dich_vu']}', {$row['so_luong']}],";
                            }
                        ?>
                    
                    ]);

                    var options = {
                        chart: {
                            title: 'Số lượng phòng',
                            subtitle: `Xem số lượng dịch vụ đã đặt từ ${formatDate(start.value)} đến ${formatDate(end.value)}`,
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
            
                }
                <?php endif?>
        </script>
</head>
<body>
    
    <div class="display-6 text-center mb-2">Thống kê</div>
    <ul class="nav justify-content-center text-bg-color text-white">
        <?php 
            $path = _WEB_HOST;
            if(isset($_GET) && !empty($_GET)) {
                echo<<<data
                    <li class="nav-item btn btn-secondary">
                        <a class="nav-link text-white" href="$path/admin/thong_ke?start=$_GET[start]&end=$_GET[end]">Chung</a>
                    </li>
                    <li class="nav-item btn btn-secondary">
                        <a class="nav-link text-white" href="$path/admin/thong_ke_phong?start=$_GET[start]&end=$_GET[end]">Tiền phòng</a>
                    </li>
                    <li class="nav-item btn btn-primary">
                        <a class="nav-link text-white" href="$path/admin/thong_ke_dich_vu?start=$_GET[start]&end=$_GET[end]">Tiền dịch vụ</a>
                    </li>
                data;
            } else {
                echo<<<data

                    <li class="nav-item btn btn-secondary">
                        <a class="nav-link text-white" href="$path/admin/thong_ke">Chung</a>
                    </li>
                    <li class="nav-item btn btn-secondary">
                        <a class="nav-link text-white" href="$path/admin/thong_ke_phong">Tiền phòng</a>
                    </li>
                    <li class="nav-item btn btn-primary">
                        <a class="nav-link text-white" href="$path/admin/thong_ke_dich_vu">Tiền dịch vụ</a>
                    </li>

                data;
            }
        ?>

    </ul>
        <div class="row mt-1 mx-auto">
            <div class="col-lg-6 p-3 my-3 border">
                <div class="display-5 text-center">Chi tiết</div>
                <form action="" method="GET" class="">
                    <ul class="pt-5">
                        <li class="d-flex">
                            <label for="Từ ngày">Từ ngày:</label>
                            <input name="start" id="start" type="date" class="form-control" style="width: auto; margin-left: 5%" placeholder="Từ ngày">
                        </li>
                        <li class="d-flex mx-auto mt-3">
                            <label for="Đến ngày">Đến trước ngày:</label>
                            <input name="end" id="end" type="date" class="form-control" style="width: auto; margin-left: 5%" placeholder="Đến ngày">
                        </li>
                        <li type="none" class="">
                            <button class="btn btn-success mt-2" type="submit">Lọc</button>
                            
                            <button class="btn btn-danger mt-2" id="reset">Reset</button>

                        </li>
                        <li type="none" class="">
                        </li>
                    </ul>
                </form>
                </div>
                <div class="col-lg-6 p-3 my-3 border">
                    <?php
                        if(!empty($data)) {
                            $tongDoanhThu = 0;
                            
                            foreach($data as $row) {
                                $tongDoanhThu += $row['doanh_thu'];
                            }
                            $tongDoanhThu = formatNumber($tongDoanhThu);
                            echo<<<data
                                <div class="text-center">Tổng doanh thu: $tongDoanhThu VND</div>
                            data;
                        } else {
                            echo "<script>
                                document.getElementById('piechart').innerHTML = '<h3>Không có doanh thu trong khoảng thời gian này</h3>';
                            </script>";
                        }

                    ?>
                    <div id="piechart" style="width: 100%;; height: 300px;"></div>
                    <div id="columnchart_material" style="width: 100%;; height: 300px;"></div>
                </div>
            </div>
        </div>
</body>
<script>
    var start = document.querySelector('input[name="start"]');
    var end = document.querySelector('input[name="end"]');
    var resetButton = document.getElementById('reset');
    
    let url = new URL(window.location.href);
    if(url.searchParams.get('start')) {
        value = url.searchParams.get('start');
        start.value = value;
    }

    if(url.searchParams.get('end')) {
        value = url.searchParams.get('end');
        end.value = value;
    }


    if(resetButton) {
        resetButton.addEventListener("click", function(e) {
            e.preventDefault();
            url.searchParams.delete('start');
            url.searchParams.delete('end');
            window.location.href = url.href.split('?')[0];
        })
    }

    function formatDate(inputDate) {
        // Tách chuỗi ngày thành mảng các phần tử [YYYY, MM, DD]
        const dateParts = inputDate.split('-');
        // Đảo ngược mảng và nối lại thành chuỗi theo định dạng DD-MM-YYYY
        return `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
}
    
</script>
</html>