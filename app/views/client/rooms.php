<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJ Hotel - Phòng </title>
    <?php require 'configs/bootstrap.php';?>
</head>

<body class="bg-light">

    <?php $this->view('inc/header', []);?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Phòng</h2>
        <div class="h-line bg-dark"></div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">BỘ LỌC</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">ĐIỀU KIỆN</h5>
                                <label class="form-label">Ngày đặt phòng </label>
                                <input type="date" name="checkin" class="form-control shadow-none mb-3">
                                <label class="form-label">Ngày trả phòng</label>
                                <input type="date" name="checkout" class="form-control shadow-none">
                                <button class="btn btn-danger mt-2" id="reset-day">Reset</button>
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Lọc theo loại phòng</label>
                                    <select class="form-control select-filter mt-2" id="room-filter" name="type">
                                        <option value="0">----Loại phòng----</option>
                                        <option value="LP01">Phòng VIP</option>
                                        <option value="LP02">Phòng gia đình</option>
                                        <option value="LP03">Phòng đôi</option>
                                        <option value="LP04">Phòng đơn</option>
                                    </select>
                                    <label for="exampleFormControlInput1" class="mt-2">Lọc theo giá</label>
                                    <select class="form-control select-filter mt-2" id="price-filter" name="type">
                                        <option value="0">----Lọc theo giá----</option>
                                        <option value="asc">Từ thấp đến cao</option>
                                        <option value="desc">Cao xuống thấp</option>
                                    </select>
                                    <button class="btn btn-danger mt-2" id="sort-clear">Clear</button>
                                </div>
                            </div>
                            <!-- <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Lọc theo giá</label>
                                    <select class="form-control select-filter mt-2" id="price-filter" name="type">
                                        <option value="0">----Lọc theo giá----</option>
                                        <option value="asc">Từ thấp đến cao</option>
                                        <option value="desc">Cao xuống thấp</option>
                                    </select>
                                    <button class="btn btn-danger mt-2" id="sort-clear">Clear</button>
                                </div>
                            </div> -->
                            <!-- <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Cấu hình</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">cấu hình 1</label>

                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">cấu hình 2</label>

                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">cấu hình 3</label>

                                </div>

                            </div>
                            
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Số lượng</h5>
                                <div class="d-flex">
                                    <div class="me-4">
                                        <label class="form-label">người lớn </label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label class="form-label">trẻ em</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                </div>

                            </div> -->
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 col-md-12 px-4 mb-lg-0 mb-md-0 mb-3">
                <?php
                    $path = _WEB_HOST.'/public/img/rooms/';
                    foreach($roomData as $room) {
                        $roomPriceFormat = formatNumber($room['gia']);
                        if($room['trangthai'] == 'Trống') {
                            echo <<<data
                                <div class="card mb-4 border-0 shadow" >
                                    <div class="row g-0 p-3 align-items-center">
                                        <div class="col-md-5 mb-lg-0 mb-3">
                                            <img src="$path$room[anh].png" class="img-fluid rounded">
                                        </div>
                                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                            <h5 class="mb-3">Số phòng: $room[sophong]</h5>

                                            <div class="guests ">
                                                <h6 class="mb-1">Guests</h6>
                                                <span class="badge bg-light text-dark text-wrap ">
                                                    Tầng: $room[sotang] 
                                                </span>
                                                <span class="badge bg-light text-dark text-wrap ">
                                                    Số lượng: $room[soluongkhach] 
                                                </span><span class="badge bg-light text-dark text-wrap ">
                                                    Trạng thái: $room[trangthai] 
                                                </span>
                                        </div>
                                        </div>
                                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                            <h6 class="mb-4">$roomPriceFormat VND mỗi đêm</h6>
                                                <a href="confirm_bookings?sophong=$room[sophong]" class="btn btn-sm w-100 mt-2 btn-outline-dark">More details</a>
                                        </div>
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

<script>
    var typeRoom = document.getElementById('room-filter');
    var priceFilter = document.getElementById('price-filter');
    var checkin = document.querySelector('input[name="checkin"]');
    var checkout = document.querySelector('input[name="checkout"]');
    var clearButton = document.getElementById('sort-clear');
    var resetButton = document.getElementById('reset-day');
                    

    if (typeRoom) {
        let url = new URL(window.location.href);
        typeRoom.addEventListener("change", function(e) {
            const value = e.target.value;
            url.searchParams.set('typeRoom', value);
            window.location.href = url.href;
        });
        const getTypeRoom = url.searchParams.get('typeRoom');
        const optionSelected = typeRoom.querySelector(`option[value='${getTypeRoom}']`);
        if (optionSelected) {
            optionSelected.selected = true;
        }
    }

    if (clearButton) {
        clearButton.addEventListener('click', function(e) {
            let url = new URL(window.location.href);
            if (url.searchParams.has('typeRoom')) {
                url.searchParams.delete('typeRoom');
            }
            if (url.searchParams.has('typeSort')) {
                url.searchParams.delete('typeSort');
            }
            window.location.href = url.href;
        });
    }

    if (priceFilter) {
        let url = new URL(window.location.href);
        priceFilter.addEventListener("change", function(e) {
            const value = e.target.value;
            url.searchParams.set('typeSort', value);
            window.location.href = url.href;
        });

        const getTypeSort = url.searchParams.get('typeSort');
        const optionSelectedPrice = priceFilter.querySelector(`option[value='${getTypeSort}']`);
        if (optionSelectedPrice) {
            optionSelectedPrice.selected = true;
        }
    }


    if(checkin) {
        let url = new URL(window.location.href);
        checkin.addEventListener("change", function(e){
            const value = e.target.value;
            url.searchParams.set('checkin', value);
            checkout.value = value;
            // window.history.pushState({}, '', url.href); // Cập nhật URL mà không tải lại trang
            window.location.href = url.href;

        })
        const checkinValue = url.searchParams.get('checkin');
        if (checkinValue) {
            checkin.value = checkinValue;
        }
    }
    if(checkout) {
        let url = new URL(window.location.href);
        checkout.addEventListener("change", function(e){
            const value = e.target.value;
            url.searchParams.set('checkout', value);
            checkin.value = value;
            // window.history.pushState({}, '', url.href); // Cập nhật URL mà không tải lại trang
            if(url.searchParams.get('checkout') == url.searchParams.get('checkin')) {
                alert("Ngày trả phòng không thể cùng ngày với ngày nhận phòng! Vui lòng chọn lại!")
            } else if(url.searchParams.get('checkout') < url.searchParams.get('checkin')) {
                alert("Ngày trả phòng không thể trước ngày nhận phòng! Vui lòng chọn lại!")
            } else {
                window.location.href = url.href;
            }
        })
        if(url.searchParams.get('checkout')) {
            const checkoutValue = url.searchParams.get('checkout');
            if (checkoutValue) {
                checkout.value = checkoutValue;
            }
        }
    }



    if (resetButton) {
        resetButton.addEventListener('click', function(e) {
            let url = new URL(window.location.href);
            if (url.searchParams.has('checkin')) {
                url.searchParams.delete('checkin');
            }
            if (url.searchParams.has('checkout')) {
                url.searchParams.delete('checkout');
            }
            
            window.location.href = url.href;
        });
    }
    
</script>


</html>