<?php
// Load the database configuration file 
include_once '../config/database.php';

// Filter the excel data 
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls";

// Column names 
$fields = array('STT', 'MaCB', 'TenGiangVien', 'BoMon', 'GiangVienThamGia', 'GiaoTrinh', 'NamXuatBan', 'TrangDongGop');

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";

// Fetch records from database 
$query = $con->query("SELECT * FROM manage_post where GiaoTrinh != ''");
if ($query->num_rows > 0) {
    // Output each row of the data 
    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['STT'], $row['MaCB'], $row['TenGiangVien'], $row['BoMon'], $row['GiangVienThamGia'], $row['GiaoTrinh'], $row['NamXuatBan'], $row['TrangDongGop']);
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
} else {
    $excelData .= 'No records found...' . "\n";
}

// Headers for download
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=\"$fileName\"");
// header("Pragma: no-cache");
// header("Expires: 0");
// Render excel data 
echo mb_convert_encoding($excelData,'UTF-16','UTF-8');;

exit;
