<?php  
  require("config/includes.php");

  session_start();

  if (isset($_SESSION['phish_session_id'])) {
      if($_SESSION['phish_session_type'] == "0"){
          header("location: c/a/");
      }else if($_SESSION['phish_session_type'] == "1"){
          header("location: c/u/");
      }
  }

  $title = $my_project_name;

  $email = @$_GET['email'];

?>

<!DOCTYPE html>
<html lang="en">

  <?php include 'head.php'; ?>

<body class="hold-transition login-page" style="background-color: #17a2b845;">

  <div class="login-box">

    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h3 class="text-uppercase"><?= $my_project_name; ?></h3>
      </div>
      <div class="card-body">

        <form method="post" enctype="multipart/form-data" action="config/login_conf" onsubmit="validate_login(this)">
          <div class="input-group mb-3">
            <input type="email" name="sms_username" id="pUsername" class="form-control" placeholder="Email" value="<?= $email; ?>" autofocus required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pPassword" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
              <div class="g-recaptcha" 
                  data-sitekey="6Ld6zOMlAAAAADLtGPyy0UJATS_TzPwICY42vszv">
              </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
              <button type="submit" name="login" id="submit_login" class="btn btn-primary btn-block text-uppercase">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include 'scripts.php'; ?>
  <?php include 'alerts.php'; ?>

</body>
</html>
