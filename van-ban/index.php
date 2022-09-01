<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan Ly Bien Ban</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php require("../config/database.php");

    ?>
    <div class="container">
        <div class="row" style="margin-top:10px;">
            <h4>Quản lý văn bản Khoa CNTT</h4>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <form style="width: 300px; display: flex;" action="" method="post"><select class="form-select" name="tinhTrang" aria-label="Default select example">
                        <option value="all">Tất cả văn bản</option>
                        <option value="0">Chưa phát hành</option>
                        <option value="1">Đang trình ký</option>
                        <option value="2">Đã phát hành</option>
                    </select>
                    <button class="btn btn-primary" type="submit" name="submitTinhTrang">Lọc</button>
                </form>

            </div>
            <div class="col-sm-4">
                <form method="get" style="display:flex;">
                    <input type="text" class="form-control" name="searchVanBan" placeholder="Tìm Kiếm">
                    <button type="submit" class="btn btn-primary">Tìm</button>
                </form>
            </div>
            <div class="col-sm-4">
                <a href="http://localhost/joomla/van-ban/edit.php" class="btn btn-primary">Soạn biên bản</a>
            </div>
        </div>
        <?php
        if (isset($_POST['submitTinhTrang'])) {
            $tinhTrang = $_POST['tinhTrang'];
            if ($tinhTrang === "all") {
                header("Location: http://localhost/joomla/van-ban/");
            }
            $sqlYear = "SELECT DISTINCT EXTRACT(YEAR FROM Created_at) AS year FROM vanban WHERE TinhTrang='$tinhTrang'";
        } else if (isset($_GET['searchVanBan'])) {
            $searchVanBan = $_GET['searchVanBan'];
            $sqlYear = "SELECT DISTINCT EXTRACT(YEAR FROM Created_at) AS year FROM vanban WHERE (idVanBan Like '%$searchVanBan%' OR TenVanBan Like '%$searchVanBan%' OR MaCB Like '%$searchVanBan%' OR Created_at Like '%$searchVanBan%')";
        } else {
            $sqlYear = "SELECT DISTINCT EXTRACT(YEAR FROM Created_at) AS year FROM vanban;";
        }
        $resultYear = mysqli_query($con, $sqlYear);
        while ($row = mysqli_fetch_array($resultYear)) { ?>
            <p style="font-weight: 700;"> + <?= $row['year'] ?></p>
            <?php
            $nam = $row['year'];
            if (isset($_POST['submitTinhTrang'])) {
                $tinhTrang = $_POST['tinhTrang'];
                $sqlMonth = "SELECT DISTINCT EXTRACT(MONTH FROM Created_at) AS month FROM vanban WHERE year(Created_at) = $nam and TinhTrang='$tinhTrang';";
            } else if (isset($_GET['searchVanBan'])) {
                $searchVanBan = $_GET['searchVanBan'];
                $sqlMonth = "SELECT DISTINCT EXTRACT(MONTH FROM Created_at) AS month FROM vanban WHERE year(Created_at) = $nam and (idVanBan Like '%$searchVanBan%' OR TenVanBan Like '%$searchVanBan%' OR MaCB Like '%$searchVanBan%' OR Created_at Like '%$searchVanBan%');";
            } else {

                $sqlMonth = "SELECT DISTINCT EXTRACT(MONTH FROM Created_at) AS month FROM vanban WHERE year(Created_at) = $nam;";
            }
            $resultMonth = mysqli_query($con, $sqlMonth);
            while ($row = mysqli_fetch_array($resultMonth)) { ?>
                <p class="collapsible" style="margin-left: 12px; font-weight: 700;"> <button class="btn">+</button> Thang <?= $row['month'] ?></p>
                <div class="content">
                    <?php
                    $thang = $row['month'];
                    if (isset($_POST['submitTinhTrang'])) {
                        $tinhTrang = $_POST['tinhTrang'];
                        $sqlDay = "SELECT * FROM `vanban` WHERE year(`Created_at`) = Year('$nam-01-01') AND month(`Created_at`) = month('$nam-$thang-01') and TinhTrang='$tinhTrang';";
                    } else if (isset($_GET['searchVanBan'])) {
                        $searchVanBan = $_GET['searchVanBan'];
                        $sqlDay = "SELECT * FROM `vanban` WHERE year(`Created_at`) = Year('$nam-01-01') AND month(`Created_at`) = month('$nam-$thang-01') and (idVanBan Like '%$searchVanBan%' OR TenVanBan Like '%$searchVanBan%' OR MaCB Like '%$searchVanBan%' OR Created_at Like '%$searchVanBan%');";
                    } else {

                        $sqlDay = "SELECT * FROM `vanban` WHERE year(`Created_at`) = Year('$nam-01-01') AND month(`Created_at`) = month('$nam-$thang-01');";
                    }
                    $resultDay = mysqli_query($con, $sqlDay);
                    while ($row = mysqli_fetch_array($resultDay)) { ?>
                        <div class="row" style="margin-left: 42px;">
                            <div class="col-sm-2">
                                <p><span style="font-weight: 600;">Số phát hành:</span> <?= $row['idVanBan'] ?></p>
                            </div>
                            <div class="col-sm-3" style="font-weight:600;"><?= $row['TenVanBan'] ?></div>
                            <div class="col-sm-1"><a href="http://localhost/joomla/van-ban/details.php?idVanBan=<?= $row['idVanBan'] ?>">Chi tiết</a></div>
                            <div class="col-sm-3"><span style="font-weight: 600;">Ngày tạo: </span> <?= $row['Created_at'] ?></div>
                            <div class="col-sm-3"><span style="font-weight: 600;">Người soạn: </span> <?php

                                                                                                        $macb = $row['MaCB'];
                                                                                                        $sqlSelectDate = "SELECT * from teacher where MaCB = '$macb'";
                                                                                                        $resultThoiGian = mysqli_query($con, $sqlSelectDate);
                                                                                                        while ($row = mysqli_fetch_array($resultThoiGian)) {
                                                                                                        ?>
                                    <?= $row['HoTen'] ?>
                                <?php }
                                ?></div>


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