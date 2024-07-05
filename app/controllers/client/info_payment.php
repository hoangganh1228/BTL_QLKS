<?php
    class info_payment extends Controller
    {
        private $data, $model;

        function __construct()
        {
            $this->model = $this->model('Database');
        }
        function index()
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            
           
            if(isPost()) {
                $filterAll = filter();
                // echo '<pre>';   
                // print_r($filterAll);
                // echo '</pre>';
                $today_date  = new DateTime(date("Y-m-d"));
        
                $checkin_date = new DateTime($filterAll['checkin']);
                $checkout_date = new DateTime($filterAll['checkout']);
                
                // print_r($checkin_date) ;
                // echo '<pre>';
                // print_r($checkout_date) ;
                $dataSession = [
                    'sophong' => $filterAll['sophong'],
                    'loaiphong' => $filterAll['loaiphong'],
                    'sotang' => $filterAll['sotang'],
                    'gia' => $filterAll['gia'],
                    'trangthai' => $filterAll['trangthai'],
                    'checkin' => $filterAll['checkin'],
                    'checkout' => $filterAll['checkout'],
                ];
                $_SESSION['room'] = $dataSession;
                // echo '<pre>';   
                // print_r($_SESSION);
                // echo '</pre>';
                // run query to check room is available or not
                $count_days = date_diff($checkin_date, $checkout_date)->days;  
                // echo $count_days; 
                $thanhtien = $_SESSION['room']['gia'] * $count_days;
                // echo $payment;
                $_SESSION['room']['thanhtien'] = $thanhtien;
                echo '<pre>';   
                print_r($_SESSION);
                echo '</pre>';
                
                // $_SESSION['room']['available'] = true;
            }
            // $this->isLogin();
            // $this->view('client/index', []);
        }

        
    }
?>