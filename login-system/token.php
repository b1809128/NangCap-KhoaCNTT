<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKEN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    require '../config/database.php'; ?>
    <div class="container">
        <?php require("../navbar/navbar.php"); ?>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="" method="post" style="display:block; text-align:center;">
                    <h3>TẠO TOKEN</h3>
                    <p style="font-weight:700;">Quy tắc tạo nội dung mã hóa token:</p>
                    <p style="color:red;">*Chức vụ hoặc Bộ môn - Khoa Công nghệ thông tin và Truyền thông</p>
                    <select class="form-select" style=" margin-top: 10px;" name="bomon" aria-label="Default select example">
                        <option>--Chọn bộ môn--</option>
                        <?php
                        $sqlSelectMSGT = "SELECT * from bomon ";
                        $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                        while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                            <option value="<?= $row['BoMon'] ?>"><?= $row['TenBoMon'] ?> </option>
                        <?php }
                        ?>
                    </select>
                    <select class="form-select" style=" margin-top: 10px;" name="permission" aria-label="Default select example">
                        <option>--Chọn quyền hạn--</option>
                        <?php
                        $sqlSelectMSGT = "SELECT * from roles ";
                        $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                        while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                            <option value="<?= $row['Permission'] ?>"><?= $row['Permission'] ?> - <?= $row['Role'] ?> </option>
                        <?php }
                        ?>
                    </select>
                    <input style="margin-top: 10px;" class="form-control" type="text" name="token" placeholder="Nội dung mã hóa">
                    <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Khởi tạo</button>
            </div>
            </form>
            <div class="col-sm-4"></div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <form action="" method="get">
                <button class="btn btn-primary" name="resetToken">Reset Token</button>
            </form>
            <h4>DANH SÁCH TOKEN</h4>
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Bộ môn</th>
                    <th>Phân quyền</th>
                    <th>Token</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM access_token";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?= $row['idToken'] ?></td>
                            <td>
                                <?php

                                $bm = $row['BoMon'];
                                $sqlSelectDate = "SELECT * from BoMon where BoMon = '$bm'";
                                $resultThoiGian = mysqli_query($con, $sqlSelectDate);
                                while ($row1 = mysqli_fetch_array($resultThoiGian)) {
                                ?>
                                    <?= $row1['TenBoMon'] ?> <?php }
                                                                ?>
                            </td>
                            <td>
                                <?php

                                $rol = $row['Permission'];
                                $sqlSelectDate = "SELECT * from roles where Permission = '$rol'";
                                $resultThoiGian = mysqli_query($con, $sqlSelectDate);
                                while ($row2 = mysqli_fetch_array($resultThoiGian)) {
                                ?>
                                    <?= $row2['Role'] ?> <?php }
                                                            ?></td>
                            <td><?= $row['Token'] ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>

            </table>

        </div>
        <?php
        if (isset($_POST['submit'])) {
            $bomon = $_POST['bomon'];
            $permission = $_POST['permission'];
            $token = base64_encode($_POST['token']);
            // echo base64_encode($token);
            $sql = "INSERT INTO `access_token` (`idToken`, `BoMon`, `Permission`, `Token`) VALUES (NULL, '$bomon', '$permission', '$token');";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Thêm token thành công');</script>";
                header("Refresh:0; url= http://localhost/joomla/login-system/token.php");
            }
        }

        if (isset($_GET['resetToken'])) {
            session_destroy();
            // session_unset();
            echo "<script>alert('Hết hạn phiên làm việc !');</script>";
            header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
        }
        ?>
    </div>
</body>

</html>