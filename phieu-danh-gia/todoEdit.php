<?php
require "../config/database.php";
if (isset($_POST['submitDanhGia'])) {
    $idThoiGianDanhGia = $_POST['idThoiGianDanhGia'];
    $macb = $_POST['macb'];
    $permission = $_POST['chucVu'];
    $bomon = $_POST['bomon'];
    $chinhTriTuTuong = $_POST['chinhTriTuTuong'];
    $daoDucLoiSong = $_POST['daoDucLoiSong'];
    $tacPhongLeLoi = $_POST['tacPhongLeLoi'];
    $yThucToChuc = $_POST['yThucToChuc'];
    $thaiDoPhucVu = $_POST['thaiDoPhucVu'];
    $ketQuaThucHien = $_POST['ketQuaThucHien'];
    $ketQuaHoatDong = $_POST['ketQuaHoatDong'];
    $nangLucLanhDao = $_POST['nangLucLanhDao'];
    $tapHopDoanKet = $_POST['tapHopDoanKet'];
    $uuKhuyetDiem = $_POST['uuKhuyetDiem'];
    $xepLoai = $_POST['xepLoai'];

    $sqlInsert = "INSERT INTO `phieudanhgiavc` (`idDanhGia`, `idThoiGianDanhGia`, `MaCB`, `Permission`, `BoMon`, `ChinhTriTuTuong`, `DaoDucLoiSong`, `TacPhongLeLoi`, `YThucToChuc`, `KetQuaThucHien`, `ThaiDoPhucVu`, `KetQuaHoatDong`, `NangLucLanhDao`, `TapHopDoanKet`, `UuKhuyetDiem`, `XepLoai`,`NhanXetDanhGiaCapBoMon`,`XepLoaiCapBoMon`,`NhanXetDanhGiaCapKhoa`,`XepLoaiCapKhoa`,`Created_at`)  VALUES (Null,'$idThoiGianDanhGia','$macb','$permission','$bomon','$chinhTriTuTuong','$daoDucLoiSong','$tacPhongLeLoi','$yThucToChuc','$ketQuaThucHien','$thaiDoPhucVu','$ketQuaHoatDong','$nangLucLanhDao','$tapHopDoanKet','$uuKhuyetDiem','$xepLoai','','','','',Null) ;";
    if (mysqli_query($con, $sqlInsert)) {
        header("Location: http://localhost/joomla/phieu-danh-gia");
    }
}


if (isset($_POST['submitDanhGiaCapBoMon'])) {
    $idDanhGia = $_POST['idDanhGia'];
    $nhanXetDanhGiaCapBoMon = $_POST['nhanXetDanhGiaCapBoMon'];
    $xepLoaiCapBoMon = $_POST['xepLoaiCapBoMon'];
    $sqlUpdate = "UPDATE `phieudanhgiavc` SET `NhanXetDanhGiaCapBoMon` = ' $nhanXetDanhGiaCapBoMon', `XepLoaiCapBoMon` = '$xepLoaiCapBoMon' WHERE `phieudanhgiavc`.`idDanhGia` = '$idDanhGia';";
    if (mysqli_query($con, $sqlUpdate)) {
        header("Location: http://localhost/joomla/phieu-danh-gia");
    }
}

if (isset($_POST['submitDanhGiaCapKhoa'])) {
    $idDanhGia = $_POST['idDanhGia'];
    $nhanXetDanhGiaCapKhoa = $_POST['nhanXetDanhGiaCapKhoa'];
    $xepLoaiCapKhoa = $_POST['xepLoaiCapKhoa'];
    $sqlUpdate = "UPDATE `phieudanhgiavc` SET `NhanXetDanhGiaCapKhoa` = ' $nhanXetDanhGiaCapKhoa', `XepLoaiCapKhoa` = '$xepLoaiCapKhoa' WHERE `phieudanhgiavc`.`idDanhGia` = '$idDanhGia';";
    if (mysqli_query($con, $sqlUpdate)) {
        header("Location: http://localhost/joomla/phieu-danh-gia");
    }
}