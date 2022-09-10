<?php
if (isset($_GET['bomon'])) {
    $bomon = $_GET['bomon'];
    $sql = "select * from  teacher where teacher.BoMon='$bomon'";
    $result = mysqli_query($con, $sql);
    $length = mysqli_num_rows($result);
    $idArray = [];
    $idArray2 = [];
    $data = [];
    if ($length > 0) {
        while ($row = mysqli_fetch_array($result)) {
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
        // echo json_encode(array_unique($data));
        foreach (array_unique($data) as $value) {
            $sqlDeTai = "select * from topic where STT = $value";
            $resultDeTai = mysqli_query($con, $sqlDeTai);
            while ($row = mysqli_fetch_array($resultDeTai)) {
                require "./table/detai.php";
            }
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
        $sqlNam1 = "SELECT * FROM `topic` WHERE  BatDau = '$nam' AND  (MaCB LIKE '%$search%' OR TenChuNhiem LIKE '%$search%' ) ;";
    }
    $resultNam1 = mysqli_query($con, $sqlNam1);
    $length = mysqli_num_rows($resultNam1);
    if ($length > 0) {
        while ($row = mysqli_fetch_array($resultNam1)) {
            require "./table/detai.php";
        }
        if ($nam === "all") {
            $sqlS1 = "SELECT * FROM `topic` WHERE GiangVienThamGia LIKE '%$search%'  ;";
        } else {
            $sqlS1 = "SELECT * FROM `topic` WHERE BatDau LIKE '%$nam%' AND GiangVienThamGia LIKE '%$search%'  ;";
        }
        $resultS1 = mysqli_query($con, $sqlS1);
        while ($row = mysqli_fetch_array($resultS1)) {
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
