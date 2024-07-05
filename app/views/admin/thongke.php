<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <script>
        window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: ""
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: <?php echo json_encode($chart, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        }
</script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>
<body>
    <div class="display-6 text-center mb-2">Thống kê</div>
    <ul class="nav justify-content-center text-bg-color text-white">
        <li class="nav-item btn btn-primary">
            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/thongke">Chung</a>
        </li>
        <li class="nav-item btn btn-secondary">
            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/thongke/phong">Tiền phòng</a>
        </li>
        <li class="nav-item btn btn-secondary">
            <a class="nav-link text-white" href="<?=_WEB_HOST?>/admin/thongke/dichvu">Tiền dịch vụ</a>
        </li>
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
                            <input name="end" id="start" type="date" class="form-control" style="width: auto; margin-left: 5%" placeholder="Đến ngày">
                        </li>
                        <li type="none" class="">
                            <button class="btn btn-success mt-2" type="submit">Lọc</button>
                        </li>
                    </ul>
                </form>
                </div>
                <div class="col-lg-6 p-3 my-3 border">
                    <div class="text-center">Tổng doanh thu: <?=formatNumber($tongdoanhthu)?> VND</div>
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>
</body>
</html>