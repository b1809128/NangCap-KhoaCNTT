<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    // Include configuration file 
    include_once './config.php';

    $postData = '';
    if (!empty($_SESSION['postData'])) {
        $postData = $_SESSION['postData'];
        unset($_SESSION['postData']);
    }

    $status = $statusMsg = '';
    if (!empty($_SESSION['status_response'])) {
        $status_response = $_SESSION['status_response'];
        $status = $status_response['status'];
        $statusMsg = $status_response['status_msg'];
    }
    ?>

    <!-- Status message -->
    <?php if (!empty($statusMsg)) { ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <div class="container">
        <div class="col-md-12">
            <form method="post" action="addEvent.php" class="form">
                <div class="form-group">
                    <label>Event Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo !empty($postData['title']) ? $postData['title'] : ''; ?>" required="">
                </div>
                <div class="form-group">
                    <label>Event Description</label>
                    <textarea name="description" class="form-control"><?php echo !empty($postData['description']) ? $postData['description'] : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="<?php echo !empty($postData['location']) ? $postData['location'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="<?php echo !empty($postData['date']) ? $postData['date'] : ''; ?>" required="">
                </div>
                <div class="form-group time">
                    <label>Time</label>
                    <input type="time" name="time_from" class="form-control" value="<?php echo !empty($postData['time_from']) ? $postData['time_from'] : ''; ?>">
                    <span>TO</span>
                    <input type="time" name="time_to" class="form-control" value="<?php echo !empty($postData['time_to']) ? $postData['time_to'] : ''; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn-primary" name="submit" value="Add Event" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>