<?php  
    require("config/includes.php");
    $title = "Alert!";

    $urlStr = @$_GET['urlStr'];
?>

<!DOCTYPE html>
<html lang="en">

  <?php include 'head.php'; ?>

<body class="hold-transition mt-4" style="background-color: #f4f6f9;">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <img src="assets/img/banner.png" class="img-fluid" alt="benner ...">
                        </div>
                        <div class="col-md-12">
                            <h3><i class="fas fa-exclamation-circle"></i> Report Form</h3>
                            <form action="createReport" enctype="multipart/form-data" method="post" onsubmit="btnLoader(this.createReport)">
                                <div class="form-group">
                                    <label for="">URL</label>
                                    <input type="text" class="form-control" name="reportLink" id="reportLink" value="<?= $urlStr ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="">Report Description</label>
                                    <textarea class="form-control" rows="3" name="reportDescription" id="reportDescription" autofocus required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Your Email</label>
                                    <input type="email" class="form-control" name="reportEmail" id="reportEmail" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="createReport" class="btn btn-primary">Submit Report</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <p style="font-size: 18px;" class="float-right"><a href="./">Home</a> . <a href="about">About</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <?php include 'scripts.php'; ?>
  <?php include 'alerts.php'; ?>

</body>
</html>
