<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Information</a></li>
            </ol>
        </nav>
        <!-- Content here -->
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        PERSON INFORMATION
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="/teacher-info-new.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mã cán bộ</label>
                                        <input type="text" name="macb" class="form-control" placeholder="Exmaple: dtnghi ,tmtan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Họ tên</label>
                                        <input type="text" name="hoten" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Giới tính</label>
                                        <input type="text" name="gioitinh" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năm sinh</label>
                                        <input type="text" name="ngaysinh" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Số điện thoại</label>
                                        <input type="text" name="sdt" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Trình độ học vấn</label>
                                        <input type="text" name="hocvi" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email </label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ</label>
                                        <input type="text" name="diachi" class="form-control">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</body>

</html>