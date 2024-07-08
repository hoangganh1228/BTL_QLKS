<?php
class Thong_Ke extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');;
    }

    function index()
    {
        $filterAll = filter();
        $res = [];
        // $res['phong'] = 0;
        // $res['dichvu'] = 0;
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
        
                $condition1 = " WHERE
                    ((ctdp.checkin BETWEEN '$start' AND '$end')
                    OR
                    (ctdp.checkout BETWEEN '$start' AND '$end')) 
                    AND 
                    (ddp.trangthai = 'da thanh toan' OR ddp.trangthai = 'da huy')  
                ";
                $condition2 = " WHERE
                    ctddv.ngaydat BETWEEN '$start' AND '$end'
                ";
                
                $data1 = $this->model->select(['SUM(tongtien) AS tong_tien'], "don_dat_phong AS ddp JOIN chi_tiet_dat_phong AS ctdp ON ddp.id = ctdp.iddatphong", $condition1);
                
                $data2 = $this->model->select(['SUM(ctddv.thanhtien) AS tong_tien'], "chi_tiet_dat_dich_vu AS ctddv JOIN chi_tiet_dat_phong AS ctdp ON ctddv.iddatphong = ctdp.iddatphong JOIN dich_vu AS dv ON ctddv.madichvu = dv.madichvu", $condition2);
        
                // echo '<pre>';   
                // print_r($data1);
                // echo '</pre>';
                $cnt = 0;
               
                if(!empty($data1)) {
                    $res['phong'] = $data1[0]['tong_tien'];
                } 
        
                if(!empty($data2)) {
                    $res['dichvu'] = $data2[0]['tong_tien'];
                } 
     
            }                     

        } 

        $this->view('admin/layout', [
            'page' => 'admin/thong_ke',
            'res' => $res
        ]);

        


    }

 
}
