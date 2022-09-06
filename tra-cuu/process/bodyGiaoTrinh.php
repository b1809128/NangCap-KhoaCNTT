<?php
if (isset($_GET['bomon'])) {
    $bomon = $_GET['bomon'];
    $sql = "SELECT * FROM manage_post where BoMon = '$bomon' AND GiaoTrinh != ''";
    $result = mysqli_query($con, $sql);
    $length = mysqli_num_rows($result);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($result)) {
            require "./table/giaotrinh.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sqlSearch = "SELECT * FROM `manage_post` WHERE GiaoTrinh != '' AND (MaCB LIKE '%$search%' OR BoMon LIKE '%$search%' OR GiaoTrinh LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR TenGiangVien LIKE '%$search%' OR NamXuatBan LIKE '%$search%' OR TrangDongGop LIKE '%$search%');";
    $resultSearch = mysqli_query($con, $sqlSearch);
    $length = mysqli_num_rows($resultSearch);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($resultSearch)) {
            require "./table/giaotrinh.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else if (isset($_GET['nam'])) {
    $nam = $_GET['nam'];
    $sqlNam = "SELECT * FROM `manage_post` WHERE GiaoTrinh != '' AND ( NamXuatBan LIKE '%$nam%');";
    $resultNam = mysqli_query($con, $sqlNam);
    $length = mysqli_num_rows($resultNam);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($resultNam)) {
            require "./table/giaotrinh.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else if (isset($_GET['nam1']) && isset($_GET['bomon1']) && isset($_GET['search1'])) {
    $nam = $_GET['nam1'];
    $bomon = $_GET['bomon1'];
    $search = $_GET['search1'];
    if ($nam == "all") {
        $sqlNam1 = "SELECT * FROM `manage_post` WHERE GiaoTrinh != '' AND BoMon LIKE '%$bomon%' AND ( MaCB LIKE '%$search%' OR TenGiangVien LIKE '%$search%');";
    } else {
        $sqlNam1 = "SELECT * FROM `manage_post` WHERE GiaoTrinh != '' AND ( MaCB LIKE '%$search%' OR TenGiangVien LIKE '%$search%') AND NamXuatBan LIKE '%$nam%' AND BoMon LIKE '%$bomon%';";
    }
    $resultNam1 = mysqli_query($con, $sqlNam1);
    $length = mysqli_num_rows($resultNam1);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($resultNam1)) {
            require "./table/giaotrinh.php";
        }
    } else {
        echo "<tr><td style='text-align:center;' colspan='8'><h4 style='color: red;'>-- Không có dữ liệu --</h4></td></tr>";
    }
} else {
    $sql1 = "SELECT * FROM manage_post where GiaoTrinh != '' LIMIT 5";
    $result1 = mysqli_query($con, $sql1);
    while ($row = mysqli_fetch_array($result1)) {
        require "./table/giaotrinh.php";
    }
}
