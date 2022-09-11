<?php
require("../config/database.php");
ob_start();
session_start();
if (isset($_GET['themLichCongTac'])) {
    $mocThoiGian = $_GET['mocThoiGian'];
    $thu = $_GET['thu'];
    $ngay = $_GET['ngayTrongTuan'];

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
        $tpStringSession = "";
        $length = count($bomon);
        $index = 0;
        foreach ($bomon as $key => $value) {
            $tpStringArray = $tpStringArray . $value . "<br>";
            $sqlMaCB = "SELECT * FROM teacher where HoTen LIKE '%$value%'";
            $resultMaCB = mysqli_query($con, $sqlMaCB);
            while ($row = mysqli_fetch_array($resultMaCB)) {
                $tpStringSession = $tpStringSession . $row['Email'];
            }
            if ($index < $length - 1) {
                $tpStringSession = $tpStringSession . ", ";
            }
            $index += 1;
        }
        $_SESSION['emailSession'] = $tpStringSession;
    }

    //Check Duplicate
    $sqlDuplicate = "SELECT * FROM lichcongtac WHERE Thu='$thu' AND Gio='$gio' AND DiaDiem='$diaDiem' AND idThoiGian='$mocThoiGian';";
    $resultDulicate = mysqli_query($con, $sqlDuplicate);
    $lengthDuplicate = mysqli_num_rows($resultDulicate);
    if ($lengthDuplicate === 0) {

        if (isset($thanhPhan)) {
            $sqlInsert = "INSERT INTO `lichcongtac` (`idLichCongTac`, `Thu`, `Buoi`, `Gio`, `HinhThucHop`, `TaiLieuHop`, `DonViToChuc`, `DiaDiem`, `NoiDung`, `ThanhPhan`, `ThoiGian`, `idThoiGian`) VALUES (NULL, '$thu', '$buoi', '$gio', '$hinhThuc', '$taiLieu', '$toChuc', '$diaDiem', '$noiDung', '$thanhPhan', '$ngay', '$mocThoiGian');";
            if (mysqli_query($con, $sqlInsert)) {
                header("Location: http://localhost/joomla/lichcongtac/");
            }
        } else {
            // echo json_encode($tpArray);
            // $tpJson = json_encode($tpArray);
            $sqlInsert = "INSERT INTO `lichcongtac` (`idLichCongTac`, `Thu`, `Buoi`, `Gio`, `HinhThucHop`, `TaiLieuHop`, `DonViToChuc`, `DiaDiem`, `NoiDung`, `ThanhPhan`, `ThoiGian`, `idThoiGian`) VALUES (NULL, '$thu', '$buoi', '$gio', '$hinhThuc', '$taiLieu', '$toChuc', '$diaDiem', '$noiDung', '$tpStringArray', '$ngay', '$mocThoiGian');";
            if (mysqli_query($con, $sqlInsert)) {
                header("Location: http://localhost/joomla/lichcongtac/");
            }
        }
    } else {
        if ($lengthDuplicate > 0) {
            echo "<script>alert('Không thể thêm do trùng lịch. Kiểm tra lại giờ, địa điểm')</script>";
            header("Refresh:1; url=http://localhost/joomla/lichcongtac/insert.php");
        }
    }
}

if (isset($_GET['destroySession'])) {
    session_unset();
    header("Location: http://localhost/joomla/google-calendar/");
}
