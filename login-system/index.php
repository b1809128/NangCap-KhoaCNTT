<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐĂNG NHẬP HỆ THỐNG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    require '../config/database.php';
    // echo $_SERVER['HTTP_REFERER'];
    ?>
    <div class="container">
        <?php require("../navbar/navbar.php"); ?>
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="" method="post" style="display:block; text-align:center;">
                    <h3 style="color: #0d6efd;">ĐĂNG NHẬP HỆ THỐNG </h3>
                    <!-- <input style="margin-top: 10px;" class="form-control" type="text" name="user" placeholder="Tên tài khoản"> -->
                    <input style="margin-top: 10px;" class="form-control" type="password" name="password" placeholder="Private Token">
                    <button style="margin-top: 10px;" class="btn btn-primary" type="submit" name="submit">Đăng nhập</button>
            </div>
            </form>
            <div class="col-sm-4"></div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            $user = $_POST['user'];
            $token = $_POST['password'];
            $sqlToken = "SELECT * FROM access_token where Token='$token'";
            $resToken = mysqli_query($con, $sqlToken);
            // $historyUrl = $_SERVER['HTTP_REFERER'];ll
            if (mysqli_num_rows($resToken)  > 0) {
                echo "<script>alert('Đăng nhập thành công !');</script>";
                header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
            } else {
                echo "<script>alert('Không tìm thấy token phù hợp !');</script>";
                header("Refresh:0; url= http://localhost/joomla/login-system/index.php");
            }
            while ($row = mysqli_fetch_array($resToken)) {
                $_SESSION['tokenId'] = $row['idToken'];
            }
        }

        if (isset($_GET['resetToken'])) {
            session_destroy();
            // session_unset();
            echo "<script>alert('Hết hạn phiên làm việc !');</script>";
            header("Refresh:0; url= http://localhost/joomla/login-system/");
        }
        ?>
    </div>
</body>

</html>