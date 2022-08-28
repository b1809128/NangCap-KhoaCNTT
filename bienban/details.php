<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết văn bản</title>
</head>

<body>
    <?php require("../config/database.php");

    ?>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['idBienBan'])) {
                $idBienBan = $_GET['idBienBan'];
                $sqlSelectBienBan = "SELECT * FROM bienban where idBienBan = '$idBienBan'";
                $result = mysqli_query($con, $sqlSelectBienBan);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="col-sm-4">
                        <div class="row">
                            Mã số biên bản: <?= $row['idBienBan'] ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            Thời gian: <?php
                                        $idThoiGian = $row['idThoiGian'];
                                        $sqlSelectDate = "SELECT * from thoigian where idThoiGian = '$idThoiGian'";
                                        $resultThoiGian = mysqli_query($con, $sqlSelectDate);
                                        while ($row = mysqli_fetch_array($resultThoiGian)) {
                                        ?>
                                Từ <?= $row['NgayBatDau'] ?> đến <?= $row['NgayKetThuc'] ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            Tình trạng: <?php
                                        $tinhTrang = isset($row['TinhTrang']) ? $row['TinhTrang'] : 0;
                                        // echo $tinhTrang;
                                        if ($tinhTrang == 0) {
                                            echo "Chưa ban hành";
                                        } else if ($tinhTrang == 1) {
                                            echo "Đang trình ký";
                                        } else if ($tinhTrang == 2) {
                                            echo "Đã ban hành";
                                        }
                                        ?>
                        </div>
                    </div>
            <?php }
            }
            ?>

        </div>
        <div class="row">
            <?php
            if (isset($_GET['idBienBan'])) {
                $idBienBan = $_GET['idBienBan'];
                $sqlSelectBienBan2 = "SELECT * FROM bienban where idBienBan = '$idBienBan'";
                $result2 = mysqli_query($con, $sqlSelectBienBan2);
                while ($row = mysqli_fetch_array($result2)) { ?>
                    <div class="col-sm-12">
                        <?= base64_decode($row['NoiDung']) ?>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</body>

</html>