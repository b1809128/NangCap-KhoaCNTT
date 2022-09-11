<?php
ob_start();
session_start();
require "../config/database.php";
$bm =  ["Nguyen Thi Thao Anh", "Nguyen Ho Quoc Huy"];
$tpStringSession = "";
$length = count($bm);
$index = 0;
foreach ($bm as $value) {
    $sqlMaCB = "SELECT * FROM teacher where HoTen LIKE '%$value%'";
    $resultMaCB = mysqli_query($con, $sqlMaCB);
    while ($row = mysqli_fetch_array($resultMaCB)) {
        $tpStringSession = $tpStringSession . $row['Email'];
    }
    if ($index < $length-1) {
        $tpStringSession = $tpStringSession . ", ";
    }
    $index += 1;
}

// echo isset($_SESSION['emailSession']) ? $_SESSION['emailSession'] : "None";
echo $tpStringSession;