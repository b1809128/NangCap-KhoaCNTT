<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM LỊCH CÔNG TÁC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php require "../config/database.php"; ?>
    <?php
    if (!isset($_SESSION['tokenId'])) {
        echo "<script>alert('Vui lòng đăng nhập hệ thống !');</script>";
        header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
    } else {
        $tokenId = $_SESSION["tokenId"];
        $sqlToken = "SELECT * FROM access_token WHERE idToken='$tokenId'";
        $resToken = mysqli_query($con, $sqlToken);
        $row = mysqli_fetch_array($resToken);
        if ($row['Permission'] < 4) {
            echo "<script>alert('Tài khoản không có đủ quyền truy cập !');</script>";
            header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
        }
    } ?>
    <div class="container">
        <h4>Thêm lịch chi tiết</h4>
        <form action="http://localhost/joomla/lichcongtac/todoInsert.php" method="get">
            <div class="row">
                <div class="col-sm-4">
                    <select class="form-select" id="selectMocThoiGian" onchange="selectChanges()" aria-label="Default select example" name="mocThoiGian">
                        <option selected>--Ngày, tháng, năm--</option>
                        <?php
                        $sql = "SELECT * FROM thoigian";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <option value="<?= $row['idThoiGian'] ?>">Từ <?= $row['NgayBatDau'] ?> đến <?= $row['NgayKetThuc'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row" style="margin: 10px 0;">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-6"><select class="form-select" name="thu" aria-label="Default select example">
                                <option selected>--Thứ--</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">CN</option>
                            </select></div>
                        <div class="col-sm-6"><input type="time" class="form-control" name="gio" placeholder="Giờ"></div>
                    </div>


                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-4"> <input type="date" class="form-control" name="ngayTrongTuan" placeholder="Ngày">
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"></div>
                    </div>

                </div>

                <div class="col-sm-4">
                    Buổi:
                    <input class="form-check-input" type="checkbox" name="buoi" value="Sáng">
                    <label class="form-check-label" for="flexCheckDefault">
                        Sáng
                    </label>
                    <input class="form-check-input" type="checkbox" name="buoi" value="Chiều">
                    <label class="form-check-label" for="flexCheckDefault">
                        Chiều / Tối
                    </label>

                </div>



            </div>
            <div class="row" style="margin: 10px 0;">
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="diaDiem" placeholder="Địa điểm">


                </div>
                <div class="col-sm-4">
                    Tổ chức: <input class="form-check-input" type="checkbox" value="Trường" name="toChuc">
                    <label class="form-check-label" for="flexCheckDefault">
                        Trường
                    </label>
                    <input class="form-check-input" type="checkbox" value="Khoa" name="toChuc">
                    <label class="form-check-label" for="flexCheckDefault">
                        Khoa
                    </label>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <select class="form-select" name="hinhThuc" aria-label="Default select example">
                        <option selected>--Hình thức họp--</option>
                        <option value="Trực tuyến">Trực tuyến</option>
                        <option value="Trực tiếp">Trực tiếp</option>
                    </select>

                </div>
                <div class="col-sm-4"><input type="text" class="form-control" name="noiDung" placeholder="Nội dung họp"></div>
                <div class="col-sm-4"><input type="text" class="form-control" name="taiLieu" placeholder="Tài liệu họp"></div>
            </div>
            <div class="row" style="margin: 10px 0;">
                <div class="col">
                    <p>Thành phần:</p>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="tatCaBoMon" value="Tất cả bộ môn" id="select-all">
                            <label class="form-check-label" for="flexCheckDefault">
                                Tất cả bộ môn
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="bomon[]" value="Đảng ủy Khoa">
                            <label class="form-check-label" for="flexCheckDefault">
                                Đảng ủy Khoa
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="bomon[]" value="Trưởng, phó trưởng bộ môn">
                            <label class="form-check-label" for="flexCheckDefault">
                                Trưởng, phó trưởng bộ môn
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="bomon[]" value="Văn phòng khoa">
                            <label class="form-check-label" for="flexCheckDefault">
                                Văn phòng khoa
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="bomon[]" value="Trung tâm điện tử, tin học">
                            <label class="form-check-label" for="flexCheckDefault">
                                Trung tâm điện tử, tin học
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="bomon[]" value="Phòng Kỹ thuật">
                            <label class="form-check-label" for="flexCheckDefault">
                                Phòng Kỹ thuật
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="bomon[]" value="Đoàn Khoa">
                            <label class="form-check-label" for="flexCheckDefault">
                                Đoàn Khoa
                            </label>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM bomon";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="row">
                            <div class="col">
                                <input class="form-check-input" type="checkbox" value="<?= $row['TenBoMon'] ?>" name="bomon[]">
                                <label class="form-check-label collapsible" for="flexCheckDefault">
                                    <?= $row['TenBoMon'] ?>
                                </label>
                                <div class="content">
                                    <?php
                                    $codeBoMon = $row['BoMon'];
                                    $sqlUser = "select * from teacher where BoMon = '$codeBoMon'";
                                    $resultUser = mysqli_query($con, $sqlUser);
                                    while ($row = mysqli_fetch_array($resultUser)) {
                                    ?>
                                        <div class="row" style="margin-left: 10px;">
                                            <div class="col">
                                                <input class="form-check-input" type="checkbox" value="<?= $row['HoTen'] ?>" name="bomon[]">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <?= $row['HoTen'] ?>
                                                </label>
                                            </div>

                                        </div> <?php } ?>
                                </div>

                            </div>

                        </div>
                    <?php }

                    ?>


                </div>
            </div>
            <div class="row" style="margin: 10px 0;">
                <div class="col-sm-4"></div>
                <div class="col-sm-4" style="display:flex; align-items:center; justify-content:center;"> <button type="submit" name="themLichCongTac" class="btn btn-primary" style="width:200px;">Thêm lịch</button>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </form>
        <div class="row" style="margin: 10px 0 30px 0;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4" style="display:flex; align-items:center; justify-content:center;"> <a rel="stylesheet" href="http://localhost/joomla/google-calendar/">Thêm lịch nhắc Google</a>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('bomon[]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }

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