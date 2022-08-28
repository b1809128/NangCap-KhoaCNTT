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
        header("Location: http://localhost/joomla/bienban/");
    }
}

if (isset($_POST['submitBienBan'])) {
    $idThoiGian = $_POST['selectDateBienBan'];
    $nguoiSoanBienBan = $_POST['nguoiSoanBienBan'];
    $tenBienBan = $_POST['tenBienBan'];
    $noiDungBienBan = base64_encode($_POST['noiDungBienBan']);


    $sqlInsertBienBan = "INSERT INTO `bienban` (idBienBan, TenBienBan, idThoiGian, NoiDung, MaCB, Created_at, TinhTrang) VALUES (NULL,'$tenBienBan','$idThoiGian','$noiDungBienBan','$nguoiSoanBienBan',null,0);";

    if (mysqli_query($con, $sqlInsertBienBan)) {
        header("Location: http://localhost/joomla/bienban/");
    }
}


// if (isset($_POST['submitBienBan'])) {
//     $dataEncode = base64_encode($_POST['noiDungBienBan']);
//     $dataDecode = base64_decode($dataEncode, true);
//     echo $dataDecode;
// }
