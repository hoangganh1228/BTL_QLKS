<?php
require_once 'app/models/Database.php';
class ThongKeModel extends Database
{
    function getTongDatPhong($start = '', $end = '')
    {
        if (!empty($start)) {
            $start = "'$start'";
            if (!empty($end)) {
                $end = "'$end'";
                $condition = "WHERE ngaythanhtoan BETWEEN $start AND $end";
            } else $condition = "WHERE ngaythanhtoan >= $start";
        } else {
            if (!empty($end)) {
                $end = "'$end'";
                $condition = "WHERE ngaythanhtoan <= $end";
            } else $condition = '';
        }
        // echo $condition;
        return $this->select(['Sum(thanhtien) as tong'], 'chi_tiet_phong', $condition)[0]['tong'];
    }

    function getTongDichVu($start = '', $end = '')
    {
        if (!empty($start)) {
            $start = "'$start'";
            if (!empty($end)) {
                $end = "'$end'";
                $condition = " and dat_dich_vu.ngaythanhtoan BETWEEN $start AND $end";
            } else $condition = " and dat_dich_vu.ngaythanhtoan >= $start";
        } else {
            if (!empty($end)) {
                $end = "'$end'";
                $condition = " and dat_dich_vu.ngaythanhtoan <= $end";
            } else $condition = '';
        }
        // echo $condition;
        return $this->select(['Sum(chi_tiet_dich_vu.thanhtien) as tong'], 'dat_dich_vu join chi_tiet_dich_vu', "where dat_dich_vu.id = chi_tiet_dich_vu.iddatdv" . $condition)[0]['tong'];
    }

    function getBangDatPhong($start = '', $end = '', $col = '')
    {
        if (!empty($start)) {
            $start = "'$start'";
            if (!empty($end)) {
                $end = "'$end'";
                $condition = " and chi_tiet_phong.ngaythanhtoan BETWEEN $start AND $end";
            } else $condition = " and chi_tiet_phong.ngaythanhtoan >= $start";
        } else {
            if (!empty($end)) {
                $end = "'$end'";
                $condition = " and chi_tiet_phong.ngaythanhtoan <= $end";
            } else $condition = '';
        }

        return $this->select(['sum(chi_tiet_phong.thanhtien) as tong', 'phong.sophong', 'tang.sotang', 'loai_phong.tenloaiphong'], '`chi_tiet_phong` JOIN `phong` JOIN `loai_phong` JOIN `tang` JOIN `dat_phong`', "WHERE dat_phong.id = chi_tiet_phong.bookingid AND phong.sophong = dat_phong.sophong AND loai_phong.maloaiphong = phong.maloaiphong AND tang.sotang = phong.sotang" . $condition . " group by " . $col);
    }

    function getDichVu($start = '', $end = '')
    {
        if (!empty($start)) {
            $start = "'$start'";
            if (!empty($end)) {
                $end = "'$end'";
                $condition = " and dat_dich_vu.ngaythanhtoan BETWEEN $start AND $end";
            } else $condition = " and dat_dich_vu.ngaythanhtoan >= $start";
        } else {
            if (!empty($end)) {
                $end = "'$end'";
                $condition = " and dat_dich_vu.ngaythanhtoan <= $end";
            } else $condition = '';
        }
        return $this->select(['dich_vu.tendichvu', 'sum(chi_tiet_dich_vu.thanhtien) as tong'], '`dich_vu` JOIN `chi_tiet_dich_vu` JOIN `dat_dich_vu`', "WHERE dich_vu.madichvu = chi_tiet_dich_vu.madichvu AND dat_dich_vu.id = chi_tiet_dich_vu.iddatdv " . $condition . " GROUP BY dich_vu.madichvu");
    }
}
