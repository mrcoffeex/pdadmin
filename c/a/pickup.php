<?php  
  require_once '../../config/includes.php';
  require_once 'session.php';

  $title = "Order Requests";
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
            <h1 class="m-0"><i class="nav-icon fas fa-hand-holding"></i> For Pick-Up</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <section class="content">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-hand-holding"></i> For Pick-Up <span class="badge badge-primary"><?= count_pickup_requests(); ?></span></h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">

                  <?php  
                    //get pending orders
                    $pending=$link->query("SELECT * From `um_order` Where `um_order_status`='pickup'");
                    while ($pen=$pending->fetch_array()) {

                      $unq_ref = $pen['um_order_ref'];

                      if ($pen['um_order_status'] == "order_confirm") {
                        $mytheme = "info";
                      }else if ($pen['um_order_status'] == "processing") {
                        $mytheme = "warning";
                      }else if ($pen['um_order_status'] == "pickup") {
                        $mytheme = "success";
                      }else if ($pen['um_order_status'] == "completed") {
                        $mytheme = "success";
                      }else{
                        $mytheme = "default";
                      }
                  ?>

                  <div class="callout callout-<?= $mytheme; ?>">
                    <h5>Order ID: <span class="text-<?= $mytheme; ?>"><?= $unq_ref; ?></span></h5>
                    <hr>

                    <p>
                      Status: <span class="text-<?= $mytheme; ?>"><?= order_status($pen['um_order_status']); ?></span><br>
                      Order Date: <span class="text-<?= $mytheme; ?>"><?= date("m-d-Y", strtotime($pen['um_order_date'])); ?></span><br>
                      <strong><?= get_email_userid($pen['um_user_id']); ?><br></strong>
                      <strong><span class="text-primary"><?= get_idnum_userid($pen['um_user_id']); ?></span> <?= get_fullname_userid($pen['um_user_id']); ?></strong>

                      <hr>

                      <?php  
                        //get requests
                        $requests=$link->query("SELECT * From `um_request` Where `um_order_ref`='$unq_ref'");
                        while ($req=$requests->fetch_array()) {
                          echo $req['um_reqtype_name']." x ".$req['um_req_qty']."<br>";
                        }
                      ?>

                      <hr>

                      <a href="view?cd=<?= $unq_ref; ?>"><button type="button" class="btn btn-outline-<?= $mytheme; ?>">View Order</button></a>
                    </p>
                  </div>

                  <?php } ?>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include 'footer.php'; ?>

</div>

  <?php include 'scripts.php'; ?>

</body>
</html>
