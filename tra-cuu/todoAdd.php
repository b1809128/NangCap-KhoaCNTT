<?php
require("../config/database.php");
if (isset($_POST['submitGiaoTrinh'])) {
    $macb = $_POST['macbGiaoTrinh'];
    $hoten = $_POST['hotenGiaoTrinh'];
    $bomon = $_POST['selectBomon'];
    $giangvienthamgia = $_POST['giangvienthamgiaGiaoTrinh'];
    $tengiaotrinh = $_POST['tenGiaoTrinh'];
    $namxuatban = $_POST['namxuatbanGiaoTrinh'];
    $trangdonggop = $_POST['trangdonggopGiaoTrinh'];

    $sqlInsert = "INSERT INTO `manage_post` (`STT`, `MaCB`, `TenGiangVien`, `BoMon`, `GiangVienThamGia`, `GiaoTrinh`, `BaiBaoKhoaHoc`, `NamXuatBan`, `TrangDongGop`) VALUES (NULL, '$macb', '$hoten', '$bomon', '$giangvienthamgia', '$tengiaotrinh', '', '$namxuatban', '$trangdonggop');";
    if (mysqli_query($con, $sqlInsert)) {
        header("Location: http://localhost/joomla/tra-cuu");
    }
}

if (isset($_POST['submitBaiBao'])) {
    $macb = $_POST['macbBaiBao'];
    $hoten = $_POST['hotenBaiBao'];
    $bomon = $_POST['selectBomonBaiBao'];
    $giangvienthamgia = $_POST['giangvienthamgiaBaiBao'];
    $tenbaibao = $_POST['tenBaiBao'];
    $namxuatban = $_POST['namxuatbanBaiBao'];
    $trangdonggop = $_POST['trangdonggopBaiBao'];

    $sqlInsert = "INSERT INTO `manage_post` (`STT`, `MaCB`, `TenGiangVien`, `BoMon`, `GiangVienThamGia`, `GiaoTrinh`, `BaiBaoKhoaHoc`, `NamXuatBan`, `TrangDongGop`) VALUES (NULL, '$macb', '$hoten', '$bomon', '$giangvienthamgia', '', '$tenbaibao', '$namxuatban', '$trangdonggop');";
    if (mysqli_query($con, $sqlInsert)) {
        header("Location: http://localhost/joomla/tra-cuu");
    }
}

if (isset($_POST['submitDeTai'])) {
    $macb = $_POST['macbDeTai'];
    $hoten = $_POST['hoTenChuNhiem'];
    $giangvienthamgia = $_POST['giangVienThamGiaDeTai'];
    $tenDeTai = $_POST['tenDeTai'];
    $batDau = $_POST['batDau'];
    $ketThuc = $_POST['ketThuc'];
    $cap = $_POST['cap'];

    $sqlInsert = "INSERT INTO `topic` (`STT`, `TenDeTai`, `MaCB`, `TenChuNhiem`, `GiangVienThamGia`, `BatDau`, `KetThuc`, `Cap`) VALUES (NULL, '$tenDeTai', '$macb', '$hoten', '$giangvienthamgia', '$batDau', '$ketThuc', '$cap');";
    if (mysqli_query($con, $sqlInsert)) {
        header("Location: http://localhost/joomla/tra-cuu");
    }
}
