<?php
require("./config/database.php");
if (isset($_POST['submit'])) {
    $macb = $_POST['macb'];
    $hoten = $_POST['hoten'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $sodienthoai = $_POST['sdt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $hocvi = $_POST['hocvi'];
    $sqlInsert = "INSERT INTO `teacher` (`STT`, `MaCB`, `HoTen`, `GioiTinh`, `NgaySinh`, `SoDienThoai`, `Email`, `DiaChi`, `HocVi`, `HocVan`, `ChungChi`, `NghienCuu`, `KinhNghiem`, `BaiBao`, `ThamGia`) VALUES (NULL,'$macb','$hoten','$gioitinh','$ngaysinh','$sodienthoai','$email','$diachi','$hocvi','','','','','','');";
    if (mysqli_query($con, $sqlInsert)) {
        header("Location: /teacher-info-permission.php?profile=$profileName");
    }
}
