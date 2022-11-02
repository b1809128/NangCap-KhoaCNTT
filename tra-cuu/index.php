<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ NGHIÊN CỨU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script lang="javascript" src="../excel/dist/xlsx.full.min.js"></script>
</head>

<body>
    <?php require '../config/database.php' ?>
    <?php require './process/countHeader.php' ?>
    <div class="container">
        <?php
        require '../navbar/navbar.php';
        if (isset($_GET['bomon'])) { ?>
            <div style="<?php if (!isset($_GET['bomon'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Kết quả tìm được: </b></span><?= $tongsobaivietBoMon ?></p>
                <p><span style="color: #009ed8;"><b>Số giáo trình: </b></span><?= $tongsogiaotrinhBoMon ?></p>
                <p><span style="color: #009ed8;"><b>Số bài báo khoa học: </b></span><?= $tongsobaibaokhoahocBoMon ?></p>
                <p><span style="color: #009ed8;"><b>Số đề tài nghiên cứu khoa học: </b></span><?= $tongsodetaiBoMon ?></p>

            </div>
        <?php }
        if (isset($_GET['search'])) { ?><div style="<?php if (!isset($_GET['search'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Kết quả tìm được: </b></span><?= $tongsobaivietSearch ?></p>
                <p><span style="color: #009ed8;"><b>Số giáo trình: </b></span><?= $tongsogiaotrinhSearch ?></p>
                <p><span style="color: #009ed8;"><b>Số bài báo khoa học: </b></span><?= $tongsobaibaokhoahocSearch ?></p>
                <p><span style="color: #009ed8;"><b>Số đề tài nghiên cứu khoa học: </b></span><?= $tongsodetaiSearch ?></p>

            </div> <?php } else { ?> <div style="<?php if (isset($_GET['search']) || isset($_GET['bomon'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Kết quả tìm được: </b></span><?= $tongsobaiviet ?></p>
                <p><span style="color: #009ed8;"><b>Số giáo trình: </b></span><?= $tongsogiaotrinh ?></p>
                <p><span style="color: #009ed8;"><b>Số bài báo khoa học: </b></span><?= $tongsobaibaokhoahoc ?></p>
                <p><span style="color: #009ed8;"><b>Số đề tài nghiên cứu khoa học: </b></span><?= $tongsodetai ?></p>

                <canvas id="myChart" style="<?php if ((isset($_GET['bomon1']) && isset($_GET['nam1']) && isset($_GET['search1'])) || (isset($_GET['cap']))) echo "display:none;"; ?>width:100%;max-width:600px"></canvas>
            </div> <?php } ?>


        <div class="row" style="<?php if (isset($_GET['bomon1']) && isset($_GET['nam1']) && isset($_GET['search1'])) echo "display:none;"; ?>margin:10px 0;">

            <div class="col-4">

                <form method="get" style="display:flex">
                    <select class="form-select" name="bomon">
                        <option value="all">--Tất cả--</option>
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
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </form>
            </div>
            <div class="col-6">
                <form method="get" style="display:flex">
                    <input type="text" class="form-control" name="search" placeholder="Tìm Kiếm">
                    <button type="submit" style="width:120px;" class="btn btn-primary">Tìm Kiếm</button>
                </form>
            </div>
            <div class="col-sm-2">
                <form method="get" style="display:flex">
                    <select class="form-select" name="nam">
                        <option value="all">--Tất cả năm--</option>
                        <?php
                        for ($i = 2009; $i <= 2022; $i += 1) {
                        ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </form>
            </div>
        </div>
        <!-- SEARCH IN SELECT BO MON -->
        <div class="row" style="<?php if (!isset($_GET['bomon'])) echo "display:none;"; ?>margin:10px 0;">
            <p style="margin:0;  color: red;">*Tìm kiếm theo bộ môn:</p>
            <form method="get" style="display:flex;">
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="search1" placeholder="Tìm Kiếm">
                </div>
                <div class="col-sm-1"> <input type="text" style="display:none" name="bomon1" value="<?php if (isset($_GET['bomon'])) echo $_GET['bomon']; ?>">
                </div>

                <div class="col-sm-2">
                    <select class="form-select" name="nam1">
                        <option value="all">--Tất cả--</option>
                        <?php
                        for ($i = 2009; $i <= 2022; $i += 1) {
                        ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-2">

                    <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
                </div>
            </form>
        </div>
        <div class="row" <?php if (isset($_GET['cap'])) {
                                echo "style='display:none;'";
                            } ?>>

            <div style="display:flex; justify-content:space-between;">
                <h4 style="color: #009ed8;">QUẢN LÝ CÁC GIÁO TRÌNH</h4>
                <button style="width:120px;" onclick="exportToExcel('TongHopGiaoTrinh','TongHopGiaoTrinh','tableGiaoTrinhPHP')" class="btn btn-success">Export</button>

            </div>
            <!-- TABLE JAVASCRIPT -->
            <table id="tableGiaoTrinh" <?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                                            echo "style='display:none;'";
                                        } ?> class="table table-striped table-hover">
            </table>

            <!-- TABLE GIAO TRINH PHP -->
            <table id="tableGiaoTrinhPHP" <?php if (isset($_GET['idx'])) {
                                                echo "style='display:none;'";
                                            } ?> class="table table-striped table-hover">
                <thead>
                    <th>STT</th>
                    <th>GIẢNG VIÊN</th>
                    <th>BỘ MÔN</th>
                    <th>ĐỒNG TÁC GIẢ</th>
                    <th>TÊN GIÁO TRÌNH</th>
                    <th>NĂM XUẤT BẢN</th>
                    <th>TRANG ĐÓNG GÓP</th>
                </thead>
                <tbody>
                    <?php require './process/bodyGiaoTrinh.php' ?>
                </tbody>

            </table>

            <!-- PAGINATION -->
            <div>
                <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search']) || isset($_GET['nam']) || isset($_GET['nam1']) || isset($_GET['bomon1']) || isset($_GET['search1'])) {
                                echo "display:none;";
                            } ?>" class="pagination">
                    <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] - 1; ?>">Previous</a></li>
                    <li class="page-item <?php if (!isset($_GET['idx'])) echo ' active' ?>"><a class="page-link" href="http://localhost/joomla/tra-cuu">1</a></li>
                    <?php $pages = ceil($tongsogiaotrinh / 5);
                    $idx = 2;
                    while ($idx <= $pages) { ?>
                        <li class="page-item <?php if ((isset($_GET['idx'])) && $idx == $_GET['idx']) {
                                                    echo ' active';
                                                } ?>"><a class="page-link" href="?idx=<?php echo $idx; ?>"><?php echo $idx; ?></a></li>

                    <?php $idx += 1;
                    }
                    ?>

                    <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] + 1; ?>">Next</a></li>
                </ul>
            </div>

            <!-- TABLE BAI BAO -->
            <div style="display:flex; justify-content:space-between;">
                <h4 style="color: #009ed8;">QUẢN LÝ CÁC BÀI BÁO, NGHIÊN CỨU KHOA HỌC</h4>
                <button style="width:120px;" onclick="exportToExcel('TongHopBaiBaoKhoaHoc','TongHopBaiBaoKhoaHoc','tableBaiBaoPHP')" class="btn btn-success">Export</button>

            </div>
            <!-- TABLE JAVASCRIPT -->
            <table id="tableBaiBao" <?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                                        echo "style='display:none;'";
                                    } ?> class="table table-striped table-hover">
            </table>

            <!-- TABLE BAI BAO PHP -->
            <table id="tableBaiBaoPHP" <?php if (isset($_GET['idx'])) {
                                            echo "style='display:none;'";
                                        } ?> class="table table-striped table-hover">
                <thead>
                    <th>STT</th>
                    <th>GIẢNG VIÊN</th>
                    <th>BỘ MÔN</th>
                    <th>ĐỒNG TÁC GIẢ</th>
                    <th>TÊN NGHIÊN CỨU, TRÍCH DẪN</th>
                    <th>NĂM XUẤT BẢN</th>
                    <th>TRANG ĐÓNG GÓP</th>
                </thead>
                <tbody>
                    <?php require './process/bodyBaiBao.php' ?>
                </tbody>

            </table>

            <!-- PAGINATION -->
            <div>
                <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search']) || isset($_GET['nam']) || isset($_GET['nam1']) || isset($_GET['bomon1']) || isset($_GET['search1'])) {
                                echo "display:none;";
                            }  ?>" class="pagination">
                    <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] - 1; ?>">Previous</a></li>
                    <li class="page-item <?php if (!isset($_GET['idx'])) echo ' active' ?>"><a class="page-link" href="http://localhost/joomla/tra-cuu">1</a></li>
                    <?php $pages = ceil($tongsobaibaokhoahoc / 5);
                    $idx = 2;
                    while ($idx <= $pages) { ?>
                        <li class="page-item <?php if ((isset($_GET['idx'])) && $idx == $_GET['idx']) {
                                                    echo ' active';
                                                }  ?>"><a class="page-link" href="?idx=<?php echo $idx; ?>"><?php echo $idx; ?></a></li>

                    <?php $idx += 1;
                    }
                    ?>

                    <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] + 1; ?>">Next</a></li>
                </ul>
            </div>
        </div>

        <!-- TABLE DE TAI -->
        <div class="row">
            <div style="display:flex; justify-content:space-between;">

                <h4 style="color: #009ed8;">QUẢN LÝ CÁC ĐỀ TÀI NGHIÊN KHOA HỌC CÁC CẤP</h4>
                <button style="width:120px;" onclick="exportToExcel('TongHopDeTaiNghienCuu','TongHopDeTaiNghienCuu','tableDeTaiPHP')" class="btn btn-success">Export</button>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form method="get" style="display:flex">
                        <select class="form-select" name="cap">
                            <option value="all">--Tất cả các cấp--</option>
                            <option value="Trung Ương">Trung Ương</option>
                            <option value="Nhà Nước">Nhà Nước</option>
                            <option value="Địa Phương">Địa Phương</option>
                            <option value="Tỉnh">Tỉnh, Thành Phố</option>
                            <option value="Cơ sở">Cơ Sở</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </form>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4"></div>
            </div>
            <!-- TABLE JAVASCRIPT -->
            <table id="tableDeTai" <?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                                        echo "style='display:none;'";
                                    } ?> class="table table-striped table-hover">
            </table>
            <!-- TABLE DE TAI PHP -->
            <table id="tableDeTaiPHP" <?php if (isset($_GET['idx'])) {
                                            echo "style='display:none;'";
                                        } ?> class="table table-striped table-hover">
                <thead>
                    <th>STT</th>
                    <th>TÊN ĐỀ TÀI</th>
                    <th>CHỦ NHIỆM</th>
                    <th>ĐỒNG TÁC GIẢ</th>
                    <th>BẮT ĐẦU</th>
                    <th>KẾT THÚC</th>
                    <th>CẤP</th>
                </thead>
                <tbody>
                    <?php require './process/bodyDeTai.php' ?>
                </tbody>

            </table>
            <!-- PAGINATION -->
            <div>
                <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search']) || isset($_GET['nam']) || isset($_GET['nam1']) || isset($_GET['bomon1']) || isset($_GET['search1'])) {
                                echo "display:none;";
                            }  ?>" class="pagination">
                    <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] - 1; ?>">Previous</a></li>
                    <li class="page-item <?php if (!isset($_GET['idx'])) echo ' active' ?>"><a class="page-link" href="http://localhost/joomla/tra-cuu">1</a></li>
                    <?php $pages = ceil($tongsodetai / 5);
                    $idx = 2;
                    while ($idx <= $pages) { ?>
                        <li class="page-item <?php if ((isset($_GET['idx'])) && $idx == $_GET['idx']) {
                                                    echo ' active';
                                                }  ?>"><a class="page-link" href="?idx=<?php echo $idx; ?>"><?php echo $idx; ?></a></li>

                    <?php $idx += 1;
                    }
                    ?>

                    <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] + 1; ?>">Next</a></li>
                </ul>
            </div>

        </div>

        <?php require './scriptPage.php'; ?>

    </div>
</body>

</html>