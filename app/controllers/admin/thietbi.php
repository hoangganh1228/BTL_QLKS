<?php
class Thietbi extends Controller
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
            if (!empty($_GET['search-ma'])) $mtb = $_GET['search-ma']; else $mtb = '';
            if (!empty($_GET['search-ten'])) $ttb = $_GET['search-ten']; else $ttb = '';
            $condition = "where mathietbi like '%$mtb%' and tenthietbi like '%$ttb%'";
        } else {
            $condition = '';
        }
        $this->data['table'] = $this->model->select([], 'thiet_bi', $condition);
        $this->view('admin/layout',[
            'page' => '/admin/list_thietbi',
            'data' => $this->data
        ]);
    }

    public function delete_thietbi($mtb = '')
    {
        if ($this->model->delete('thiet_bi', "where mathietbi = '$mtb'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/thietbi/list'</script>";
        }
    }

    public function add()
    {
        $this->view('admin/layout',[
            'page' => '/admin/add_thietbi',
            'data' => $this->data
        ]);
        if (isPost()) {
            $check = $this->model->isDuplicate('thiet_bi', 'mathietbi', $_POST['mathietbi']);
            if (!$check) {
                $this->model->insert('thiet_bi', $_POST);
                echo "<script>alert('Thêm thiết bị thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/thietbi/list'</script>";
            } else {
                echo "<script>alert('Thêm thiết bị thất bại, trùng mã dịch vụ!')</script>";
            }
        }
    }

    public function edit_thietbi($mtb = '')
    {
        $this->data['table'] = $this->model->select([], 'thiet_bi', "where mathietbi = '$mtb'");
        $this->view('admin/layout',[
            'page' => '/admin/edit_thietbi',
            'data' => $this->data
        ]);
        if (isPost()) {
            $this->model->update('thiet_bi', $_POST, "where mathietbi = '$mtb'");
            echo "<script>alert('Sửa thiết bị thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/thietbi/list'</script>";
        }
    }
}
?>