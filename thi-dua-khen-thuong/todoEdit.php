<?php
require "../config/database.php";
if (isset($_POST['submitLaoDongTienTien'])) {
    $bomon = $_POST['bomon'];
    $maBoMon = $_POST['maBoMon'];
    $sqlT = "SELECT * FROM thiduakhenthuong where BoMon = '$maBoMon'";
    $resultT = mysqli_query($con, $sqlT);
    $teacherLength = mysqli_num_rows($resultT);
    foreach ($bomon as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        if ((int)$row['LaoDongTienTien'] >= $teacherLength) {
            echo "<script>alert('Không thể bầu chọn do đã có số phiếu tối đa')</script>";
        } else {
            $s = $row['LaoDongTienTien'] += 1;
            $sqlUpdate = "UPDATE `thiduakhenthuong` SET `LaoDongTienTien` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
            $resultUpdate = mysqli_query($con, $sqlUpdate);
        }
    }
    // echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['submitChienSiThiDua'])) {
    $bomon = $_POST['bomon'];
    $maBoMon = $_POST['maBoMon'];
    $sqlT = "SELECT * FROM thiduakhenthuong where BoMon = '$maBoMon'";
    $resultT = mysqli_query($con, $sqlT);
    $teacherLength = mysqli_num_rows($resultT);
    foreach ($bomon as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        if ((int)$row['ChienSiThiDuaBoMon'] >= $teacherLength) {
            echo "<script>alert('Không thể bầu chọn do đã có số phiếu tối đa')</script>";
        } else {
            $s = $row['ChienSiThiDuaBoMon'] += 1;
            $sqlUpdate = "UPDATE `thiduakhenthuong` SET `ChienSiThiDuaBoMon` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
            $resultUpdate = mysqli_query($con, $sqlUpdate);
        }
    }
    // echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['submitChienSiThiDuaCapKhoa'])) {
    $bomon = $_POST['bomon'];
    $sqlT = "SELECT * FROM thiduakhenthuong";
    $resultT = mysqli_query($con, $sqlT);
    $teacherLength = mysqli_num_rows($resultT);

    foreach ($bomon as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        if ((int)$row['ChienSiThiDuaKhoa'] >= $teacherLength) {
            echo "<script>alert('Không thể bầu chọn do đã có số phiếu tối đa')</script>";
        } else {
            $s = $row['ChienSiThiDuaKhoa'] += 1;
            $sqlUpdate = "UPDATE `thiduakhenthuong` SET `ChienSiThiDuaKhoa` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
            $resultUpdate = mysqli_query($con, $sqlUpdate);
        }
    }
    // echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}
