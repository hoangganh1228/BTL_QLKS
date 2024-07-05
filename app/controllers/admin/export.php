<?php
class Export extends Controller
{

    private $data, $model;

    function __construct()
    {
        $this->model = $this->model('HoaDonModel');;
    }

    function hoadondichvu()
    {
        if(isGet())
        {
            if (!empty($_GET['check']))
            {
                $this->data['insertData'] = $this->model->dsDichVu($_GET['check']);
            } else $this->data['insertData'] = $this->model->dsDichVu([]);
        }
        // echo '<pre>';
        // print_r($this->data['exportData']);

        $excel = new PHPExcel();

        $excel->setActiveSheetIndex(0);

        $sheet = $excel->getActiveSheet()->setTitle('Hoá đơn');

        $numRow = 1;
        $sheet->setCellValue('A' . $numRow, 'ID');
        $sheet->setCellValue('B' . $numRow, 'Tên khách hàng');
        $sheet->setCellValue('C' . $numRow, 'Tên dịch vụ');
        $sheet->setCellValue('D' . $numRow, 'Số lượng');
        $sheet->setCellValue('E' . $numRow, 'Giá');
        $sheet->setCellValue('F' . $numRow, 'Thành tiền');
        $sheet->setCellValue('G' . $numRow, 'Ngày thanh toán');

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        $sheet->getStyle('A1:G1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');

        $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        foreach ($this->data['insertData'] as $row) {
            $numRow++;
            $sheet->setCellValue('A' . $numRow, $row['id']);
            $sheet->setCellValue('B' . $numRow, $row['ten']);
            $sheet->setCellValue('C' . $numRow, $row['tendichvu']);
            $sheet->setCellValue('D' . $numRow, $row['soluong']);
            $sheet->setCellValue('E' . $numRow, $row['gia']);
            $sheet->setCellValue('F' . $numRow, $row['thanhtien']);
            $sheet->setCellValue('G' . $numRow, $row['ngaythanhtoan']);
        }

        $styleAray=array(
            'borders'=>array(
                'allborders'=>array(
                    'style'=>PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $sheet->getStyle('A1:'.'H'.($numRow))->applyFromArray($styleAray);

        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Hoa don - ' . time() . '.xls"');
        PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
    }

    function hoadondatphong()
    {
        if(isGet())
        {
            if (!empty($_GET['check']))
            {
                $this->data['insertData'] = $this->model->dsDatPhong($_GET['check']);
            } else $this->data['insertData'] = $this->model->dsDatPhong([]);
        }
        // echo '<pre>';
        // print_r($this->data['exportData']);

        $excel = new PHPExcel();

        $excel->setActiveSheetIndex(0);

        $sheet = $excel->getActiveSheet()->setTitle('Hoá đơn');

        $numRow = 1;
        $sheet->setCellValue('A' . $numRow, 'ID');
        $sheet->setCellValue('B' . $numRow, 'Tên khách hàng');
        $sheet->setCellValue('C' . $numRow, 'Số phòng');
        $sheet->setCellValue('D' . $numRow, 'Check in');
        $sheet->setCellValue('E' . $numRow, 'Check out');
        $sheet->setCellValue('F' . $numRow, 'Giá');
        $sheet->setCellValue('G' . $numRow, 'Thành tiền');
        $sheet->setCellValue('H' . $numRow, 'Ngày thanh toán');

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);

        $sheet->getStyle('A1:H1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');

        $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        foreach ($this->data['insertData'] as $row) {
            $numRow++;
            $sheet->setCellValue('A' . $numRow, $row['id']);
            $sheet->setCellValue('B' . $numRow, $row['ten']);
            $sheet->setCellValue('C' . $numRow, $row['sophong']);
            $sheet->setCellValue('D' . $numRow, $row['check_in']);
            $sheet->setCellValue('E' . $numRow, $row['check_out']);
            $sheet->setCellValue('F' . $numRow, $row['gia']);
            $sheet->setCellValue('G' . $numRow, $row['thanhtien']);
            $sheet->setCellValue('H' . $numRow, $row['ngaythanhtoan']);
        }

        $styleAray=array(
            'borders'=>array(
                'allborders'=>array(
                    'style'=>PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $sheet->getStyle('A1:'.'H'.($numRow))->applyFromArray($styleAray);

        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Hoa don - ' . time() . '.xls"');
        PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
    }   
}
