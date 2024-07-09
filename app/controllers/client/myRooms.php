<?php
    class myRooms extends Controller
    {
        private $data, $model;

        function __construct()
        {
            $this->model = $this->model('Database');
        }
        function index()
        {
            // echo '<pre>';
            // print_r($_SESSION);
            // echo '</pre>';
            $condition = "";
            if(isset($_SESSION) && !empty($_SESSION)) {
                if(!empty($_SESSION['userData'])) {
                    $maKhachHang = $_SESSION['userData']['socancuoc'];
                    $condition = "WHERE kh.socancuoc = '$maKhachHang'";

                    $filterAll = filter();
                    if(!empty($filterAll)) {
                        if((isset($filterAll['typeRoom']) && $filterAll['typeRoom'] != '0')) {
                            $typeRoom = $filterAll['typeRoom'];
                            $condition .= " AND lp.maloaiphong = '$typeRoom'";
                        }
                        $orderBy = "";
                        if (isset($filterAll['typeSort']) && $filterAll['typeSort'] != '0') {
                            $typeSort = $filterAll['typeSort'];
                            $orderBy = "ORDER BY lp.gia $typeSort";
                            $condition .= " $orderBy";

                        }
                    }

                    // echo $condition;

                    $roomData = $this->model->select(['ddp.trangthai, ddp.ngaydat, ddp.tiencoc, kh.ten, kh.socancuoc, ctdp.checkin, ctdp.checkout, p.sophong, p.sotang, p.maloaiphong, p.anh, lp.tenloaiphong, lp.mota, lp.soluongkhach, ctdp.thanhtien'], "don_dat_phong AS ddp JOIN khach_hang AS kh ON ddp.makhach = kh.socancuoc JOIN chi_tiet_dat_phong AS ctdp ON ctdp.iddatphong = ddp.id JOIN phong AS p ON p.sophong = ctdp.sophong JOIN loai_phong AS lp ON lp.maloaiphong = p.maloaiphong", $condition);
                    $this->view('client/myRooms', ['roomData' => $roomData]);
                }
            }
            
            // $roomData1 = $this->model->select([], "don_dat_phong AS ddp JOIN khach_hang AS kh ON ddp.makhach = kh.socancuoc JOIN chi_tiet_dat_phong AS ctdp ON ctdp.iddatphong = ddp.id JOIN phong AS p ON p.sophong = ctdp.sophong JOIN loai_phong AS lp ON lp.maloaiphong = p.maloaiphong", "WHERE kh.socancuoc = '$maKhachHang'");
            // echo '<pre>';
            // print_r($roomData1);
            // echo '</pre>';
            
            // echo '<pre>';
            // print_r($roomData);
            // echo '</pre>';
        }

        
    }
?>