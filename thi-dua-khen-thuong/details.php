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
        <?php if (isset($_GET['bomon'])) $bomon = $_GET['bomon']; ?>
        <h4>DANH SÁCH KHEN THƯỞNG CÁN BỘ VIÊN CHỨC, GIẢNG VIÊN</h4>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <th>HỌ TÊN</th>
                    <th>XẾP LOẠI</th>
                    <th>GHI CHÚ</th>
                    <th>PHIẾU ĐÁNH GIÁ</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM teacher where BoMon='$bomon'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?= $row['HoTen'] ?></td>
                            <td><?php
                                $mscb = $row['MaCB'];
                                $sql0 = "SELECT * FROM phieudanhgiavc where MaCB='$mscb'";
                                $result0 = mysqli_query($con, $sql0);
                                while ($row0 = mysqli_fetch_array($result0)) {
                                    echo $row0['XepLoaiCapKhoa'];
                                }
                                ?></td>
                            <td><?php
                                // $mscb = $row['MaCB'];
                                $sql1 = "SELECT * FROM phieudanhgiavc where MaCB='$mscb'";
                                $result1 = mysqli_query($con, $sql1);
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    echo $row1['UuKhuyetDiem'];
                                }
                                ?></td>
                            <td><a href="http://localhost/joomla/phieu-danh-gia/details.php?idVanBan=<?php $sql2 = "SELECT * FROM phieudanhgiavc where MaCB='$mscb'";
                                                                                                        $result2 = mysqli_query($con, $sql2);
                                                                                                        while ($row2 = mysqli_fetch_array($result2)) {
                                                                                                            echo $row2['idDanhGia'];
                                                                                                        } ?>">Chi tiết</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <h4>KẾT QUẢ THI ĐUA KHEN THƯỞNG CÁN BỘ VIÊN CHỨC, GIẢNG VIÊN</h4>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <th>HỌ TÊN</th>
                    <th>LAO ĐỘNG TIÊN TIẾN</th>
                    <th>CHIẾN SỸ THI ĐUA CẤP BỘ MÔN</th>
                    <th>CHIẾN SỸ THI ĐUA CẤP KHOA</th>
                    <th>GHI CHÚ</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM teacher where BoMon='$bomon'";
                    $result = mysqli_query($con, $sql);
                    $userLength = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?= $row['HoTen'] ?></td>
                            <td><?php
                                $mscb = $row['MaCB'];
                                $sql0 = "SELECT * FROM thiduakhenthuong where MaCB='$mscb'";
                                $result0 = mysqli_query($con, $sql0);
                                while ($row0 = mysqli_fetch_array($result0)) {
                                    $ldtt =  ($row0['LaoDongTienTien'] / $userLength) * 100;
                                    echo round($ldtt, 2) . "%";
                                }
                                ?></td>
                            <td><?php
                                $sql1 = "SELECT * FROM thiduakhenthuong where MaCB='$mscb'";
                                $result1 = mysqli_query($con, $sql1);
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    $cstdbm =  ($row1['ChienSiThiDuaBoMon'] / $userLength) * 100;
                                    echo round($cstdbm, 2) . "%";
                                }
                                ?></td>
                            <td><?php
                                $sql2 = "SELECT * FROM thiduakhenthuong where MaCB='$mscb'";
                                $result2 = mysqli_query($con, $sql2);
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    $cstdk =  ($row2['ChienSiThiDuaKhoa'] / $userLength) * 100;
                                    echo round($cstdk, 2) . "%";
                                }
                                ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h4>BẦU CHỌN DANH HIỆU LAO ĐỘNG TIÊN TIẾN</h4>
                <div class="row" style="margin: 20px 0;">
                    <form action="./todoEdit.php" method="post">
                        <input type="text" class="form-control" value="<?php echo $bomon ?>" style="display:none;" name="maBoMon">
                        <?php
                        $sqlUser = "select * from teacher where BoMon = '$bomon'";
                        $resultUser = mysqli_query($con, $sqlUser);
                        while ($row = mysqli_fetch_array($resultUser)) {
                        ?>
                            <div class="row" style="margin: 5px 0;">
                                <div class="col">
                                    <input class="form-check-input" type="checkbox" value="<?= $row['MaCB'] ?>" name="bomon[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?= $row['HoTen'] ?>
                                    </label>
                                </div>

                            </div> <?php } ?>
                        <button class="btn btn-primary" type="submit" name="submitLaoDongTienTien">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <h4>BẦU CHỌN DANH HIỆU CHIẾN SỸ THI ĐUA</h4>
                <div class="row" style="margin: 20px 0;">
                    <form action="./todoEdit.php" method="post">
                        <input type="text" class="form-control" value="<?php echo $bomon ?>" style="display:none;" name="maBoMon">
                        <?php
                        $sqlUser = "select * from teacher where BoMon = '$bomon'";
                        $resultUser = mysqli_query($con, $sqlUser);
                        while ($row = mysqli_fetch_array($resultUser)) {
                        ?>
                            <div class="row" style="margin: 5px 0;">
                                <div class="col">
                                    <input class="form-check-input" type="checkbox" value="<?= $row['MaCB'] ?>" name="bomon[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?= $row['HoTen'] ?>
                                    </label>
                                </div>

                            </div> <?php } ?>
                        <button class="btn btn-primary" type="submit" name="submitChienSiThiDua">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>