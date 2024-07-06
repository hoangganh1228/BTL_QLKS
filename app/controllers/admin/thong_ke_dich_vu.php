<?php
class Thong_Ke_Dich_Vu extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('ThongKeModel');;
    }

    function index()
    {
        $filterAll = filter();
        $data = [];
        if(!empty($filterAll)) {
            
            // echo '<pre>';
            // print_r($filterAll);
            // echo '<pre>';
            if($filterAll['start'] > $filterAll['end']) {
                echo "<script>alert('Vui lòng chọn ngày trước lớn hơn ngày sau')</script>";
            } else if($filterAll['start'] == $filterAll['end']) {
                echo "<script>alert('Vui lòng chọn ngày trước lớn hơn ngày sau')</script>";
            } else {
                $start = $filterAll['start'];
                $end = $filterAll['end'];
        
                $condition = " WHERE
                ctddv.ngaydat BETWEEN '$start' AND '$end'
                ";

                $groupCondition = $condition . " GROUP BY ctddv.madichvu";
                
                $data = $this->model->select(["ctddv.sophong AS so_phong" ,"dv.tendichvu AS ten_dich_vu" ,"SUM(ctddv.thanhtien) AS doanh_thu" ,"ctddv.soluong AS so_luong"], "chi_tiet_dat_dich_vu AS ctddv JOIN chi_tiet_dat_phong AS ctdp ON ctddv.iddatphong = ctdp.iddatphong JOIN dich_vu AS dv ON ctddv.madichvu = dv.madichvu", $groupCondition);

                
                
                
                // echo '<pre>';
                // print_r($data);
                // echo '<pre>';
               

            }                     

        } 

        $this->view('admin/thong_ke_dich_vu', ['data' => $data]);

        


    }


}
