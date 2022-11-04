<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM THÀNH VIÊN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    require '../config/database.php';
    if (!isset($_SESSION['tokenId'])) {
        echo "<script>alert('Không có quyền truy cập !');</script>";
        header("Refresh:0; url= http://localhost/joomla/login-system/");
    }
    if (isset($_SESSION['tokenId'])) {
        $tokenId = $_SESSION['tokenId'];
        $sqlToken = "SELECT * FROM access_token where idToken='$tokenId'";
        $resToken = mysqli_query($con, $sqlToken);
        $row = mysqli_fetch_array($resToken);
        if ((int)$row['Permission'] > 3) {
            $bm = $_GET['bomon'];
            if ((int)$row['Permission'] < 6) {
                if ($bm !== $row['BoMon']) {
                    echo "<script>alert('Không có quyền truy cập Bộ môn " . $bm . " !');</script>";
                    header("Refresh:0; url= http://localhost/joomla/thi-dua-khen-thuong");
                }
            }
        } else if ((int)$row['Permission'] < 4) {
            echo "<script>alert('Không có quyền truy cập !');</script>";
            header("Refresh:0; url= http://localhost/joomla/login-system/");
        }
    }
    if (isset($_GET['bomon'])) $bomon = $_GET['bomon'];
    ?>
    <div class="container">
        <?php require("../navbar/navbar.php"); ?>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="" method="post" style="display:block; text-align:center;">
                    <h3>THÊM THÀNH VIÊN XÉT THI ĐUA</h3>
                    <select class="form-select" style=" margin-top: 10px;" name="selectBoMon" aria-label="Default select example">
                        <option>--Chọn bộ môn--</option>
                        <?php
                        $sqlSelectMSGT = "SELECT * from bomon where BoMon='$bomon' ";
                        $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                        while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                            <option value="<?= $row['BoMon'] ?>"><?= $row['TenBoMon'] ?> </option>
                        <?php }
                        ?>
                    </select>
                    <select class="form-select" style=" margin-top: 10px;" name="selectMaCB" aria-label="Default select example">
                        <option>--Chọn thành viên--</option>
                        <?php
                        $sqlSelectMSGT = "SELECT * from teacher where BoMon='$bomon' ";
                        $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                        while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                            <option value="<?= $row['MaCB'] ?>"><?= $row['HoTen'] ?></option>
                        <?php }
                        ?>
                    </select>
                    <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Thêm thành viên</button>
            </div>
            </form>
            <div class="col-sm-4"></div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $selectBoMon = $_POST['selectBoMon'];
            $selectMaCB = $_POST['selectMaCB'];
            $sql = "INSERT INTO `thiduakhenthuong` (`idThiDua`, `BoMon`, `MaCB`, `LaoDongTienTien`,`KhongLaoDongTienTien`, `ChienSiThiDuaBoMon`,`KhongChienSiThiDuaBoMon`, `ChienSiThiDuaKhoa`,`KhongChienSiThiDuaKhoa`,`HoiDongThiDua`, `Created_at`) VALUES (NULL, '$selectBoMon', '$selectMaCB', '0', '0', '0', '0', '0', '0','0', current_timestamp());";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Thêm thành viên thành công');</script>";
                header("Refresh:0; url= http://localhost/joomla/thi-dua-khen-thuong/details.php?bomon=" . $_GET['bomon']);
            }
        }
        ?>
    </div>
</body>

</html>