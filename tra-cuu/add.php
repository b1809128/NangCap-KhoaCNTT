<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM ĐỀ TÀI, BÀI BÁO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (!isset($_SESSION['tokenId'])) {
        echo "<script>alert('Vui lòng đăng nhập hệ thống !');</script>";
        header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
    }
    if (isset($_GET['profile'])) $profileName = $_GET['profile'];
    ?>
    <div class="container">
        <!-- Content here -->
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        THÊM GIÁO TRÌNH, SÁCH GIÁO KHOA
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/manage-post/todoAdd.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mã cán bộ</label>
                                        <input type="text" name="macbGiaoTrinh" class="form-control" placeholder="Exmaple: dtnghi ,tmtan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Họ tên</label>
                                        <input type="text" name="hotenGiaoTrinh" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Bộ môn</label>
                                        <div class="row">

                                            <div class="col-6">


                                                <select class="form-select" name="selectBomon">
                                                    <option value="all">--Tất cả--</option>
                                                    <?php
                                                    require("../config/database.php");
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

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Giảng viên tham gia</label>
                                        <input type="text" name="giangvienthamgiaGiaoTrinh" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tên sách, Giáo trình</label>
                                        <input type="text" name="tenGiaoTrinh" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năm xuất bản</label>
                                        <input type="text" name="namxuatbanGiaoTrinh" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Trang đóng góp </label>
                                        <input type="text" name="trangdonggopGiaoTrinh" class="form-control">
                                    </div>

                                    <button type="submit" name="submitGiaoTrinh" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo1" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo1">
                        THÊM BÀI BÁO KHOA HỌC, NGHIÊN CỨU
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo1" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo1">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/manage-post/todoAdd.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mã cán bộ</label>
                                        <input type="text" name="macbBaiBao" class="form-control" placeholder="Exmaple: dtnghi ,tmtan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Họ tên</label>
                                        <input type="text" name="hotenBaiBao" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Bộ môn</label>
                                        <div class="row">

                                            <div class="col-6">


                                                <select class="form-select" name="selectBomonBaiBao">
                                                    <option value="all">--Tất cả--</option>
                                                    <?php
                                                    require("../config/database.php");
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

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Giảng viên tham gia</label>
                                        <input type="text" name="giangvienthamgiaBaiBao" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tên sách, Giáo trình</label>
                                        <input type="text" name="tenBaiBao" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năm xuất bản</label>
                                        <input type="text" name="namxuatbanBaiBao" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Trang đóng góp </label>
                                        <input type="text" name="trangdonggopBaiBao" class="form-control">
                                    </div>

                                    <button type="submit" name="submitBaiBao" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo2" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo2">
                        THÊM BÀI ĐỀ TÀI NGHIÊN CỨU
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo2" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo2">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/manage-post/todoAdd.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mã cán bộ</label>
                                        <input type="text" name="macbDeTai" class="form-control" placeholder="Exmaple: dtnghi ,tmtan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Họ tên chủ nhiệm</label>
                                        <input type="text" name="hoTenChuNhiem" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Giảng viên tham gia</label>
                                        <input type="text" name="giangVienThamGiaDeTai" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tên đề tài nghiên cứu</label>
                                        <input type="text" name="tenDeTai" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Bắt đầu</label>
                                        <input type="text" name="batDau" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Kết thúc </label>
                                        <input type="text" name="ketThuc" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Cấp </label>
                                        <select class="form-select" name="cap">
                                            <option value="all">--Tất cả các cấp--</option>
                                            <option value="Trung Ương">Trung Ương</option>
                                            <option value="Nhà Nước">Nhà Nước</option>
                                            <option value="Địa Phương">Địa Phương</option>
                                            <option value="Tỉnh">Tỉnh</option>
                                            <option value="Thành phố">Thành Phố</option>
                                            <option value="Cơ sở">Cơ Sở</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="submitDeTai" class="btn btn-primary">Submit</button>
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