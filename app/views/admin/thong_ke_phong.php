<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once 'configs/bootstrap.php';

        // Kiểm tra và hiển thị giá trị của $data để debug
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';     
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        <?php if(!empty($data['rooms'])): ?>
            var data = google.visualization.arrayToDataTable([
                ['Phòng', 'Doanh thu'],
                <?php
                    foreach($data['rooms'] as $row) {
                        echo "['Phòng {$row['ten_phong']}', {$row['doanh_thu']}],";
                    }
                ?>
            ]);

            var options = {
            title: 'Biểu đồ thống kê doanh thu từng phòng'
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
            <?php if(!empty($data['rooms'])): ?>

                var data = google.visualization.arrayToDataTable([
                    ['Phòng', 'Số lượng'],
                    <?php
                        foreach($data['rooms'] as $row) {
                            echo "['Phòng {$row['ten_phong']}', {$row['so_luong']}],";
                        }
                    ?>
                ]);

                var options = {
                    chart: {
                        title: 'Số lượng phòng',
                        subtitle: `Xem số lượng phòng từ ${formatDate(start.value)} đến ${formatDate(end.value)}`,
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            <?php endif; ?>
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart3);
        
        function drawChart3() {
            <?php if(!empty($data['clientBook'])): ?>
            var data = google.visualization.arrayToDataTable([
                ['Khách hàng', 'Số lượng phòng đã đặt'],
                <?php
                    foreach($data['clientBook'] as $row) {
                        echo "['{$row['ten_khach']}', {$row['so_luong']}],";
                    }
                ?>
            ]);

            var options = {
            chart: {
                title: 'Số lượng phòng từng khách hàng',
                subtitle: `Xem số lượng phòng mà khách đặt từ ${formatDate(start.value)} đến ${formatDate(end.value)}`,
            },
            bars: 'horizontal' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
            <?php endif; ?>
        }
    </script>
</head>
<body>
    <div class="display-6 text-center mb-2">Thống kê</div>
    <ul class="nav justify-content-center text-bg-color text-white">
    <?php 
        $path = _WEB_HOST;
        if(isset($_GET) && !empty($_GET)) {
            echo <<<data
                <li class="nav-item btn btn-secondary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke?start=$_GET[start]&end=$_GET[end]">Chung</a>
                </li>
                <li class="nav-item btn btn-primary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke_phong?start=$_GET[start]&end=$_GET[end]">Tiền phòng</a>
                </li>
                <li class="nav-item btn btn-secondary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke_dich_vu?start=$_GET[start]&end=$_GET[end]">Tiền dịch vụ</a>
                </li>
            data;
        } else {
            echo <<<data
                <li class="nav-item btn btn-secondary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke">Chung</a>
                </li>
                <li class="nav-item btn btn-primary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke_phong">Tiền phòng</a>
                </li>
                <li class="nav-item btn btn-secondary">
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
                if (!empty($data['rooms'])) {
                    $tongDoanhThu = 0;
                    foreach ($data['rooms'] as $row) {
                        $tongDoanhThu += $row['doanh_thu'];
                    }
                    $tongDoanhThu = formatNumber($tongDoanhThu);
                    echo "<div class=\"text-center\">Tổng doanh thu: $tongDoanhThu VND</div>";
                } else {
                    echo "<script>
                        document.getElementById('piechart').innerHTML = '<h3>Không có doanh thu trong khoảng thời gian này</h3>';
                    </script>";
                }
            ?>
            <div id="piechart" style="width: 100%; height: 300px;"></div>
            <div id="columnchart_material" style="width: 100%; height: 300px;"></div>
            <div id="barchart_material" style="width: 100%; height: 300px;"></div>
        </div>
    </div>
</body>
<script>
    var start = document.querySelector('input[name="start"]');
    var end = document.querySelector('input[name="end"]');
    var resetButton = document.getElementById('reset');

    let url = new URL(window.location.href);
    if (url.searchParams.get('start')) {
        value = url.searchParams.get('start');
        start.value = value;
    }

    if (url.searchParams.get('end')) {
        value = url.searchParams.get('end');
        end.value = value;
    }

    if (resetButton) {
        resetButton.addEventListener("click", function(e) {
            e.preventDefault();
            url.searchParams.delete('start');
            url.searchParams.delete('end');
            window.location.href = url.href.split('?')[0];
        });
    }

    function formatDate(inputDate) {
        const dateParts = inputDate.split('-');
        return `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
    }
</script>
</html>
