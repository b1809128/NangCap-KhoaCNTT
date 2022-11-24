<?php
ob_start();
session_start();

require "../config/database.php";

if (isset($_POST['submitLaoDongTienTien'])) {
    $bm = $_POST['maBoMon'];
    $sqlDSLD = "SELECT * FROM thiduakhenthuong where BoMon = '$bm'";
    $resultDSLD = mysqli_query($con, $sqlDSLD);
    $length = mysqli_num_rows($resultDSLD);
    // echo "length:" . $length;
    $i = 0;
    while ($row = mysqli_fetch_array($resultDSLD)) {
        $macb = $row['MaCB'];
        // echo $row['MaCB'] . "-" . $_POST['num' . $i] . "<br>";
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$macb'";
        $result = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_array($result);
        $s = $row1['LaoDongTienTien'];
        if ((int)$_POST['num' . $i] > 0) {
            $s += 1;
            $sqlUpdate = "UPDATE `thiduakhenthuong` SET `LaoDongTienTien` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$macb';";
            $resultUpdate = mysqli_query($con, $sqlUpdate);
        }
        $i++;
    }
    $_SESSION['LDTT'] = $_SESSION['LDTT'] += 1;
    echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['submitChienSiThiDua'])) {
    $bm = $_POST['maBoMon'];
    $sqlDSLD = "SELECT * FROM thiduakhenthuong where BoMon = '$bm'";
    $resultDSLD = mysqli_query($con, $sqlDSLD);
    $length = mysqli_num_rows($resultDSLD);
    // echo "length:" . $length;
    $i = 0;
    while ($row = mysqli_fetch_array($resultDSLD)) {
        $macb = $row['MaCB'];
        // echo $row['MaCB'] . "-" . $_POST['num' . $i] . "<br>";
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$macb'";
        $result = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_array($result);
        $s = $row1['ChienSiThiDuaBoMon'];
        if ((int)$_POST['num' . $i] > 0) {
            $s += 1;
            $sqlUpdate = "UPDATE `thiduakhenthuong` SET `ChienSiThiDuaBoMon` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$macb';";
            $resultUpdate = mysqli_query($con, $sqlUpdate);
        }
        $i++;
    }
    $_SESSION['CSTD'] = $_SESSION['CSTD'] += 1;
    echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}


if (isset($_POST['submitChienSiThiDuaKhoa'])) {
    $sqlDSLD = "select * from thiduakhenthuong where ChienSiThiDuaBoMon > 0";
    $resultDSLD = mysqli_query($con, $sqlDSLD);
    $length = mysqli_num_rows($resultDSLD);
    // echo "length:" . $length;
    $i = 0;
    while ($row = mysqli_fetch_array($resultDSLD)) {
        $macb = $row['MaCB'];
        // echo $row['MaCB'] . "-" . $_POST['num' . $i] . "<br>";
        $sql = "SELECT * FROM thiduakhenthuong where MaCB='$macb'";
        $result = mysqli_query($con, $sql);
        $row1 = mysqli_fetch_array($result);
        $s = $row1['ChienSiThiDuaKhoa'];
        if ((int)$_POST['num' . $i] > 0) {
            $s += 1;
            $sqlUpdate = "UPDATE `thiduakhenthuong` SET `ChienSiThiDuaKhoa` = '$s' WHERE `thiduakhenthuong`.`MaCB` = '$macb';";
            $resultUpdate = mysqli_query($con, $sqlUpdate);
        }
        $i++;
    }
    $_SESSION['CSTDK'] = $_SESSION['CSTDK'] += 1;
    echo "<script>alert('Bầu chọn thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}



if (isset($_GET['resetBoMon'])) {
    $bomon = $_GET['resetBoMon'];
    $_SESSION['LDTT'] = 0;
    $_SESSION['CSTD'] = 0;
    $_SESSION['CSTDK'] = 0;
    $_SESSION['NewForm'] = 0;

    $sqlT = "SELECT * FROM thiduakhenthuong where BoMon = '$bomon'";
    $resultT = mysqli_query($con, $sqlT);

    while ($row = mysqli_fetch_array($resultT)) {
        $id = $row['idThiDua'];
        $sqlUpdate = "UPDATE `thiduakhenthuong` SET `LaoDongTienTien` = '0',  `ChienSiThiDuaBoMon` = '0', `ChienSiThiDuaKhoa` = '0' WHERE `thiduakhenthuong`.`idThiDua` = '$id';";
        $resultUpdate = mysqli_query($con, $sqlUpdate);
    }
    echo "<script>alert('Reset thành công !')</script>";
    header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
}


if (isset($_GET['resetHoiDong'])) {
    $_SESSION['LDTT'] = 0;
    $_SESSION['CSTD'] = 0;
    $_SESSION['CSTDK'] = 0;
    $_SESSION['NewForm'] = 0;

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


if (isset($_POST['submitNewForm'])) {
    $_SESSION['NewForm'] = $_SESSION['NewForm'] + 1;;
    $idForm = $_POST['idForm'];
    $sqlForm = "select * from createform where idForm = '$idForm'";
    $result = mysqli_query($con, $sqlForm);
    $row = mysqli_fetch_array($result);
    $thanhvien = json_decode($row['ThanhVien']);
    $lengthThanhVien = count($thanhvien);

    $arr = json_decode($row['KetQua']);
    if (count($arr) == 0) {
        for ($i = 0; $i < $lengthThanhVien; $i++) {
            // echo (int)$_POST['num' . $i];
            $arr[$i] = (int)$_POST['num' . $i];
        }
    } else {
        for ($i = 0; $i < $lengthThanhVien; $i++) {
            // echo (int)$_POST['num' . $i];
            $arr[$i] = $arr[$i] +  (int)$_POST['num' . $i];
        }
    }
    $data = json_encode($arr);
    // echo json_encode($arr);
    $sqlFormUpdate = "update createform set KetQua='$data' where idForm = '$idForm'";
    if (mysqli_query($con, $sqlFormUpdate)) {
        echo "<script>alert('Bầu chọn thành công !')</script>";
        header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
    }
}
