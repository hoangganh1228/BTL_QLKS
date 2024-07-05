<?php
class nhan_vien extends Controller
{

    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }

    function index()
    {
        $this->list_nhanvien();
    }

    function list_nhanvien()
    {
        if (isGet()) {
            if (!empty($_GET['search-ma'])) $ma = $_GET['search-ma']; else $ma='';
            //echo $ten;
            if (!empty($_GET['search-ten'])) $ten = $_GET['search-ten']; else $ten='';
            //echo $sohieu;
            $conditon = "where ma_nhanvien like '%$ma%' and ten_nhanvien like '%$ten%'";
        } else $conditon = '';
        //echo $conditon;
        $this->data['table'] = $this->model->select([], 'nhan_vien' ,$conditon);
        // echo '<pre>';
        // print_r($this->data['table']);
        $this->view('admin/layout', [
            'page' => 'admin/list_nhanvien',
            'data' => $this->data
        ]);
        
    }

    public function delete_nhanvien($ma = '')
    {
        if ($this->model->delete('nhan_vien', "where ma_nhanvien = '$ma'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/nhan_vien/list_nhanvien'</script>";
        }
    }

    public function add()
    {
        // $this->view('admin/nhanvien_add', $this->data);
        $this->view('admin/layout', [
            'page' => 'admin/nhanvien_add',
            'data' => $this->data
        ]);
        if (isPost()) {
            // print_r($insertData);
            $check = $this->model->isDuplicate('nhan_vien', 'ma_nhanvien',$_POST['ma_nhanvien']);
            $check1 = $this->model -> isDuplicate('nhan_vien', 'taikhoan', $_POST['taikhoan']);
            // echo $check;
            if (!$check && !$check1) {
                $this->model->insert('nhan_vien', $_POST);
                echo "<script>alert('Thêm nhân viên thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/nhan_vien/list_nhanvien'</script>";
            } else 
            {
                if($check){
                    echo "<script>alert('Thêm nhân viên thất bại, trùng mã nhân viên!')</script>";
                }
                if($check1){
                    echo "<script>alert('Tên tài khoản đã tồn tại! Vui lòng nhập lại!')</script>";
                }              
            }
        }
        
    }
    


    public function edit_nhanvien($ma = '')
    {
        $this->data['table'] = $this->model->select([], 'nhan_vien', "where ma_nhanvien = '$ma'");
        // print_r($this->data['editing-book']);
        // $this->view('admin/edit_nhanvien', $this->data);
        $this->view('admin/layout', [
            'page' => 'admin/edit_nhanvien',
            'data' => $this->data
        ]);
        if (isPost()) {
            //print_r($_POST);
                $this->model->update('nhan_vien', $_POST, "where ma_nhanvien = '$ma'");
                echo "<script>alert('Sửa thông tin nhân viên thành công')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/nhan_vien/list_nhanvien'</script>";

            
        }
    }
}