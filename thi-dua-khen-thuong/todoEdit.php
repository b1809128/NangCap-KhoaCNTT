<?php
require "../config/database.php";
if (isset($_POST['submitLaoDongTienTien'])) {
    $ldttCo = $_POST['ldttCo'];
    $ldttKhong = $_POST['ldttKhong'];

    foreach ($ldttCo as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $s = $row['LaoDongTienTien'] += 1;
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `LaoDongTienTien` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }

    foreach ($ldttKhong as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $s = $row['KhongLaoDongTienTien'] += 1;
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `KhongLaoDongTienTien` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }
    echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['submitChienSiThiDua'])) {
    $cstdCo = $_POST['cstdCo'];
    $cstdKhong = $_POST['cstdKhong'];

    foreach ($cstdCo as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $s = $row['ChienSiThiDuaBoMon'] += 1;
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `ChienSiThiDuaBoMon` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }

    foreach ($cstdKhong as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $s = $row['KhongChienSiThiDuaBoMon'] += 1;
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `KhongChienSiThiDuaBoMon` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }
    echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}


if (isset($_POST['submitChienSiThiDuaKhoa'])) {
    $cstdCo = $_POST['cstdCo'];
    $cstdKhong = $_POST['cstdKhong'];

    foreach ($cstdCo as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $s = $row['ChienSiThiDuaKhoa'] += 1;
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `ChienSiThiDuaKhoa` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }

    foreach ($cstdKhong as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $s = $row['KhongChienSiThiDuaKhoa'] += 1;
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `KhongChienSiThiDuaKhoa` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }
    echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}



if (isset($_GET['resetBoMon'])) {
    $bomon = $_GET['resetBoMon'];
    $sqlT = "SELECT * FROM thiduakhenthuong where BoMon = '$bomon'";
    $resultT = mysqli_query($con, $sqlT);

    while ($row = mysqli_fetch_array($resultT)) {
        $id = $row['idThiDua'];
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `LaoDongTienTien` = '0', `KhongLaoDongTienTien` = '0', `ChienSiThiDuaBoMon` = '0', `KhongChienSiThiDuaBoMon` = '0',`ChienSiThiDuaKhoa` = '0', `KhongChienSiThiDuaKhoa` = '0' WHERE `thiduakhenthuong`.`idThiDua` = '$id';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }
    echo "<script>alert('Reset thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}


if (isset($_GET['resetHoiDong'])) {
    $value = $_GET['resetHoiDong'];
    $sqlT = "SELECT * FROM thiduakhenthuong where HoiDongThiDua = '$value'";
    $resultT = mysqli_query($con, $sqlT);

    while ($row = mysqli_fetch_array($resultT)) {
        $id = $row['idThiDua'];
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `HoiDongThiDua` = '0' WHERE `thiduakhenthuong`.`idThiDua` = '$id';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }
    echo "<script>alert('Reset thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}
