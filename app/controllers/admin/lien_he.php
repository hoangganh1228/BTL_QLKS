<?php
class lien_he extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('Database');;
    }

    function index() {
        $condition = "";
        $keyword = ""; // Khởi tạo biến $keyword để tránh lỗi undefined variable
        if (isGet()) {
            $filterAll = filter(); // Giả sử hàm filter() trả về dữ liệu đã lọc
            if (isset($filterAll['keyword']) && !empty($filterAll['keyword'])) {
                $keyword = $filterAll['keyword'];
                $condition = "WHERE ten = '$keyword'";
            }
            // echo '<pre>';   
            // print_r($filterAll);
            // echo '</pre>';
        }
        $data = $this->model->select([], 'lien_he', $condition);
        // echo '<pre>';   
        // print_r($data);
        // echo '</pre>';
        $this->view('admin/layout', [
            'page' => 'admin/lien_he',
            'data' => $data
        ]);
    }
}
?>