<?php  
  require_once '../../config/includes.php';
  require_once 'session.php';

  $title = "Profile";

  $mynote = @$_GET['note'];

?>

<!DOCTYPE html>
<html lang="en">

  <?php include 'head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include 'navbar.php'; ?>

  <?php include 'sidebar.php'; ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="nav-icon fas fa-user"></i> Profile</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../assets/img/avatar5.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $user_identity; ?> <i class="fa fa-check-circle"></i></h3>

                <p class="text-muted text-center">Administrator</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $user_email; ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                  <i class="fas fa-lock"></i> Security Setting
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="update_password">
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="old_p" id="old_p" minlength="6" maxlength="16" autofocus required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="new_p" id="new_p" placeholder="Ex. ********" minlength="6" maxlength="16" onkeyup="password_validation()" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="confirm_new_p" id="confirm_new_p" placeholder="Ex. ********" minlength="6" onkeyup="password_validation()" maxlength="16" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" name="submit_profile" id="submit_profile" class="btn btn-primary"><i class="fa fa-edit"></i> Submit changes</button>

                      <span id="warnings" style="margin-left: 50px; color: red;"></span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include 'footer.php'; ?>

</div>

  <?php include 'scripts.php'; ?>

  <?php  

  if ($mynote == "error") {
    echo "
      <script>
        toastr.error('Error!');
      </script>
    ";
  }else if ($mynote == "updated") {
    echo "
      <script>
        toastr.success('Profile Updated!');
      </script>
    ";
  }else if ($mynote == "requested") {
    echo "
      <script>
        toastr.success('Request Submitted!');
      </script>
    ";
  }else if ($mynote == "nomatch") {
    echo "
      <script>
        toastr.warning('incorrect old password!');
      </script>
    ";
  }else if ($mynote == "password_update") {
    echo "
      <script>
        toastr.success('Password Updated!');
      </script>
    ";
  }else{
    echo "";
  }

  ?>

  <script type="text/javascript">
    
    function password_validation(){
      var new_p = document.getElementById('new_p').value;
      var confirm_new_p = document.getElementById('confirm_new_p').value;

      if (new_p == confirm_new_p) {
        document.getElementById('submit_profile').disabled = false;
        document.getElementById('warnings').innerHTML = "";
      }else{
        document.getElementById('submit_profile').disabled = true;
        document.getElementById('warnings').innerHTML = "<br>*password not match";
      }
    }

  </script>

</body>
</html>
