<?php
class datphong extends Controller
{

    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }

    function index()
    {
        $this->list();
    }
    
    function list()
    {
        if (isGet()) {
            if (!empty($_GET['search-ma'])) $ma = $_GET['search-ma']; else $ma='';
            //echo $ten;
            if (!empty($_GET['search-ten'])) $ten = $_GET['search-ten']; else $ten='';
            //echo $sohieu;
            $conditon = "where sophong like '%$ma%' and makhachhang like '%$ten%'";
        } else $conditon = '';
        //echo $conditon;
        $this->data['table'] = $this->model->select([], 'dat_phong' ,$conditon);
        // echo '<pre>';
        // print_r($this->data['table']);
        // var_dump($this->data['table']);
        $this->view('admin/layout', [
            'page' => 'admin/booking',
            'data' => $this->data
        ]);

    }

   
    public function add()
    {
        $this->view('admin/layout', [
            'page' => 'admin/add_booking',
            'data' => $this->data
        ]);
        if (isPost()) {
            // print_r($insertData);
            $check = $this->model->isDuplicate('dat_phong', 'sophong',$_POST['sophong']);
            // echo $check;
            if (!$check) {
                $this->model->insert('dat_phong', $_POST);
                echo "<script>alert('Thêm phòng thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/datphong'</script>";
            } else 
            {
                echo "<script>alert('Thêm phong thất bại, trùng id!')</script>";
            }
        }
        
    }
    
  
   
   
    public function edit_datphong($id = '')
    {
        $this->data['table'] = $this->model->select([], 'dat_phong', "where id = '$id'");
        // print_r($this->data['editing-book']);
        $this->view('admin/layout', [
            'page' => 'admin/edit_booking',
            'data' => $this->data
        ]);
        if (isPost()) {
            //print_r($_POST);
            $this->model->update('dat_phong', $_POST, "where id = '$id'");
            echo "<script>alert('Sửa phòng thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/datphong'</script>";
        }
    }

    public function delete_datphong($id = '')
    {
        
        if ($this->model->delete('dat_phong', "where id= '$id'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/datphong'</script>";
        }
    }
    
}