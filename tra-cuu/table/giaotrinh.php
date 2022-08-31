<tr>
    <td><?php echo $row['STT'] ?></td>
    <td><?php echo $row['MaCB'] ?></td>
    <td><?php echo $row['TenGiangVien'] ?></td>
    <td><?php echo $row['BoMon'] ?></td>
    <td><?php if ($row['GiangVienThamGia'] != '') {
            echo $row['GiangVienThamGia'];
        } else {
            echo "X";
        } ?></td>
    <td style="width:500px;"><?php echo $row['GiaoTrinh'] ?></td>
    <td><?php echo $row['NamXuatBan'] ?></td>
    <td><?php echo $row['TrangDongGop'] ?></td>
</tr>