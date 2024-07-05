<?php
    class payAtmMomoService extends Controller
    {
        private $data, $model;

        function __construct()
        {
            $this->model = $this->model('Database');
        }
        function index()
        {
            // Kiểm tra xem form có được submit không
                // Lấy các giá trị từ POST
                if(isPost()) {
                    $filterAll = filter();
                    echo '<pre>';   
                    print_r($filterAll);
                    echo '</pre>';
                    
                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                    $today_date  = $currentDateTime = date('Y-m-d H:i:s');;
            
                    
                    $thanhtien = $filterAll['gia'] * $filterAll['soluong'];
                    
                    $_SESSION['info_service'] = [
                        'tendichvu' => $filterAll['tendichvu'],
                        'gia' => $filterAll['gia'],
                        'soluong' => $filterAll['soluong'],
                        'madichvu' => $filterAll['madichvu'],
                        'thanhtien' => $thanhtien,
                        'thoigian' => $today_date,
                    ];
                    // echo '<pre>';   
                    // print_r($_SESSION);
                    // echo '</pre>';
                }
                

                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                // Thông tin thanh toán
                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                
                $orderInfo = "Thanh toán qua MoMo ATM";
                $amount = $_SESSION['info_service']['thanhtien'];
                $orderId = time() ."";
                $redirectUrl = _WEB_HOST . "/client/pay_status";
                $ipnUrl = _WEB_HOST . "/client/pay_status";
                $extraData = "";

                $requestId = time() . "";
                $requestType = "payWithATM";
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $secretKey);
                $data = array(
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature
                );
                $result = $this->execPostRequest($endpoint, json_encode($data));
                
                $jsonResult = json_decode($result, true);

                // Chuyển hướng tới URL thanh toán
                header('Location: ' . $jsonResult['payUrl']);
                exit;

        $this->view('client/index', []);
        }
    
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        
    }
?>