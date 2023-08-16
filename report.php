<?php  
    require("config/includes.php");
    $title = "Create Report";

    $urlStr = @$_GET['urlStr'];
?>

<!DOCTYPE html>
<html lang="en">

  <?php include '_head.php'; ?>

<body class="hold-transition mt-4" style="background-color: #f4f6f9;">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <img src="assets/img/banner.png" class="img-fluid" alt="benner ...">
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-primary"><i class="fas fa-exclamation-circle"></i> Report Form</h3>
                            <form action="createReport" enctype="multipart/form-data" method="post" onsubmit="btnLoader(this.createReport)">
                                <div class="form-group">
                                    <label for="">URL</label>
                                    <input type="text" class="form-control" name="reportLink" id="reportLink" value="<?= $urlStr ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="">Report Description</label>
                                    <textarea class="form-control" rows="3" name="reportDescription" id="reportDescription" placeholder="..."  autofocus required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Your Email</label>
                                    <input type="email" class="form-control" name="reportEmail" id="reportEmail" placeholder="sample@email.com" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="createReport" class="btn btn-primary" >Submit Report</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h5>Recently Reported Sites</h5>
                            <?php 
                                $getRecentReports=selectRecentReports();
                                while ($recent=$getRecentReports->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="alert alert-dark mb-1 p-2">
                                <?= stringLimit($recent['report_link'], 40) ?> <span class="float-right"><?= getTimePassed($recent['report_created'], date("Y-m-d H:i:s")) ?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- <div class="col-md-12">
                            <p style="font-size: 18px;" class="float-right"><a href="./">Home</a> . <a href="about">About</a></p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

  <?php include '_scripts.php'; ?>
  <?php include '_alerts.php'; ?>

</body>
</html>
