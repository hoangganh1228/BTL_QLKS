<?php
class kho extends Controller {
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');
    }
    function index(){
        
        $this->list_kho();
    }
    function list_kho(){
        if(isGet()){
            if(!empty($_GET['search-ma'])) $ma = $_GET['search-ma']; else $ma ='';

            if(!empty($_GET['search-ten'])) $ten = $_GET['search-ten']; else $ten ='';
            $condition = "where masanpham like '%$ma%' and tensanpham like '%$ten%'";
        }else $condition = '';
        $this->data['table'] = $this->model->select([], 'kho', $condition);
        $this->view('admin/layout',[
            'page' => '/admin/list_kho',
            'data' => $this->data
        ]);
    }
    public function delete_kho($ma = '')
    {
        if ($this->model->delete('kho', "where masanpham= '$ma'")) {
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/kho/list_kho'</script>";
        }
    }

    public function add()
    {
        // $this->view('admin/kho_add', $this->data);
        $this->view('admin/layout',[
            'page' => '/admin/kho_add',
            'data' => $this->data
        ]);
        if (isPost()) {
            // print_r($insertData);
            $check = $this->model->isDuplicate('kho', 'masanpham',$_POST['masanpham']);
            
            // echo $check;
            if (!$check) {
                $this->model->insert('kho', $_POST);
                echo "<script>alert('Thêm sản phẩm thành công!')</script>";
                echo "<script>window.location.href = '" . _WEB_HOST . "/admin/kho/list_kho'</script>";
            } else 
            {
                    echo "<script>alert('Thêm sản phẩm thất bại, trùng mã sản phẩm!')</script>";           
            }
        }
        
    }

    public function edit_kho($ma = '')
    {
        $this->data['table'] = $this->model->select([], 'kho', "where masanpham = '$ma'");
        // print_r($this->data['editing-book']);
        // $this->view('admin/edit_kho', $this->data);
        $this->view('admin/layout',[
            'page' => '/admin/edit_kho',
            'data' => $this->data
        ]);
        if (isPost()) {
            $this->model->update('kho', $_POST, "where masanpham = '$ma'");
            echo "<script>alert('Sửa thông tin sản phẩm thành công')</script>";
            echo "<script>window.location.href = '" . _WEB_HOST . "/admin/kho/list_kho'</script>";
            
            
        }
    }
    
}

?>