<?php ob_start();
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TẠO FORM</title>
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
            if ((int)$row['Permission'] < 6) {
                $bm = $_GET['bomon'];
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item" aria-current="page">Data</li>
            </ol>
        </nav>
        <div class="row">
            <form action="" method="post">
                <h5 style="color: #0d6efd;">TẠO FORM BẦU CHỌN</h5>
                <input type="text" name="tenForm" id="" class="form-control" placeholder="Nhập tên form">
                <div style="display: flex;">
                    <input class="form-check-input" type="checkbox" value="" name="" id="select-all"> Chọn tất cả
                </div> <?php
                        $sqlSelectMSGT = "SELECT * FROM teacher WHERE BoMon = '$bomon'";
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
                <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submitThemThanhVien">Khởi Tạo</button>
            </form>
        </div>
        <div class="row" style="margin: 10px 0;">
            <h4 style="color: #0d6efd;">DANH SÁCH FORM ĐÃ TẠO</h4>
            <table class="table">
                <thead style="text-align:center;">
                    <tr>
                        <th scope="col">Mã số</th>
                        <th scope="col">Tên biểu mẫu</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlForm = "select * from createform where BoMon = '$bomon'";
                    $resultForm = mysqli_query($con, $sqlForm);
                    while ($row = mysqli_fetch_array($resultForm)) { ?>
                        <tr>
                            <th style="text-align:center;" scope="row"><?= $row['idForm'] ?></th>
                            <td><?= $row['TenForm'] ?></td>
                            <td style="text-align:center;"><?= $row['Created_at'] ?></td>
                            <td style="text-align:center;"><a href="http://localhost/joomla/thi-dua-khen-thuong/createform.php?active=1&idFormA=<?= $row['idForm'] ?>" class="btn btn-success">Active</a> <a href="http://localhost/joomla/thi-dua-khen-thuong/createform.php?active=0&idFormA=<?= $row['idForm'] ?>" class="btn btn-warning">Stop</a></td>
                            <td style="color:red;text-align:center;"><a href="http://localhost/joomla/thi-dua-khen-thuong/createform.php?idForm=<?= $row['idForm'] ?>" class="btn btn-danger">Xóa</a></td>
                        </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
        <?php
        if (isset($_POST['submitThemThanhVien'])) {
            $tenForm = $_POST['tenForm'];
            $macb = $_POST['macb'];
            $dataInsert = json_encode($macb);

            $sql = "insert into `createform` (`idForm`,`BoMon`,`TenForm`,`ThanhVien`,`KetQua`,`Active`,`Created_at`) VALUES (NULL,'$bomon','$tenForm','$dataInsert','[]',0,current_timestamp()) ";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Tạo biểu mẫu thành công');</script>";
                header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
            }
        }

        if (isset($_GET['idForm'])) {
            $idForm = $_GET['idForm'];
            $sql = "DELETE FROM createform WHERE `createform`.`idForm` = '$idForm'";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Xóa biểu mẫu thành công');</script>";
                header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
            }
        }

        if (isset($_GET['active']) && $_GET['idFormA']) {
            $active = $_GET['active'];
            $idForm = $_GET['idFormA'];
            $sql = "UPDATE `createform` SET `Active` = '$active' WHERE `createform`.`idForm` = '$idForm';";
            if (mysqli_query($con, $sql)) {
                echo "<script>alert('Cập nhật trạng thái thành công');</script>";
                header("Refresh:0; url= " . $_SERVER['HTTP_REFERER']);
            }
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