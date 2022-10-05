<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ LỊCH CÔNG TÁC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php require("../config/database.php");

    ?>
    <div class="container">
        <h4>Quản lý lịch công tác Khoa CNTT</h4>
        <div class="row">
            <div class="col-sm-6">
                <form action="" style="display: flex;" method="get">

                    <select class="form-select" id="" onchange="selectChanges()" aria-label="Default select example" name="selectTheoNam">
                        <option value="all">--Tất cả năm--</option>
                        <?php
                        $sql = "SELECT DISTINCT EXTRACT(YEAR FROM NgayBatDau) AS year FROM thoigian;";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <option value="<?= $row['year'] ?>">Năm <?= $row['year'] ?></option>
                        <?php }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Lọc</button>

                </form>
            </div>
            <div class="col-sm-6">
                <form action="./timkiem.php" style="display: flex;" method="post">

                    <input type="date" class="form-control" name="ngayBatDau" placeholder="Bắt đầu">
                    <input type="date" class="form-control" name="ngayKetThuc" placeholder="Kết thúc">

                    <button type="submit" class="btn btn-primary">Lọc</button>

                </form>
            </div>


        </div>
        <?php
        if (isset($_GET['selectTheoNam'])) {
            $selectTheoNam = $_GET['selectTheoNam'];
            if ($selectTheoNam === "all") {
                header("Location: http://localhost/joomla/lichcongtac/quanly.php");
            }
            $sqlYear = "SELECT DISTINCT $selectTheoNam AS year FROM thoigian;";
        } else {

            $sqlYear = "SELECT DISTINCT EXTRACT(YEAR FROM NgayBatDau) AS year FROM thoigian;";
        }
        $resultYear = mysqli_query($con, $sqlYear);
        while ($row = mysqli_fetch_array($resultYear)) { ?>
            <p style="font-weight: 700;"> + <?= $row['year'] ?></p>
            <?php
            $nam = $row['year'];
            $sqlMonth = "SELECT DISTINCT EXTRACT(MONTH FROM NgayBatDau) AS month FROM thoigian WHERE year(NgayBatDau) = $nam;";
            $resultMonth = mysqli_query($con, $sqlMonth);
            while ($row = mysqli_fetch_array($resultMonth)) { ?>
                <p class="collapsible" style="margin-left: 12px; font-weight: 700;"> <button class="btn">+</button> Thang <?= $row['month'] ?></p>
                <div class="content">
                    <?php
                    $thang = $row['month'];
                    $sqlDay = "SELECT * FROM `thoigian` WHERE year(`NgayBatDau`) = Year('$nam-01-01') AND month(`NgayBatDau`) = month('$nam-$thang-01');";
                    $resultDay = mysqli_query($con, $sqlDay);
                    while ($row = mysqli_fetch_array($resultDay)) { ?>
                        <div class="row" style="margin-left: 42px;">
                            <div class="col-sm-2">
                                <p><span style="font-weight: 600;">Số phát hành:</span> <?= $row['idThoiGian'] ?></p>
                            </div>
                            <div class="col-sm-3"><span style="font-weight: 600;">Từ</span> <?= $row['NgayBatDau'] ?></div>
                            <div class="col-sm-3"><span style="font-weight: 600;">Đến</span> <?= $row['NgayKetThuc'] ?></div>
                            <div class="col-sm-2"><a href="http://localhost/joomla/lichcongtac/?selectDate=<?= $row['idThoiGian'] ?>">Chi tiết</a></div>
                            <div class="col-sm-2"><span style="font-weight: 600;">Chỉnh sửa</span> <?= $row['NgayBatDau'] ?></div>
                        </div>
                    <?php }
                    ?>
                </div>

            <?php }
            ?>
        <?php }
        ?>
    </div>
    <script type="text/javascript">
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>