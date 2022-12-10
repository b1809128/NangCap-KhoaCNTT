<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Xep Loai</title>
</head>

<body>

    <form action="" method="get">
        <!-- <input type="hidden" name="idSubmit" value="1"> -->
        <select name="idSubmit">
            <option value="1">Khoa</option>
            <option value="2">Trường</option>
        </select>
        <button type="submit">update</button>
    </form>
    <?php
    require "../config/database.php";

    if (isset($_GET['idSubmit']) && $_GET['idSubmit'] == '1') {
        $arr = ['tmthai', 'vhtram'];
        foreach ($arr as $value) {
            $sql = "update phieudanhgiavc set `XepLoaiCapBoMon`='Hoàn thành xuất sắc nhiệm vụ' where MaCB='$value'";
            mysqli_query($con, $sql);
        }
    }
    if (isset($_GET['idSubmit']) && $_GET['idSubmit'] == '2') {
        $arr = ['tmthai', 'vhtram'];
        foreach ($arr as $value) {
            $sql = "update phieudanhgiavc set `XepLoaiCapKhoa`='Hoàn thành xuất sắc nhiệm vụ' where MaCB='$value'";
            mysqli_query($con, $sql);
        }
    }
    ?>
</body>

</html>