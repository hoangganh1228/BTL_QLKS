<?php
class service_bookings extends Controller
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
            $madichvu = $filterAll['id'];
            $thongTinDichVu = $this->model->select([], 'dich_vu', "WHERE madichvu = '$madichvu'")[0];
            // echo '<pre>';   
            // print_r($thongTinDichVu);
            // echo '</pre>';
            $this->view('client/service_bookings', ['thongTinDichVu' => $thongTinDichVu]);
        } else {
            $this->view('client/confirm_bookings', []);

        }
        
        // $room_res = $this->model->select([], );
        
    }

    
}
?>