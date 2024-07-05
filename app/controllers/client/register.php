<?php
class Register extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }
    
    function index()
    {
        $this->view('client/register', []);
        $this->getDataUser();
        
    }
    
    function getDataUser() {
        
        if(isPost()) {
            $filterAll = filter();
            // echo '<pre>';   
            // print_r($filterAll);
            // echo '</pre>';
            // $erros = [];
            if(!empty($filterAll)) {
                

                // echo ''; 
                // echo '<pre>'; 
                // echo '<pre>'; 
                // echo '<pre>'; 

                if(!$this->model->isDuplicate('khach_hang', 'socancuoc', $filterAll['socancuoc'])) {
                    if(!$this->model->isDuplicate('khach_hang', 'email', $filterAll['email'])) {
                        if($filterAll['matkhau'] == $filterAll['xacnhanmk']) {
                            if(!empty($filterAll)) {
                                $dataInsert = [
                                    'socancuoc' => $filterAll['socancuoc'],
                                    'ten' => $filterAll['ten'],
                                    'sodienthoai' => $filterAll['sodienthoai'],
                                    'email' => $filterAll['email'],
                                    'matkhau' => $filterAll['matkhau'],
                                ];
                                
                        
                                $insertStatus = $this->model->insert('khach_hang', $dataInsert);
                                if($insertStatus) {
                                    $_SESSION['user_data'] = [
                                        'socancuoc' => $filterAll['socancuoc'],
                                        'ten' => $filterAll['ten'],
                                        'sodienthoai' => $filterAll['sodienthoai'],
                                        'email' => $filterAll['email'],
                                    ];
                                    // echo '<pre>';   
                                    // print_r($_SESSION);
                                    // echo '</pre>';
                                    echo "<script>alert('Đăng kí thành công')</script>";
                                } else {
                                    echo "<script>alert('Đăng kí không thành công')</script>";
                                }
                                redirect('index');
                            }
                        } else {
                            echo "<script>alert('Mật khẩu không khớp!')</script>";
                        }
                    } else {
                        echo "<script>alert('Trùng email!')</script>";

                    }
                } else {
                    echo "<script>alert('Trùng cccd!')</script>";
                }   
                
            }
        }
    }
    
}



?>