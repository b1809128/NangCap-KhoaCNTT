<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        PERSON INFORMATION
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/todo.php">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Mã cán bộ</label>
                                        <input type="text" name="macbPerson" class="form-control" placeholder="Exmaple: dtnghi ,tmtan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Họ tên</label>
                                        <input type="text" name="hotenPerson" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Giới tính</label>
                                        <input type="text" name="gioitinhPerson" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Năm sinh</label>
                                        <input type="text" name="namsinhPerson" placeholder="yyyy-mm-dd, ex: 2000-02-09" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Số điện thoại</label>
                                        <input type="text" name="sodienthoaiPerson" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Trình độ học vấn</label>
                                        <input type="text" name="trinhdoPerson" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email </label>
                                        <input type="email" name="emailPerson" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ</label>
                                        <input type="text" name="diachiPerson" class="form-control">
                                    </div>


                                    <button type="submit" name="submitPerson" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo1" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo1">
                        EDUCATION
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo1" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo1">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/todo.php?profile=<?php echo $profileName; ?>">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Time</label>
                                        <input type="text" name="timeEducation" class="form-control" placeholder="2019-2020, 2021-Present">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="titleEducation" class="form-control" placeholder="Topic here, Ex: Can Tho University">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Element of topic</label>
                                        <input type="text" name="elementEducation" class="form-control">
                                    </div>
                                    <button type="submit" name="submitEducation" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        DISTINCTION
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/todo.php?profile=<?php echo $profileName; ?>">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Time</label>
                                        <input type="text" name="timeDistinct" class="form-control" placeholder="2019-2020, 2021-Present">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="titleDistinct" class="form-control" placeholder="Topic here, Ex: Can Tho University">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Element of topic</label>
                                        <input type="text" name="elementDistinct" class="form-control">
                                    </div>
                                    <button type="submit" name="submitDistinct" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        RESEARCH INTERESTS
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/todo.php?profile=<?php echo $profileName; ?>">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Time</label>
                                        <input type="text" name="timeResearch" class="form-control" placeholder="2019-2020, 2021-Present">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="titleResearch" class="form-control" placeholder="Topic here, Ex: Can Tho University">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Element of topic</label>
                                        <textarea type="text" name="elementResearch" class="form-control"> </textarea>
                                    </div>
                                    <button type="submit" name="submitResearch" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                        EXPERIENCE
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="http://localhost/joomla/todo.php?profile=<?php echo $profileName; ?>">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Time</label>
                                        <input type="text" name="timeExperience" class="form-control" placeholder="2019-2020, 2021-Present">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" name="titleExperience" class="form-control" placeholder="Topic here, Ex: Can Tho University">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Element of topic</label>
                                        <input type="text" name="elementExperience" class="form-control">
                                    </div>
                                    <button type="submit" name="submitExperience" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                        TextBooks And Scientific Research
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body">
                        <a href="http://localhost/joomla/tra-cuu/add.php">Add Here</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
</body>

</html>