<?php
    class Service extends Controller
    {
        private $data, $model;

        function __construct()
        {
            $this->model = $this->model('Database');
        }
        function index()
        {
            // $this->isLogin();
            $serviceData = $this->model->select([], 'dich_vu', '');
            // $sizeCount = count($serviceData);
            // echo '<pre>';   
            // print_r($serviceData);
            // echo '</pre>';
            $this->view('client/service', ['serviceData' => $serviceData]);
        }

        
    }
?>