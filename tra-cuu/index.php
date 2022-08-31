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
    <?php

    // use PressBook\Scripts;

    require("../config/database.php");
    if (isset($_GET['bomon'])) {
        $bomonSelect = $_GET['bomon'];
        if ($bomonSelect == 'all') {
            header('Location: http://localhost/joomla/tra-cuu/');
        }
        $sqlTongSoBoMon = "SELECT * FROM manage_post where BoMon = '$bomonSelect'";
        $resultTongSoBoMon = mysqli_query($con, $sqlTongSoBoMon);

        $tongsobaivietBoMon = mysqli_num_rows($resultTongSoBoMon);
        $tongsobaibaokhoahocBoMon = 0;
        $tongsogiaotrinhBoMon = 0;
        while ($row = mysqli_fetch_array($resultTongSoBoMon)) {
            if ($row['GiaoTrinh'] != "") {
                $tongsogiaotrinhBoMon += 1;
            }
            if ($row['BaiBaoKhoaHoc'] != "") {
                $tongsobaibaokhoahocBoMon += 1;
            }
        }
        $sqlDeTaiBoMon = "SELECT * FROM topic INNER JOIN teacher where teacher.MaCB=topic.MaCB AND teacher.BoMon='$bomonSelect'";
        $resultDeTaiBoMon = mysqli_query($con, $sqlDeTaiBoMon);
        $tongsodetaiBoMon = mysqli_num_rows($resultDeTaiBoMon);
        $tongsobaivietBoMon += $tongsodetaiBoMon;
    }
    if (isset($_GET['nam'])) {
        if ($_GET['nam'] === "all") {
            header('Location: http://localhost/joomla/tra-cuu/');
        }
    }
    if (isset($_GET['cap'])) {
        if ($_GET['cap'] === "all") {
            header('Location: http://localhost/joomla/tra-cuu/');
        }
    }
    if (isset($_GET['search'])) {
        $dataSearch = $_GET['search'];
        $sqlTongSoSearch = "SELECT * FROM manage_post where MaCB LIKE '%$dataSearch%' OR GiangVienThamGia LIKE '%$dataSearch%' OR TenGiangVien LIKE '%$dataSearch%' OR NamXuatBan LIKE '%$dataSearch%';";

        $resultTongSoSearch = mysqli_query($con, $sqlTongSoSearch);

        $tongsobaivietSearch = mysqli_num_rows($resultTongSoSearch);
        $tongsobaibaokhoahocSearch = 0;
        $tongsogiaotrinhSearch = 0;
        while ($row = mysqli_fetch_array($resultTongSoSearch)) {
            if ($row['GiaoTrinh'] != "") {
                $tongsogiaotrinhSearch += 1;
            }
            if ($row['BaiBaoKhoaHoc'] != "") {
                $tongsobaibaokhoahocSearch += 1;
            }
        }
        $sqlDeTaiSearch = "SELECT * FROM `topic` WHERE (MaCB LIKE '%$dataSearch%' OR TenDeTai LIKE '%$dataSearch%' OR GiangVienThamGia LIKE '%$dataSearch%' OR TenChuNhiem LIKE '%$dataSearch%' OR BatDau LIKE '%$dataSearch%' OR KetThuc LIKE '%$dataSearch%');";;
        $resultDeTaiSearch = mysqli_query($con, $sqlDeTaiSearch);
        $tongsodetaiSearch = mysqli_num_rows($resultDeTaiSearch);
        $tongsobaivietSearch += $tongsodetaiSearch;
    } else {

        $sql2 = "SELECT * FROM manage_post";
        $result2 = mysqli_query($con, $sql2);
        $tongsobaiviet = mysqli_num_rows($result2);
        $tongsobaibaokhoahoc = 0;
        $tongsogiaotrinh = 0;
        while ($row = mysqli_fetch_array($result2)) {
            if ($row['GiaoTrinh'] != "") {
                $tongsogiaotrinh += 1;
            }
            if ($row['BaiBaoKhoaHoc'] != "") {
                $tongsobaibaokhoahoc += 1;
            }
        }

        $sqlDeTai = "SELECT * FROM topic";
        $resultDeTai = mysqli_query($con, $sqlDeTai);
        $tongsodetai = mysqli_num_rows($resultDeTai);
        $tongsobaiviet += $tongsodetai;
    }

    ?>
    <div class="container">
        <?php if (isset($_GET['bomon'])) { ?>
            <div style="<?php if (!isset($_GET['bomon'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Số bài viết: </b></span><?= $tongsobaivietBoMon ?></p>
                <p><span style="color: #009ed8;"><b>Số giáo trình: </b></span><?= $tongsogiaotrinhBoMon ?></p>
                <p><span style="color: #009ed8;"><b>Số bài báo khoa học: </b></span><?= $tongsobaibaokhoahocBoMon ?></p>
                <p><span style="color: #009ed8;"><b>Số đề tài nghiên cứu khoa học: </b></span><?= $tongsodetaiBoMon ?></p>

                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        <?php }
        if (isset($_GET['search'])) { ?><div style="<?php if (!isset($_GET['search'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Số bài viết: </b></span><?= $tongsobaivietSearch ?></p>
                <p><span style="color: #009ed8;"><b>Số giáo trình: </b></span><?= $tongsogiaotrinhSearch ?></p>
                <p><span style="color: #009ed8;"><b>Số bài báo khoa học: </b></span><?= $tongsobaibaokhoahocSearch ?></p>
                <p><span style="color: #009ed8;"><b>Số đề tài nghiên cứu khoa học: </b></span><?= $tongsodetaiSearch ?></p>

                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div> <?php } else { ?> <div style="<?php if (isset($_GET['search']) || isset($_GET['bomon'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Số bài viết: </b></span><?= $tongsobaiviet ?></p>
                <p><span style="color: #009ed8;"><b>Số giáo trình: </b></span><?= $tongsogiaotrinh ?></p>
                <p><span style="color: #009ed8;"><b>Số bài báo khoa học: </b></span><?= $tongsobaibaokhoahoc ?></p>
                <p><span style="color: #009ed8;"><b>Số đề tài nghiên cứu khoa học: </b></span><?= $tongsodetai ?></p>

                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div> <?php } ?>


        <div class="row" style="margin:10px 0;">

            <div class="col-4">

                <form method="get" style="display:flex">
                    <select class="form-select" name="bomon">
                        <option value="all">--Tất cả--</option>
                        <?php
                        $sqlBoMon = "SELECT * from BoMon";
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
                        <option value="all">--Tất cả--</option>
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
        <div class="row" <?php if (isset($_GET['cap'])) {
                                echo "style='display:none;'";
                            } ?>>

            <div style="display:flex; justify-content:space-between;">
                <h4 style="color: #009ed8;">QUẢN LÝ CÁC GIÁO TRÌNH</h4>
                <button style="width:120px;" onclick="exportToExcel('test1','test1','tableGiaoTrinhPHP')" class="btn btn-success">Export</button>

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
                    <th>MÃ CB</th>
                    <th>GIẢNG VIÊN</th>
                    <th>BỘ MÔN</th>
                    <th>ĐỒNG TÁC GIẢ</th>
                    <th>TÊN GIÁO TRÌNH</th>
                    <th>NĂM XUẤT BẢN</th>
                    <th>TRANG ĐÓNG GÓP</th>
                </thead>
                <tbody>

                    <?php
                    if (isset($_GET['bomon'])) {
                        $bomon = $_GET['bomon'];
                        $sql = "SELECT * FROM manage_post where BoMon = '$bomon' AND GiaoTrinh != ''";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./table/giaotrinh.php";
                        }
                    } else if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $sqlSearch = "SELECT * FROM `manage_post` WHERE GiaoTrinh != '' AND (MaCB LIKE '%$search%' OR GiaoTrinh LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR TenGiangVien LIKE '%$search%' OR NamXuatBan LIKE '%$search%');";
                        $resultSearch = mysqli_query($con, $sqlSearch);
                        while ($row = mysqli_fetch_array($resultSearch)) {
                            require "./table/giaotrinh.php";
                        }
                    } else if (isset($_GET['nam'])) {
                        $nam = $_GET['nam'];
                        $sqlNam = "SELECT * FROM `manage_post` WHERE GiaoTrinh != '' AND ( NamXuatBan LIKE '%$nam%');";
                        $resultNam = mysqli_query($con, $sqlNam);
                        while ($row = mysqli_fetch_array($resultNam)) {
                            require "./table/giaotrinh.php";
                        }
                    } else {
                        $sql1 = "SELECT * FROM manage_post where GiaoTrinh != '' LIMIT 5";
                        $result1 = mysqli_query($con, $sql1);
                        while ($row = mysqli_fetch_array($result1)) {
                            require "./table/giaotrinh.php";
                        }
                    }
                    ?>

                </tbody>

            </table>

            <!-- PAGINATION -->
            <div>
                <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search']) || isset($_GET['nam'])) {
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
                <button style="width:120px;" onclick="exportToExcel('test2','test2','tableBaiBaoPHP')" class="btn btn-success">Export</button>

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
                    <th>MÃ CB</th>
                    <th>GIẢNG VIÊN</th>
                    <th>BỘ MÔN</th>
                    <th>ĐỒNG TÁC GIẢ</th>
                    <th>TÊN NGHIÊN CỨU, TRÍCH DẪN</th>
                    <th>NĂM XUẤT BẢN</th>
                    <th>TRANG ĐÓNG GÓP</th>
                </thead>
                <tbody>

                    <?php
                    if (isset($_GET['bomon'])) {
                        $bomon = $_GET['bomon'];
                        $sql = "SELECT * FROM manage_post where BoMon = '$bomon' AND BaiBaoKhoaHoc != '' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./table/baibaokhoahoc.php";
                        }
                    } else if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $sqlSearch = "SELECT * FROM `manage_post` WHERE BaiBaoKhoaHoc != ''  AND (MaCB LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR BaiBaoKhoaHoc LIKE'%$search%' OR TenGiangVien LIKE '%$search%' OR NamXuatBan LIKE '%$search%');";
                        $resultSearch = mysqli_query($con, $sqlSearch);
                        while ($row = mysqli_fetch_array($resultSearch)) {
                            require "./table/baibaokhoahoc.php";
                        }
                    } else if (isset($_GET['nam'])) {
                        $nam = $_GET['nam'];
                        $sqlNam = "SELECT * FROM `manage_post` WHERE BaiBaoKhoaHoc != ''  AND (NamXuatBan LIKE '%$nam%');";
                        $resultNam = mysqli_query($con, $sqlNam);
                        while ($row = mysqli_fetch_array($resultNam)) {
                            require "./table/baibaokhoahoc.php";
                        }
                    } else {

                        $sql1 = "SELECT * FROM manage_post where BaiBaoKhoaHoc != '' LIMIT 5";
                        $result1 = mysqli_query($con, $sql1);
                        while ($row = mysqli_fetch_array($result1)) {
                            require "./table/baibaokhoahoc.php";
                        }
                    }
                    ?>

                </tbody>

            </table>

            <!-- PAGINATION -->
            <div>
                <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search']) || isset($_GET['nam'])) {
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
                <button style="width:120px;" onclick="exportToExcel('test3','test3','tableDeTaiPHP')" class="btn btn-success">Export</button>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form method="get" style="display:flex">
                        <select class="form-select" name="cap">
                            <option value="all">--Tất cả các cấp--</option>
                            <option value="Trung Ương">Trung Ương</option>
                            <option value="Nhà Nước">Nhà Nước</option>
                            <option value="Địa Phương">Địa Phương</option>
                            <option value="Tỉnh">Tỉnh</option>
                            <option value="Thành phố">Thành Phố</option>
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

                    <?php
                    if (isset($_GET['bomon'])) {
                        $bomon = $_GET['bomon'];
                        $sql = "SELECT * FROM topic INNER JOIN teacher ON teacher.MaCB = topic.MaCB AND teacher.BoMon = '$bomon'";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./table/detai.php";
                        }
                    } else if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $sqlSearch = "SELECT * FROM `topic` WHERE (MaCB LIKE '%$search%' OR TenDeTai LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR TenChuNhiem LIKE '%$search%' OR BatDau LIKE '%$search%' OR KetThuc LIKE '%$search%');";
                        $resultSearch = mysqli_query($con, $sqlSearch);
                        while ($row = mysqli_fetch_array($resultSearch)) {
                            require "./table/detai.php";
                        }
                    } else if (isset($_GET['nam'])) {
                        $nam = $_GET['nam'];
                        $sqlNam = "SELECT * FROM `topic` WHERE (BatDau LIKE '%$nam%' OR KetThuc LIKE '%$nam%');";
                        $resultNam = mysqli_query($con, $sqlNam);
                        while ($row = mysqli_fetch_array($resultNam)) {
                            require "./table/detai.php";
                        }
                    } else if (isset($_GET['cap'])) {
                        $cap = $_GET['cap'];
                        $sqlCap = "SELECT * FROM `topic` WHERE Cap='$cap';";
                        $resultCap = mysqli_query($con, $sqlCap);
                        while ($row = mysqli_fetch_array($resultCap)) {
                            require "./table/detai.php";
                        }
                    } else {

                        $sql1 = "SELECT * FROM topic LIMIT 5";
                        $result1 = mysqli_query($con, $sql1);
                        while ($row = mysqli_fetch_array($result1)) {
                            require "./table/detai.php";
                        }
                    }
                    ?>

                </tbody>

            </table>
            <!-- PAGINATION -->
            <div>
                <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search']) || isset($_GET['nam'])) {
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