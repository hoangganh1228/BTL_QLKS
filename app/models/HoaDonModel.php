<?php
require_once 'app/models/Database.php';
class HoaDonModel extends Database
{
    function bangDatPhong($khach = '', $sop = '')
    {
        $condition = " and khach_hang.ten like '%$khach%' and phong.sophong like '%$sop%'";
        return $this->select(['dat_phong.id', 'khach_hang.ten', 'phong.sophong', 'loai_phong.gia', 'dat_phong.check_in', 'dat_phong.check_out', 'chi_tiet_phong.thanhtien', 'chi_tiet_phong.ngaythanhtoan'], '`loai_phong` JOIN `phong` JOIN `dat_phong` JOIN `chi_tiet_phong` JOIN `khach_hang`', 'WHERE dat_phong.id = chi_tiet_phong.bookingid AND dat_phong.makhachhang = khach_hang.socancuoc AND dat_phong.sophong = phong.sophong AND phong.maloaiphong = loai_phong.maloaiphong' . $condition);
    }

    function bangDichVu($khach = '', $dichvu = '')
    {
        $condition = " and khach_hang.ten like '%$khach%' and dich_vu.tendichvu like '%$dichvu%'";
        return $this->select(['dat_dich_vu.id', 'khach_hang.ten', 'dich_vu.tendichvu', 'dich_vu.gia', 'chi_tiet_dich_vu.soluong', 'chi_tiet_dich_vu.thanhtien', 'dat_dich_vu.ngaythanhtoan'], '`dat_dich_vu` JOIN `dich_vu` JOIN `khach_hang` JOIN `chi_tiet_dich_vu`', 'WHERE dat_dich_vu.id = chi_tiet_dich_vu.iddatdv AND dat_dich_vu.makhach = khach_hang.socancuoc AND dich_vu.madichvu = chi_tiet_dich_vu.madichvu' . $condition);
    }

    function dsDatPhong($ids)
    {
        if (!empty($ids))
        {
            $cols = implode(',' , $ids);
            $condition = " and dat_phong.id in($cols)";
        } else $condition = '';
        return $this->select(['dat_phong.id', 'khach_hang.ten', 'phong.sophong', 'loai_phong.gia', 'dat_phong.check_in', 'dat_phong.check_out', 'chi_tiet_phong.thanhtien', 'chi_tiet_phong.ngaythanhtoan'], '`loai_phong` JOIN `phong` JOIN `dat_phong` JOIN `chi_tiet_phong` JOIN `khach_hang`', 'WHERE dat_phong.id = chi_tiet_phong.bookingid AND dat_phong.makhachhang = khach_hang.socancuoc AND dat_phong.sophong = phong.sophong AND phong.maloaiphong = loai_phong.maloaiphong' . $condition);
    }

    function dsDichVu($ids)
    {
        if (!empty($ids))
        {
            $cols = implode(',' , $ids);
            $condition = " and dat_dich_vu.id in($cols)";
        } else {
            $condition = '';
        }
        return $this->select(['dat_dich_vu.id', 'khach_hang.ten', 'dich_vu.tendichvu', 'chi_tiet_dich_vu.soluong', 'dich_vu.gia', 'chi_tiet_dich_vu.thanhtien', 'dat_dich_vu.ngaythanhtoan'], '`dat_dich_vu` JOIN `chi_tiet_dich_vu` JOIN `khach_hang` JOIN `dich_vu`', 'WHERE dat_dich_vu.id = chi_tiet_dich_vu.iddatdv and khach_hang.socancuoc = dat_dich_vu.makhach and dich_vu.madichvu = chi_tiet_dich_vu.madichvu' . $condition);
    }
}