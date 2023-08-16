<?php  
  require_once '../../config/includes.php';
  require_once '_session.php';

  $searchText = clean_string($_GET['searchText']);
  include 'usersSearch.paginate.php';

  $title = "Users";
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
            <h1 class="m-0"><i class="nav-icon fas fa-user"></i> System Users search: <?= $searchText ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <section class="content">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><span class="badge badge-warning"><?= countUsers($searchText) ?></span> Current Users</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                        <form method="post" enctype="multipart/form-data" action="_redirect">
                        <div class="form-group">
                          <input type="text" name="userSearch" class="form-control" placeholder="search name here ..." value="<?= $searchText ?>" autofocus required>
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
                              <th class="text-center">Name</th>
                              <th class="text-center">Username</th>
                              <th class="text-center" style="width: 40px;">Edit</th>
                              <th class="text-center" style="width: 40px;">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              while ($user=$paginate->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                              <td class="text-center"><?= $user['user_fullname'] ?></td> 
                              <td class="text-center"><?= $user['user_username'] ?></td>
                              <td class="text-center" style="width: 40px;">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_<?= $user['user_uid'] ?>"> 
                                  <i class="fa fa-edit"></i>
                                </button>
                              </td>
                              <td class="text-center" style="width: 40px;">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_<?= $user['user_uid'] ?>">
                                  <i class="fa fa-trash"></i>
                                </button>
                              </td>
                            </tr>

                            <div class="modal fade" id="edit_<?= $user['user_uid'] ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h4 class="modal-title"><i class="fa fa-edit"></i> Edit <?= $user['user_fullname'] ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" enctype="multipart/form-data" action="userUpdate?uid=<?= $user['user_uid'] ?>" onsubmit="btnLoader(this.updateUser)">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Full Name</label>
                                          <input type="text" name="myfullname" class="form-control" value="<?= $user['user_fullname'] ?>" autofocus required>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Email <code>*username</code></label>
                                          <input type="email" name="myemail" class="form-control" value="<?= $user['user_username'] ?>"  required>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Password <code>*leave empty if no changes</code></label>
                                          <input type="password" name="mypassword" class="form-control" autofocus>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="submit" id="updateUser" class="btn btn-info btn-block">Update Changes</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade" id="delete_<?= $user['user_uid'] ?>">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" enctype="multipart/form-data" action="userRemove?uid=<?= $user['user_uid'] ?>" onsubmit="btnLoader(this.removeUser)">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <p class="text-center">Press the button to continue delete <span class="text-danger"><?= $user['user_fullname'] ?></span>.</p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="submit" id="removeUser" class="btn btn-danger btn-block">Delete User</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="text-center mt-3">
                        <ul class="pagination flex-wrap pagination-rounded">
                            <?= $paginationCtrls; ?>
                        </ul>
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

  

  <div class="modal fade" id="add_user">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" enctype="multipart/form-data" action="userCreate" onsubmit="btnLoader(this.createUser)">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="myfullname" class="form-control" autofocus required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Email (*username)</label>
                <input type="email" name="myemail" class="form-control" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" id="createUser" class="btn btn-primary btn-block">Generate User Account</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <?php include '_footer.php'; ?>

</div>

  <?php include '_scripts.php'; ?>
  <?php include '_alerts.php'; ?>

</body>
</html>
