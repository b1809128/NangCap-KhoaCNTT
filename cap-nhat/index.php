<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require '../config/database.php';    ?>
    <div class="container">
        <?php require '../navbar/navbar.php'; ?>
        <!-- Content here -->
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        THÊM THỜI GIAN ĐÁNH GIÁ
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/cap-nhat/todoUpdate.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Ngày bắt đầu</label>
                                        <input type="date" class="form-control" name="ngayBatDau" placeholder="mm/dd/yyyy">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Ngày kết thúc</label>
                                        <input type="date" class="form-control" name="ngayKetThuc" placeholder="mm/dd/yyyy">
                                    </div>
                                    <button type="submit" name="themThoiGian" class="btn btn-primary">Thêm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo1" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo1">
                        CẬP NHẬT THÔNG TIN GIÁO TRÌNH
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo1" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo1">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/cap-nhat/todoUpdate.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn giáo trình</label>
                                        <select class="form-select" style="width:300px; margin-right: 10px;" name="maSoGiaoTrinh" aria-label="Default select example">
                                            <option>--Mã số giáo trình--</option>
                                            <?php
                                            $sqlSelectMSGT = "SELECT * from manage_post where GiaoTrinh != '';";
                                            $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                            while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                <option value="<?= $row['STT'] ?>"><?= $row['STT'] ?> - <?= $row['GiaoTrinh'] ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn mục cập nhật</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="mucGiaoTrinh">
                                                    <option value="GiaoTrinh">Tên giáo trình</option>
                                                    <option value="NamXuatBan">Năm xuất bản</option>
                                                    <option value="TrangDongGop">Trang đóng góp</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nội dung cập nhật</label>
                                        <input type="text" name="noiDungCapNhat" class="form-control">
                                    </div>
                                    <button type="submit" name="submitCapNhatGiaoTrinh" class="btn btn-primary">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo2" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo2">
                        CẬP NHẬT THÔNG TIN BÀI BÁO, NGHIÊN CỨU KHOA HỌC
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo2" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo2">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/cap-nhat/todoUpdate.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn bài báo, nghiên cứu</label>
                                        <select class="form-select" style="width:300px; margin-right: 10px;" name="maSoBaiBao" aria-label="Default select example">
                                            <option>--Mã số bài báo--</option>
                                            <?php
                                            $sqlSelectMSGT = "SELECT * from manage_post where BaiBaoKhoaHoc != '';";
                                            $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                            while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                <option value="<?= $row['STT'] ?>"><?= $row['STT'] ?> - <?= $row['BaiBaoKhoaHoc'] ?> </option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn mục cập nhật</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="mucBaiBao">
                                                    <option value="GiangVienThamGia">Giảng viên tham gia</option>
                                                    <option value="BaiBaoKhoaHoc">Tên bài báo</option>
                                                    <option value="NamXuatBan">Năm xuất bản</option>
                                                    <option value="TrangDongGop">Trang đóng góp</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nội dung cập nhật</label>
                                        <input type="text" name="noiDungCapNhat" class="form-control">
                                    </div>
                                    <button type="submit" name="submitCapNhatBaiBao" class="btn btn-primary">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo3" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo3">
                        CẬP NHẬT THÔNG TIN ĐỀ TÀI NGHIÊN CỨU KHOA HỌC
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo3" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo3">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/cap-nhat/todoUpdate.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn đề tài</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="maSoDeTai" aria-label="Default select example">
                                                    <option>--Mã số đề tài--</option>
                                                    <?php
                                                    $sqlSelectMSGT = "SELECT * from topic;";
                                                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                        <option value="<?= $row['STT'] ?>"><?= $row['STT'] ?> - <?= $row['TenDeTai'] ?> </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn mục cập nhật</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="mucDeTai">
                                                    <option value="TenDeTai">Tên đề tài</option>
                                                    <option value="GiangVienThamGia">Giảng viên tham gia</option>
                                                    <option value="BatDau">Thời gian bắt đầu</option>
                                                    <option value="KetThuc">Thời gian kết thúc</option>
                                                    <option value="Cap">Cấp đề tài</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nội dung cập nhật</label>
                                        <input type="text" name="noiDungCapNhat" class="form-control">
                                    </div>
                                    <button type="submit" name="submitCapNhatDeTai" class="btn btn-primary">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo4" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo4">
                        XÓA THÔNG TIN NGHIÊN CỨU
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo4" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo4">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/cap-nhat/todoUpdate.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn mục để xóa thông tin</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="mucXoa">
                                                    <option value="topic">Đề tài</option>
                                                    <option value="manage_post">Giáo trình</option>
                                                    <option value="manage_post">Bài báo</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn mã số để xóa</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="maSoXoa" aria-label="Default select example">
                                                    <option>========MÃ SỐ ĐỀ TÀI========</option>
                                                    <?php
                                                    $sqlSelectMSGT = "SELECT * from topic;";
                                                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                        <option value="<?= $row['STT'] ?>"><?= $row['STT'] ?> - <?= $row['TenDeTai'] ?> </option>
                                                    <?php }
                                                    ?>
                                                    <option>========MÃ SỐ GIÁO TRÌNH========</option>
                                                    <?php
                                                    $sqlSelectMSGT = "SELECT * from manage_post where GiaoTrinh != '';";
                                                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                        <option value="<?= $row['STT'] ?>"><?= $row['STT'] ?> - <?= $row['GiaoTrinh'] ?> </option>
                                                    <?php }
                                                    ?>
                                                    <option>========MÃ SỐ BÀI BÁO========</option>
                                                    <?php
                                                    $sqlSelectMSGT = "SELECT * from manage_post where BaiBaoKhoaHoc != '';";
                                                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                        <option value="<?= $row['STT'] ?>"><?= $row['STT'] ?> - <?= $row['BaiBaoKhoaHoc'] ?> </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submitXoaThongTin" class="btn btn-danger">Xóa thông tin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo4" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo4">
                        XÓA THÔNG TIN VĂN BẢN
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo4" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo4">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/cap-nhat/todoUpdate.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn mã văn bản để xóa</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="maSoVanBan" aria-label="Default select example">
                                                    <option>========MÃ SỐ VĂN BẢN========</option>
                                                    <?php
                                                    $sqlSelectMSGT = "SELECT * from vanban;";
                                                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                        <option value="<?= $row['idVanBan'] ?>"><?= $row['idVanBan'] ?> - <?= $row['TenVanBan'] ?> </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submitXoaThongTinVanBan" class="btn btn-danger">Xóa thông tin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo4" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo4">
                        XÓA THÔNG TIN PHIẾU ĐÁNH GIÁ VIÊN CHỨC
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo4" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo4">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/cap-nhat/todoUpdate.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn mã phiếu đánh giá để xóa</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="maSoDanhGia" aria-label="Default select example">
                                                    <option>========MÃ SỐ PHIẾU ĐÁNH GIÁ========</option>
                                                    <?php
                                                    $sqlSelectMSGT = "SELECT * from phieudanhgiavc;";
                                                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                        <option value="<?= $row['idDanhGia'] ?>">Phiếu đánh giá số - <?= $row['idDanhGia'] ?> </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submitXoaThongTinDanhGia" class="btn btn-danger">Xóa thông tin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo4" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo4">
                        XÓA THÔNG TIN GIẢNG VIÊN
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo4" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo4">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/cap-nhat/todoUpdate.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Chọn mã cán bộ để xóa</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <select class="form-select" name="maSoCanBo" aria-label="Default select example">
                                                    <option>========MÃ CÁN BỘ========</option>
                                                    <?php
                                                    $sqlSelectMSGT = "SELECT * from teacher;";
                                                    $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                                                    while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                                                        <option value="<?= $row['MaCB'] ?>"><?= $row['MaCB'] ?> - <?= $row['HoTen'] ?> </option>
                                                    <?php }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submitXoaThongTinCanBo" class="btn btn-danger">Xóa thông tin</button>
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