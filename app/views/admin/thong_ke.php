<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once 'configs/bootstrap.php';
        if(empty($res['phong'])) {
            $res['phong'] = 0;
        } 
        if(empty($res['dichvu'])) {
            $res['dichvu'] = 0;
        } 
        if(empty($res['tiencoc'])) {
            $res['tiencoc'] = 0;
        } 
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var phong = <?php echo $res['phong']?>;
        var dichvu = <?php echo $res['dichvu']?>;
        var tiencoc = <?php echo $res['tiencoc']?>;
        // console.log(phong);
        // console.log(dichvu);

        if(phong == 0 && dichvu == 0) {
            document.getElementById('piechart').innerHTML = '<h3>Không có dữ liệu</h3>';
            return;
        }

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Amount'],
            ['Phòng', phong],
            ['Dịch vụ', dichvu],
            ['Tiền cọc', tiencoc]
        ]);

        var options = {
          title: 'Biểu đồ thống kê doanh thu'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    
    <div class="display-6 text-center mb-2">Thống kê</div>
    <ul class="nav justify-content-center text-bg-color text-white">
    <?php 
        $path = _WEB_HOST;
        if(isset($_GET) && !empty($_GET)) {
            echo<<<data
                <li class="nav-item btn btn-primary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke?start=$_GET[start]&end=$_GET[end]">Chung</a>
                </li>
                <li class="nav-item btn btn-secondary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke_phong?start=$_GET[start]&end=$_GET[end]">Tiền phòng</a>
                </li>
                <li class="nav-item btn btn-secondary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke_dich_vu?start=$_GET[start]&end=$_GET[end]">Tiền dịch vụ</a>
                </li>
            data;
        } else {
            echo<<<data

                <li class="nav-item btn btn-primary">
                    <a class="nav-link text-white" href="$path/admin/thong_ke">Chung</a>
                </li>
                <li class="nav-item btn btn-secondary">
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
                        if($res['phong'] != 0 || $res['dichvu'] != 0 || $res['tiencoc'] != 0) {
                            $tongDoanhThu = formatNumber($res['phong'] + $res['dichvu'] + $res['tiencoc']);
                            echo<<<data
                                <div class="text-center">Tổng doanh thu: $tongDoanhThu VND</div>
                            data;
                        }
                    ?>
                    <div id="piechart" style="width: 100%;; height: 300px;"></div>
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
    
</script>
</html>