<?php
class HoaDon extends Controller
{

    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('HoaDonModel');
    }

    function index()
    {
        $this->list('datphong');
    }

    function list($type = '')
    {
        if (isGet()) {
            // echo $loai;
            // echo $_GET['search-key'];
            if (!empty($_GET['so-phong']))
                $sop = $_GET['so-phong'];
            else $sop = '';
            if (!empty($_GET['ten-khach']))
                $khach = $_GET['ten-khach'];
            else $khach = '';
            if (!empty($_GET['ten-dichvu']))
                $dichvu = $_GET['ten-dichvu'];
            else $dichvu = '';
            if ($type == 'datphong') $this->data['table'] = $this->model->bangDatPhong($khach, $sop);
            else {
                $this->data['table'] = $this->model->bangDichVu($khach, $dichvu);
            }
            if (!empty ($_GET['id-don']))
                $this->data['id_don'] = $_GET['id-don'];
        }
        $this->view('admin/layout', [
            'page' => 'admin/hoadon' . $type . '_list',
            'data' => $this->data
        ]);
    }
}
