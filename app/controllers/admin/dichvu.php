<?php
class Dichvu extends Controller
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
            if (!empty($_GET['search-ma'])) $mdv = $_GET['search-ma']; else $mdv = '';
            if (!empty($_GET['search-ten'])) $tdv = $_GET['search-ten']; else $tdv = '';
            $condition = "where madichvu like '%$mdv%' and tendichvu like '%$tdv%'";
        } else {
            $condition = '';
        }
        $this->data['table'] = $this->model->select([], 'dich_vu', $condition);
        $this->view('admin/layout',[
            'page' => '/admin/list_dichvu',
            'data' => $this->data
        ]);
    }

    public function delete_dichvu($mdv = '')
    {
        if ($this->model->delete('dich_vu', "where madichvu = '$mdv'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/dichvu/list'</script>";
        }
    }

    public function add()
    {
        $this->view('admin/layout',[
            'page' => '/admin/add_dichvu',
            'data' => $this->data
        ]);
        if (isPost()) {
            $check = $this->model->isDuplicate('dich_vu', 'madichvu', $_POST['madichvu']);
            if (!$check) {
                $this->model->insert('dich_vu', $_POST);
                echo "<script>alert('Thêm dịch vụ thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/dichvu/list'</script>";
            } else {
                echo "<script>alert('Thêm dịch vụ thất bại, trùng mã dịch vụ!')</script>";
            }
        }
    }

    public function edit_dichvu($mdv = '')
    {
        $this->data['table'] = $this->model->select([], 'dich_vu', "where madichvu = '$mdv'");
        $this->view('admin/layout',[
            'page' => '/admin/edit_dichvu',
            'data' => $this->data
        ]);
        if (isPost()) {
            $this->model->update('dich_vu', $_POST, "where madichvu = '$mdv'");
            echo "<script>alert('Sửa dịch vụ thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/dichvu/list'</script>";
        }
    }
}
?>