<?php
require "../config/database.php";
if (isset($_POST['submitDanhGia'])) {
    // echo $_POST['macb'] . "<br>";
    // echo $_POST['chucVu'] . "<br>";
    // echo $_POST['bomon'] . "<br>";
    // echo $_POST['idThoiGianDanhGia'] . "<br>";
    // echo $_POST['chinhTriTuTuong'] . "<br>";
    // echo $_POST['daoDucLoiSong'] . "<br>";
    // echo $_POST['tacPhongLeLoi'] . "<br>";
    // echo $_POST['yThucToChuc'] . "<br>";
    // echo $_POST['thaiDoPhucVu'] . "<br>";
    // echo "<div style='white-space: pre-line;'>" . $_POST['ketQuaThucHien'] . "</div><br>";
    // echo $_POST['ketQuaHoatDong'] . "<br>";
    // echo $_POST['nangLucLanhDao'] . "<br>";
    // echo $_POST['tapHopDoanKet'] . "<br>";
    // echo $_POST['uuKhuyetDiem'] . "<br>";
    // echo $_POST['xepLoai'] . "<br>";
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

    $sqlInsert = "INSERT INTO `phieudanhgiavc` (`idDanhGia`, `idThoiGianDanhGia`, `MaCB`, `Permission`, `BoMon`, `ChinhTriTuTuong`, `DaoDucLoiSong`, `TacPhongLeLoi`, `YThucToChuc`, `KetQuaThucHien`, `ThaiDoPhucVu`, `KetQuaHoatDong`, `NangLucLanhDao`, `TapHopDoanKet`, `UuKhuyetDiem`, `XepLoai`,`Created_at`)  VALUES (Null,'$idThoiGianDanhGia','$macb','$permission','$bomon','$chinhTriTuTuong','$daoDucLoiSong','$tacPhongLeLoi','$yThucToChuc','$ketQuaThucHien','$thaiDoPhucVu','$ketQuaHoatDong','$nangLucLanhDao','$tapHopDoanKet','$uuKhuyetDiem','$xepLoai',Null) ;";
    if (mysqli_query($con, $sqlInsert)) {
        header("Location: http://localhost/joomla/phieu-danh-gia");
    }
}
