<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Phiếu đánh giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php require("../config/database.php");
    if (isset($_GET['idVanBan'])) $idVanBan = $_GET['idVanBan'];
    ?>
    <div class="container">
        <a href="http://localhost/joomla/phieu-danh-gia/update.php?macb=<?php
                                                                        $sqlSearchGV = "select * from phieudanhgiavc where idDanhGia='$idVanBan'";
                                                                        $resultSearchGV = mysqli_query($con, $sqlSearchGV);
                                                                        while ($row1 = mysqli_fetch_array($resultSearchGV)) {
                                                                            echo $row1['MaCB'] . "&idDanhGia=" . $row1['idDanhGia'];
                                                                        }
                                                                        ?> ">Cập nhật đánh giá - Dành cho Trưởng, phó trưởng Bộ môn / Khoa</a>
        <button class="btn btn-success" onclick="Export2Word('exportContent');">Export as .doc</button>
        <div class="row" id="exportContent">
            <h4 style="font-weight:700; text-align:center;">PHIẾU ĐÁNH GIÁ, XẾP LOẠI CHẤT LƯỢNG VIÊN CHỨC</h4>
            <p style="font-weight:700; text-align:center;">Năm học 2021-2022</p>
            <?php
            if (isset($_GET['idVanBan'])) {
                // $idVanBan = $_GET['idVanBan'];
                $sqlSelectVanBan2 = "SELECT * FROM phieudanhgiavc where idDanhGia = '$idVanBan'";
                $result2 = mysqli_query($con, $sqlSelectVanBan2);

                while ($row = mysqli_fetch_array($result2)) { ?>
                    <p><span style="font-weight:700;">Họ và tên: </span> <?php
                                                                            $macb = $row['MaCB'];
                                                                            $sqlSearchGV = "select * from teacher where MaCB='$macb'";
                                                                            $resultSearchGV = mysqli_query($con, $sqlSearchGV);
                                                                            while ($row1 = mysqli_fetch_array($resultSearchGV)) {
                                                                                echo $row1['HoTen'];
                                                                            }
                                                                            ?> </p>
                    <p><span style="font-weight:700;">Chức danh nghề nghiệp: </span> <?php
                                                                                        $permission = $row['Permission'];
                                                                                        $sqlSearchGV = "select * from roles where Permission='$permission'";
                                                                                        $resultSearchGV = mysqli_query($con, $sqlSearchGV);
                                                                                        while ($row2 = mysqli_fetch_array($resultSearchGV)) {
                                                                                            echo $row2['Role'];
                                                                                        }
                                                                                        ?> </p>
                    <p><span style="font-weight:700;">Đơn vị công tác: </span> <?php
                                                                                $donvi = $row['BoMon'];
                                                                                $sqlSearchGV = "select * from bomon where BoMon='$donvi'";
                                                                                $resultSearchGV = mysqli_query($con, $sqlSearchGV);
                                                                                while ($row3 = mysqli_fetch_array($resultSearchGV)) {
                                                                                    echo $row3['TenBoMon'];
                                                                                }
                                                                                ?> </p>
                    <p style="font-weight:700;">I. KẾT QUẢ TỰ ĐÁNH GIÁ</p>
                    <p style="font-weight:700;">1. Chính trị tư tưởng:</p>

                    <p><?= $row['ChinhTriTuTuong'] ?></p>

                    <p style="font-weight:700;">2. Đạo đức, lối sống:</p>
                    <p><?= $row['DaoDucLoiSong'] ?></p>


                    <p style="font-weight:700;">3. Tác phong, lề lối làm việc:</p>
                    <p><?= $row['TacPhongLeLoi'] ?></p>


                    <p style="font-weight:700;">4. Ý thức tổ chức kỷ luật:</p>
                    <p><?= $row['YThucToChuc'] ?></p>


                    <p style="font-weight:700;">5. Kết quả thực hiện chức trách, nhiệm vụ được giao (xác định rõ nội dung công việc thực hiện; tỷ lệ hoàn thành, chất lượng, tiến độ công việc):</p>
                    <p style="white-space:pre-wrap;"><?= $row['KetQuaThucHien'] ?></p>

                    <p style="font-weight:700;">6. Thái độ phục vụ nhân dân, doanh nghiệp (đối với những vị trí tiếp xúc trực tiếp hoặc trực tiếp giải quyết công việc của người dân và doanh nghiệp):</p>

                    <p><?= $row['ThaiDoPhucVu'] ?></p>

                    <p style="font-weight:700;">PHẦN DÀNH RIÊNG CHO VIÊN CHỨC QUẢN LÝ</p>

                    <p style="font-weight:700;">7. Kết quả hoạt động của cơ quan, tổ chức, đơn vị được giao quản lý, phụ trách:</p>
                    <p><?= $row['KetQuaHoatDong'] ?></p>


                    <p style="font-weight:700;">8. Năng lực lãnh đạo, quản lý:</p>
                    <p><?= $row['NangLucLanhDao'] ?></p>

                    <p style="font-weight:700;">9. Năng lực tập hợp, đoàn kết:</p>
                    <p><?= $row['TapHopDoanKet'] ?></p>

                    <p style="font-weight:700;">II. TỰ NHẬN XÉT, XẾP LOẠI CHẤT LƯỢNG</p>

                    <p style="font-weight:700;">1. Tự nhận xét ưu, khuyết điểm:</p>

                    <p><?= $row['UuKhuyetDiem'] ?></p>

                    <p style="font-weight:700;">2. Tự xếp loại chất lượng:
                        <?= $row['XepLoai'] ?>
                        .</p>
                    <p style="text-align:right;"> Cần Thơ, ngày .. tháng .. năm 20.. </p>
                    <p style="margin-bottom: 100px;text-align:right;"> NGƯỜI TỰ NHẬN XÉT </p>


                    <p style="font-weight:700;">III. Ý KIẾN NHẬN XÉT, ĐÁNH GIÁ ĐỐI VỚI CẤP PHÓ CỦA NGƯỜI ĐỨNG ĐẦU</p>

                    <p><span style="font-weight:700;">1. Nhận xét ưu, khuyết điểm: </span> <?= $row['NhanXetDanhGiaCapBoMon'] ?></p>
                    <p><span style="font-weight:700;">2. Mức xếp loại: </span> <?= $row['XepLoaiCapBoMon'] ?></p>

                    <p style="text-align:right;"> Cần Thơ, ngày .. tháng .. năm 20.. </p>
                    <p style="text-align:right;"> NGƯỜI NHẬN XÉT, ĐÁNH GIÁ</p>
                    <p style="margin-bottom: 100px;text-align:right;"> (Ký, ghi rõ họ tên)</p>

                    <p style="font-weight:700;">IV. KẾT QUẢ ĐÁNH GIÁ, XẾP LOẠI CHẤT LƯỢNG VIÊN CHỨC</p>
                    <p style="font-weight:700;">1. Nhận xét ưu, khuyết điểm:</p>
                    <p><?= $row['NhanXetDanhGiaCapKhoa'] ?></p>
                    <p style="font-weight:700;">2. Kết quả đánh giá, xếp loại chất lượng:</p>
                    <p><?= $row['XepLoaiCapKhoa'] ?></p>
                    <p style="text-align:right;"> Cần Thơ, ngày .. tháng .. năm 20.. </p>
                    <p style="text-align:right;">HIỆU TRƯỞNG/TRƯỞNG ĐƠN VỊ</p>
                    <p style="margin-bottom: 100px;text-align:right;"> (Ký, ghi rõ họ tên)</p>
            <?php }
            }
            ?>

        </div>
    </div>
    <script>
        function Export2Word(element, filename = '') {
            var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
            var postHtml = "</body></html>";
            var html = preHtml + document.getElementById(element).innerHTML + postHtml;

            var blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });

            // Specify link url
            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

            // Specify file name
            filename = filename ? filename + '.doc' : 'document.doc';

            // Create download link element
            var downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = url;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }

            document.body.removeChild(downloadLink);
        }
    </script>
</body>

</html>