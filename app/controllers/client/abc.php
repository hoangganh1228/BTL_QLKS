<?php
class khach extends Controller
{

    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }

    function index()
    {
        echo 'Quản lý lớp';
    }

    function list()
    {
        if (isGet()) {
            if (!empty($_GET['search-ma'])) $ma = $_GET['search-ma']; else $ma='';
            //echo $ten;
            if (!empty($_GET['search-ten'])) $ten = $_GET['search-ten']; else $ten='';
            //echo $sohieu;
            $conditon = "where malop like '%$ma%' and tenlop like '%$ten%'";
        } else $conditon = '';
        //echo $conditon;
        $this->data['table'] = $this->model->select([], 'lop' ,$conditon);
        // echo '<pre>';
        // print_r($this->data['table']);
        $this->view('list', $this->data);
    }

    public function delete_lop($id = '')
    {
        if ($this->model->delete('lop', "where id = '$id'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/lop/list'</script>";
        }
    }

    public function add()
    {
        $this->view('lop_add', $this->data);
        if (isPost()) {
            // print_r($insertData);
            $check = $this->model->isDuplicate('lop', 'id',$_POST['id']);
            // echo $check;
            if (!$check) {
                $this->model->insert('lop', $_POST);
                echo "<script>alert('Thêm lớp thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/lop/list'</script>";
            } else 
            {
                echo "<script>alert('Thêm lớp thất bại, trùng id!')</script>";
            }
        }
        
    }

    public function edit_lop($id = '')
    {
        $this->data['table'] = $this->model->select([], 'lop', "where id = '$id'");
        // print_r($this->data['editing-book']);
        $this->view('edit_lop', $this->data);
        if (isPost()) {
            //print_r($_POST);
            $this->model->update('lop', $_POST, "where id = '$id'");
            echo "<script>alert('Sửa lớp thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/lop/list'</script>";
        }
    }
}
