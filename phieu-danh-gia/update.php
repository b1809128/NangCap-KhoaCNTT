<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật phiếu đánh giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_GET['profile'])) $profileName = $_GET['profile'];
    ?>
    <div class="container">
        <!-- Content here -->
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        NỘI DUNG ĐÁNH GIÁ CÁN BỘ GIẢNG VIÊN, VIÊN CHỨC
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="./todoEdit.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mã cán bộ</label>
                                        <input type="text" name="macbPerson" class="form-control" placeholder="Exmaple: dtnghi ,tmtan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Bộ môn</label>
                                        <input type="text" name="hotenPerson" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Kết quả hoạt động của cơ quan, tổ chức, đơn vị được giao quản lý, phụ trách</label>
                                        <textarea type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năng lực lãnh đạo</label>
                                        <textarea type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năng lực tập hợp, đoàn kết</label>
                                        <textarea type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Xếp loại chất lượng</label>
                                        <input type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control">
                                    </div>

                                    <button type="submit" name="submitPerson" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                        NỘI DUNG ĐÁNH GIÁ CÁN BỘ GIẢNG VIÊN, VIÊN CHỨC
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="./todoEdit.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mã cán bộ</label>
                                        <input type="text" name="macbPerson" class="form-control" placeholder="Exmaple: dtnghi ,tmtan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Bộ môn</label>
                                        <input type="text" name="hotenPerson" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Kết quả hoạt động của cơ quan, tổ chức, đơn vị được giao quản lý, phụ trách</label>
                                        <textarea type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năng lực lãnh đạo</label>
                                        <textarea type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năng lực tập hợp, đoàn kết</label>
                                        <textarea type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Xếp loại chất lượng</label>
                                        <input type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control">
                                    </div>

                                    <button type="submit" name="submitPerson" class="btn btn-primary">Submit</button>
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