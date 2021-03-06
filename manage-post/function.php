<?php
function getCNTT()
{
    require("../config/database.php");
    $sql = "SELECT * from manage_post where BoMon='CNTT'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}

function getKHMT()
{
    require("../config/database.php");
    $sql = "SELECT * from manage_post where BoMon='KHMT'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}


function getMMT()
{
    require("../config/database.php");
    $sql = "SELECT * from manage_post where BoMon='MMT'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}

function getKTPM()
{
    require("../config/database.php");
    $sql = "SELECT * from manage_post where BoMon='KTPM'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}


function getHTTT()
{
    require("../config/database.php");
    $sql = "SELECT * from manage_post where BoMon='HTTT'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}


function getTHUD()
{
    require("../config/database.php");
    $sql = "SELECT * from manage_post where BoMon='THUD'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result);
}


function getGiaoTrinh()
{
    require("../config/database.php");
    $sql = "SELECT * FROM manage_post where GiaoTrinh != ''";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }

    return $json;
}

function getBaiBaoKhoaHoc()
{
    require("../config/database.php");
    $sql = "SELECT * FROM manage_post where BaiBaoKhoaHoc != ''";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }

    return $json;
}

function getBaiBaoKhoaHocByBoMon($bomon)
{
    require("../config/database.php");
    $sql = "SELECT * FROM manage_post where BoMon = '$bomon' AND BaiBaoKhoaHoc != ''";
    $result = mysqli_query($con, $sql);
    $json = [];
    while ($row = mysqli_fetch_array($result)) {

        $json[] = $row;
    }
    return $json;
}

function getGiaoTrinhByBoMon($bomon)
{
    require("../config/database.php");
    $sql = "SELECT * FROM manage_post where BoMon = '$bomon' AND GiaoTrinh != ''";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $json[] = $row;
    }
    return $json;
}


function getBaiBaoKhoaHocBySearch($search)
{
    require("../config/database.php");
    $sql = "SELECT * FROM `manage_post` WHERE BaiBaoKhoaHoc != ''  AND (MaCB LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR TenGiangVien LIKE '%$search%' OR NamXuatBan LIKE '%$search%');";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }

    return $json;
}


function getGiaoTrinhBySearch($search)
{
    require("../config/database.php");
    $sql = "SELECT * FROM `manage_post` WHERE GiaoTrinh != ''  AND (MaCB LIKE '%$search%' OR GiangVienThamGia LIKE '%$search%' OR TenGiangVien LIKE '%$search%' OR NamXuatBan LIKE '%$search%');";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }

    return $json;
}
