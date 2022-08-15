<?php
require("../config/database.php");
if (isset($_POST['themThoiGian'])) {
    $ngayBatDau = $_POST['ngayBatDau'];
    $thangBatDau = $_POST['thangBatDau'];
    $namBatDau = $_POST['namBatDau'];

    $ngayKetThuc = $_POST['ngayKetThuc'];
    $thangKetThuc = $_POST['thangKetThuc'];
    $namKetThuc = $_POST['namKetThuc'];

    $sqlInsert = "INSERT INTO `thoigian` (idThoiGian, NgayBatDau, NgayKetThuc) VALUES (NULL,'$namBatDau-$thangBatDau-$ngayBatDau','$namKetThuc-$thangKetThuc-$ngayKetThuc')";
    if (mysqli_query($con, $sqlInsert)) {
        header("Location: http://localhost/joomla/lichcongtac/");
    }
}


if (isset($_GET['themLichCongTac'])) {
    $mocThoiGian = $_GET['mocThoiGian'];
    $thu = $_GET['thu'];
    $ngay = $_GET['ngay'];
    $thang = $_GET['thang'];
    $nam = $_GET['nam'];
    $buoi = $_GET['buoi'];
    $gio = $_GET['gio'];
    $diaDiem = $_GET['diaDiem'];
    $toChuc = $_GET['toChuc'];
    $hinhThuc = $_GET['hinhThuc'];
    $noiDung = $_GET['noiDung'];
    $taiLieu = $_GET['taiLieu'];
    if (!isset($_GET['bomon'])) {
        $thanhPhan = $_GET['macb'];
    } else if (isset($_GET['tatCaBoMon'])) {
        $thanhPhan = $_GET['tatCaBoMon'];
    } else {
        $bomon = $_GET['bomon'];
        $tpStringArray = "<br>";
        foreach ($bomon as $key => $value) {
            $tpStringArray = $tpStringArray . $value . "<br>";
        }
    }

    if (isset($thanhPhan)) {
        $sqlInsert = "INSERT INTO `lichcongtac` (`idLichCongTac`, `Thu`, `Buoi`, `Gio`, `HinhThucHop`, `TaiLieuHop`, `DonViToChuc`, `DiaDiem`, `NoiDung`, `ThanhPhan`, `ThoiGian`, `idThoiGian`) VALUES (NULL, '$thu', '$buoi', '$gio', '$hinhThuc', '$taiLieu', '$toChuc', '$diaDiem', '$noiDung', '$thanhPhan', '$nam-$thang-$ngay', '$mocThoiGian');";
        if (mysqli_query($con, $sqlInsert)) {
            header("Location: http://localhost/joomla/lichcongtac/");
        }
    } else {
        // echo json_encode($tpArray);
        // $tpJson = json_encode($tpArray);
        $sqlInsert = "INSERT INTO `lichcongtac` (`idLichCongTac`, `Thu`, `Buoi`, `Gio`, `HinhThucHop`, `TaiLieuHop`, `DonViToChuc`, `DiaDiem`, `NoiDung`, `ThanhPhan`, `ThoiGian`, `idThoiGian`) VALUES (NULL, '$thu', '$buoi', '$gio', '$hinhThuc', '$taiLieu', '$toChuc', '$diaDiem', '$noiDung', '$tpStringArray', '$nam-$thang-$ngay', '$mocThoiGian');";
        if (mysqli_query($con, $sqlInsert)) {
            header("Location: http://localhost/joomla/lichcongtac/");
        }
    }
}
