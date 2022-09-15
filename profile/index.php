<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <!-- <link rel="stylesheet" href="./css/style.sass"> -->
</head>

<body>
    <?php require("../config/database.php");

    if (isset($_GET["profile"])) $profileName = $_GET["profile"];
    $sql = "SELECT * FROM teacher where MaCB='$profileName'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)  <= 0) {
        echo "<script>alert(Not infomation in database please add now !)</script>";
        header("refresh:3;url= ./insert.php");
    }
    $sql2 = "SELECT * FROM y3pmj_session where username='$profileName'";
    $result2 = mysqli_query($con, $sql);
    if (mysqli_num_rows($result2)  > 0) {
        $checkSession = 1;
    }
    while ($row = mysqli_fetch_array($result)) {
        $hocvan = explode("$$", $row['HocVan']);
        $chungchi = explode("$$", $row['ChungChi']);
        $nghiencuu = explode("$$", $row['NghienCuu']);
        $kinhnghiem = explode("$$", $row['KinhNghiem']);
        $baibao = explode("$$", $row['BaiBao']);
        $thamgia = explode("$$", $row['ThamGia']);
        // $details_hocvan = explode("$", $hocvan[0]);
        // echo $row['ChungChi'] !== ""  ? "not empty" : "empty";
    ?>
        <div class="container">
            <div class="main-body">

                <!-- Breadcrumb -->

                <!-- /Breadcrumb -->

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://www.ctu.edu.vn/images/upload/logo.png" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4><?= $row['HoTen'] ?></h4>
                                        <p class="text-secondary mb-1"><?= $row['HocVi'] ?></p>
                                        <?php
                                        if ($checkSession == 1) { ?> <a href="http://localhost/joomla/add.php?profile=<?php echo $profileName; ?>" class="btn btn-primary">Edit</a> <?php } ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $row['HoTen'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $row['NgaySinh'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $row['GioiTinh'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $row['Email'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $row['SoDienThoai'] ?>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $row['DiaChi'] ?>
                                    </div>
                                </div>
                                <!-- <hr> -->
                                <!-- <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">


                        <div class="card mb-3">
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            Education
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            <div class="main-container">
                                                <section id="timeline" class="timeline-outer">
                                                    <div class="container" id="content">
                                                        <div class="row">
                                                            <div class="col s12 m12 l12">
                                                                <ul class="timeline">
                                                                    <?php
                                                                    if ($row['HocVan'] !== "") {
                                                                        foreach ($hocvan as $i => $value) {
                                                                            $details_hocvan = explode("$", $value);
                                                                            // echo $details_hocvan[0];
                                                                    ?>
                                                                            <li class="event" data-date="<?php echo $details_hocvan[0]; ?>">
                                                                                <h3><?php echo $details_hocvan[1]; ?></h3>
                                                                                <p>
                                                                                    <?php echo $details_hocvan[2]; ?> </p>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>

                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            Distinct
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            <div class="main-container">
                                                <section id="timeline" class="timeline-outer">
                                                    <div class="container" id="content">
                                                        <div class="row">
                                                            <div class="col s12 m12 l12">
                                                                <ul class="timeline">
                                                                    <?php
                                                                    if ($row['ChungChi'] !== "") {
                                                                        foreach ($chungchi as $i => $value) {
                                                                            $details_chungchi = explode("$", $value);

                                                                    ?>
                                                                            <li class="event" data-date="<?php echo $details_chungchi[0]; ?>">
                                                                                <h3><?php echo $details_chungchi[1]; ?></h3>
                                                                                <p>
                                                                                    <?php echo $details_chungchi[2]; ?> </p>
                                                                            </li>
                                                                    <?php

                                                                        }
                                                                    }
                                                                    ?>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>

                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                            Research Interests
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                        <div class="accordion-body">
                                            <div class="main-container">
                                                <section id="timeline" class="timeline-outer">
                                                    <div class="container" id="content">
                                                        <div class="row">
                                                            <div class="col s12 m12 l12">
                                                                <ul class="timeline">
                                                                    <?php
                                                                    if ($row['NghienCuu'] !== "") {
                                                                        foreach ($nghiencuu as $i => $value) {
                                                                            $details_nghiencuu = explode("$", $value);
                                                                            // echo $details_hocvan[0];
                                                                    ?>
                                                                            <li class="event" data-date="<?php echo $details_nghiencuu[0]; ?>">
                                                                                <h3><?php echo $details_nghiencuu[1]; ?></h3>
                                                                                <p>
                                                                                    <?php echo $details_nghiencuu[2]; ?> </p>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>

                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                            Experience
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                                        <div class="accordion-body">
                                            <div class="main-container">
                                                <section id="timeline" class="timeline-outer">
                                                    <div class="container" id="content">
                                                        <div class="row">
                                                            <div class="col s12 m12 l12">
                                                                <ul class="timeline">
                                                                    <?php
                                                                    if ($row['KinhNghiem'] !== "") {
                                                                        foreach ($kinhnghiem as $i => $value) {
                                                                            $details_kinhnghiem = explode("$", $value);
                                                                            // echo $details_hocvan[0];
                                                                    ?>
                                                                            <li class="event" data-date="<?php echo $details_kinhnghiem[0]; ?>">
                                                                                <h3><?php echo $details_kinhnghiem[1]; ?></h3>
                                                                                <p>
                                                                                    <?php echo $details_kinhnghiem[2]; ?> </p>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>

                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                            Publications Scientific Research & TextBooks
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                                        <div class="accordion-body">
                                            <div class="main-container">
                                                <section id="timeline" class="timeline-outer">
                                                    <div class="container" id="content">
                                                        <div class="row">
                                                            <h3>TextBooks</h3>
                                                            <div class="col s12 m12 l12">
                                                                <ul class="timeline">
                                                                    <?php
                                                                    if (isset($_GET['profile'])) {

                                                                        $sqlBaiBao = "SELECT * FROM manage_post where MaCB='$profileName' and GiaoTrinh != ''";
                                                                        $resultBaiBao = mysqli_query($con, $sqlBaiBao);
                                                                        while ($row = mysqli_fetch_array($resultBaiBao)) {
                                                                    ?>
                                                                            <li class="event" data-date="">
                                                                                <p>
                                                                                    <?= $row['TenGiangVien'] ?>, <?= $row['GiangVienThamGia'] ?> <?php if ($row['GiangVienThamGia'] != "") echo ", " ?> <?= $row['GiaoTrinh'] ?>, <?= $row['NamXuatBan'] ?> </p>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <h3>Scientific Research</h3>
                                                            <div class="col s12 m12 l12">
                                                                <ul class="timeline">
                                                                    <?php
                                                                    if (isset($_GET['profile'])) {

                                                                        $sqlBaiBao = "SELECT * FROM manage_post where MaCB='$profileName' and BaiBaoKhoaHoc != ''";
                                                                        $resultBaiBao = mysqli_query($con, $sqlBaiBao);
                                                                        while ($row = mysqli_fetch_array($resultBaiBao)) {
                                                                    ?>
                                                                            <li class="event" data-date="">
                                                                                <p>
                                                                                    <?= $row['TenGiangVien'] ?>, <?= $row['GiangVienThamGia'] ?> <?php if ($row['GiangVienThamGia'] != "") echo ", " ?> <?= $row['BaiBaoKhoaHoc'] ?>, <?= $row['NamXuatBan'] ?> </p>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <h3>Personal Scientific Research Topic </h3>
                                                            <div class="col s12 m12 l12">
                                                                <ul class="timeline">
                                                                    <?php
                                                                    if (isset($_GET['profile'])) {

                                                                        $sqlDeTai = "SELECT * FROM topic where MaCB='$profileName'";
                                                                        $resultDeTai = mysqli_query($con, $sqlDeTai);
                                                                        while ($row = mysqli_fetch_array($resultDeTai)) {
                                                                    ?>
                                                                            <li class="event" data-date="">
                                                                                <p>
                                                                                    <?= $row['TenChuNhiem'] ?>, <?= $row['GiangVienThamGia'] ?> <?php if ($row['GiangVienThamGia'] != "") echo ", " ?> <?= $row['TenDeTai'] ?>, từ <?= $row['BatDau'] ?> đến <?= $row['KetThuc'] ?>. Cấp: <?= $row['Cap'] ?> </p>
                                                                            </li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>

                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    <?php } ?>
</body>

</html>