<?php
$host = "localhost";
$user = "root";
$password = "Quochuy123";
$database = "joomla";
$con = mysqli_connect($host, $user, $password, $database);
$con->set_charset("utf8");
if (mysqli_connect_error()) {
    echo "Connect Fail: " . mysqli_connect_errno();
    exit;
}
if (isset($_GET['profile'])) $profileName = $_GET['profile'];

if (isset($_POST['submitPerson'])) {
    $macb = $_POST['macbPerson'];
    $hoten = $_POST['hotenPerson'];
    $gioitinh = $_POST['gioitinhPerson'];
    $ngaysinh = $_POST['ngaysinhPerson'];
    $sdt = $_POST['sdtPerson'];
    $email = $_POST['emailPerson'];
    $diachi = $_POST['diachiPerson'];
    $hocvi = $_POST['hocviPerson'];
    $sqlUpdateInformation = "UPDATE `teacher` SET `HoTen` = '$hoten',`GioiTinh` = '$gioitinh',`NgaySinh` = '$ngaysinh',`SoDienThoai` = '$sdt',`Email` = '$email',`DiaChi` = '$diachi',`HocVi` = '$hocvi' WHERE `teacher`.`MaCB`='$macb';";
    if (mysqli_query($con, $sqlUpdateInformation)) {
        header("Location: /teacher-info-permission.php?profile=$macb");
    }
}

if (isset($_POST['submitEducation'])) {
    $sqlSelect = "select * from `teacher` WHERE `teacher`.`MaCB`='$profileName';";
    $result = mysqli_query($con, $sqlSelect);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['HocVan'] === "") {
            $Education = $_POST['timeEducation'] . "$" . $_POST['titleEducation'] . "$" . $_POST['elementEducation'];
            $sqlInitEducation = "UPDATE `teacher` SET `HocVan` = '$Education' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitEducation)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        } else {
            $EducationNotNull = $_POST['timeEducation'] . "$" . $_POST['titleEducation'] . "$" . $_POST['elementEducation'] . "$$" . $row['HocVan'];
            $sqlInitEducation = "UPDATE `teacher` SET `HocVan` = '$EducationNotNull' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitEducation)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        }
    }
}

if (isset($_POST['submitDistinct'])) {
    $sqlSelect = "select * from `teacher` WHERE `teacher`.`MaCB`='$profileName';";
    $result = mysqli_query($con, $sqlSelect);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['ChungChi'] === "") {
            $Distinct = $_POST['timeDistinct'] . "$" . $_POST['titleDistinct'] . "$" . $_POST['elementDistinct'];
            $sqlInitDistinct = "UPDATE `teacher` SET `ChungChi` = '$Distinct' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitDistinct)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        } else {
            $DistinctNotNull = $_POST['timeDistinct'] . "$" . $_POST['titleDistinct'] . "$" . $_POST['elementDistinct'] . "$$" . $row['ChungChi'];
            $sqlInitDistinct = "UPDATE `teacher` SET `ChungChi` = '$DistinctNotNull' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitDistinct)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        }
    }
}

if (isset($_POST['submitResearch'])) {
    $sqlSelect = "select * from `teacher` WHERE `teacher`.`MaCB`='$profileName';";
    $result = mysqli_query($con, $sqlSelect);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['NghienCuu'] === "") {
            $Research = $_POST['timeResearch'] . "$" . $_POST['titleResearch'] . "$" . $_POST['elementResearch'];
            $sqlInitResearch = "UPDATE `teacher` SET `NghienCuu` = '$Research' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitResearch)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        } else {
            $ResearchNotNull = $_POST['timeResearch'] . "$" . $_POST['titleResearch'] . "$" . $_POST['elementResearch'] . "$$" . $row['NghienCuu'];
            $sqlInitResearch = "UPDATE `teacher` SET `NghienCuu` = '$ResearchNotNull' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitResearch)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        }
    }
}


if (isset($_POST['submitExperience'])) {
    $sqlSelect = "select * from `teacher` WHERE `teacher`.`MaCB`='$profileName';";
    $result = mysqli_query($con, $sqlSelect);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['KinhNghiem'] === "") {
            $Experience = $_POST['timeExperience'] . "$" . $_POST['titleExperience'] . "$" . $_POST['elementExperience'];
            $sqlInitExperience = "UPDATE `teacher` SET `KinhNghiem` = '$Experience' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitExperience)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        } else {
            $ExperienceNotNull = $_POST['timeExperience'] . "$" . $_POST['titleExperience'] . "$" . $_POST['elementExperience'] . "$$" . $row['KinhNghiem'];
            $sqlInitExperience = "UPDATE `teacher` SET `KinhNghiem` = '$ExperienceNotNull' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitExperience)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        }
    }
}

if (isset($_POST['submitPublication'])) {
    $sqlSelect = "select * from `teacher` WHERE `teacher`.`MaCB`='$profileName';";
    $result = mysqli_query($con, $sqlSelect);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['BaiBao'] === "") {
            $Publication = $_POST['timePublication'] . "$" . $_POST['titlePublication'] . "$" . $_POST['elementPublication'];
            $sqlInitPublication = "UPDATE `teacher` SET `BaiBao` = '$Publication' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitPublication)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        } else {
            $PublicationNotNull = $_POST['timePublication'] . "$" . $_POST['titlePublication'] . "$" . $_POST['elementPublication'] . "$$" . $row['BaiBao'];
            $sqlInitPublication = "UPDATE `teacher` SET `BaiBao` = '$PublicationNotNull' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitPublication)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        }
    }
}


if (isset($_POST['submitProfessional'])) {
    $sqlSelect = "select * from `teacher` WHERE `teacher`.`MaCB`='$profileName';";
    $result = mysqli_query($con, $sqlSelect);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['ThamGia'] === "") {
            $Professional = $_POST['timeProfessional'] . "$" . $_POST['titleProfessional'] . "$" . $_POST['elementProfessional'];
            $sqlInitProfessional = "UPDATE `teacher` SET `ThamGia` = '$Professional' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitProfessional)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        } else {
            $ProfessionalNotNull = $_POST['timeProfessional'] . "$" . $_POST['titleProfessional'] . "$" . $_POST['elementProfessional'] . "$$" . $row['ThamGia'];
            $sqlInitProfessional = "UPDATE `teacher` SET `ThamGia` = '$ProfessionalNotNull' WHERE `teacher`.`MaCB`='$profileName';";
            if (mysqli_query($con, $sqlInitProfessional)) {
                header("Location: /teacher-info-permission.php?profile=$profileName");
            }
        }
    }
}
