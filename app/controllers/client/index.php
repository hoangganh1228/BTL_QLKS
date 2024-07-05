<?php
    class Index extends Controller
    {
        private $data, $model;

        function __construct()
        {
            $this->model = $this->model('Database');
        }
        function index()
        {
            $roomData =  $this->model->select([], "phong AS p JOIN loai_phong AS lp ON p.maloaiphong = lp.maloaiphong", "");
            $serviceData = $this->model->select([], 'dich_vu', '');
            // $this->isLogin();
            $this->view('client/index', ['roomData' => $roomData, 'serviceData' => $serviceData]);
        }

        
    }
?>