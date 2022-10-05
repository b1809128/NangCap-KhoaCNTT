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
    if (isset($_SESSION['tokenId']) && isset($_GET['idDanhGia'])) {
        // $tokenUser = $_SESSION['tokenUser'];
        $tokenId = $_SESSION['tokenId'];
        // echo $tokenId;
        $sqlToken = "SELECT * FROM access_token where idToken='$tokenId'";
        $resToken = mysqli_query($con, $sqlToken);
        $row = mysqli_fetch_array($resToken);
        if ((int)$row['Permission'] === 5) {
            $idDanhGiaParams = $_GET['idDanhGia'];
            $sqlDanhGia = "SELECT * FROM phieudanhgiavc where idDanhGia='$idDanhGiaParams'";
            $resDanhGia = mysqli_query($con, $sqlDanhGia);
            $row1 = mysqli_fetch_array($resDanhGia);
            if ($row1['BoMon'] !== $row['BoMon']) {
                echo "<script>alert('Không có quyền truy cập Bộ môn " . $row1['BoMon'] . " !');</script>";
                header("Refresh:0; url= http://localhost/joomla/phieu-danh-gia");
            }
        } else if ((int)$row['Permission'] < 5) {
            echo "<script>alert('Không có quyền truy cập !');</script>";
            header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
        }
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
                                    <select class="form-select">
                                        <?php
                                        $sqlTeacher = "SELECT * from teacher where MaCB = '$macbParams'";
                                        $res = mysqli_query($con, $sqlTeacher);
                                        while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                            <option value="<?= $row['MaCB'] ?>"><?= $row['HoTen'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Chức vụ</label>
                                    <select class="form-select">
                                        <?php
                                        $sqlTeacher = "SELECT * from roles inner join teacher on teacher.MaCB='$macbParams'and roles.Permission=teacher.Permission;";
                                        $res = mysqli_query($con, $sqlTeacher);
                                        while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                            <option value="<?= $row['Permission'] ?>"><?= $row['Role'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Bộ môn</label>
                                    <select class="form-select">
                                        <?php
                                        $sqlBoMon = "SELECT * from bomon inner join teacher on teacher.MaCB='$macbParams'and bomon.BoMon=teacher.BoMon; ";
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
                                    <select class="form-select">
                                        <?php
                                        $sqlTGDG = "SELECT * from thoigiandanhgia ";
                                        $res = mysqli_query($con, $sqlTGDG);
                                        while ($row = mysqli_fetch_array($res)) {
                                        ?>
                                            <option value="<?= $row['idThoiGianDanhGia'] ?>"> Từ ngày <?= $row['BatDau'] ?> đến ngày <?= $row['KetThuc'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Chính trị, tư tưởng</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['ChinhTriTuTuong'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Đạo đức, lối sống</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['DaoDucLoiSong'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tác phong, lề lối</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['TacPhongLeLoi'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ý thức tổ chức </label>
                                    <textarea type="email" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['YThucToChuc'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kết quả thực hiện</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['KetQuaThucHien'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Thái độ phục vụ</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['ThaiDoPhucVu'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kết quả hoạt động của cơ quan, tổ chức, đơn vị được giao quản lý, phụ trách</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['KetQuaHoatDong'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Năng lực lãnh đạo</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['NangLucLanhDao'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Năng lực tập hợp, đoàn kết</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['TapHopDoanKet'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tự nhận xét ưu, khuyết điểm</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['UuKhuyetDiem'];
                                                                                } ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Mức xếp loại</label>
                                    <textarea type="text" class="form-control"><?php
                                                                                $sqlTGDG = "SELECT * from phieudanhgiavc where MaCB='$macbParams'";
                                                                                $res = mysqli_query($con, $sqlTGDG);
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                    echo $row['XepLoai'];
                                                                                } ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                        NỘI DUNG ĐÁNH GIÁ DÀNH CHO LÃNH ĐẠO, CÁN BỘ QUẢN LÝ
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="./todoEdit.php" method="post">
                                    <div class="mb-3">
                                        <input type="text" style="display:none;" name="idDanhGia" value="<?php echo $idDanhGia ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Kết quả hoạt động của cơ quan, tổ chức, đơn vị được giao quản lý, phụ trách</label>
                                        <textarea type="text" name="ketQuaHoatDong" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năng lực lãnh đạo</label>
                                        <textarea type="text" name="nangLucLanhDao" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năng lực tập hợp, đoàn kết</label>
                                        <textarea type="text" name="tapHopDoanKet" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" name="submitDanhGiaCaNhanLanhDao" class="btn btn-primary">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                        NỘI DUNG ĐÁNH GIÁ, XẾP LOẠI ĐỐI VỚI CẤP PHÓ CỦA NGƯỜI ĐỨNG ĐẦU
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="./todoEdit.php" method="post">
                                    <div class="mb-3">
                                        <input type="text" style="display:none;" name="idDanhGia" value="<?php echo $idDanhGia ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nhận xét, đánh giá</label>
                                        <textarea type="text" name="nhanXetDanhGiaCapBoMon" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mức xếp loại</label>
                                        <select class="form-select" name="xepLoaiCapBoMon">
                                            <option>--Chọn mức xếp loại--</option>
                                            <option value="Hoàn thành xuất sắc nhiệm vụ">Hoàn thành xuất sắc nhiệm vụ</option>
                                            <option value="Hoàn thành  tốt nhiệm vụ">Hoàn thành tốt nhiệm vụ</option>
                                            <option value="Hoàn thành nhiệm vụ">Hoàn thành nhiệm vụ</option>
                                            <option value="Không hoàn thành nhiệm vụ">Không hoàn thành nhiệm vụ</option>

                                        </select>
                                    </div>

                                    <button type="submit" name="submitDanhGiaCapBoMon" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true" aria-controls="panelsStayOpen-collapseFive">
                        NỘI DUNG ĐÁNH GIÁ, XẾP LOẠI CẤP KHOA
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="./todoEdit.php" method="post">
                                    <div class="mb-3">
                                        <input type="text" style="display:none;" name="idDanhGia" value="<?php echo $idDanhGia ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nhận xét, đánh giá</label>
                                        <textarea type="text" name="nhanXetDanhGiaCapKhoa" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mức xếp loại</label>
                                        <select class="form-select" name="xepLoaiCapKhoa">
                                            <option>--Chọn mức xếp loại--</option>
                                            <option value="Hoàn thành xuất sắc nhiệm vụ">Hoàn thành xuất sắc nhiệm vụ</option>
                                            <option value="Hoàn thành  tốt nhiệm vụ">Hoàn thành tốt nhiệm vụ</option>
                                            <option value="Hoàn thành nhiệm vụ">Hoàn thành nhiệm vụ</option>
                                            <option value="Không hoàn thành nhiệm vụ">Không hoàn thành nhiệm vụ</option>

                                        </select>
                                    </div>

                                    <button type="submit" name="submitDanhGiaCapKhoa" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>