<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lich Cong Tac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php require("../config/database.php");

    ?>
    <div class="container">
        <!-- Content here -->
        <div class="row">
            <div class="col-sm-6">
                <form method="get" style="display:flex">
                    <input type="text" class="form-control" name="search" placeholder="Tìm Kiếm">
                    <button type="submit" style="width:120px;" class="btn btn-primary">Tìm Kiếm</button>
                </form>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <tr style="font-weight:700">
                    <td rowspan="2">Ngày</td>
                    <td colspan="2" style="color: red;">Sáng</td>
                    <td colspan="2" style="color: red;">Chiều / Tối</td>
                </tr>
                <tr style="font-weight:700">
                    <td>Trường</td>
                    <td>Khoa</td>
                    <td>Trường</td>
                    <td>Khoa</td>
                </tr>
                <tr style="background-color:#dfdfdf;">
                    <td style="font-weight:700">Thứ 2 22/8</td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='2' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='2022-08-08' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='2' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='2022-08-08' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td><?php
                        $sql = "SELECT * FROM lichcongtac where Thu='2' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='2022-08-08' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='2' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='2022-08-08' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:700">Thứ 3 22/8</td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='3' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='2022-08-09' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='3' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='2022-08-09' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td><?php
                        $sql = "SELECT * FROM lichcongtac where Thu='3' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='2022-08-09' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='3' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='2022-08-09' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                </tr>

                <tr style="background-color:#dfdfdf;">
                    <td style="font-weight:700">Thứ 4 22/8</td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='4' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='2022-08-10' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='4' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='2022-08-10' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td><?php
                        $sql = "SELECT * FROM lichcongtac where Thu='4' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='2022-08-10' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='4' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='2022-08-10' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:700">Thứ 5 22/8</td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='5' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='2022-08-11' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='5' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='2022-08-11' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td><?php
                        $sql = "SELECT * FROM lichcongtac where Thu='5' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='2022-08-11' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='5' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='2022-08-11' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                </tr>
                <tr style="background-color:#dfdfdf;">
                    <td style="font-weight:700">Thứ 6 22/8</td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='6' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='2022-08-12' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='6' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='2022-08-12' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td><?php
                        $sql = "SELECT * FROM lichcongtac where Thu='6' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='2022-08-12' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='6' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='2022-08-12' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight:700">Thứ 7 22/8</td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='7' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='2022-08-13' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='7' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='2022-08-13' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td><?php
                        $sql = "SELECT * FROM lichcongtac where Thu='7' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='2022-08-13' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='7' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='2022-08-13' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                </tr>
                <tr style="background-color:#dfdfdf;">
                    <td style="font-weight:700">CN 22/8</td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='CN' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='2022-08-14' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='CN' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='2022-08-14' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td><?php
                        $sql = "SELECT * FROM lichcongtac where Thu='CN' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='2022-08-14' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT * FROM lichcongtac where Thu='CN' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='2022-08-14' ";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            require "./print/text.php";
                        } ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>