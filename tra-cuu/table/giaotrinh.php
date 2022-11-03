<tr>
    <td style="text-align:center;"><?php echo $row['STT'] ?></td>
    <td><?php echo $row['TenGiangVien'] ?></td>
    <td style="text-align:center;"><?php echo strtoupper($row['BoMon']) ?></td>
    <td style="text-align:center;"><?php if ($row['GiangVienThamGia'] != '') {
                                        echo $row['GiangVienThamGia'];
                                    } else {
                                        echo "X";
                                    } ?></td>
    <td style="width:500px;"><?php echo $row['GiaoTrinh'] ?></td>
    <td style="text-align:center;"><?php echo $row['NamXuatBan'] ?></td>
    <td style="text-align:center;"><?php echo $row['TrangDongGop'] ?></td>
</tr>