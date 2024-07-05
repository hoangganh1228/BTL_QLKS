<?php
class Tang extends Controller
{

    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
        $this->data['trangthai'] = [
            'Hoạt động',
            'Dừng hoạt động'
        ];
    }

    function index()
    {
        $this->tang_list();
    }

    function tang_list()
    {
        $this->data['search'] = filter();
        if (!empty($this->data['search']))
        {
            $conditon = "where sotang like '%" . $this->data['search']['sotang'] . "%' and trangthai like '%" . $this->data['search']['trangthai']. "%'";
        }
        else $conditon = '';
        //echo $conditon;
        $this->data['table'] = $this->model->select([], 'tang', $conditon);
        // echo '<pre>';
        // print_r($this->data['table']);
        $this->view('admin/layout', [
            'page' => 'admin/tang_list',
            'data' => $this->data
        ]);
    }

    public function tang_delete($sotang = '')
    {
        if ($this->model->delete('tang', "where sotang = '$sotang'")) {
            echo "<script>alert('Xóa thành công')</script>";
            redirect('admin/tang/tang_list');
        }
    }

    public function tang_add()
    {
        $this->view('admin/layout', [
            'page' => 'admin/tang_add',
            'data' => $this->data
        ]);
        if (isPost()) {
            // print_r($insertData);
            $this->data['tang'] = filter();
            $check = $this->model->isDuplicate('tang', 'sotang', $this->data['tang']['sotang']);
            // echo $check;
            if (!$check) {
                $this->model->insert('tang', $this->data['tang']);
                echo "<script>alert('Thêm tầng thành công!')</script>";
                redirect('admin/tang/tang_list');
            } else {
                echo "<script>alert('Thêm lớp thất bại, trùng id!')</script>";
            }
        }
    }

    public function tang_edit($sotang = '')
    {
        $this->data['tang'] = $this->model->select([], 'tang', "where sotang = '$sotang'")[0];
        // print_r($this->data['tang']);
        $this->view('admin/layout', [
            'page' => 'admin/tang_edit',
            'data' => $this->data
        ]);
        if (isPost()) {
            $this->data['tang'] = filter();
            $this->model->update('tang', $this->data['tang'], "where sotang = '$sotang'");
            echo "<script>alert('Sửa thông tin tầng thành công')</script>";
            redirect('admin/tang/tang_list');
        }
    }
}
