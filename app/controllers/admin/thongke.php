<?php
class ThongKe extends Controller
{
    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('ThongKeModel');;
    }

    function index()
    {
        if (!empty($_GET))
        {
            $start = $_GET['start'];
            $end = $_GET['end'];

            if (!empty($end) && !empty($start)) $this->checkDate($start, $end, '');
        } else 
        {
            $start = '';
            $end = '';
        }
        $phong = $this->model->getTongDatPhong($start, $end);
        if (empty($phong)) $phong = 0;
        $dichvu = $this->model->getTongDichVu($start, $end);
        if (empty($dichvu)) $dichvu = 0;
        // echo $phong . ' ' . $dichvu;
        if ($phong != 0 || $dichvu !=0)
        {
            $tong = $phong + $dichvu;
            $this->data['tongdoanhthu'] = $tong;
            $phong = ($phong/$tong)*100;
            $phong = round($phong, 2);
            $dichvu = ($dichvu/$tong)*100;
            $dichvu = round($dichvu, 2);
        } else $this->data['tongdoanhthu'] = 0;

        $this->data['chart'] = [
            [
                'y' => $phong,
                'label' => 'Tiền phòng'
            ],
            [
                'y' => $dichvu,
                'label' => 'Tiền dịch vụ'
            ]
        ];
        $this->view('admin/layout', [
            'page' => 'admin/thongke',
            'data' => $this->data
        ]);
    }

    function phong()
    {
        if (!empty($_GET))
        {
            $start = $_GET['start'];
            $end = $_GET['end'];
            $col = $_GET['col'];

            if (!empty($end) && !empty($start)) $this->checkDate($start, $end, 'phong');
        } else 
        {
            $start = '';
            $end = '';
            $col = 'loai_phong.tenloaiphong';
        }

        $this->data['tongtienphong'] = $this->model->getTongDatPhong($start, $end);
        // print_r($this->model->getBangDatPhong($start, $end, $col));
        $chartData = $this->model->getBangDatPhong($start, $end, $col);
        $arr = explode('.', $col);
        $col = $arr[1];
        if ($this->data['tongtienphong'] != 0)
        {
            foreach ($chartData as $data)
            {
                $y = ($data['tong']/$this->data['tongtienphong'])*100;
                $this->data['chart'][] = [
                    'y' => $y,
                    'label' => $data[$col]
                ];
            }
        } else $this->data['chart'] = [];
        $this->view('admin/layout', [
            'page' => 'admin/thongke_phong',
            'data' => $this->data
        ]);
    }

    function dichvu()
    {
        if (!empty($_GET))
        {
            $start = $_GET['start'];
            $end = $_GET['end'];

            if (!empty($end) && !empty($start)) $this->checkDate($start, $end, 'dichvu');
        } else 
        {
            $start = '';
            $end = '';
        }

        $this->data['tongtiendv'] = $this->model->getTongDichVu($start, $end);

        $chartData = $this->model->getDichVu($start, $end);
        if (!empty($this->data['tongtiendv']))
        {
            foreach ($chartData as $data)
            {
                $y = ($data['tong']/$this->data['tongtiendv'])*100;
                $this->data['chart'][] = [
                    'y' => $y,
                    'label' => $data['tendichvu']
                ];
            }
        } else $this->data['chart'] = [];
        $this->view('admin/layout', [
            'page' => 'admin/thongke_dichvu',
            'data' => $this->data
        ]);
    }

    function dateWarning($path=''){
        echo "<script>alert('Ngày bắt đầu phải trước ngày cuối ít nhất một ngày')</script>";
        echo "<script>window.location.href = '" . _WEB_HOST . "/admin/thongke/". $path ."'</script>";
    }

    function checkDate($start, $end, $path)
    {
        $startArr = array_map('intval', explode('-', $start));
        $endArr = array_map('intval', explode('-', $end));
        if ($startArr[0]>$endArr[0])
        {
            $this->dateWarning($path);
        } else if ($startArr[1]>$endArr[1])
        {
            $this->dateWarning($path);
        } else if ($startArr[2]>=$endArr[2])
        {
            $this->dateWarning($path);
        } else return;
    }
}