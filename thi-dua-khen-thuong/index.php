<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THI ĐUA KHEN THƯỞNG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php require "../config/database.php"; ?>
        <?php require "../navbar/navbar.php"; ?>
        <h4>DANH MỤC XÉT THI ĐUA KHEN THƯỞNG KHOA CNTT & TT</h4>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <th>BỘ MÔN</th>
                    <th>CHI TIẾT</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM bomon";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?= $row['TenBoMon'] ?></td>
                            <td><a href="http://localhost/joomla/thi-dua-khen-thuong/details.php?bomon=<?= $row['BoMon'] ?>">Chi tiết</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <p style="color:red;">*Văn bản về đánh giá xét thi đua, khen thưởng trong cán bộ công, viên chức:</p>
        <div class="row">
            <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=0">1. Kế hoạch thực hiện Đánh giá, xếp loại</a>
            <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=1">2. Mẫu biên bản họp thi - đua khen thưởng</a>
            <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=2">3. Mẫu đề nghị xét thi đua - khen thưởng</a>
            <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=3">4. Mẫu danh sách cá nhân đề nghị xét thi đua - khen thưởng cấp cơ sở</a>
            <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=4">5. Mẫu danh sách cá nhân đề nghị xét thi đua - khen thưởng cấp Bộ, Nhà nước</a>
            <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=5">6. Mẫu tập thể cá nhân điển hình</a>
        </div>
    </div>
</body>

</html>