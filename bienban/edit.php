<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .document-editor {
            min-height: 200px;
        }
    </style>
</head>

<body>
    <?php require "../config/database.php"; ?>

    <div class="container">
        <div class="row">
            <h4>Thêm Thời gian bắt đầu - kết thúc</h4>
            <div class="row">
                <form action="http://localhost/joomla/bienban/todoEdit.php" method="POST" style="display:flex; justify-content:space-between;margin: 10px 0;">
                    <div class="col-sm-4">

                        <div class="row">
                            <div class="col-sm-3" style="display:flex; float:right;">Bắt đầu:</div>
                            <div class="col-sm-8"> <input type="date" class="form-control" name="ngayBatDau" placeholder="mm/dd/yyyy">
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-3" style="float:right;"> Kết thúc:</div>
                            <div class="col-sm-8"> <input type="date" class="form-control" name="ngayKetThuc" placeholder="mm/dd/yyyy">
                            </div>

                        </div>

                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary" name="themThoiGian">Thêm</button>
                    </div>
                </form>

            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="row">

                    <form style=" display: flex;" action="./todoEdit.php" method="post">
                        <select class="form-select" style="width:300px; margin-right: 10px;" name="updateMSVB" aria-label="Default select example">
                            <option selected>--Mã số văn bản--</option>
                            <?php
                            $sqlSelectMaBienBan = "SELECT * from bienban";
                            $resultMaBienBan = mysqli_query($con, $sqlSelectMaBienBan);
                            while ($row = mysqli_fetch_array($resultMaBienBan)) { ?>
                                <option value="<?= $row['idBienBan'] ?>"> <?= $row['idBienBan'] ?> </option>
                            <?php }
                            ?>
                        </select>
                        <select class="form-select" style="width:300px; margin-right: 10px;" name="updateTinhTrang" aria-label="Default select example">
                            <option selected>--Tình trạng văn bản--</option>
                            <option value="0">Chưa phát hành</option>
                            <option value="1">Đang trình ký</option>
                            <option value="2">Đã phát hành</option>
                        </select>
                        <button class="btn btn-primary" type="submit" name="submitUpdateTinhTrang">Cập nhật</button>
                    </form>
                </div>

            </div>

        </div>


        <div class="row">
            <form action="./todoEdit.php" method="post">
                <div class="row" style="margin: 10px 0;">
                    <div class="col-sm-6"><select style="width: 300px;" class="form-select" name="selectDateBienBan" aria-label="Default select example">
                            <option selected>--Ngày, tháng, năm--</option>
                            <?php
                            $sqlTime = "SELECT * FROM thoigian";
                            $result = mysqli_query($con, $sqlTime);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <option <?php if (isset($_GET['selectDate']) && $_GET['selectDate'] == $row['idThoiGian']) {
                                            echo "selected";
                                        } ?> value="<?= $row['idThoiGian'] ?>">Từ <?= $row['NgayBatDau'] ?> đến <?= $row['NgayKetThuc'] ?></option>
                            <?php }
                            ?>
                        </select></div>
                    <div class="col-sm-6"><select style="width: 300px;" class="form-select" name="nguoiSoanBienBan" aria-label="Default select example">
                            <option selected>--Chọn tên người soạn--</option>
                            <?php
                            $sql = "SELECT * FROM teacher";
                            $result = mysqli_query($con, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <option value="<?= $row['MaCB'] ?>"><?= $row['HoTen'] ?></option>
                            <?php    }
                            ?>
                        </select></div>
                </div>

                <input type="text" name="tenBienBan" class="form-control" placeholder="Tên văn bản">
                <textarea name="noiDungBienBan" id="editor" style="width:100%; height:400px;"></textarea>

                <button class="btn btn-primary" type="submit" name="submitBienBan">Save</button>
            </form>
        </div>

    </div>

    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            nicEditors.allTextAreas()
        });
    </script>


</body>

</html>