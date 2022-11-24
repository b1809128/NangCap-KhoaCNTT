<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM THÀNH VIÊN HỘI ĐỒNG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    require '../config/database.php';
    if (!isset($_SESSION['tokenId'])) {
        echo "<script>alert('Không có quyền truy cập !');</script>";
        header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
    }
    if (isset($_SESSION['tokenId'])) {
        $tokenId = $_SESSION['tokenId'];
        $sqlToken = "SELECT * FROM access_token where idToken='$tokenId'";
        $resToken = mysqli_query($con, $sqlToken);
        $row = mysqli_fetch_array($resToken);
        if ((int)$row['Permission'] < 6) {
            echo "<script>alert('Không có quyền truy cập !');</script>";
            header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
        }
    }
    if (isset($_GET['bomon'])) $bomon = $_GET['bomon'];
    ?>
    <div class="container">
        <?php require("../navbar/navbar.php"); ?>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-6">
                <form action="" method="post">
                    <h5 style="color: #0d6efd;">THÊM THÀNH VIÊN HỘI ĐỒNG XÉT THI ĐUA</h5>
                    <div style="display: flex;">
                        <input class="form-check-input" type="checkbox" value="" name="" id="select-all"> Chọn tất cả
                    </div>
                    <?php
                    $sqlSelectMSGT = "SELECT * from thiduakhenthuong where HoiDongThiDua = 0";
                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                        <div style="text-align: left;">
                            <input class="form-check-input" type="checkbox" value="<?= $row['MaCB'] ?>" name="macb[]">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php $ms = $row['MaCB'];
                                $sqlMaCB = "SELECT * FROM teacher where MaCB='$ms'";
                                $resultMaCB = mysqli_query($con, $sqlMaCB);
                                while ($row1 = mysqli_fetch_array($resultMaCB)) {
                                    echo $row1['HoTen'];
                                    if ($row1['Permission'] > 4) {
                                        $per = $row1['Permission'];
                                        $sqlPer = "SELECT * FROM roles WHERE Permission ='$per'";
                                        $resultPer = mysqli_query($con, $sqlPer);
                                        $row2 = mysqli_fetch_array($resultPer);
                                        echo " - " . $row2['Role'];
                                    }
                                }
                                ?>
                            </label>
                        </div>
                    <?php }
                    ?>
                    <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submitThemThanhVien">THÊM THÀNH VIÊN</button>
                </form>
            </div>
            <div class="col-sm-6">
                <form action="" method="post">
                    <h5 style="color: #0d6efd;">DANH SÁCH HỘI ĐỒNG XÉT THI ĐUA</h5>
                    <?php
                    $sqlSelectMSGT = "SELECT * from thiduakhenthuong where HoiDongThiDua > 0";
                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                        <div style="text-align: left;">
                            <input class="form-check-input" type="checkbox" value="<?= $row['MaCB'] ?>" name="macb[]">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?php $ms = $row['MaCB'];
                                $sqlMaCB = "SELECT * FROM teacher where MaCB='$ms'";
                                $resultMaCB = mysqli_query($con, $sqlMaCB);
                                while ($row1 = mysqli_fetch_array($resultMaCB)) {
                                    echo $row1['HoTen'];
                                    if ($row1['Permission'] > 4) {
                                        $per = $row1['Permission'];
                                        $sqlPer = "SELECT * FROM roles WHERE Permission ='$per'";
                                        $resultPer = mysqli_query($con, $sqlPer);
                                        $row2 = mysqli_fetch_array($resultPer);
                                        echo " - " . $row2['Role'];
                                    }
                                }
                                ?>
                            </label>
                        </div>
                    <?php }
                    ?>
                    <button style="margin-top: 10px;" class="btn btn-danger" type="submit" name="submitXoaThanhVien">XÓA THÀNH VIÊN</button>
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['submitThemThanhVien'])) {
            $macb = $_POST['macb'];
            foreach ($macb as $value) {
                $sqlUpdate = "UPDATE `thiduakhenthuong` SET `HoiDongThiDua` = '1' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
                mysqli_query($con, $sqlUpdate);
            }
            // foreach ($macb as $value){
            //     echo $value;
            // }
            echo "<script>alert('Thêm thành viên thành công');</script>";
            header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
        }
        if (isset($_POST['submitXoaThanhVien'])) {
            $macb = $_POST['macb'];
            foreach ($macb as $value) {
                $sqlUpdate = "UPDATE `thiduakhenthuong` SET `HoiDongThiDua` = '0' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
                mysqli_query($con, $sqlUpdate);
            }
            echo "<script>alert('Xóa thành viên thành công');</script>";
            header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>
    <script type="text/javascript">
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('macb[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
</body>

</html>