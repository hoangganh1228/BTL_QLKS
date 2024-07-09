<?php
class Thong_Ke_Dich_Vu extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }

    function index()
    {
        $filterAll = filter();
        $data = [];
        $clientBook = [];

        if(!empty($filterAll)) {
            if($filterAll['start'] > $filterAll['end']) {
                echo "<script>alert('Vui lòng chọn ngày trước lớn hơn ngày sau')</script>";
            } else if($filterAll['start'] == $filterAll['end']) {
                echo "<script>alert('Vui lòng chọn ngày trước lớn hơn ngày sau')</script>";
            } else {
                $start = $filterAll['start'];
                $end = $filterAll['end'];

                $condition = " WHERE
                    ((ctddv.ngaydat BETWEEN '$start' AND '$end'))
                    AND 
                    (ddp.trangthai = 'Đã thanh toán') 
                ";

                $groupCondition = $condition . " GROUP BY ctddv.madichvu";

                // Truy vấn để lấy dữ liệu thống kê dịch vụ
                $data = $this->model->select(["ctddv.sophong AS so_phong", "dv.tendichvu AS ten_dich_vu", "SUM(ctddv.thanhtien) AS doanh_thu", "SUM(ctddv.soluong) AS so_luong"], "chi_tiet_dat_dich_vu AS ctddv JOIN don_dat_phong AS ddp ON ddp.id = ctddv.iddatphong JOIN dich_vu AS dv ON ctddv.madichvu = dv.madichvu", $groupCondition);

                // Truy vấn để lấy tổng số lượng dịch vụ theo từng khách hàng
                $clientBookCondition = $condition . " GROUP BY kh.socancuoc";
                $clientBook = $this->model->select(["kh.ten AS ten_khach", "SUM(ctddv.soluong) AS so_luong"], "chi_tiet_dat_dich_vu AS ctddv JOIN don_dat_phong AS ddp ON ddp.id = ctddv.iddatphong JOIN khach_hang AS kh ON kh.socancuoc = ddp.makhach", $clientBookCondition);

                // echo '<pre>';
                // print_r($clientBook);
                // echo '</pre>';
            }                     
        } 

        $this->view('admin/layout', [
            'page' => 'admin/thong_ke_dich_vu',
            'data' => [
                'services' => $data,
                'clientBook' => $clientBook
            ]
        ]);
    }
}



