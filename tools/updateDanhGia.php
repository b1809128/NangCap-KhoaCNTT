<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Danh Gia</title>
</head>

<body>
    
    <form action="" method="get">
        <input type="hidden" name="idSubmit" value="1">
        <button type="submit">update</button>
    </form>
    <?php
    require "../config/database.php";

    if (isset($_GET['idSubmit'])) {
        $arr = ['pnkhang','tnmthu'];
        foreach ($arr as $value) {
            $sql = "update phieudanhgiavc set  `ChinhTriTuTuong`='Tư tưởng vững vàng, bản thân luôn kiên định với chủ nghĩa Mác - Lênin, tư tưởng Hồ Chí Minh và đường lối đổi mới của Đảng; chấp hành, tuyên truyền, vận động gia đình và nhân dân thực hiện chủ trương, đường lối của Đảng, chính sách, pháp luật của Nhà nước, các qui định của Khoa, Trường.',`DaoDucLoiSong`='Đạo đức tốt, lối sống lành mạnh, ý thức thực hành tiết kiệm, đấu tranh chống tham nhũng lãng phí, quan liêu và các biểu hiện tiêu cực khác',`TacPhongLeLoi`='Tác phong làm việc tốt, luôn năng động trong thực hiện nhiệm vụ; làm việc dân chủ, đúng nguyên tắc; tinh thần hợp tác, giúp đỡ đồng nghiệp ',`YThucToChuc`='Luôn chấp hành sự phân công của tổ chức; thực hiện đúng quy định về các nội quy, quy chế của đơn vị.',`KetQuaThucHien`='-	Hoàn thành tốt công tác giảng dạy và cố vấn học tập, công tác tổ CLC ngành CNTT.
            -	Hoàn thành tốt công tác Giám đốc Trung tâm Điện tử và Tin học.
            ',`ThaiDoPhucVu`='Tinh thần phục vụ Sinh viên và Viên chức trong khoa, trường tốt. Quan hệ doanh nghiệp tốt nhằm tạo điều kiện cho sinh viên và doanh nghiệp kết nối với nhau trong lĩnh vực người tìm việc/việc tìm người.', `UuKhuyetDiem`='Tinh thần, thái độ trong công việc tận tụy, phục vụ viên chức và sinh viên, năng động trong công việc, hiệu quả công việc tốt.
            Cần học tập nâng cao trình độ ngoại ngữ.
            ',`NhanXetDanhGiaCapBoMon`=' Tinh thần, thái độ trong công việc tận tụy, phục vụ viên chức và sinh viên, năng động trong công việc, hiệu quả công việc tốt.',`NhanXetDanhGiaCapKhoa`='Tinh thần, thái độ trong công việc tận tụy, phục vụ viên chức và sinh viên, năng động trong công việc, hiệu quả công việc tốt.' where MaCB='$value'";
            mysqli_query($con, $sql);
        }
    }
    ?>
</body>

</html>