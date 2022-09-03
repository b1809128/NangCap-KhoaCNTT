<?php
if (isset($_GET['bomon'])) {
    $bomon = $_GET['bomon'];
    $sql = "SELECT * FROM topic INNER JOIN teacher ON teacher.MaCB = topic.MaCB AND teacher.BoMon = '$bomon'";
    $result = mysqli_query($con, $sql);
    $length = mysqli_num_rows($result);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($result)) {
            require "./table/detai.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sqlSearch = "SELECT * FROM `topic` WHERE (MaCB LIKE '%$search%' OR TenDeTai LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR TenChuNhiem LIKE '%$search%' OR BatDau LIKE '%$search%' OR KetThuc LIKE '%$search%');";
    $resultSearch = mysqli_query($con, $sqlSearch);
    $length = mysqli_num_rows($resultSearch);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($resultSearch)) {
            require "./table/detai.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else if (isset($_GET['nam'])) {
    $nam = $_GET['nam'];
    $sqlNam = "SELECT * FROM `topic` WHERE (BatDau LIKE '%$nam%' OR KetThuc LIKE '%$nam%');";
    $resultNam = mysqli_query($con, $sqlNam);
    $length = mysqli_num_rows($resultNam);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($resultNam)) {
            require "./table/detai.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else if (isset($_GET['cap'])) {
    $cap = $_GET['cap'];
    $sqlCap = "SELECT * FROM `topic` WHERE Cap='$cap';";
    $resultCap = mysqli_query($con, $sqlCap);
    $length = mysqli_num_rows($resultCap);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($resultCap)) {
            require "./table/detai.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else if (isset($_GET['nam1']) && isset($_GET['bomon1']) && isset($_GET['search1'])) {
    $nam = $_GET['nam1'];
    $bomon = $_GET['bomon1'];
    $search = $_GET['search1'];
    if ($nam == "all") {
        $sqlNam1 = "SELECT * FROM `topic` WHERE  (MaCB LIKE '%$search%' OR TenChuNhiem LIKE '%$search%') ;";
    } else {
        $sqlNam1 = "SELECT * FROM `topic` WHERE  BatDau = '$nam' AND  (MaCB LIKE '%$search%' OR TenChuNhiem LIKE '%$search%') ;";
    }
    $resultNam1 = mysqli_query($con, $sqlNam1);
    $length = mysqli_num_rows($resultNam1);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($resultNam1)) {
            require "./table/detai.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else {

    $sql1 = "SELECT * FROM topic LIMIT 5";
    $result1 = mysqli_query($con, $sql1);
    while ($row = mysqli_fetch_array($result1)) {
        require "./table/detai.php";
    }
}
