<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết văn bản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php require("../config/database.php");

    ?>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['idVanBan'])) {
                $idVanBan = $_GET['idVanBan'];
                $sqlSelectVanBan = "SELECT * FROM vanban where idVanBan = '$idVanBan'";
                $result = mysqli_query($con, $sqlSelectVanBan);
                while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="col-sm-4">
                        <div class="row">
                            Mã số biên bản: <?= $row['idVanBan'] ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            Tình trạng: <?php
                                        $tinhTrang = $row['TinhTrang'];
                                        if ($tinhTrang == 0) {
                                            echo "Chưa ban hành";
                                        } else if ($tinhTrang == 1) {
                                            echo "Đang trình ký";
                                        } else if ($tinhTrang == 2) {
                                            echo "Đã ban hành";
                                        }
                                        ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            Thời gian: <?php
                                        $idThoiGian = $row['idThoiGian'];
                                        $sqlSelectDate = "SELECT * from thoigian where idThoiGian = '$idThoiGian'";
                                        $resultThoiGian = mysqli_query($con, $sqlSelectDate);
                                        while ($row = mysqli_fetch_array($resultThoiGian)) {
                                        ?>
                                Từ <?= $row['NgayBatDau'] ?> đến <?= $row['NgayKetThuc'] ?>
                            <?php } ?>
                        </div>
                    </div>

            <?php }
            }
            ?>

        </div>
        <button class="btn btn-success" onclick="Export2Word('exportContent');">Export as .doc</button>
        <div class="row" id="exportContent">
            <?php
            if (isset($_GET['idVanBan'])) {
                $idVanBan = $_GET['idVanBan'];
                $sqlSelectVanBan2 = "SELECT * FROM vanban where idVanBan = '$idVanBan'";
                $result2 = mysqli_query($con, $sqlSelectVanBan2);
                while ($row = mysqli_fetch_array($result2)) { ?>
                    <div class="col-sm-12">
                        <?= base64_decode($row['NoiDung']) ?>
                    </div>
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