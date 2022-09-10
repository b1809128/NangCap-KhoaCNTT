<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÌM KIẾM LỊCH CÔNG TÁC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php require "../config/database.php" ?>
    <div class="container">
        <h4>Quản lý lịch công tác Khoa CNTT</h4>

        <?php if (isset($_POST['ngayBatDau'])) { ?>
            <h4>Thời gian từ <?php echo $_POST['ngayBatDau'] ?> đến <?php echo $_POST['ngayKetThuc'] ?> </h4>
        <?php } ?>
        <?php
        if ($_POST['ngayBatDau']) {
            $ngayBatDau = $_POST['ngayBatDau'];
            $ngayKetThuc  = $_POST['ngayKetThuc'];
            $sql = "SELECT * FROM thoigian where NgayBatDau between '$ngayBatDau' and '$ngayKetThuc'";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
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
        }
        ?>
    </div>
</body>

</html>