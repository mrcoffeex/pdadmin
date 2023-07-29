<?php  
  require_once '../../config/includes.php';
  require_once 'session.php';

  $title = "Document List";

  $docbank=$link->query("SELECT * From `um_request_type` Order By `um_reqtype_name` ASC");
  $count_use=$docbank->num_rows;

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
            <h1 class="m-0"><i class="nav-icon fas fa-user"></i> <?= $title; ?></h1>
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
                    <div class="col-md-2">
                      <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block" data-target="#add_doc" data-toggle="modal" title="click to add document ..."><i class="fa fa-plus"></i> Add Document</button>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Description</th>
                              <th class="text-center">Rate</th>
                              <th class="text-center" style="width: 40px;">Edit</th>
                              <th class="text-center" style="width: 40px;">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php  
                              //get requests
                              $nums=0;
                              while ($docrow=$docbank->fetch_array()) {
                                $nums++;
                            ?>

                            <tr>
                              <td><?= $nums; ?></td>
                              <td><span style="color: blue;"><?= $docrow['um_reqtype_name']; ?></span></td>
                              <td class="text-center"><?= number_format($docrow['um_reqtype_rate'],2); ?></td>
                              <td class="text-center"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit_<?= $docrow['um_reqtype_id']; ?>" title="click to edit ..."><i class="fa fa-edit "></i></button></td>
                              <td class="text-center"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_<?= $docrow['um_reqtype_id']; ?>" title="click to delete ..."><i class="fa fa-trash"></i></button></td>
                            </tr>

                            <div class="modal fade" id="edit_<?= $docrow['um_reqtype_id']; ?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header bg-primary">
                                    <h4 class="modal-title"><i class="fa fa-file-alt"></i> Edit Document Details - <?= $docrow['um_reqtype_name']; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" enctype="multipart/form-data" action="update_doc?cd=<?= $docrow['um_reqtype_id']; ?>">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Document Description</label>
                                          <input type="text" name="mydocname" class="form-control" maxlength="6" value="<?= $docrow['um_reqtype_name']; ?>" required>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label>Rate</label>
                                          <input type="number" name="myrate" class="form-control" value="<?= $docrow['um_reqtype_rate']; ?>" required>
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

                            <div class="modal fade" id="delete_<?= $docrow['um_reqtype_id']; ?>">
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
                                    <a href="delete_doc?cd=<?= $docrow['um_reqtype_id']; ?>"><button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button></a>
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

  <div class="modal fade" id="add_doc">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title"><i class="fa fa-file-alt"></i> Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" enctype="multipart/form-data" action="add_doc" onsubmit="return validateForm(this)">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Document Description</label>
                <input type="text" name="mydocname" class="form-control" autofocus required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Rate</label>
                <input type="number" name="myrate" class="form-control" required>
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

  <?php  

  if ($mynote == "error") {
    echo "
      <script>
        toastr.error('Error!');
      </script>
    ";
  }else if ($mynote == "done") {
    echo "
      <script>
        toastr.success('Actions Done!');
      </script>
    ";
  }else if ($mynote == "added") {
    echo "
      <script>
        toastr.success('Document Added!');
      </script>
    ";
  }else if ($mynote == "updated") {
    echo "
      <script>
        toastr.success('Document Updated!');
      </script>
    ";
  }else if ($mynote == "delete") {
    echo "
      <script>
        toastr.success('Document Deleted!');
      </script>
    ";
  }else{
    echo "";
  }

  ?>

</body>
</html>
