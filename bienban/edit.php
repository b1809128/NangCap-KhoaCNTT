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
    <div class="container">
        <div class="row">
            <h4>Thêm Thời gian bắt đầu - kết thúc</h4>
            <div class="row">
                <form action="http://localhost/joomla/bienban/todoEdit.php" method="POST" style="display:flex; justify-content:space-between;">
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
            <form action="./todoEdit.php" method="post">
                <textarea name="editTextArea" id="editor" style="width:100%"></textarea>

                <button class="btn btn-primary" type="submit">Save</button>
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