<?php
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
