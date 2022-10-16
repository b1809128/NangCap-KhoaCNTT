<script lang="javascript" src="./excel/JS-ExportToExcel/dist/xlsx.full.min.js"></script>
<script lang="javascript" src="/tra-cuu/excel/JS-ExportToExcel/dist/xlsx.full.min.js"></script>

//Them dong nay khi excel bi loi
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<link rel="icon" href="/images/logo.png">

SELECT * FROM teacher INNER JOIN manage_post ON teacher.MaCB = manage_post.MaCB AND teacher.MaCB = 'dtnghi'

change URL to ip address

giang-vien, custom_asset, config, dbConfig.php, tra-cuu, teacher-info.php, van-ban

currentTimeStamp not create null không thêm thuộc tính `create_at` khi insert

SELECT * FROM topic INNER JOIN teacher ON (teacher.MaCB = topic.MaCB AND teacher.BoMon = 'cntt' and teacher.MaCB = 'tmtan') OR (teacher.HoTen LIKE '%Pham The Phi, Tran Nguyen Minh Thu, Vo Huynh Tram%' AND teacher.BoMon = 'cntt')

echo "<script>alert('Thêm thông tin thành công');</script>";
echo "<script>alert('Cập nhật thông tin thành công');</script>";
header("Refresh:0; url= http://localhost/joomla/cap-nhat/");
<?php require("../navbar/navbar.php"); ?>

<?php ob_start();
session_start();
?>