<?php
class Thong_Ke_Phong extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }

    function index()
    {
        $filterAll = filter();
        $data = [
            'rooms' => [],       // Khởi tạo mảng con để chứa dữ liệu phòng
            'clientBook' => []   // Khởi tạo mảng con để chứa dữ liệu khách hàng
        ];

        if (!empty($filterAll)) {
            if ($filterAll['start'] > $filterAll['end']) {
                echo "<script>alert('Vui lòng chọn ngày trước lớn hơn ngày sau')</script>";
            } else if ($filterAll['start'] == $filterAll['end']) {
                echo "<script>alert('Vui lòng chọn ngày trước lớn hơn ngày sau')</script>";
            } else {
                $start = $filterAll['start'];
                $end = $filterAll['end'];
        
                $condition = " WHERE
                    ((ctdp.checkin BETWEEN '$start' AND '$end')
                    OR
                    (ctdp.checkout BETWEEN '$start' AND '$end'))   
                    AND 
                    (ddp.trangthai = 'Đã thanh toán')
                ";

                $groupCondition = $condition . " GROUP BY ctdp.sophong";
                
                $data['rooms'] = $this->model->select(
                    ["ctdp.sophong AS ten_phong", "SUM(ctdp.thanhtien) AS doanh_thu", "COUNT(ctdp.sophong) AS so_luong"],
                    "don_dat_phong AS ddp JOIN chi_tiet_dat_phong AS ctdp ON ddp.id = ctdp.iddatphong ",
                    $groupCondition
                );
                
                $groupCondition1 = $condition . " GROUP BY ctdp.iddatphong";

                $data['clientBook'] = $this->model->select(
                    ['kh.socancuoc AS ma_khach', 'kh.ten AS ten_khach', 'ddp.id AS id_dat', "COUNT(ctdp.sophong) AS so_luong"],
                    "don_dat_phong AS ddp JOIN chi_tiet_dat_phong AS ctdp ON ddp.id = ctdp.iddatphong JOIN khach_hang as kh ON ddp.makhach = kh.socancuoc",
                    $groupCondition1
                );
            }
        } 

        $this->view('admin/layout', [
            'page' => 'admin/thong_ke_phong',
            'data' => $data
        ]);
    }
}


        


