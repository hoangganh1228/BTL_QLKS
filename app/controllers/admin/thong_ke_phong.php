<?php
class Thong_Ke_Phong extends Controller
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
                    (ctdp.checkin BETWEEN '$start' AND '$end')
                    OR
                    (ctdp.checkout BETWEEN '$start' AND '$end')    
                ";

                $groupCondition = $condition . " GROUP BY ctdp.sophong";
                
                $data = $this->model->select(["ctdp.sophong AS ten_phong", "SUM(ctdp.thanhtien) AS doanh_thu", "COUNT(ctdp.sophong) AS so_luong"], "don_dat_phong AS ddp JOIN chi_tiet_dat_phong AS ctdp ON ddp.id = ctdp.iddatphong", $groupCondition);
                
                
                
                // echo '<pre>';
                // print_r($data);
                // echo '<pre>';
               

            }                     

        } 

        $this->view('admin/thong_ke_phong', ['data' => $data]);

        


    }


}
