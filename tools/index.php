<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tools Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php require("../config/database.php");
    if(isset($_POST["submitThemMoiGiangVien"])){
        echo $_POST['bomon'];
    }
    ?>
    <div class="container">
        <div class="row">
            <form method="POST" action="">
                <div class="mb-3">
                    <input type="text" name="macb" class="form-control" placeholder="MaCB">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Bộ môn</label>
                    <select class="form-select" style="width:300px; margin-right: 10px;" name="bomon" aria-label="Default select example">
                        <option>--Chọn bộ môn--</option>
                        <?php
                        $sqlSelectMSGT = "SELECT * from bomon ";
                        $resultMSGT = mysqli_query($con, $sqlSelectMSGT);
                        while ($row = mysqli_fetch_array($resultMSGT)) { ?>
                            <option value="<?= $row['BoMon'] ?>"><?= $row['TenBoMon'] ?> </option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="submitThemMoiGiangVien" >Thêm mới </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>