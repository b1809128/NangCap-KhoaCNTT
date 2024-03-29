<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐÁNH GIÁ CÁN BỘ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require "../config/database.php";
    if (!isset($_SESSION['tokenId'])) {
        echo "<script>alert('Không có quyền truy cập !');</script>";
        header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
    }
    $today = date("Y-m-d");
    $sqlCheckTimeDanhGia = "SELECT * FROM thoigiandanhgia ORDER BY idThoiGianDanhGia DESC LIMIT 1;";
    $resultCheckTimeDanhGia = mysqli_query($con, $sqlCheckTimeDanhGia);
    while ($row = mysqli_fetch_array($resultCheckTimeDanhGia)) {
        $another = $row["KetThuc"];
    }
    if (strtotime($today) > strtotime($another)) {
        echo "<script>alert('Hết hạn đánh giá dành cho cán bộ, viên chức');</script>";
        header("Refresh:0; url= http://localhost/joomla/phieu-danh-gia/");
    }
    if (isset($_GET['macb']) && isset($_GET['idDanhGia'])) {
        $macbParams = $_GET['macb'];
        $idDanhGia = $_GET['idDanhGia'];
    };
    ?>
    <div class="container">
        <?php require("../navbar/navbar.php"); ?>
        <!-- Content here -->
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <form method="POST" action="./todoEdit.php">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            NỘI DUNG ĐÁNH GIÁ CÁN BỘ GIẢNG VIÊN, VIÊN CHỨC
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Họ tên cán bộ, giảng viên</label>
                                        <select class="form-select" name="macb">
                                            <option>--Chọn họ tên cán bộ, giảng viên--</option>
                                            <?php
                                            $sqlTeacher = "SELECT * from teacher";
                                            $res = mysqli_query($con, $sqlTeacher);
                                            while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                                <option value="<?= $row['MaCB'] ?>"><?= $row['HoTen'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chức vụ</label>
                                        <select class="form-select" name="chucVu">
                                            <option>--Chọn chức vụ--</option>
                                            <?php
                                            $sqlTeacher = "SELECT * from roles where Permission > 2";
                                            $res = mysqli_query($con, $sqlTeacher);
                                            while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                                <option value="<?= $row['Permission'] ?>"><?= $row['Role'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Bộ môn</label>
                                        <select class="form-select" name="bomon">
                                            <option>--Chọn bộ môn, đơn vị--</option>
                                            <?php
                                            $sqlBoMon = "SELECT * from bomon";
                                            $res = mysqli_query($con, $sqlBoMon);
                                            while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                                <option <?php if (isset($_GET['bomon']) && $_GET['bomon'] == $row['BoMon']) {
                                                            echo "selected";
                                                        } ?> value="<?= $row['BoMon'] ?>"><?= $row['TenBoMon'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Thời gian đánh giá</label>
                                        <select class="form-select" name="idThoiGianDanhGia">
                                            <option>--Chọn thời gian đánh giá--</option>
                                            <?php
                                            $sqlTGDG = "SELECT * from thoigiandanhgia";
                                            $res = mysqli_query($con, $sqlTGDG);
                                            while ($row = mysqli_fetch_array($res)) {
                                            ?>
                                                <option value="<?= $row['idThoiGianDanhGia'] ?>"> Từ ngày <?= $row['BatDau'] ?> đến ngày <?= $row['KetThuc'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chính trị, tư tưởng</label>
                                        <textarea type="text" name="chinhTriTuTuong" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Đạo đức, lối sống</label>
                                        <textarea type="text" name="daoDucLoiSong" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tác phong, lề lối</label>
                                        <textarea type="text" name="tacPhongLeLoi" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Ý thức tổ chức </label>
                                        <textarea type="email" name="yThucToChuc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kết quả thực hiện</label>
                                        <textarea type="text" name="ketQuaThucHien" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Thái độ phục vụ</label>
                                        <textarea type="text" name="thaiDoPhucVu" class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                            TỰ ĐÁNH GIÁ, XẾP LOẠI CÁ NHÂN
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tự nhận xét ưu, khuyết điểm</label>
                                        <textarea type="text" name="uuKhuyetDiem" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Xếp loại chất lượng</label>
                                        <select class="form-select" name="xepLoai">
                                            <option>--Chọn mức xếp loại--</option>
                                            <option value="Hoàn thành xuất sắc nhiệm vụ">Hoàn thành xuất sắc nhiệm vụ</option>
                                            <option value="Hoàn thành  tốt nhiệm vụ">Hoàn thành tốt nhiệm vụ</option>
                                            <option value="Hoàn thành nhiệm vụ">Hoàn thành nhiệm vụ</option>
                                            <option value="Không hoàn thành nhiệm vụ">Không hoàn thành nhiệm vụ</option>

                                        </select>
                                    </div>

                                    <button type="submit" name="submitDanhGia" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>
</body>

</html>