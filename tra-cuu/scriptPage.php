<script>
    //TODO: CHARTS JS
    <?php require "./function.php";            ?>
    var xValues = ["Bộ môn CNTT", "Bộ môn KHMT", "Bộ môn KTPM", "Bộ môn HTTT", "Bộ môn MMT&TT", "Bộ môn THUD"];
    var yValues = [<?php echo getCNTT(); ?>, <?php echo getKHMT(); ?>, <?php echo getKTPM(); ?>, <?php echo getHTTT(); ?>, <?php echo getMMT(); ?>, <?php echo getTHUD(); ?>];
    var barColors = ["#009ed8", "#009ed8", "#009ed8", "#009ed8", "#009ed8", "#009ed8"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Thống kê nghiên cứu Khoa CNTT & TT"
            }
        }
    });

    //TODO: PAGINATION FUNCTION
    const testPage = (numberPerPage, productData) => {
        let array = [];
        var length = productData.length;
        var myChunk;
        for (let i = 0; i < length; i += numberPerPage) {
            myChunk = productData.slice(i, i + numberPerPage);
            array.push(myChunk);
        }
        return array.map((data) => data);
    };


    //TODO: SCRIPT FOR BAI BAO KHOA HOC
    var tHeadBaiBaoKhoaHoc = `<thead>
                    <th>STT</th>
                    <th>GIẢNG VIÊN</th>
                    <th>BỘ MÔN</th>
                    <th>ĐỒNG TÁC GIẢ</th>
                    <th>TÊN GIÁO TRÌNH</th>
                    <th>NĂM XUẤT BẢN</th>
                    <th>TRANG ĐÓNG GÓP</th>
            </thead>`

    //TODO: SCRIPT FOR GIAO TRINH
    var tHeadGiaoTrinh = `<thead>
                    <th>STT</th>
                    <th>GIẢNG VIÊN</th>
                    <th>BỘ MÔN</th>
                    <th>ĐỒNG TÁC GIẢ</th>
                    <th>TÊN NGHIÊN CỨU, TRÍCH DẪN</th>
                    <th>NĂM XUẤT BẢN</th>
                    <th>TRANG ĐÓNG GÓP</th>
            </thead>`

    var tHeadDeTai = `<thead>
    <th>STT</th>
                    <th>TÊN ĐỀ TÀI</th>
                    <th>CHỦ NHIỆM</th>
                    <th>ĐỒNG TÁC GIẢ</th>
                    <th>BẮT ĐẦU</th>
                    <th>KẾT THÚC</th>
                    <th>CẤP</th>
            </thead>`

    <?php
    if (isset($_GET['idx'])) { ?>
        let arrayIdx = `<?php echo json_encode(getBaiBaoKhoaHoc());
                        ?>`;
        let BaiBaoHaveIndex = testPage(5, JSON.parse(arrayIdx))
        let str = "";
        let pageNumber = <?php echo (int)$_GET['idx']; ?> - 1;
        for (let index = 0; index < BaiBaoHaveIndex[pageNumber].length; index++) {
            str = str + `<tr>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['STT'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['TenGiangVien'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['BoMon'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['GiangVienThamGia'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['BaiBaoKhoaHoc'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['NamXuatBan'] + `</td>
            <td>` + BaiBaoHaveIndex[pageNumber][index]['TrangDongGop'] + `</td>
        </tr>`
        }
        document.getElementById("tableBaiBao").innerHTML = tHeadBaiBaoKhoaHoc + `<div>` + str + `</div>`;


        let arrayIndex = `<?php echo json_encode(getGiaoTrinh());
                            ?>`;
        let GiaoTrinhHaveIndex = testPage(5, JSON.parse(arrayIndex))
        let strIndexGiaoTrinh = "";
        let pageNumberIndex = <?php echo (int)$_GET['idx']; ?> - 1;
        for (let index = 0; index < GiaoTrinhHaveIndex[pageNumberIndex].length; index++) {
            strIndexGiaoTrinh = strIndexGiaoTrinh + `<tr>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['STT'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['TenGiangVien'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['BoMon'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['GiangVienThamGia'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['GiaoTrinh'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['NamXuatBan'] + `</td>
            <td>` + GiaoTrinhHaveIndex[pageNumberIndex][index]['TrangDongGop'] + `</td>
        </tr>`
        }
        document.getElementById("tableGiaoTrinh").innerHTML = tHeadGiaoTrinh + `<div>` + strIndexGiaoTrinh + `</div>`;

        let arrayIndexDeTai = `<?php echo json_encode(getDeTai());
                                ?>`;
        let DeTaiHaveIndex = testPage(5, JSON.parse(arrayIndexDeTai))
        let strIndexDeTai = "";
        let pageNumberIndexDeTai = <?php echo (int)$_GET['idx']; ?> - 1;
        for (let index = 0; index < DeTaiHaveIndex[pageNumberIndexDeTai].length; index++) {
            strIndexDeTai = strIndexDeTai + `<tr>
            <td>` + DeTaiHaveIndex[pageNumberIndexDeTai][index]['STT'] + `</td>
            <td>` + DeTaiHaveIndex[pageNumberIndexDeTai][index]['TenDeTai'] + `</td>
            <td>` + DeTaiHaveIndex[pageNumberIndexDeTai][index]['TenChuNhiem'] + `</td>
            <td>` + DeTaiHaveIndex[pageNumberIndexDeTai][index]['GiangVienThamGia'] + `</td>
            <td>` + DeTaiHaveIndex[pageNumberIndexDeTai][index]['BatDau'] + `</td>
            <td>` + DeTaiHaveIndex[pageNumberIndexDeTai][index]['KetThuc'] + `</td>
            <td>` + DeTaiHaveIndex[pageNumberIndexDeTai][index]['Cap'] + `</td>
        </tr>`
        }
        document.getElementById("tableDeTai").innerHTML = tHeadDeTai + `<div>` + strIndexDeTai + `</div>`;
    <?php }
    ?>

    // TODO: EXPORT EXCEL USING EXCEL JS
    function exportToExcel(fileName, sheetName, table) {

        let dataGiaoTrinh = `<?php echo json_encode(getGiaoTrinh());
                                ?>`;
        let dataGiaoTrinhProcess = JSON.parse(dataGiaoTrinh)
        // console.log('exportToExcel', dataGiaoTrinhProcess);

        let wb;
        if (table && table !== '') {
            wb = XLSX.utils.table_to_book($('#' + table)[0]);
        } else {
            const ws = XLSX.utils.json_to_sheet(dataGiaoTrinhProcess);
            // console.log('ws', ws);
            wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, sheetName);
        }
        // console.log('wb', wb);
        XLSX.writeFile(wb, `${fileName}.xlsx`);
    }
</script>