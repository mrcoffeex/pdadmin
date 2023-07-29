<?php  
    require("config/includes.php");
    $title = "Alert!";
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
                            <h3 class="text-danger"><i class="fas fa-exclamation-circle"></i> Alert: Suspicious Website Detected</h3>
                            <p style="font-size: 20px;">Dear user, we must bring to your attention that Phish Defender, your trusted online security companion, has identified the website you recently visited as suspicious. Our advanced real-time phishing detection system has raised a warning flag, indicating potential risks associated with this site. To safeguard your personal information and sensitive data, we strongly advise refraining from entering any credentials or personal details on this platform. Your safety is our utmost priority, and we recommend navigating away from this website immediately. Stay protected with Phish Defender and browse the web with confidence.</p>
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

</body>
</html>
