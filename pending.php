<?php  
    require("config/includes.php");
    $title = "Pending";
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
                            <h3><i class="fas fa-exclamation-circle"></i> Pending for Review</h3>
                            <p style="font-size: 18px;">Thank you for submitting the URL report. We acknowledge that the document you have provided is intended for review. Our team will carefully assess the content and information available at the specified URL to ensure its relevance and accuracy for the intended purpose.
                            <br><br>
                            We understand the importance of thorough evaluation, and we will take the necessary steps to verify the credibility of the source and the data presented. If required, we may seek additional resources or expert opinions to enhance the review process.
                            <br><br>
                            Your contribution is valuable to us, and we appreciate your efforts in sharing this report with our team. Rest assured, we will conduct a meticulous review, and any insights or feedback resulting from our assessment will be communicated promptly.</p>
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
