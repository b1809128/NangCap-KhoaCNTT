<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Post</title>
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
    }

    ?>
    <div class="container">
        <?php if (isset($_GET['bomon'])) { ?>
            <div style="<?php if (!isset($_GET['bomon'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Tổng số bài viết: </b></span><?= $tongsobaivietBoMon ?></p>
                <p><span style="color: #009ed8;"><b>Tổng số giáo trình: </b></span><?= $tongsogiaotrinhBoMon ?></p>
                <p><span style="color: #009ed8;"><b>Tổng số bài báo khoa học: </b></span><?= $tongsobaibaokhoahocBoMon ?></p>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        <?php }
        if (isset($_GET['search'])) { ?><div style="<?php if (!isset($_GET['search'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Tổng số bài viết: </b></span><?= $tongsobaivietSearch ?></p>
                <p><span style="color: #009ed8;"><b>Tổng số giáo trình: </b></span><?= $tongsogiaotrinhSearch ?></p>
                <p><span style="color: #009ed8;"><b>Tổng số bài báo khoa học: </b></span><?= $tongsobaibaokhoahocSearch ?></p>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div> <?php } else { ?> <div style="<?php if (isset($_GET['search']) || isset($_GET['bomon'])) echo 'display:none' ?>">

                <p><span style="color: #009ed8;"><b>Tổng số bài viết: </b></span><?= $tongsobaiviet ?></p>
                <p><span style="color: #009ed8;"><b>Tổng số giáo trình: </b></span><?= $tongsogiaotrinh ?></p>
                <p><span style="color: #009ed8;"><b>Tổng số bài báo khoa học: </b></span><?= $tongsobaibaokhoahoc ?></p>
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
        </div>

        <div style="display:flex; justify-content:space-between;">
            <h4 style="color: #009ed8;">QUẢN LÝ CÁC GIÁO TRÌNH</h4>
            <button style="width:120px;" onclick="exportToExcel('test1','test1','tableGiaoTrinhPHP')" class="btn btn-success">Export</button>

        </div>
        <!-- TABLE JAVASCRIPT -->
        <table id="tableGiaoTrinh" <?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                                        echo "style='display:none;'";
                                    } ?> class="table table-striped table-hover">
        </table>

        <!-- TABLE USE PHP -->
        <table id="tableGiaoTrinhPHP" <?php if (isset($_GET['idx'])) {
                                            echo "style='display:none;'";
                                        } ?> class="table table-striped table-hover">
            <thead>
                <th>STT</th>
                <th>MaCB</th>
                <th>TenGV</th>
                <th>BoMon</th>
                <th>DongTacGia</th>
                <th>GiaoTrinh</th>
                <th>NamXuatBan</th>
                <th>TrangDongGop</th>
            </thead>
            <tbody>

                <?php
                if (isset($_GET['bomon'])) {
                    $bomon = $_GET['bomon'];
                    if ($bomon == 'all') {
                        header('Location: http://localhost/joomla/manage-post/');
                    }

                    $sql = "SELECT * FROM manage_post where BoMon = '$bomon' AND GiaoTrinh != ''";
                    $result = mysqli_query($con, $sql);


                    while ($row = mysqli_fetch_array($result)) {

                ?> <tr>
                            <td><?= $row['STT'] ?></td>
                            <td><?= $row['MaCB'] ?></td>
                            <td><?= $row['TenGiangVien'] ?></td>
                            <td><?= $row['BoMon'] ?></td>
                            <td><?= $row['GiangVienThamGia'] ?></td>
                            <td><?= $row['GiaoTrinh'] ?></td>
                            <td><?= $row['NamXuatBan'] ?></td>
                            <td><?= $row['TrangDongGop'] ?></td>
                        </tr>
                    <?php }
                } else if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sqlSearch = "SELECT * FROM `manage_post` WHERE GiaoTrinh != '' AND (MaCB LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR TenGiangVien LIKE '%$search%' OR NamXuatBan LIKE '%$search%');";
                    $resultSearch = mysqli_query($con, $sqlSearch);
                    while ($row = mysqli_fetch_array($resultSearch)) { ?>
                        <tr>
                            <td><?= $row['STT'] ?></td>
                            <td><?= $row['MaCB'] ?></td>
                            <td><?= $row['TenGiangVien'] ?></td>
                            <td><?= $row['BoMon'] ?></td>
                            <td><?= $row['GiangVienThamGia'] ?></td>
                            <td><?= $row['GiaoTrinh'] ?></td>
                            <td><?= $row['NamXuatBan'] ?></td>
                            <td><?= $row['TrangDongGop'] ?></td>
                        </tr>
                    <?php }
                } else {
                    $sql1 = "SELECT * FROM manage_post where GiaoTrinh != '' LIMIT 5";
                    $result1 = mysqli_query($con, $sql1);
                    while ($row = mysqli_fetch_array($result1)) { ?>
                        <tr>
                            <td><?= $row['STT'] ?></td>
                            <td><?= $row['MaCB'] ?></td>
                            <td><?= $row['TenGiangVien'] ?></td>
                            <td><?= $row['BoMon'] ?></td>
                            <td><?= $row['GiangVienThamGia'] ?></td>
                            <td><?= $row['GiaoTrinh'] ?></td>
                            <td><?= $row['NamXuatBan'] ?></td>
                            <td><?= $row['TrangDongGop'] ?></td>
                        </tr>
                <?php }
                }
                ?>

            </tbody>

        </table>

        <!-- PAGINATION -->
        <div>
            <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                            echo "display:none;";
                        } ?>" class="pagination">
                <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] - 1; ?>">Previous</a></li>
                <li class="page-item <?php if (!isset($_GET['idx'])) echo ' active' ?>"><a class="page-link" href="http://localhost/joomla/manage-post">1</a></li>
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


        <div style="display:flex; justify-content:space-between;">
            <h4 style="color: #009ed8;">QUẢN LÝ CÁC BÀI BÁO, NGHIÊN CỨU KHOA HỌC</h4>
            <button style="width:120px;" onclick="exportToExcel('test2','test2','tableBaiBaoPHP')" class="btn btn-success">Export</button>

        </div>
        <!-- TABLE JAVASCRIPT -->
        <table id="tableBaiBao" <?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                                    echo "style='display:none;'";
                                } ?> class="table table-striped table-hover">
        </table>

        <!-- TABLE USE PHP -->
        <table id="tableBaiBaoPHP" <?php if (isset($_GET['idx'])) {
                                        echo "style='display:none;'";
                                    } ?> class="table table-striped table-hover">
            <thead>
                <th>STT</th>
                <th>MaCB</th>
                <th>TenGV</th>
                <th>BoMon</th>
                <th>DongTacGia</th>
                <th>BaiBao</th>
                <th>NamXuatBan</th>
                <th>TrangDongGop</th>
            </thead>
            <tbody>

                <?php
                if (isset($_GET['bomon'])) {
                    $bomon = $_GET['bomon'];
                    if ($bomon == 'all') {
                        header('Location: http://localhost/joomla/manage-post/');
                    }

                    $sql = "SELECT * FROM manage_post where BoMon = '$bomon' AND BaiBaoKhoaHoc != '' ";
                    $result = mysqli_query($con, $sql);


                    while ($row = mysqli_fetch_array($result)) {

                ?> <tr>
                            <td><?= $row['STT'] ?></td>
                            <td><?= $row['MaCB'] ?></td>
                            <td><?= $row['TenGiangVien'] ?></td>
                            <td><?= $row['BoMon'] ?></td>
                            <td><?= $row['GiangVienThamGia'] ?></td>
                            <td><?= $row['BaiBaoKhoaHoc'] ?></td>
                            <td><?= $row['NamXuatBan'] ?></td>
                            <td><?= $row['TrangDongGop'] ?></td>
                        </tr>
                    <?php }
                } else if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sqlSearch = "SELECT * FROM `manage_post` WHERE BaiBaoKhoaHoc != ''  AND (MaCB LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR TenGiangVien LIKE '%$search%' OR NamXuatBan LIKE '%$search%');";
                    $resultSearch = mysqli_query($con, $sqlSearch);
                    while ($row = mysqli_fetch_array($resultSearch)) { ?>
                        <tr>
                            <td><?= $row['STT'] ?></td>
                            <td><?= $row['MaCB'] ?></td>
                            <td><?= $row['TenGiangVien'] ?></td>
                            <td><?= $row['BoMon'] ?></td>
                            <td><?= $row['GiangVienThamGia'] ?></td>
                            <td><?= $row['BaiBaoKhoaHoc'] ?></td>
                            <td><?= $row['NamXuatBan'] ?></td>
                            <td><?= $row['TrangDongGop'] ?></td>
                        </tr>
                    <?php }
                } else {

                    $sql1 = "SELECT * FROM manage_post where BaiBaoKhoaHoc != '' LIMIT 5";
                    $result1 = mysqli_query($con, $sql1);
                    while ($row = mysqli_fetch_array($result1)) { ?>
                        <tr>
                            <td><?= $row['STT'] ?></td>
                            <td><?= $row['MaCB'] ?></td>
                            <td><?= $row['TenGiangVien'] ?></td>
                            <td><?= $row['BoMon'] ?></td>
                            <td><?= $row['GiangVienThamGia'] ?></td>
                            <td><?= $row['BaiBaoKhoaHoc'] ?></td>
                            <td><?= $row['NamXuatBan'] ?></td>
                            <td><?= $row['TrangDongGop'] ?></td>
                        </tr>
                <?php }
                }
                ?>

            </tbody>

        </table>

        <!-- PAGINATION -->
        <div>
            <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                            echo "display:none;";
                        }  ?>" class="pagination">
                <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] - 1; ?>">Previous</a></li>
                <li class="page-item <?php if (!isset($_GET['idx'])) echo ' active' ?>"><a class="page-link" href="http://localhost/joomla/manage-post">1</a></li>
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

        <script>
            //TODO: CHARTS JS
            <?php require "./function.php";            ?>
            var xValues = ["Bộ môn CNTT", "Bộ môn KHMT", "Bộ môn KTPM", "Bộ môn HTTT", "Bộ môn MMT&TT", "Bộ môn THUD"];
            var yValues = [<?php echo getCNTT(); ?>, <?php echo getKHMT(); ?>, <?php echo getKTPM(); ?>, <?php echo getHTTT(); ?>, <?php echo getMMT(); ?>, <?php echo getTHUD(); ?>];
            var barColors = ["#009ed8", "#009ed8", "#009ed8", "#009ed8", "#009ed8", "#009ed8"];

            new Chart("myChart", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Thống kê nghiên cứu Khoa CNTT & TT"
                    }
                }
            });

            //TODO: PAGINATION FUNCTION
            const testPage = (numberPerPage, productData) => {
                let array = [];
                var length = productData.length;
                var myChunk;
                for (let i = 0; i < length; i += numberPerPage) {
                    myChunk = productData.slice(i, i + numberPerPage);
                    array.push(myChunk);
                }
                return array.map((data) => data);
            };


            //TODO: SCRIPT FOR BAI BAO KHOA HOC
            var tHeadBaiBaoKhoaHoc = `<thead>
                <th>STT</th>
                <th>MaCB</th>
                <th>TenGV</th>
                <th>BoMon</th>
                <th>DongTacGia</th>
                <th>BaiBao</th>
                <th>NamXuatBan</th>
                <th>TrangDongGop</th>
            </thead>`

            //TODO: SCRIPT FOR GIAO TRINH
            var tHeadGiaoTrinh = `<thead>
                <th>STT</th>
                <th>MaCB</th>
                <th>TenGV</th>
                <th>BoMon</th>
                <th>DongTacGia</th>
                <th>BaiBao</th>
                <th>NamXuatBan</th>
                <th>TrangDongGop</th>
            </thead>`

            <?php
            if (isset($_GET['idx'])) { ?>
                let arrayIdx = `<?php echo json_encode(getBaiBaoKhoaHoc());
                                ?>`;
                let BaiBaoHaveIndex = testPage(5, JSON.parse(arrayIdx))
                let str = "";
                let pageNumber = <?php echo (int)$_GET['idx']; ?> - 1;
                for (let index = 0; index < BaiBaoHaveIndex[pageNumber].length; index++) {
                    str = str + `<tr>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['STT'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['MaCB'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['TenGiangVien'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['BoMon'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['GiangVienThamGia'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['BaiBaoKhoaHoc'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['NamXuatBan'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['TrangDongGop'] + `</td>
        </tr>`
                }
                document.getElementById("tableBaiBao").innerHTML = tHeadBaiBaoKhoaHoc + `<div>` + str + `</div>`;


                let arrayIndex = `<?php echo json_encode(getGiaoTrinh());
                                    ?>`;
                let GiaoTrinhHaveIndex = testPage(5, JSON.parse(arrayIndex))
                let strIndexGiaoTrinh = "";
                let pageNumberIndex = <?php echo (int)$_GET['idx']; ?> - 1;
                for (let index = 0; index < GiaoTrinhHaveIndex[pageNumberIndex].length; index++) {
                    strIndexGiaoTrinh = strIndexGiaoTrinh + `<tr>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['STT'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['MaCB'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['TenGiangVien'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['BoMon'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['GiangVienThamGia'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['GiaoTrinh'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['NamXuatBan'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['TrangDongGop'] + `</td>
        </tr>`
                }
                document.getElementById("tableGiaoTrinh").innerHTML = tHeadGiaoTrinh + `<div>` + strIndexGiaoTrinh + `</div>`;
            <?php }
            ?>

            // TODO: EXPORT EXCEL USING EXCEL JS
            function exportToExcel(fileName, sheetName, table) {

                let dataGiaoTrinh = `<?php echo json_encode(getGiaoTrinh());
                                        ?>`;
                let dataGiaoTrinhProcess = JSON.parse(dataGiaoTrinh)
                // console.log('exportToExcel', dataGiaoTrinhProcess);

                let wb;
                if (table && table !== '') {
                    wb = XLSX.utils.table_to_book($('#' + table)[0]);
                } else {
                    const ws = XLSX.utils.json_to_sheet(dataGiaoTrinhProcess);
                    // console.log('ws', ws);
                    wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, sheetName);
                }
                // console.log('wb', wb);
                XLSX.writeFile(wb, `${fileName}.xlsx`);
            }

            function exportToExcelPostSciences(fileName, sheetName, table) {

                let dataPost = `<?php echo json_encode(getBaiBaoKhoaHoc());
                                ?>`;
                let dataPostProcess = JSON.parse(dataPost)
                // console.log('exportToExcel', dataGiaoTrinhProcess);

                let wb;
                if (table && table !== '') {
                    wb = XLSX.utils.table_to_book($('#' + table)[0]);
                } else {
                    const ws = XLSX.utils.json_to_sheet(dataPostProcess);
                    // console.log('ws', ws);
                    wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, sheetName);
                }
                // console.log('wb', wb);
                XLSX.writeFile(wb, `${fileName}.xlsx`);
            }
        </script>

    </div>
</body>

</html>