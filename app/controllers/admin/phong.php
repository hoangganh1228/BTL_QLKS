<?php
class phong extends Controller
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
            $conditon = " and sophong like '%$ma%' and loai_phong.tenloaiphong like '%$ten%'";
        } else $conditon = '';
        //echo $conditon;
        $this->data['table'] = $this->model->select(['phong.*', 'khach_hang.ten', 'loai_phong.tenloaiphong'], '`phong` JOIN `loai_phong` LEFT JOIN `khach_hang` ON phong.makhach = khach_hang.socancuoc' ,"WHERE phong.maloaiphong = loai_phong.maloaiphong" . $conditon);
        // echo '<pre>';
        // print_r($this->data['table']);
        // var_dump($this->data['table']);
        $this->view('admin/layout', [
            'page' => 'admin/rooms',
            'data' => $this->data
        ]);
    }

   
    public function add()
    {
        $this->data['loaiphong'] = $this->model->select([], 'loai_phong', '');
        $this->data['tang'] = $this->model->select([], 'tang', '');
        $this->view('admin/layout', [
            'page' => 'admin/add_room',
            'data' => $this->data
        ]);
        if (isPost()) {
            // print_r($insertData);
            $check = $this->model->isDuplicate('phong', 'sophong', $_POST['sophong']);
            // echo $check;
            if (!$check) {
                $this->model->insert('phong', $_POST);
                echo "<script>alert('Thêm phòng thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/phong'</script>";
            } else 
            {
                echo "<script>alert('Thêm lớp thất bại, trùng id!')</script>";
            }
        }
        
    }
    
  
   
   
    public function edit_phong($sophong = '')
    {
        $this->data['loaiphong'] = $this->model->select([], 'loai_phong', '');
        $this->data['tang'] = $this->model->select([], 'tang', '');
        $this->data['table'] = $this->model->select([], 'phong', "where sophong = '$sophong'");
        // print_r($this->data['editing-book']);
        $this->view('admin/layout',[
            'page' => 'admin/edit_room',
            'data' => $this->data
        ]);
        if (isPost()) {
            //print_r($_POST);
            $this->model->update('phong', $_POST, "where sophong = '$sophong'");
            echo "<script>alert('Sửa phòng thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/phong'</script>";
        }
    }

    public function delete_phong($sophong = '')
    {
        
        if ($this->model->delete('phong', "where sophong = '$sophong'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/phong'</script>";
        }
    }
}