<?php
    class Rooms extends Controller
    {
        private $data, $model;
    
        function __construct()
        {
            $this->model = $this->model('Database');
        }
    
        function index()
        {
            // $this->isLogin();
            
            // echo '<pre>';   
            // print_r($roomData);
            // echo '</pre>';
            $this->filterRoom();
        }
    
        function filterRoom() {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $filterAll = filter();
            $today_date  = new DateTime(date("Y-m-d"));
            
            
            // echo '<pre>';   
            // print_r($today_date);
            // echo '</pre>';
            
            $condition = [];
            if (isset($filterAll['typeRoom']) && $filterAll['typeRoom'] != '0') {
                $typeRoom = $filterAll['typeRoom'];
                $condition[] = "lp.maloaiphong = '$typeRoom'";
            }
            if (isset($filterAll['checkin']) && isset($filterAll['checkout'])) {
                $checkin_date = $filterAll['checkin'];
                $checkout_date = $filterAll['checkout'];
                $condition[] = "p.sophong NOT IN (
                    SELECT sophong FROM dat_phong 
                    WHERE ('$checkin_date' BETWEEN check_in AND check_out)
                    OR ('$checkout_date' BETWEEN check_in AND check_out)
                    OR (check_in BETWEEN '$checkin_date' AND '$checkout_date')
                    OR (check_out BETWEEN '$checkin_date' AND '$checkout_date')
                )";
                }
    
            // Sắp xếp
            $orderBy = "";
            if (isset($filterAll['typeSort']) && $filterAll['typeSort'] != '0') {
                $typeSort = $filterAll['typeSort'];
                $orderBy = "ORDER BY lp.gia $typeSort";
            }
            
            $where = "";
            if (!empty($condition)) {
                $where = "WHERE " . implode(" AND ", $condition);
            }
            

            // Gọi phương thức select từ model
            $roomData = $this->model->select([], "phong AS p JOIN loai_phong AS lp ON p.maloaiphong = lp.maloaiphong", $where . " " . $orderBy);
            
            // echo '<pre>';   
            // print_r($roomData);
            // echo '</pre>';
    
            // Hiển thị view
            $this->view('client/rooms', ['roomData' => $roomData]);
        }
    }
    
?>