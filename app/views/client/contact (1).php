<?php
    class Contact extends Controller
    {
        private $data, $model;

        function __construct()
        {
            $this->model = $this->model('Database');
        }
        function index()
        {
            
            // $this->isLogin();

            $this->view('client/contact', []);
            
        }

        
    }
?>