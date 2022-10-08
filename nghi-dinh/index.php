<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VĂN BẢN - NGHỊ ĐỊNH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php require '../navbar/navbar.php'; ?>
        <div class="row">
            <?php if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                if ($id === 0) { ?>
                    <iframe src="./Ke hoach 1436_ Danh gia, xep loai.pdf" width="1000" height="1000" frameborder="0">
                    <?php } else if ($id === 1) { ?>
                        <iframe src="./Bien ban hop HD TD-KT Khoa nam hoc 2021-2022 gui HUy.pdf" width="1000" height="1000" frameborder="0">
                        <?php } else if ($id === 2) { ?>
                            <iframe src="./Mau 1_TD.pdf" width="1000" height="1000" frameborder="0">
                            <?php } else if ($id === 3) { ?>
                                <iframe src="./Mau 2_TD.pdf" width="1000" height="1000" frameborder="0">
                                <?php } else if ($id === 4) { ?>
                                    <iframe src="./Mau 3_TD.pdf" width="1000" height="1000" frameborder="0">
                                    <?php } else if ($id === 5) { ?>
                                        <iframe src="./Mau 4_TD.pdf" width="1000" height="1000" frameborder="0">
                                        <?php } else if ($id === 5) { ?>
                                            <iframe src="./phieudanhgia.pdf" width="1000" height="1000" frameborder="0">
                                            <?php }
                                    } else { ?>
                                            <p style="color:red;">*Văn bản về đánh giá xét thi đua, khen thưởng trong cán bộ công, viên chức:</p>
                                            <div class="row">
                                                <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=0">1. Kế hoạch thực hiện Đánh giá, xếp loại</a>
                                                <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=1">2. Mẫu biên bản họp thi - đua khen thưởng</a>
                                                <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=2">3. Mẫu đề nghị xét thi đua - khen thưởng</a>
                                                <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=3">4. Mẫu danh sách cá nhân đề nghị xét thi đua - khen thưởng cấp cơ sở</a>
                                                <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=4">5. Mẫu danh sách cá nhân đề nghị xét thi đua - khen thưởng cấp Bộ, Nhà nước</a>
                                                <a style="text-decoration:none;" href="http://localhost/joomla/nghi-dinh/?id=5">6. Mẫu tập thể cá nhân điển hình</a>
                                            </div>
                                        <?php } ?>

        </div>
    </div>
</body>

</html>