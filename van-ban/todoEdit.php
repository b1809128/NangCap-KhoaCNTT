<?php
require("../config/database.php");

// if (isset($_POST['editTextArea'])) {
//     echo $_POST['editTextArea'];
// }

if (isset($_POST['themThoiGian'])) {
    $ngayBatDau = $_POST['ngayBatDau'];
    $ngayKetThuc = $_POST['ngayKetThuc'];

    $sqlInsert = "INSERT INTO `thoigian` (idThoiGian, NgayBatDau, NgayKetThuc) VALUES (NULL,'$ngayBatDau','$ngayKetThuc')";

    if (mysqli_query($con, $sqlInsert)) {
        header("Location: http://localhost/joomla/van-ban/");
    }
}

if (isset($_POST['submitVanBan'])) {
    $idThoiGian = $_POST['selectDateVanBan'];
    $nguoiSoanVanBan = $_POST['nguoiSoanVanBan'];
    $tenVanBan = $_POST['tenVanBan'];
    $noiDungVanBan = base64_encode($_POST['noiDungVanBan']);


    $sqlInsertVanBan = "INSERT INTO `vanban` (idVanBan, TenVanBan, idThoiGian, NoiDung, MaCB, Created_at, TinhTrang) VALUES (NULL,'$tenVanBan','$idThoiGian','$noiDungVanBan','$nguoiSoanVanBan',null,0);";

    if (mysqli_query($con, $sqlInsertVanBan)) {
        header("Location: http://localhost/joomla/van-ban/");
    }
    // echo $idThoiGian, $nguoiSoanVanBan, $noiDungVanBan,$tenVanBan;
}

if (isset($_POST['submitUpdateTinhTrang'])) {
    $idVanBan = $_POST['updateMSVB'];
    $updateTinhTrang = $_POST['updateTinhTrang'];

    $sqlUpdateTinhTrang = "update vanban set TinhTrang='$updateTinhTrang' where idVanBan='$idVanBan'";
    if (mysqli_query($con, $sqlUpdateTinhTrang)) {
        header("Location: http://localhost/joomla/van-ban/");
    }
}


// if (isset($_POST['submitVanBan'])) {
//     $dataEncode = base64_encode($_POST['noiDungVanBan']);
//     $dataDecode = base64_decode($dataEncode, true);
//     echo $dataDecode;
// }
