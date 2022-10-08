<?php
require "../config/database.php";
if (isset($_POST['submitLaoDongTienTien'])) {
    $bomon = $_POST['bomon'];
    foreach ($bomon as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $s = $row['LaoDongTienTien'] += 1;
        // echo $s . "<br>";
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `LaoDongTienTien` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }
    echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['submitChienSiThiDua'])) {
    $bomon = $_POST['bomon'];
    foreach ($bomon as $value) {
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$value'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $s = $row['ChienSiThiDuaBoMon'] += 1;
        // echo $s . "<br>";
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `ChienSiThiDuaBoMon` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }
    echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}
