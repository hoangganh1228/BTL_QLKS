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
           if(isPost()) {
             
            $filterAll = filter();

            if(!empty($filterAll)) {
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $currentDateTime = new DateTime();
                $formattedDateTime = $currentDateTime->format('Y-m-d');
                // echo '<pre>';
                // print_r($formattedDateTime);
                // echo '</pre>';
                
                $dataInsert = [
                    'ten' => $filterAll['hoten'],
                    'email' => $filterAll['email'],
                    'chude' => $filterAll['chude'],
                    'noidung' => $filterAll['ghichu'],
                    'ngay' => $formattedDateTime
                ];
                // echo '<pre>';
                // print_r($dataInsert);
                // echo '</pre>';
    
                $this->model->insert('lien_he', $dataInsert);
            }

           }

            $this->view('client/contact', []);
            
        }

        
    }
?>