<?php

function getDate($number)
{
    require("../config/database.php");
    $sql = "SELECT * FROM `thoigian` WHERE idThoiGian='$number'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }

    return $json;
}
