<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ NGHIÊN CỨU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script lang="javascript" src="../excel/dist/xlsx.full.min.js"></script>
</head>

<body>
    <?php require '../config/database.php' ?>
    <div class="container">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div class="row">
            <div class="col-sm-12">
                <div id="lineChart" style="width:100%; height:500px;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <canvas id="columnChart" style="width:100%; height:500px;"></canvas>
            </div>
        </div>
        <!-- <div id="pieChart" style="width:100%; max-width:600px; height:500px;"> -->
        <div class="row">
            <div class="col-sm-6">
                <div id="barChart" style="width:100%; max-width:600px; height:500px;"></div>
            </div>

            <div class="col-sm-6" style="width:400px; display: flex; align-items: center;">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>
    <script>
        <?php require "./function.php";            ?>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawBarChart);
        google.charts.setOnLoadCallback(drawLineChart);
        // google.charts.setOnLoadCallback(drawPieChart);


        function drawBarChart() {
            var data = google.visualization.arrayToDataTable([
                ['Đơn vị', 'Giáo trình', "Bài báo", "Đề tài"],
                ['Khoa CNTT', <?php echo getGiaoTrinhByFacultyAll('cntt') ?>, <?php echo getBaiBaoByFacultyAll('cntt') ?>, <?php echo getDeTaiByFacultyAll('cntt') ?>],
                ['Khoa KHMT', <?php echo getGiaoTrinhByFacultyAll('khmt') ?>, <?php echo getBaiBaoByFacultyAll('khmt') ?>, <?php echo getDeTaiByFacultyAll('khmt') ?>],
                ['Khoa CNPM', <?php echo getGiaoTrinhByFacultyAll('ktpm') ?>, <?php echo getBaiBaoByFacultyAll('ktpm') ?>, <?php echo getDeTaiByFacultyAll('ktpm') ?>],
                ['Khoa MMT', <?php echo getGiaoTrinhByFacultyAll('mmt') ?>, <?php echo getBaiBaoByFacultyAll('mmt') ?>, <?php echo getDeTaiByFacultyAll('mmt') ?>],
                ['Khoa HTTT', <?php echo getGiaoTrinhByFacultyAll('httt') ?>, <?php echo getBaiBaoByFacultyAll('httt') ?>, <?php echo getDeTaiByFacultyAll('httt') ?>],
                ['Khoa THUD', <?php echo getGiaoTrinhByFacultyAll('thud') ?>, <?php echo getBaiBaoByFacultyAll('thud') ?>, <?php echo getDeTaiByFacultyAll('thud') ?>],

            ]);

            var options = {
                title: 'THỐNG KÊ NGHIÊN CỨU GIÁO TRÌNH, BÀI BÁO, ĐỀ TÀI'
            };

            var barChart = new google.visualization.BarChart(document.getElementById('barChart'));
            barChart.draw(data, options);

        }

        function drawPieChart() {
            var data = google.visualization.arrayToDataTable([
                ['Contry', 'Mhl'],
                ['Italy', 54.8],
                ['France', 48.6],
                ['Spain', 44.4],
                ['USA', 23.9],
                ['Argentina', 14.5]
            ]);

            var options = {
                title: 'THỐNG KÊ ĐỀ TÀI CÁC CẤP'
            };

            var pieChart = new google.visualization.PieChart(document.getElementById('pieChart'));
            pieChart.draw(data, options);
        }

        function drawLineChart() {
            // Set Data
            var data = google.visualization.arrayToDataTable([
                ['Năm', 'Nghiên cứu'],
                ['2012', <?php echo getNghienCuuByYear('2012') ?>],
                ['2013', <?php echo getNghienCuuByYear('2013') ?>],
                ['2014', <?php echo getNghienCuuByYear('2014') ?>],
                ['2015', <?php echo getNghienCuuByYear('2015') ?>],
                ['2016', <?php echo getNghienCuuByYear('2016') ?>],
                ['2017', <?php echo getNghienCuuByYear('2017') ?>],
                ['2018', <?php echo getNghienCuuByYear('2018') ?>],
                ['2019', <?php echo getNghienCuuByYear('2019') ?>],
                ['2020', <?php echo getNghienCuuByYear('2020') ?>],
                ['2021', <?php echo getNghienCuuByYear('2021') ?>],
                ['2022', <?php echo getNghienCuuByYear('2022') ?>]
            ]);
            // Set Options
            var options = {
                title: 'NGHIÊN CỨU TRƯỜNG CNTT & TT QUA CÁC NĂM',
                hAxis: {
                    title: 'Năm'
                },
                vAxis: {
                    title: 'Nghiên cứu khoa học'
                },
                legend: 'none'
            };
            // Draw
            var lineChart = new google.visualization.LineChart(document.getElementById('lineChart'));
            lineChart.draw(data, options);
        }

        var xValues1 = ["Khoa CNTT", "Khoa KHMT", "Khoa CNPM", "Khoa HTTT", "Khoa MMT&TT", "Khoa THUD"];
        var yValues1 = [<?php echo getGiaoTrinhByFacultyAll('cntt') + getBaiBaoByFacultyAll('cntt') + getDeTaiByFacultyAll('cntt'); ?>, <?php echo getGiaoTrinhByFacultyAll('khmt') + getBaiBaoByFacultyAll('khmt') + getDeTaiByFacultyAll('khmt'); ?>, <?php echo getGiaoTrinhByFacultyAll('ktpm') + getBaiBaoByFacultyAll('ktpm') + getDeTaiByFacultyAll('ktpm'); ?>, <?php echo getGiaoTrinhByFacultyAll('httt') + getBaiBaoByFacultyAll('httt') + getDeTaiByFacultyAll('httt'); ?>, <?php echo getGiaoTrinhByFacultyAll('mmt') + getBaiBaoByFacultyAll('mmt') + getDeTaiByFacultyAll('mmt'); ?>, <?php echo getGiaoTrinhByFacultyAll('thud') + getBaiBaoByFacultyAll('thud') + getDeTaiByFacultyAll('thud'); ?>];
        var barColors1 = ["rgba(16,73,132,1)", "rgba(16,73,132,0.9)", "rgba(16,73,132,0.8)", "rgba(16,73,132,0.7)", "rgba(16,73,132,0.6)", "rgba(16,73,132,,0.5)"];

        new Chart("columnChart", {
            type: "bar",
            data: {
                labels: xValues1,
                datasets: [{
                    backgroundColor: barColors1,
                    data: yValues1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "THỐNG KÊ NGHIÊN CỨU CÁC KHOA"
                }
            }
        });

        var xValues = ["Nhà nước", "Bộ", "Địa phương", "Tỉnh, Thành phố", "Cơ sở"];
        var yValues = <?php echo json_encode(getDeTaiDetails()); ?>;
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("pieChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "BIỂU ĐỒ SỐ LƯỢNG ĐỀ TÀI NGHIÊN CỨU KHOA HỌC"
                }
            }
        });
    </script>

    </div>
</body>

</html>