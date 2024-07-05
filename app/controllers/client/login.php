<?php
class Login extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }

    function index()
    {
        $this->view('client/login', []);
        $this->login();
    }

    function login() {  
        // session_start();
        // echo '<pre>';   
        // print_r($_SESSION);
        // echo '</pre>';
        if(isPost()) {
            $filterAll = filter();
            if(!empty($filterAll)) {
                $email_mob = $filterAll['email_mob'];
                $password = $filterAll['matkhau'];
                // echo '<pre>';   
                // print_r($filterAll);
                // echo '</pre>';
                // $userQuery = $this->model->oneRaw("SELECT matkhau FROM khach WHERE email = '$email_mob' OR sodienthoai = '$email_mob'");
                $condition = "email = '$email_mob' OR sodienthoai = '$email_mob'";
                $userQuery = $this->model->select([], 'khach_hang', "WHERE email = '$email_mob' OR sodienthoai = '$email_mob'");
                $userId = $userQuery[0]['socancuoc'];
                // echo '<pre>';   
                // print_r($userQuery);
                // echo '<pre>';   
                // print_r($userQuery[0]['matkhau']);
                // echo $password;
                if(!empty($userQuery)) {
                    if($userQuery[0]['matkhau'] == $password) {
                        $tokenLogin = sha1(uniqid().time());
                        // echo '<br>';
                        // echo $tokenLogin;
                        $dataInsert = [
                            'userId' => $userId,
                            'token' => $tokenLogin,
                            'createAt' => date('Y-m-d H:i:s')
                        ];
                        
                        $insertStatus = $this->model->insert('token_login', $dataInsert);
                        if($insertStatus) {
                            // Insert thành công
                            
                            $_SESSION['loginToken'] = $dataInsert;
                            $userData = [
                                'socancuoc' => $userQuery[0]['socancuoc'],
                                'ten' => $userQuery[0]['ten'],
                                'sodienthoai' => $userQuery[0]['sodienthoai'],
                                'email' => $userQuery[0]['email']
                            ];
                            $_SESSION['userData'] = $userData;
                            // echo '<pre>';   
                            // print_r($_SESSION);
                            // echo '<pre>';  
                         
                            redirect('index');
                        } else {
                            echo "<script>alert('Khong the dang nhap Vui long thu lai!')</script>";
                        }
                    } else {
                        echo "<script>alert('Sai mật khẩu!')</script>";
                        
                    }
                }
            }
        }
    }
}
    
?>
