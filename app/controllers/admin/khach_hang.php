<?php
class khach_hang extends Controller {
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }
    function index(){
        // echo 'quản lý khách hàng';
        $this->list_khachhang();
    }
    function list_khachhang(){
        if(isGet()){
            if(!empty($_GET['search-cccd'])) $cccd = $_GET['search-cccd']; else $cccd ='';

            if(!empty($_GET['search-ten'])) $ten = $_GET['search-ten']; else $ten ='';
            $condition = "where socancuoc like '%$cccd%' and ten like '%$ten%'";
        }else $condition = '';
        $this->data['table'] = $this->model->select([], 'khach_hang', $condition);
        $this->view('/admin/layout',[
            'page' => '/admin/list_khachhang',
            'data' => $this->data
        ]);
    }
    public function delete_khachhang($cccd = '')
    {
        if ($this->model->delete('khach_hang', "where socancuoc= '$cccd'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/khach_hang/list_khachhang'</script>";
        }
    }

    public function add()
    {
        // $this->view('admin/khachhang_add', $this->data);
        $this->view('/admin/layout',[
            'page' => '/admin/khachhang_add',
            'data' => $this->data
        ]);
        if (isPost()) {
            // print_r($insertData);
            $check = $this->model->isDuplicate('khach_hang', 'socancuoc',$_POST['socancuoc']);
            $check1 = $this->model -> isDuplicate('khach_hang', 'email', $_POST['email']);
            // echo $check;
            if (!$check && !$check1) {
                $this->model->insert('khach_hang', $_POST);
                echo "<script>alert('Thêm khách hàng thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/khach_hang/list_khachhang'</script>";
            } else 
            {
                if($check){
                    echo "<script>alert('Thêm khách hàng thất bại, trùng số căn cước!')</script>";
                }
                if($check1){
                    echo "<script>alert('Tên tài khoản đã tồn tại! Vui lòng nhập lại!')</script>";
                }              
            }
        }
        
    }
    
    

    public function edit_khachhang($cccd = '')
    {
        $this->data['table'] = $this->model->select([], 'khach_hang', "where socancuoc = '$cccd'");
        // print_r($this->data['editing-book']);
        // $this->view('admin/edit_khachhang', $this->data);
        $this->view('/admin/layout',[
            'page' => '/admin/edit_khachhang',
            'data' => $this->data
        ]);
        if (isPost()) {
            $this->model->update('khach_hang', $_POST, "where socancuoc = '$cccd'");
            echo "<script>alert('Sửa thông tin khách hàng thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/khach_hang/list_khachhang'</script>";
            
            
        }
    }
}

?>