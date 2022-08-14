<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php require "../config/database.php"; ?>
    <div class="container">

        <div class="row">
            <h4>Thêm Thời gian bắt đầu - kết thúc</h4>
            <div class="row">
                <div class="col-sm-4">

                    <div class="row">
                        <div class="col-sm-3">Bắt đầu:</div>
                        <div class="col-sm-3"> <input type="text" class="form-control" name="search" placeholder="Ngày">
                        </div>
                        <div class="col-sm-3"> <input type="text" class="form-control" name="search" placeholder="Tháng">
                        </div>
                        <div class="col-sm-3"> <input type="text" class="form-control" name="search" placeholder="Năm">
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-3"> Kết thúc:</div>
                        <div class="col-sm-3"> <input type="text" class="form-control" name="search" placeholder="Ngày">
                        </div>
                        <div class="col-sm-3"> <input type="text" class="form-control" name="search" placeholder="Tháng">
                        </div>
                        <div class="col-sm-3"> <input type="text" class="form-control" name="search" placeholder="Năm">
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <button class="btn btn-primary">Thêm</button>
                </div>


            </div>

        </div>
        <h4>Thêm lịch chi tiết</h4>
        <div class="row">
            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example">
                    <option selected>--Ngày, tháng, năm--</option>
                    <?php
                    $sql = "SELECT * FROM thoigian";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <option value="<?= $row['idThoiGian'] ?>">Từ <?= $row['NgayBatDau'] ?> - đến <?= $row['NgayKetThuc'] ?></option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <div class="row" style="margin: 10px 0;">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-6"><select class="form-select" aria-label="Default select example">
                            <option selected>--Thứ--</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">CN</option>
                        </select></div>
                    <div class="col-sm-6"><input type="text" class="form-control" name="search" placeholder="Giờ"></div>
                </div>


            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-4"> <input type="text" class="form-control" name="search" placeholder="Ngày">
                    </div>
                    <div class="col-sm-4"> <input type="text" class="form-control" name="search" placeholder="Tháng">
                    </div>
                    <div class="col-sm-4"> <input type="text" class="form-control" name="search" placeholder="Năm">
                    </div>
                </div>

            </div>

            <div class="col-sm-4">
                Buổi:
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Sáng
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Chiều / Tối
                </label>

            </div>



        </div>
        <div class="row" style="margin: 10px 0;">
            <div class="col-sm-4">
                <input type="text" class="form-control" name="search" placeholder="Địa điểm">


            </div>
            <div class="col-sm-4">
                Tổ chức: <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Trường
                </label>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Khoa
                </label>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example">
                    <option selected>--Hình thức họp--</option>
                    <option value="1">Trực tuyến</option>
                    <option value="2">Trực tiếp</option>
                </select>

            </div>
            <div class="col-sm-4"><input type="text" class="form-control" name="search" placeholder="Nội dung họp"></div>
            <div class="col-sm-4"><input type="text" class="form-control" name="search" placeholder="Tài liệu họp"></div>
        </div>
        <div class="row" style="margin: 10px 0;">
            <div class="col">
                <p>Thành phần:</p>
                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" value="" id="select-all">
                        <label class="form-check-label" for="flexCheckDefault">
                            Tất cả
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="bomon" value="danguy" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Đảng ủy Khoa
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="bomon" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Trưởng, phó trưởng bộ môn
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="bomon" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Văn phòng khoa
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="bomon" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Trung tâm điện tử, tin học
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="bomon" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Phòng Kỹ thuật
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-check-input" type="checkbox" name="bomon" value="" id="flexCheckDefault">
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
                            <input class="form-check-input" type="checkbox" value="" name="bomon" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <?= $row['TenBoMon'] ?>
                            </label>
                        </div>

                    </div>
                <?php }

                ?>


            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example">
                    <option selected>--Cá nhân--</option>
                    <?php
                    $sql = "SELECT * FROM teacher";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <option value="<?= $row['MaCB'] ?>"><?= $row['HoTen'] ?> </option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <div class="row" style="margin: 10px 0;">
            <button class="btn btn-primary">Thêm</button>

        </div>
    </div>
    </div>
    <script type="text/javascript">
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('bomon');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
</body>

</html>