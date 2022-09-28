<?php
require("../config/database.php");

if (isset($_POST['themThoiGian'])) {
    $ngayBatDau = $_POST['ngayBatDau'];
    $ngayKetThuc = $_POST['ngayKetThuc'];

    $sqlInsert = "INSERT INTO `thoigian` (idThoiGian, NgayBatDau, NgayKetThuc) VALUES (NULL,'$ngayBatDau','$ngayKetThuc')";

    if (mysqli_query($con, $sqlInsert)) {
        echo "<script>alert('Thêm thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}

if (isset($_POST['themThoiGianDanhGia'])) {
    $ngayBatDau = $_POST['ngayBatDau'];
    $ngayKetThuc = $_POST['ngayKetThuc'];

    $sqlInsert = "INSERT INTO `thoigiandanhgia` (idThoiGianDanhGia, BatDau, KetThuc) VALUES (NULL,'$ngayBatDau','$ngayKetThuc')";

    if (mysqli_query($con, $sqlInsert)) {
        echo "<script>alert('Thêm thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}


if (isset($_POST['submitCapNhatThoiGian'])) {
    $lichCapNhat = $_POST['lichCapNhat'];
    $mucCapNhat = $_POST['mucCapNhat'];
    $stt = $_POST['maThoiGianCapNhat'];
    $ngayCapNhat = $_POST['ngayCapNhat'];
    if ($lichCapNhat === "lichcongtac") {
        $sqlUpdate = "UPDATE `thoigian` set `$mucCapNhat`='$ngayCapNhat' where idThoiGian='$stt'";
    } else {
        $sqlUpdate = "UPDATE `thoigiandanhgia` set `$mucCapNhat`='$ngayCapNhat' where idThoiGianDanhGia='$stt'";
    }


    if (mysqli_query($con, $sqlUpdate)) {
        echo "<script>alert('Cập nhật thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}

if (isset($_POST['capNhatLichCongTac'])) {
    $stt = $_POST['maSoLich'];
    $mucCapNhat = $_POST['mucCapNhat'];
    $noiDungCapNhat = $_POST['noiDungCapNhat'];

    $sqlUpdate = "UPDATE `lichcongtac` set `$mucCapNhat`='$noiDungCapNhat' where idLichCongTac='$stt'";

    if (mysqli_query($con, $sqlUpdate)) {
        echo "<script>alert('Cập nhật thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}


if (isset($_POST['submitCapNhatGiaoTrinh'])) {
    $stt = $_POST['maSoGiaoTrinh'];
    $mucGiaoTrinh = $_POST['mucGiaoTrinh'];
    $noiDungCapNhat = $_POST['noiDungCapNhat'];


    $sqlUpdate = "UPDATE `manage_post` set `$mucGiaoTrinh`='$noiDungCapNhat' where STT='$stt'";

    if (mysqli_query($con, $sqlUpdate)) {
        echo "<script>alert('Cập nhật thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/tra-cuu/");
    }
}

if (isset($_POST['submitCapNhatBaiBao'])) {
    $stt = $_POST['maSoBaiBao'];
    $mucBaiBao = $_POST['mucBaiBao'];
    $noiDungCapNhat = $_POST['noiDungCapNhat'];


    $sqlUpdate = "UPDATE `manage_post` set `$mucBaiBao`='$noiDungCapNhat' where STT='$stt'";

    if (mysqli_query($con, $sqlUpdate)) {
        echo "<script>alert('Cập nhật thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/tra-cuu/");
    }
}

if (isset($_POST['submitCapNhatDeTai'])) {
    $stt = $_POST['maSoDeTai'];
    $mucDeTai = $_POST['mucDeTai'];
    $noiDungCapNhat = $_POST['noiDungCapNhat'];


    $sqlUpdate = "UPDATE `topic` set `$mucDeTai`='$noiDungCapNhat' where STT='$stt'";

    if (mysqli_query($con, $sqlUpdate)) {
        echo "<script>alert('Cập nhật thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/tra-cuu/");
    }
}

if (isset($_POST['submitXoaLich'])) {
    $mucXoa = $_POST['mucXoa'];
    $maSoXoa = $_POST['maSoXoa'];

    if ($mucXoa === "lichcongtac") {
        $sqlDelete = "DELETE FROM `$mucXoa` WHERE `idLichCongTac` = '$maSoXoa'";
    } else if ($mucXoa === "thoigiandanhgia") {
        $sqlDelete = "DELETE FROM `$mucXoa` WHERE `idThoiGianDanhGia` = '$maSoXoa'";
    } else {
        $sqlDelete = "DELETE FROM `$mucXoa` WHERE `idThoiGian` = '$maSoXoa'";
    }

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert('Xóa thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}

if (isset($_POST['submitXoaThongTin'])) {
    $stt = $_POST['maSoXoa'];
    $mucXoa = $_POST['mucXoa'];

    $sqlDelete = "DELETE FROM `$mucXoa` WHERE `STT` = '$stt'";

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert('Xóa thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}


if (isset($_POST['submitXoaThongTinVanBan'])) {
    $stt = $_POST['maSoVanBan'];

    $sqlDelete = "DELETE FROM `vanban` WHERE `idVanBan` = '$stt'";

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert('Xóa thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}

if (isset($_POST['submitXoaThongTinDanhGia'])) {
    $stt = $_POST['maSoDanhGia'];

    $sqlDelete = "DELETE FROM `phieudanhgiavc` WHERE `idDanhGia` = '$stt'";

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert('Xóa thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}

if (isset($_POST['submitXoaThongTinCanBo'])) {
    $stt = $_POST['maSoCanBo'];

    $sqlDelete = "DELETE FROM `teacher` WHERE `MaCB` = '$stt'";

    if (mysqli_query($con, $sqlDelete)) {
        echo "<script>alert('Xóa thông tin thành công');</script>";
        header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
    }
}
