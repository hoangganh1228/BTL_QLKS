<?php
    class pay_status extends Controller
    {
        private $data, $model;

        function __construct()
        {
            $this->model = $this->model('Database');
        }
        function index()
        {
            if(isGet()) {
                $filterAll = filter();
                // echo '<pre>';   
                // print_r($filterAll);
                // echo '</pre>';
                if(isset($_SESSION['info_order'])) {
                    $maKhachHang = $_SESSION['userData']['socancuoc'];
                    $soPhong = $_SESSION['info_order']['sophong'];
                    if($filterAll['message'] == 'Successful.') {
                        $dataInsert1 = [
                            'sophong' => $_SESSION['info_order']['sophong'],
                            'maKhachHang' => $maKhachHang,
                            'check_in' => $_SESSION['info_order']['checkin'],
                            'check_out' => $_SESSION['info_order']['checkout'],
                            'trangthaidat' => "Thành công.",
                            'trangthaitt' => "Thành công."
                        ];
                        $query1 = $this->model->insert('dat_phong', $dataInsert1);
                        
                         // Lấy ID của bản ghi vừa chèn
                        $lastInsertId = $this->model->lastInsertId(); // Giả sử bạn có hàm này trong model để lấy ID cuối cùng  
                        
    
                           
    
                        $dataInsert2 = [
                            'bookingid' => $lastInsertId,
                            'thanhtien' => $_SESSION['info_order']['thanhtien'],
                            'ngaythanhtoan' => $_SESSION['info_order']['thoigian']
                            
                        ];
                        $query2 = $this->model->insert('chi_tiet_phong', $dataInsert2);
    
                        $editData = [
                            'trangthai' => 'Hết',
                            'makhach' =>$maKhachHang
                        ];
                        $updateData = $this->model->update('phong', $editData, "WHERE sophong = '$soPhong'");
                        
                    }
                }

                if(isset($_SESSION['info_service'])) {
                    $maKhachHang = $_SESSION['userData']['socancuoc'];
                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                    $day_order  = $currentDateTime = date('Y-m-d H:i:s');
                    // $soPhong = $_SESSION['info_order']['sophong'];
                    if($filterAll['message'] == 'Successful.') {
                        $dataInsert1 = [
                            'trangthaitt' => "Thanh cong",
                            'makhach' => $maKhachHang,
                            'ngaydat' => $_SESSION['info_service']['thoigian'],
                            'thanhtien' => $_SESSION['info_service']['thanhtien'],
                            'ngaythanhtoan' => $day_order
                        ];
                            // echo '<pre>';   
                            // print_r($_SESSION);
                            // echo '</pre>';
                        $query1 = $this->model->insert('dat_dich_vu', $dataInsert1);
                        
                        // Lấy ID của bản ghi vừa chèn
                        $lastInsertId = $this->model->lastInsertId(); // Giả sử bạn có hàm này trong model để lấy ID cuối cùng  
                        
                        $dataInsert2 = [
                            'iddatdv' => $lastInsertId,
                            'madichvu' => $_SESSION['info_service']['madichvu'],
                            'soluong' => $_SESSION['info_service']['soluong'],
                            'thanhtien' => $_SESSION['info_service']['thanhtien']
                        ];
                        $query2 = $this->model->insert('chi_tiet_dich_vu', $dataInsert2);
    
                        // $editData = [
                        //     'trangthai' => 'Hết'
                        // ];
                        // $updateData = $this->model->update('phong', $editData, "WHERE sophong = '$soPhong'");
                    }


                   
                }
            }
            // $this->isLogin();
            $this->view('client/pay_status', ['filterAll' => $filterAll]);
        }

        
    }
?>