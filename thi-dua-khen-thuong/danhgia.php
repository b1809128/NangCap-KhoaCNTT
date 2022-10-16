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
    <script lang="javascript" src="../excel/dist/xlsx.full.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <?php require "../config/database.php"; ?>
        <?php require "../navbar/navbar.php"; ?>
        <div class="row" style="margin-top: 10px;">
            <div style="display:flex; justify-content:space-between;">
                <h4>DANH SÁCH XÉT DANH HIỆU CHIẾN SỸ THI ĐUA CƠ SỞ</h4>
                <button style="width:120px;" onclick="exportToExcel('ThiDuaKhenThuongBoMon','ThiDuaKhenThuongBoMon','tableKetQuaThiDua')" class="btn btn-success">Export</button>
            </div>
            <table id="tableKetQuaThiDua" class="table table-striped">
                <thead>
                    <th>HỌ TÊN</th>
                    <th>LAO ĐỘNG TIÊN TIẾN</th>
                    <th>CHIẾN SỸ THI ĐUA CẤP BỘ MÔN</th>
                    <th>CHIẾN SỸ THI ĐUA CẤP KHOA</th>
                    <th>PHIẾU ĐÁNH GIÁ</th>
                    <th>GHI CHÚ</th>
                </thead>

                <?php
                $sql = "SELECT * FROM thiduakhenthuong where ChienSiThiDuaBoMon > 0";
                $result = mysqli_query($con, $sql);
                $sqlTeacher = "SELECT * FROM teacher";
                $resultTeacher = mysqli_query($con, $sqlTeacher);
                $sqlThiDua = "SELECT * FROM thiduakhenthuong where HoiDongThiDua > 0";
                $resultThiDua = mysqli_query($con, $sqlThiDua);
                $cntt = 0;
                $khmt = 0;
                $thud = 0;
                $httt = 0;
                $mmt = 0;
                $ktpm = 0;
                $userLength = mysqli_num_rows($resultThiDua);
                while ($rowT = mysqli_fetch_array($resultTeacher)) {
                    if ($rowT['BoMon'] === 'cntt') {
                        $cntt += 1;
                    } else if ($rowT['BoMon'] === 'khmt') {
                        $khmt += 1;
                    } else if ($rowT['BoMon'] === 'ktpm') {
                        $ktpm += 1;
                    } else if ($rowT['BoMon'] === 'thud') {
                        $thud += 1;
                    } else if ($rowT['BoMon'] === 'mmt') {
                        $mmt += 1;
                    } else if ($rowT['BoMon'] === 'httt') {
                        $httt += 1;
                    }
                }
                // echo $cntt, $khmt, $mmt, $ktpm, $thud, $httt;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php
                            $mscb = $row['MaCB'];
                            $sql0 = "SELECT * FROM teacher where MaCB='$mscb'";
                            $result0 = mysqli_query($con, $sql0);
                            $row0 = mysqli_fetch_array($result0);
                            echo $row0['HoTen'];
                            ?></td>
                        <td><?php
                            if ($row['BoMon'] === 'cntt') {
                                $ldtt =  ($row['LaoDongTienTien'] / $cntt) * 100;
                                echo round($ldtt, 2) . "%";
                            } else if ($row['BoMon'] === 'khmt') {
                                $ldtt =  ($row['LaoDongTienTien'] / $khmt) * 100;
                                echo round($ldtt, 2) . "%";
                            } else if ($row['BoMon'] === 'ktpm') {
                                $ldtt =  ($row['LaoDongTienTien'] / $ktpm) * 100;
                                echo round($ldtt, 2) . "%";
                            } else if ($row['BoMon'] === 'thud') {
                                $ldtt =  ($row['LaoDongTienTien'] / $thud) * 100;
                                echo round($ldtt, 2) . "%";
                            } else if ($row['BoMon'] === 'mmt') {
                                $ldtt =  ($row['LaoDongTienTien'] / $mmt) * 100;
                                echo round($ldtt, 2) . "%";
                            } else if ($row['BoMon'] === 'httt') {
                                $ldtt =  ($row['LaoDongTienTien'] / $httt) * 100;
                                echo round($ldtt, 2) . "%";
                            }
                            ?></td>
                        <td><?php
                            if ($row['BoMon'] === 'cntt') {

                                $cstdbm =  ($row['ChienSiThiDuaBoMon'] / $cntt) * 100;
                                echo round($cstdbm, 2) . "%";
                            } else if ($row['BoMon'] === 'khmt') {
                                $cstdbm =  ($row['ChienSiThiDuaBoMon'] / $khmt) * 100;
                                echo round($cstdbm, 2) . "%";
                            } else if ($row['BoMon'] === 'ktpm') {
                                $cstdbm =  ($row['ChienSiThiDuaBoMon'] / $ktpm) * 100;
                                echo round($cstdbm, 2) . "%";
                            } else if ($row['BoMon'] === 'thud') {
                                $cstdbm =  ($row['ChienSiThiDuaBoMon'] / $thud) * 100;
                                echo round($cstdbm, 2) . "%";
                            } else if ($row['BoMon'] === 'mmt') {
                                $cstdbm =  ($row['ChienSiThiDuaBoMon'] / $mmt) * 100;
                                echo round($cstdbm, 2) . "%";
                            } else if ($row['BoMon'] === 'httt') {
                                $cstdbm =  ($row['ChienSiThiDuaBoMon'] / $httt) * 100;
                                echo round($cstdbm, 2) . "%";
                            }
                            ?></td>
                        <td><?php
                            $cstdk = $userLength > 0 ? ($row['ChienSiThiDuaKhoa'] / $userLength) * 100 : 0;
                            echo round($cstdk, 2) . "%";
                            ?></td>
                        <td><a href="http://localhost/joomla/phieu-danh-gia/details.php?idVanBan=<?php
                                                                                                    $mscb = $row['MaCB'];
                                                                                                    $sqlDanhGia = "Select * from phieudanhgiavc where MaCB='$mscb'";
                                                                                                    $resultDanhGia = mysqli_query($con, $sqlDanhGia);
                                                                                                    $rowDanhGia = mysqli_fetch_array($resultDanhGia);
                                                                                                    echo $rowDanhGia['idDanhGia'];
                                                                                                    ?>">Chi tiết</a></td>
                        <td><?php
                            if (round($cstdk, 2) >= 50) {
                                echo "Đạt danh hiệu Chiến sỹ thi đua cấp Khoa";
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="row">
            <a href="http://localhost/joomla/thi-dua-khen-thuong/addhoidong.php">Thêm thành viên hội đồng</a>
            <a href="http://localhost/joomla/thi-dua-khen-thuong/todoEdit.php?resetHoiDong=1">Khởi tạo lại giá trị ban đầu</a>
            <div class="col-sm-12">
                <p style="font-weight:700;">HỘI ĐỒNG XÉT THI ĐUA KHEN THƯỞNG KHOA CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG</p>
                <p><span style="font-weight:700;">Chủ tọa:</span> Ông Nguyễn Hữu Hòa, Trưởng khoa, Chủ tịch Hội đồng TĐ-KT</p>
                <?php
                $sqlUser = "select * from thiduakhenthuong where HoiDongThiDua > 0";
                $resultUser = mysqli_query($con, $sqlUser);
                $i = 1;
                while ($row = mysqli_fetch_array($resultUser)) {
                ?>
                    <p><?php $ms = $row['MaCB'];
                        $sqlMaCB = "SELECT * FROM teacher where MaCB='$ms'";
                        $resultMaCB = mysqli_query($con, $sqlMaCB);
                        while ($row1 = mysqli_fetch_array($resultMaCB)) {
                            echo $i . "-" . $row1['HoTen'];
                        }
                        ?></p>
                <?php $i += 1;
                } ?>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h4>BẦU CHỌN DANH HIỆU CHIẾN SỸ THI ĐUA CẤP KHOA</h4>

                <div class="row" style="margin: 20px 0;">
                    <div style="font-weight:600;" class="col-sm-4">Họ tên</div>
                    <div style="font-weight:600;" class="col-sm-4">Đồng ý</div>
                    <div style="font-weight:600;" class="col-sm-4">Không đồng ý</div>
                    <form action="./todoEdit.php" method="post">
                        <input type="text" class="form-control" value="<?php echo $bomon ?>" style="display:none;" name="maBoMon">
                        <?php
                        $sqlUser = "select * from thiduakhenthuong where ChienSiThiDuaBoMon > 0";
                        $resultUser = mysqli_query($con, $sqlUser);
                        while ($row = mysqli_fetch_array($resultUser)) {
                        ?>
                            <div class="row" style="margin: 5px 0;">
                                <div style="padding-left:0px;" class="col-sm-4">
                                    <?php $ms = $row['MaCB'];
                                    $sqlMaCB = "SELECT * FROM teacher where MaCB='$ms'";
                                    $resultMaCB = mysqli_query($con, $sqlMaCB);
                                    while ($row1 = mysqli_fetch_array($resultMaCB)) { ?>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <?php echo $row1['HoTen']; ?>
                                        </label>
                                    <?php }
                                    ?>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-check-input" type="checkbox" value="<?= $row['MaCB'] ?>" name="cstdCo[]">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-check-input" type="checkbox" value="<?= $row['MaCB'] ?>" name="cstdKhong[]">

                                </div>

                            </div> <?php } ?>
                        <button class="btn btn-primary" type="submit" name="submitChienSiThiDuaKhoa">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function exportToExcel(fileName, sheetName, table) {
            let wb;
            if (table && table !== '') {
                wb = XLSX.utils.table_to_book($('#' + table)[0]);
            } else {
                // const ws = XLSX.utils.json_to_sheet(dataGiaoTrinhProcess);
                // // console.log('ws', ws);
                // wb = XLSX.utils.book_new();
                // XLSX.utils.book_append_sheet(wb, ws, sheetName);
            }
            // console.log('wb', wb);
            XLSX.writeFile(wb, `${fileName}.xlsx`);
        }
    </script>
</body>

</html>