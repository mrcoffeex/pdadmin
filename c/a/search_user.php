<?php  
  require_once '../../config/includes.php';
  require_once 'session.php';

  $search_text=@$_GET['search_text'];

  $title = "Search Users: ".$search_text;

  $userbank=$link->query("SELECT * From `um_user` Where CONCAT(`um_full_name`,`um_username`) LIKE '%$search_text%' Order By `um_full_name` ASC");
  $count_use=$userbank->num_rows;
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
            <h1 class="m-0"><i class="nav-icon fas fa-user"></i> System Users Search: <?= $search_text; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <section class="content">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title"><i class="far fa-address-card"></i> Current Users <span class="badge badge-warning"><?= 0+$count_use; ?></span></h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                        <form method="post" enctype="multipart/form-data" action="redirect">
                        <div class="form-group">
                          <input type="text" name="user_search" class="form-control" placeholder="search name here ..." autofocus required>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-primary btn-block" data-target="#add_user" data-toggle="modal" title="click to add user ..."><i class="fa fa-plus"></i> Add User</button>
                    </div>

                    <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>ID Number</th>
                              <th class="text-center">Name</th>
                              <th class="text-center">Contact #</th>
                              <th class="text-center">Username</th>
                              <th class="text-center"><i class="fa fa-key"></i></th>
                              <!-- <th class="text-center"><i class="fa fa-list"></i></th> -->
                              <th class="text-center" style="width: 40px;">Edit</th>
                              <th class="text-center" style="width: 40px;">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  
                              //get requests
                              $nums=0;
                              while ($user=$userbank->fetch_array()) {
                            ?>

                            <tr>
                              <td><?= $user['um_user_code']; ?></td>
                              <td class="text-center"><span style="color: blue;"><?= $user['um_full_name']; ?></span></td>
                              <td class="text-center"><?= $user['um_user_contact']; ?></td>
                              <td class="text-center"><?= $user['um_username']; ?></td>
                              <td class="text-center"><i><button type="button" class="btn btn-success" data-toggle="modal" data-target="#passw_<?= $user['um_user_id']; ?>" title="click to show password ..."><i class="fa fa-eye"></i></button></i></td>
                              <!-- <td class="text-center"><i><button type="button" class="btn btn-warning" title="click to show more details ..."><i class="fa fa-list"></i></button></i></td> -->
                              <td class="text-center"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_<?= $user['um_user_id']; ?>" title="click to edit ..."><i class="fa fa-edit "></i></button></td>
                              <td class="text-center"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_<?= $user['um_user_id']; ?>" title="click to delete ..."><i class="fa fa-trash"></i></button></td>
                            </tr>

                            <div class="modal fade" id="passw_<?= $user['um_user_id']; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-success">
                                    <h4 class="modal-title"><i class="fa fa-file-alt"></i> Security Details - <?= $user['um_full_name']; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" enctype="multipart/form-data" action="update_passw?cd=<?= $user['um_user_id']; ?>">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Current Password: <?= decryptIt($user['um_password']); ?></label>
                                          <input type="text" name="newpassw" class="form-control" maxlength="16" required>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update" id="submit" class="btn btn-success"><i class="fas fa-check"></i> Update Password</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="edit_<?= $user['um_user_id']; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-primary">
                                    <h4 class="modal-title"><i class="fa fa-file-alt"></i> Edit User Details - <?= $user['um_full_name']; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" enctype="multipart/form-data" action="update_user?cd=<?= $user['um_user_id']; ?>">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>ID Number</label>
                                          <input type="text" name="myidnum" class="form-control" maxlength="6" value="<?= $user['um_user_code']; ?>" required>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Email (*username)</label>
                                          <input type="email" name="myemail" class="form-control" value="<?= $user['um_username']; ?>" required>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Full Name</label>
                                          <input type="text" name="myfullname" class="form-control" value="<?= $user['um_full_name']; ?>" required>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label>Contact #</label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">+63</span>
                                          </div>
                                          <input type="text" class="form-control" name="mycontact" maxlength="10" placeholder="9xxxxxxxx" value="<?= $user['um_user_contact']; ?>" required>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="update" id="submit" class="btn btn-primary"><i class="fas fa-check"></i> Update</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="delete_<?= $user['um_user_id']; ?>">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <a href="delete_user?cd=<?= $user['um_user_id']; ?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include 'footer.php'; ?>

  <div class="modal fade" id="add_user">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title"><i class="fa fa-file-alt"></i> Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" enctype="multipart/form-data" action="add_user" onsubmit="return validateForm(this)">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>ID Number</label>
                <input type="text" name="myidnum" class="form-control" maxlength="6" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email (*username)</label>
                <input type="email" name="myemail" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="myfullname" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <label>Contact #</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">+63</span>
                </div>
                <input type="text" class="form-control" name="mycontact" maxlength="10" placeholder="9xxxxxxxx" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Generate User Account</button>
        </div>
        </form>
      </div>
    </div>
  </div>

</div>

  <?php include 'scripts.php'; ?>

  <script type="text/javascript">
    function validateForm(formObj){
      formObj.submit.disabled = true;
      formObj.submit.innerHTML = "processing ...";
        return true;  
    }
  </script>

</body>
</html>
