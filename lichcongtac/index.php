<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LỊCH CÔNG TÁC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./print/calendar.css">
</head>

<body>
    <?php require("../config/database.php");

    ?>
    <div class="container">
        <!-- Content here -->
        <div class="row" style="margin: 10px 0;">
            <h4>Lịch công tác Khoa CNTT & TT</h4>
            <div class="col-sm-2">
                <form method="get" style="display:flex;">
                    <input type="date" class="form-control" name="searchDate" placeholder="Tìm Kiếm">
                    <button type="submit" class="btn btn-primary">Tìm</button>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <form style="display:flex;" method="get">
                            <select style="width: 300px;" class="form-select" name="selectDate" aria-label="Default select example" name="mocThoiGian">
                                <option selected>--Ngày, tháng, năm--</option>
                                <?php
                                $sql = "SELECT * FROM thoigian";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <option <?php if (isset($_GET['selectDate']) && $_GET['selectDate'] == $row['idThoiGian']) {
                                                echo "selected";
                                            } ?> value="<?= $row['idThoiGian'] ?>">Từ <?= $row['NgayBatDau'] ?> đến <?= $row['NgayKetThuc'] ?></option>
                                <?php }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary">Lọc</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <form method="get" style="display:flex;">
                            <input type="text" class="form-control" name="searchText" placeholder="Tìm Kiếm">
                            <button type="submit" class="btn btn-primary">Tìm</button>
                        </form>
                    </div>
                </div>


            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-4"><button class="btn btn-success" onclick="generatePDF()">PDF</button></div>
                    <div class="col-sm-4"><a href="http://localhost/joomla/lichcongtac/insert.php" class="btn btn-primary">Tạo lịch</a></div>
                    <div class="col-sm-4"><a href="http://localhost/joomla/lichcongtac/quanly.php" class="btn btn-primary">Quản lý </a></div>
                </div>
            </div>

        </div>
        <div class="row">
            <table class="table" id="pdfBody">
                <tr style="font-weight:700">
                    <td rowspan="2">Ngày/Buổi</td>
                    <td colspan="2" style="color: red;">Sáng</td>
                    <td colspan="2" style="color: red;">Chiều / Tối</td>
                </tr>
                <tr style="font-weight:700">
                    <td>Trường</td>
                    <td>Khoa</td>
                    <td>Trường</td>
                    <td>Khoa</td>
                </tr>
                <?php
                $thu = 2;
                if (!isset($_GET['searchDate']) && !isset($_GET['selectDate']) && !isset($_GET['searchText'])) {


                    $sql = "SELECT * FROM thoigian";
                    $result = mysqli_query($con, $sql);
                    $length = mysqli_num_rows($result);
                    $idThoiGian = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        if ($idThoiGian == $row["idThoiGian"]) {
                            $ngay =  intval(explode("-", $row["NgayBatDau"])[2]);
                            $thang = intval(explode("-", $row["NgayBatDau"])[1]);
                            $nam = intval(explode("-", $row["NgayBatDau"])[0]);
                        }
                    }
                    // $ngay = 15;
                    while ($thu <= 8) {
                ?>

                        <tr>
                            <td style="font-weight:700;">
                                <p style="margin-bottom:0;">Thứ <?php if ($thu === 8) {
                                                                    echo "CN";
                                                                } else echo $thu; ?></p> <?php if ((($thang === 1 || $thang === 3 || $thang === 5 || $thang === 7 || $thang === 8 || $thang === 10 || $thang === 12) && ($ngay > 31)) || (($thang === 4 || $thang === 6 || $thang === 9 || $thang === 11) && ($ngay > 30)) || (($thang === 2) && ($ngay > 28))) {
                                                                                                $ngay = 1;
                                                                                                echo $ngay;
                                                                                            } else {
                                                                                                echo $ngay;
                                                                                            }  ?>/<?php if ($ngay === 1) {
                                                                                                        $thang = $thang + 1;
                                                                                                        echo $thang;
                                                                                                    } else {
                                                                                                        echo $thang;
                                                                                                    } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='$nam-$thang-$ngay' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='$nam-$thang-$ngay' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td><?php
                                $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='$nam-$thang-$ngay' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='$nam-$thang-$ngay' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                        </tr>
                    <?php
                        $thu += 1;
                        $ngay += 1;
                    }
                } else if (isset($_GET['selectDate'])) {
                    $selectDate = $_GET['selectDate'];
                    $sql = "SELECT * FROM thoigian where idThoiGian='$selectDate'";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        if ($selectDate == $row["idThoiGian"]) {
                            $ngay =  intval(explode("-", $row["NgayBatDau"])[2]);
                            $thang = intval(explode("-", $row["NgayBatDau"])[1]);
                            $nam = intval(explode("-", $row["NgayBatDau"])[0]);
                            // echo $row["NgayBatDau"];
                        }
                    }
                    while ($thu <= 8) { ?>
                        <tr>
                            <td style="font-weight:700;">
                                <p style="margin-bottom:0;">Thứ <?php if ($thu === 8) {
                                                                    echo "CN";
                                                                } else echo $thu; ?></p> <?php if ((($thang === 1 || $thang === 3 || $thang === 5 || $thang === 7 || $thang === 8 || $thang === 10 || $thang === 12) && ($ngay > 31)) || (($thang === 4 || $thang === 6 || $thang === 9 || $thang === 11) && ($ngay > 30)) || (($thang === 2) && ($ngay > 28))) {
                                                                                                $ngay = 1;
                                                                                                echo $ngay;
                                                                                            } else {
                                                                                                echo $ngay;
                                                                                            }  ?>/<?php if ($ngay === 1) {
                                                                                                        $thang = $thang + 1;
                                                                                                        echo $thang;
                                                                                                    } else {
                                                                                                        echo $thang;
                                                                                                    } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='$nam-$thang-$ngay' and idThoiGian='$selectDate' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='$nam-$thang-$ngay' and idThoiGian='$selectDate' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td><?php
                                $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='$nam-$thang-$ngay' and idThoiGian='$selectDate' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='$nam-$thang-$ngay' and idThoiGian='$selectDate' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                        </tr>
                    <?php
                        $thu += 1;
                        $ngay += 1;
                    }
                } else if (isset($_GET['searchDate'])) {
                    $searchDate = $_GET['searchDate'];
                    while ($thu < 3) { ?>

                        <tr>
                            <td style="font-weight:700;">
                                <?= $searchDate ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='$searchDate' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='$searchDate' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td><?php
                                $sql = "SELECT * FROM lichcongtac where Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='$searchDate' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='$searchDate' ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                        </tr>
                    <?php
                        $thu += 1;
                    }
                } else if (isset($_GET['searchText'])) {
                    $searchText = $_GET['searchText'];
                    $sqlSearchText = "SELECT distinct ThoiGian FROM lichcongtac where (NoiDung LIKE '%$searchText%' OR ThanhPhan LIKE '%$searchText%') ";
                    $resultSearchText = mysqli_query($con, $sqlSearchText);
                    while ($row = mysqli_fetch_array($resultSearchText)) {
                        $tg = $row['ThoiGian']; ?>
                        <tr>
                            <td style="font-weight:700;">
                                <?= $row['ThoiGian'] ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='$tg' and (NoiDung LIKE '%$searchText%' OR ThanhPhan LIKE '%$searchText%') ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td>
                                <?php
                                $sql = "SELECT * FROM lichcongtac where Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='$tg' and (NoiDung LIKE '%$searchText%' OR ThanhPhan LIKE '%$searchText%') ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td><?php
                                $sql = "SELECT * FROM lichcongtac where Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='$tg' and (NoiDung LIKE '%$searchText%' OR ThanhPhan LIKE '%$searchText%') ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                            <td>
                                <?php

                                $sql = "SELECT * FROM lichcongtac where Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='$tg' and (NoiDung LIKE '%$searchText%' OR ThanhPhan LIKE '%$searchText%') ";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    require "./print/text.php";
                                } ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>



            </table>
        </div>
    </div>
    <script type="text/javascript">
        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = document.getElementById('pdfBody');
            // Choose the element and save the PDF for our user.
            html2pdf().from(element).save();
        }
    </script>
</body>

</html>