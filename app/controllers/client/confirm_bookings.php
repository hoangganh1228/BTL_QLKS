<?php
class Confirm_bookings extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }
    function index()
    {
        $filterAll = filter();
        if(!empty($filterAll)) {
            $soPhong = $filterAll['sophong'];

            $thongTinPhong = $this->model->select([], "phong AS p JOIN loai_phong AS lp ON p.maloaiphong = lp.maloaiphong", "WHERE p.sophong = '$soPhong'")[0];
            // echo '<pre>';   
            // print_r($thongTinPhong);
            // echo '</pre>';
            $this->view('client/confirm_bookings', ['thongTinPhong' => $thongTinPhong]);
        } else {
            $this->view('client/confirm_bookings', []);

        }
        
        // $room_res = $this->model->select([], );
        
    }

    
}
?>