<?php  
  require("config/includes.php");
  $title = "Error Page";
?>

<!DOCTYPE html>
<html lang="en">

  <?php include '_head.php'; ?>

<body class="hold-transition login-page bg-primary">

  <div class="login-box">

    <div class="row align-items-center d-flex flex-row">
        <div class="col-lg-6 text-lg-right pr-lg-4">
            <h1 class="display-1 mb-0">404</h1>
        </div>
        <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
            <h2>SORRY!</h2>
            <h3 class="font-weight-light">Something went wrong.</h3>
            <p><?= @$_GET['note'] ?></p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 text-center mt-xl-2">
            <a class="text-white font-weight-medium" href="javascript:history.go(-1)">
                Back to Previous
            </a>
        </div>
    </div>
  </div>

  <?php include '_scripts.php'; ?>
  <?php include '_alerts.php'; ?>

</body>
</html>