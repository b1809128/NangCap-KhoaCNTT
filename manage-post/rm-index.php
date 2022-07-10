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
</head>

<body>
    <?php

    use PressBook\Scripts;

    require("../config/database.php");
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
    ?>
    <div class="container">
        <div style="<?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                        echo "display:none;";
                    } ?>">

            <p><span style="color: #009ed8;"><b>Tổng số bài viết: </b></span><?= $tongsobaiviet ?></p>
            <p><span style="color: #009ed8;"><b>Tổng số giáo trình: </b></span><?= $tongsogiaotrinh ?></p>
            <p><span style="color: #009ed8;"><b>Tổng số bài báo khoa học: </b></span><?= $tongsobaibaokhoahoc ?></p>
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>

        <div class="row" style="margin:10px 0;">

            <div class="col-6">

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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-6">

                <form method="get" style="display:flex">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <h4 style="color: #009ed8;">QUẢN LÝ CÁC GIÁO TRÌNH</h4>
        <table class="table table-striped table-hover">
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
                    $sql1 = "SELECT * FROM manage_post where GiaoTrinh != ''";
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
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php $pages = ceil($tongsogiaotrinh / 10);
                $idx = 1;
                while ($idx <= $pages) { ?>
                    <li class="page-item"><a class="page-link" href="?idxGiaoTrinh=<?php echo $idx; ?>"><?php echo $idx; ?></a></li>

                <?php $idx += 1;
                }
                ?>

                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>


        <h4 style="color: #009ed8;">QUẢN LÝ CÁC BÀI BÁO, NGHIÊN CỨU KHOA HỌC</h4>
        <table style="display: none;" class="table table-striped table-hover">
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

                    $sql = "SELECT * FROM manage_post where BoMon = '$bomon' AND BaiBaoKhoaHoc != ''";
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

                    $sql1 = "SELECT * FROM manage_post where BaiBaoKhoaHoc != ''";
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


        <!-- Table JavaScript -->
        <table id="tableBaiBao" <?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                                    //echo "style='display:none;'";
                                } ?> class="table table-striped table-hover">

        </table>

        <!-- PAGINATION -->
        <div>
            <ul style="<?php if (isset($_GET['bomon']) || isset($_GET['search'])) {
                            echo "display:none;";
                        } ?>" class="pagination">
                <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] - 1; ?>">Previous</a></li>
                <?php $pages = ceil($tongsobaibaokhoahoc / 5);
                $idx = 1;
                while ($idx <= $pages) { ?>
                    <li class="page-item <?php if (isset($_GET['idx']) && $idx == $_GET['idx']) {
                                                echo ' active';
                                            } ?>"><a class="page-link" href="?idx=<?php echo $idx; ?>"><?php echo $idx; ?></a></li>

                <?php $idx += 1;
                }
                ?>

                <li class="page-item"><a class="page-link" href="?idx=<?php if (isset($_GET['idx'])) echo $_GET['idx'] + 1; ?>">Next</a></li>
            </ul>
        </div>

        <script>
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

            // PAGINATION FUNCTION
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


            // console.log(getArrayPage);
            // console.log(getArrayPage[0][0]);
            var thead = `<thead>
                <th>STT</th>
                <th>MaCB</th>
                <th>TenGV</th>
                <th>BoMon</th>
                <th>DongTacGia</th>
                <th>BaiBao</th>
                <th>NamXuatBan</th>
                <th>TrangDongGop</th>
            </thead>`

            <?php if (!isset($_GET['idx'])) { ?>
                let arr = `<?php echo json_encode(getBaiBaoKhoaHoc());
                            ?>`;
                let BaiBaoNoneIndex = testPage(5, JSON.parse(arr))
                let str = "";
                for (let index = 0; index < BaiBaoNoneIndex[0].length; index++) {
                    str = str + `<tr>
            <td>` + BaiBaoNoneIndex[0][index]['STT'] + `</td>
            <td>` + BaiBaoNoneIndex[0][index]['MaCB'] + `</td>
            <td>` + BaiBaoNoneIndex[0][index]['TenGiangVien'] + `</td>
            <td>` + BaiBaoNoneIndex[0][index]['BoMon'] + `</td>
            <td>` + BaiBaoNoneIndex[0][index]['GiangVienThamGia'] + `</td>
            <td>` + BaiBaoNoneIndex[0][index]['BaiBaoKhoaHoc'] + `</td>
            <td>` + BaiBaoNoneIndex[0][index]['NamXuatBan'] + `</td>
            <td>` + BaiBaoNoneIndex[0][index]['TrangDongGop'] + `</td>
        </tr>`
                }
                document.getElementById("tableBaiBao").innerHTML = thead + `<div>` + str + `</div>`;

            <?php }
            if (isset($_GET['idx'])) { ?>
                let arr = `<?php echo json_encode(getBaiBaoKhoaHoc());
                            ?>`;
                let BaiBaoHaveIndex = testPage(5, JSON.parse(arr))
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
                document.getElementById("tableBaiBao").innerHTML = thead + `<div>` + str + `</div>`;
            <?php }
            if (isset($_GET['bomon'])) {
                $bomon = $_GET['bomon'];
            ?>
                let arraySubject = `<?php echo json_encode(getBaiBaoKhoaHocByBoMon($bomon));
                                    ?>`;
                const getArraySubject = testPage(5, JSON.parse(arraySubject))
                // console.log(getArrayBoMon);
                let strPostSubject = "";
                for (let index = 0; index < getArraySubject[0].length; index++) {
                    strPostSubject = strPostSubject + `<tr>
                    <td>` + getArraySubject[0][index]['STT'] + `</td>
                    <td>` + getArraySubject[0][index]['MaCB'] + `</td>
                    <td>` + getArraySubject[0][index]['TenGiangVien'] + `</td>
                    <td>` + getArraySubject[0][index]['BoMon'] + `</td>
                    <td>` + getArraySubject[0][index]['GiangVienThamGia'] + `</td>
                    <td>` + getArraySubject[0][index]['BaiBaoKhoaHoc'] + `</td>
                    <td>` + getArraySubject[0][index]['NamXuatBan'] + `</td>
                    <td>` + getArraySubject[0][index]['TrangDongGop'] + `</td>
                </tr>`
                }
                document.getElementById("tableBaiBao").innerHTML = thead + `<div>` + strPostSubject + `</div>`;
            <?php }
            if (isset($_GET['search'])) {
                $search = $_GET['search']; ?>
                let arraySearch = `<?php echo json_encode(getBaiBaoKhoaHocBySearch($search));
                                    ?>`;
                const getArraySubject = testPage(5, JSON.parse(arraySearch))
                // console.log(getArrayBoMon);
                let strPostSearch = "";
                for (let index = 0; index < getArraySearch[0].length; index++) {
                    strPostSearch = strPostSearch + `<tr>
                    <td>` + getArraySearch[0][index]['STT'] + `</td>
                    <td>` + getArraySearch[0][index]['MaCB'] + `</td>
                    <td>` + getArraySearch[0][index]['TenGiangVien'] + `</td>
                    <td>` + getArraySearch[0][index]['BoMon'] + `</td>
                    <td>` + getArraySearch[0][index]['GiangVienThamGia'] + `</td>
                    <td>` + getArraySearch[0][index]['BaiBaoKhoaHoc'] + `</td>
                    <td>` + getArraySearch[0][index]['NamXuatBan'] + `</td>
                    <td>` + getArraySearch[0][index]['TrangDongGop'] + `</td>
                </tr>`
                }
                document.getElementById("tableBaiBao").innerHTML = thead + `<div>` + strPostSearch + `</div>`;
            <?php
            }
            ?>
        </script>

    </div>
</body>

</html>