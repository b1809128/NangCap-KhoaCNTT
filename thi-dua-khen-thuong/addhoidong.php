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
    if (isset($_GET['bomon'])) $bomon = $_GET['bomon'];
    ?>
    <div class="container">
        <?php require("../navbar/navbar.php"); ?>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="" method="post" style="display:block; width:100%; text-align:center;">
                    <h3>THÊM THÀNH VIÊN HỘI ĐỒNG XÉT THI ĐUA</h3>
                    <?php
                    $sqlSelectMSGT = "SELECT * from thiduakhenthuong";
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
                                }
                                ?>
                            </label> <?php }
                                        ?>
                        </div>
                        <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">THÊM THÀNH VIÊN</button>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $macb = $_POST['macb'];
            foreach ($macb as $value) {
                $sqlUpdate = "UPDATE `thiduakhenthuong` SET `HoiDongThiDua` = '1' WHERE `thiduakhenthuong`.`MaCB` = '$value';";
                mysqli_query($con, $sqlUpdate);
            }
            echo "<script>alert('Thêm thành viên thành công');</script>";
            header("Refresh:0; url= http://localhost/joomla/thi-dua-khen-thuong/danhgia.php");
        }
        ?>
    </div>
</body>

</html>