<?php  
  require_once '../../config/includes.php';
  require_once '_session.php';

  $title = "Profile";

?>

<!DOCTYPE html>
<html lang="en">

  <?php include '_head.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include '_navbar.php'; ?>

  <?php include '_sidebar.php'; ?>

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
                       src="../../assets/img/avatar3.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $userFullname; ?> <i class="fa fa-check-circle"></i></h3>

                <p class="text-muted text-center">Administrator</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $userEmail; ?></a>
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
                <form method="post" enctype="multipart/form-data" action="profileUpdate" onsubmit="btnLoader(this.profileUpdate)">
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="oldPassword" id="oldPassword" minlength="6" maxlength="16" autofocus required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Ex. ********" minlength="6" maxlength="16" onkeyup="password_validation()" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="newPassword2" id="newPassword2" placeholder="Ex. ********" minlength="6" onkeyup="passwordValidation()" maxlength="16" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" name="profileUpdate" id="profileUpdate" class="btn btn-primary"><i class="fa fa-edit"></i> Submit changes</button>

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
  
  <?php include '_footer.php'; ?>

</div>

  <?php include '_scripts.php'; ?>
  <?php include '_alerts.php'; ?>

</body>
</html>
