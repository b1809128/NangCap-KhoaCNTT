<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lich Cong Tac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body >
    <?php require("../config/database.php");

    ?>
    <div class="container" id="pdfBody">
        <!-- Content here -->
        <div class="row" style="margin: 10px 0;">
            <div class="col-sm-6">
                <form method="get" style="display:flex">
                    <input type="text" class="form-control" name="search" placeholder="Tìm Kiếm">
                    <button type="submit" style="width:120px;" class="btn btn-primary">Tìm Kiếm</button>
                </form>
            </div>
            <div class="col-sm-6"><button class="btn btn-success" onclick="generatePDF()">Download PDF</button></div>
        </div>
        <div class="row">
            <table class="table">
                <tr style="font-weight:700">
                    <td rowspan="2">Ngày/Buổi</td>
                    <td colspan="2" style="color: red;">Sáng</td>
                    <td colspan="2" style="color: red;">Chiều / Tối</td>
                </tr>
                <tr style="font-weight:700">
                    <td>Trường</td>
                    <td>Khoa</td>
                    <td>Trường</td>
                    <td>Khoa</td>
                </tr>
                <?php
                $thu = 2;
                $ngay = 8;
                while ($thu <= 8) {
                ?>

                    <tr>
                        <td style="font-weight:700; background-color: #dfdfdf;">
                            <p style="margin-bottom:0;">Thứ <?php if ($thu === 8) {
                                                                echo "CN";
                                                            } else echo $thu; ?></p> <?= $ngay ?>/8
                        </td>
                        <td>
                            <?php
                            $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Sáng' and DonViToChuc='Trường' and ThoiGian='2022-08-$ngay' ";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                require "./print/text.php";
                            } ?>
                        </td>
                        <td style="background-color:#dfdfdf;">
                            <?php
                            $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Sáng' and DonViToChuc='Khoa' and ThoiGian='2022-08-$ngay' ";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                require "./print/text.php";
                            } ?>
                        </td>
                        <td><?php
                            $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Chiều' and DonViToChuc='Trường' and ThoiGian='2022-08-$ngay' ";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                require "./print/text.php";
                            } ?>
                        </td>
                        <td style="background-color:#dfdfdf;">
                            <?php
                            $sql = "SELECT * FROM lichcongtac where Thu='$thu' and Buoi='Chiều' and DonViToChuc='Khoa' and ThoiGian='2022-08-$ngay' ";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                require "./print/text.php";
                            } ?>
                        </td>
                    </tr>
                <?php
                    $thu += 1;
                    $ngay += 1;
                }
                ?>


            </table>
        </div>
    </div>
    <script type="text/javascript">
        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = document.getElementById('pdfBody');
            // Choose the element and save the PDF for our user.
            html2pdf().from(element).save();
        }
    </script>
</body>

</html>