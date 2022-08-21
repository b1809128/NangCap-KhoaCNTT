<?php
require("../config/database.php");

if (isset($_POST['editTextArea'])) {
    echo $_POST['editTextArea'];
}

if (isset($_POST['themThoiGian'])) {
    $ngayBatDau = $_POST['ngayBatDau'];
    $ngayKetThuc = $_POST['ngayKetThuc'];

    $sqlInsert = "INSERT INTO `thoigian` (idThoiGian, NgayBatDau, NgayKetThuc) VALUES (NULL,'$ngayBatDau','$ngayKetThuc')";

    if (mysqli_query($con, $sqlInsert)) {
        header("Location: http://localhost/joomla/bienban/");
    }
}
