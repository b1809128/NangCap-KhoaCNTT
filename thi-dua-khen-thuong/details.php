<?php ob_start();
session_start();
if (!isset($_SESSION['LDTT'])) $_SESSION['LDTT'] = 0;
if (!isset($_SESSION['CSTD'])) $_SESSION['CSTD'] = 0;
if (!isset($_SESSION['NewForm'])) $_SESSION['NewForm'] = 0;
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
        <?php if (isset($_GET['bomon'])) $bomon = $_GET['bomon']; ?>
        <h4 style="color: #0d6efd;">DANH SÁCH KHEN THƯỞNG CÁN BỘ VIÊN CHỨC, GIẢNG VIÊN</h4>
        <div class="row">
            <table class="table table-striped">
                <thead style="text-align:center;">
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
        <div class="row">
            <div style="display:flex; justify-content:space-between;">
                <h4 style="color: #0d6efd;">KẾT QUẢ THI ĐUA KHEN THƯỞNG CÁN BỘ VIÊN CHỨC, GIẢNG VIÊN</h4>
                <button style="width:120px;" onclick="exportToExcel('ThiDuaKhenThuongBoMon','ThiDuaKhenThuongBoMon','tableKetQuaThiDua')" class="btn btn-success">Export</button>
            </div>
            <table id="tableKetQuaThiDua" class="table table-striped">
                <thead style="text-align:center;">
                    <th>HỌ TÊN</th>
                    <th>LAO ĐỘNG TIÊN TIẾN</th>
                    <th>CHIẾN SỸ THI ĐUA CẤP BỘ MÔN</th>
                    <th>GHI CHÚ</th>
                </thead>

                <?php
                $sql = "SELECT * FROM thiduakhenthuong where BoMon='$bomon' and HoiDongThiDuaBoMon > 0";
                $result = mysqli_query($con, $sql);
                $userLength = mysqli_num_rows($result);
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
                        <td style="text-align:center;"><?php
                                                        $ldtt =  ($row['LaoDongTienTien'] / $userLength) * 100;
                                                        echo $row['LaoDongTienTien'] . "/" . $userLength . " (" . round($ldtt, 2) . "%)";
                                                        ?></td>
                        <td style="text-align:center;"><?php
                                                        $cstdbm =  ($row['ChienSiThiDuaBoMon'] / $userLength) * 100;
                                                        echo $row['ChienSiThiDuaBoMon'] . "/" . $userLength . " (" . round($cstdbm, 2) . "%)";
                                                        ?></td>

                        <td style="text-align:center;"><?php
                                                        if (round($ldtt, 2) >= 50) {
                                                            echo "Đạt danh hiệu Lao động tiên tiến<br>";
                                                            if (round($cstdbm, 2) >= 80) {
                                                                echo "Xét danh hiệu Chiến sỹ thi đua cấp Khoa";
                                                            }
                                                        }
                                                        ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <p style="font-weight:700; color: red;">HỘI ĐỒNG XÉT THI ĐUA KHEN THƯỞNG</p>
                <p style="font-weight:700;"><?php
                                            $sqlLeader = "select * from teacher where BoMon = '$bomon'";
                                            $resultLeader = mysqli_query($con, $sqlLeader);
                                            while ($row = mysqli_fetch_array($resultLeader)) {
                                                if ((int)$row['Permission'] === 5) {
                                                    echo $row['HoTen'] . " - Trưởng khoa, Chủ nhiệm hội đồng.<br>";
                                                }
                                            }
                                            ?></p>


                <?php
                $sqlUser = "select * from thiduakhenthuong where BoMon = '$bomon' and HoiDongThiDuaBoMon > 0";
                $resultUser = mysqli_query($con, $sqlUser);
                $i = 1;
                while ($row = mysqli_fetch_array($resultUser)) {
                ?>
                    <p><?php $ms = $row['MaCB'];
                        $sqlMaCB = "SELECT * FROM teacher where MaCB='$ms'";
                        $resultMaCB = mysqli_query($con, $sqlMaCB);
                        while ($row1 = mysqli_fetch_array($resultMaCB)) {
                            echo $i . ". " . $row1['HoTen'] . " - Thành viên";
                        }
                        ?></p>
                <?php $i += 1;
                } ?>

            </div>
        </div>
        <div class="row">
            <div class="row" <?php if (isset($_SESSION['tokenId'])) {
                                    $tokenId = $_SESSION['tokenId'];
                                    $sqlToken = "SELECT * FROM access_token where idToken='$tokenId'";
                                    $resToken = mysqli_query($con, $sqlToken);
                                    $row = mysqli_fetch_array($resToken);
                                    if ((int)$row['Permission'] < 5) {
                                        echo "style='display:none;'";
                                    }
                                } else {
                                    echo "style='display:none;'";
                                } ?>>
                <a href="http://localhost/joomla/thi-dua-khen-thuong/createform.php?bomon=<?php echo $_GET['bomon']; ?>">Quản lý biểu mẫu</a>
                <a href="http://localhost/joomla/thi-dua-khen-thuong/add.php?bomon=<?php echo $_GET['bomon']; ?>">Quản lý thành viên</a>
                <a href="http://localhost/joomla/thi-dua-khen-thuong/todoEdit.php?resetBoMon=<?php echo $_GET['bomon']; ?>">Khởi tạo lại giá trị ban đầu</a>
            </div>
            <div class="col-sm-6">
                <h4 style="color: red;">BẦU CHỌN DANH HIỆU LAO ĐỘNG TIÊN TIẾN</h4>
                <p><span style="font-weight:500; color: #0d6efd;">Số lượt đã bình chọn: </span><?php echo $_SESSION['LDTT']; ?></p>
                <div class="row" style="margin: 20px 0;">
                    <div style="font-weight:600;" class="col-sm-4">Họ tên</div>
                    <div style="font-weight:600;" class="col-sm-4">Đồng ý</div>
                    <div style="font-weight:600;" class="col-sm-4">Không đồng ý</div>
                    <form action="./todoEdit.php" method="post">
                        <input type="text" class="form-control" value="<?php echo $bomon ?>" style="display:none;" name="maBoMon">
                        <?php
                        $sqlUser = "select * from thiduakhenthuong where BoMon = '$bomon'";
                        $resultUser = mysqli_query($con, $sqlUser);
                        $radioI = 0;
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
                                    <input class="form-check-input" type="radio" value="1" name="num<?= $radioI ?>">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-check-input" type="radio" value="0" name="num<?= $radioI ?>">
                                </div>

                            </div> <?php $radioI += 1;
                                } ?>
                        <button class="btn btn-primary" <?php if ((int)$_SESSION['LDTT'] === $userLength) echo "disabled"; ?> type="submit" name="submitLaoDongTienTien">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <h4 style="color: red;">BẦU CHỌN XÉT DANH HIỆU CHIẾN SỸ THI ĐUA</h4>
                <p><span style="font-weight:500; color: #0d6efd;">Số lượt đã bình chọn: </span><?php echo $_SESSION['CSTD']; ?></p>
                <div class="row" style="margin: 20px 0;">
                    <div style="font-weight:600;" class="col-sm-4">Họ tên</div>
                    <div style="font-weight:600;" class="col-sm-4">Đồng ý</div>
                    <div style="font-weight:600;" class="col-sm-4">Không đồng ý</div>
                    <form action="./todoEdit.php" method="post">
                        <input type="text" class="form-control" value="<?php echo $bomon ?>" style="display:none;" name="maBoMon">
                        <?php
                        $sqlUser = "select * from thiduakhenthuong where BoMon = '$bomon'";
                        $resultUser = mysqli_query($con, $sqlUser);
                        $radioX = 0;
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
                                    <input class="form-check-input" type="radio" value="1" name="num<?= $radioX ?>">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-check-input" type="radio" value="0" name="num<?= $radioX ?>">
                                </div>

                            </div> <?php $radioX += 1;
                                } ?>
                        <button class="btn btn-primary" <?php if ((int)$_SESSION['CSTD'] === $userLength) echo "disabled"; ?> type="submit" name="submitChienSiThiDua">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $sqlNewForm = "SELECT * from createform where BoMon = '$bomon'";
            $resultNewForm = mysqli_query($con, $sqlNewForm);
            $l = mysqli_num_rows($resultNewForm);
            if ($l > 0) {
                echo '<h4 style="color: #0d6efd; text-decoration: underline;">MẪU MỚI TẠO</h4>';
            }
            while ($rowNew = mysqli_fetch_array($resultNewForm)) { ?>
                <div class="col-sm-6">
                    <h4 style="color: red;"><?= $rowNew['TenForm'] ?></h4>
                    <?php
                    $json = $rowNew['ThanhVien'];
                    $obj = json_decode($json, true);
                    // $data = count(json_decode($json));
                    $msNum =  count(json_decode($json));
                    $ketQua = json_decode($rowNew['KetQua']);
                    $arr = $obj;
                    // echo "<br>data<br>";
                    // var_dump(json_decode(json_decode($data)));
                    // var_dump($data);
                    echo '<div class="row" style="margin: 20px 0;">
                    <div style="font-weight:600;" class="col-sm-6">Họ tên</div>
                    <div style="font-weight:600;" class="col-sm-3">Đồng ý</div>
                    <div style="font-weight:600;" class="col-sm-3">Không đồng ý</div>';
                    echo '<form action="./todoEdit.php" method="post">';
                    echo '<input class="form-control" name="idForm" type="hidden" value=' . $rowNew['idForm'] . '>';
                    $radioI = 0;
                    for ($i = 0; $i < $msNum; $i++) {
                        // echo ($arr[$i]);
                        echo '<div class="row" style="margin: 5px 0;">
                        <div style="padding-left:0px;" class="col-sm-6">';
                        $ms = $arr[$i];
                        $sqlMaCB = "SELECT * FROM teacher where MaCB='$ms'";
                        $resultMaCB = mysqli_query($con, $sqlMaCB);
                        while ($row1 = mysqli_fetch_array($resultMaCB)) {
                            echo '<label class="form-check-label" for="flexCheckDefault">';
                            if (count($ketQua) > 0) {
                                echo $row1['HoTen'] . ' - ' . $ketQua[$i] . '/' . $userLength . '(' . round(($ketQua[$i] / $userLength) * 100, 2) . '%)';
                            } else {
                                echo $row1['HoTen'];
                            }
                            echo '</label>';
                        }
                        echo '</div>';
                        echo ' <div class="col-sm-3">';
                        echo ' <input class="form-check-input" type="radio" value="1" name="num' . $radioI . '">';
                        echo ' </div>';
                        echo ' <div class="col-sm-3">';
                        echo ' <input class="form-check-input" type="radio" value="0" name="num' . $radioI . '">';
                        echo ' </div>';
                        echo ' </div>';
                        $radioI += 1;
                    }
                    if ($rowNew['Active'] > 0) {
                        echo '<button class="btn btn-primary" type="submit" name="submitNewForm">Submit</button>';
                    } else {
                        echo '<button class="btn btn-primary" disabled type="submit" name="submitNewForm">Submit</button>';
                    }
                    echo "</form>";
                    echo "</div>";
                    ?>
                </div>
            <?php }
            ?>
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