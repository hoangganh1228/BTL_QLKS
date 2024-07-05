<?php
class Loaiphong extends Controller
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
            if (!empty($_GET['search-ma'])) $mlp = $_GET['search-ma']; else $mlp = '';
            if (!empty($_GET['search-ten'])) $tlp = $_GET['search-ten']; else $tlp = '';
            $condition = "where maloaiphong like '%$mlp%' and tenloaiphong like '%$tlp%'";
        } else {
            $condition = '';
        }
        $this->data['table'] = $this->model->select([], 'loai_phong', $condition);
        $this->view('admin/layout',[
            'page' => '/admin/list_loaiphong',
            'data' => $this->data
        ]);
    }

    public function delete_loaiphong($mlp = '')
    {
        if ($this->model->delete('loai_phong', "where maloaiphong = '$mlp'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/loaiphong/list'</script>";
        }
    }

    public function add()
    {
        $this->view('admin/layout',[
            'page' => '/admin/add_loaiphong',
            'data' => $this->data
        ]);
        if (isPost()) {
            $check = $this->model->isDuplicate('loai_phong', 'maloaiphong', $_POST['maloaiphong']);
            if (!$check) {
                $this->model->insert('loai_phong', $_POST);
                echo "<script>alert('Thêm loại phòng thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/loaiphong/list'</script>";
            } else {
                echo "<script>alert('Thêm dịch vụ thất bại, trùng mã dịch vụ!')</script>";
            }
        }
    }

    public function edit_loaiphong($mlp = '')
    {
        $this->data['table'] = $this->model->select([], 'loai_phong', "where maloaiphong = '$mlp'");
        $this->view('admin/layout',[
            'page' => '/admin/edit_loaiphong',
            'data' => $this->data
        ]);
        if (isPost()) {
            $this->model->update('loai_phong', $_POST, "where maloaiphong = '$mlp'");
            echo "<script>alert('Sửa loại phòng thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/loaiphong/list'</script>";
        }
    }
}
?>