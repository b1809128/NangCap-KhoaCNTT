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
    // $sqlDeTaiBoMon = "SELECT * FROM topic INNER JOIN teacher where teacher.MaCB=topic.MaCB AND teacher.BoMon='$bomonSelect'";
    $sqlDeTaiBoMon = "select * from  teacher where teacher.BoMon='$bomonSelect'";

    $resultDeTaiBoMon = mysqli_query($con, $sqlDeTaiBoMon);
    $idArray = [];
    $idArray2 = [];
    $data = [];

    while ($row = mysqli_fetch_array($resultDeTaiBoMon)) {
        $tenChuNhiem = $row['HoTen'];
        $sql2 = "select * from topic WHERE TenChuNhiem Like '%$tenChuNhiem%'";
        $result2 = mysqli_query($con, $sql2);
        while ($row = mysqli_fetch_array($result2)) {
            $idArray[] = $row['STT'];
            // require "./table/detai.php";
        }
        $sql3 = "select * from topic WHERE GiangVienThamGia Like '%$tenChuNhiem%'";
        $result3 = mysqli_query($con, $sql3);
        while ($row = mysqli_fetch_array($result3)) {
            $idArray2[] = $row['STT'];
            // require "./table/detai.php";
        }
    }

    // echo json_encode($data1);
    // echo "<br>----<br>";
    for ($i = 0; $i < count($idArray); $i += 1) {
        $data[] = $idArray[$i];
    }
    for ($j = 0; $j < count($idArray2); $j += 1) {
        $data[] = $idArray2[$j];
    }
    $tongsodetaiBoMon = count(array_unique($data));
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
