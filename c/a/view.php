<?php  
  require_once '../../config/includes.php';
  require_once 'session.php';

  $title = "Tracker";

  $redirect = @$_GET['cd'];
  $mynote = @$_GET['note'];

  //get order details
  $getorder=$link->query("SELECT * From `um_order` Where `um_order_ref`='$redirect'");
  $order=$getorder->fetch_array();

  if ($order['um_order_status'] == "order_confirm") {
    $step1 = "active";
    $step2 = "";
    $step3 = "";
    $step4 = "";
  }else if ($order['um_order_status'] == "processing") {
    $step1 = "active";
    $step2 = "active";
    $step3 = "";
    $step4 = "";
  }else if ($order['um_order_status'] == "pickup") {
    $step1 = "active";
    $step2 = "active";
    $step3 = "active";
    $step4 = "";
  }else if ($order['um_order_status'] == "complete") {
    $step1 = "active";
    $step2 = "active";
    $step3 = "active";
    $step4 = "active";
  }else{
    $step1 = "";
    $step2 = "";
    $step3 = "";
    $step4 = "";
  }

?>

<!DOCTYPE html>
<html lang="en">

  <?php include 'head.php'; ?>

  <style type="text/css">
    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #007bff;
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #007bff;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }
  </style>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include 'navbar.php'; ?>

  <?php include 'sidebar.php'; ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="nav-icon fas fa-eye"></i> Track Request Order</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                  <i class="fas fa-hashtag"></i> Order ID: <?= $redirect; ?> <small style="color: red; font-style: italic;">click the circle buttons to change status ...</small>
              </div><!-- /.card-header -->
                <div class="card-body">
                  <article class="card">
                    <div class="card-body row">
                        <div class="col"> 
                          <strong>Estimated Pick-Up time:</strong> <br><?= date("M d Y", strtotime($order['um_order_date']." +15 days")); ?> <br>
                          <strong><?= get_email_userid($order['um_user_id']); ?></strong> <br>
                          <strong><span class="text-primary"><?= get_idnum_userid($order['um_user_id']); ?></span> <?= get_fullname_userid($order['um_user_id']); ?></strong> <br>

                          <hr>

                          <?php  
                            //get requests
                            $totals=0;
                            $requests=$link->query("SELECT * From `um_request` Where `um_order_ref`='$redirect'");
                            while ($req=$requests->fetch_array()) {
                              echo $req['um_reqtype_name']." x ".$req['um_req_qty']."<br>";

                              $totals += $req['um_reqtype_rate'] * $req['um_req_qty'];
                            }
                          ?>

                          <hr>
                          <?= "Payment Method - ".payment_method($order['um_order_method']); ?><br>
                          <b><?= "Total Amount - ".number_format($totals, 2); ?></b>
                        </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step <?= $step1; ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order request confirmed</span> </div>
                    <div class="step <?= $step2; ?>"> <span class="icon"> <a href="status?cd=<?= $redirect; ?>&temp=process" style="color: #fff;"><i class="fa fa-user"></i></a> </span> <span class="text"> Processing</span> </div>
                    <div class="step <?= $step3; ?>"> <span class="icon"> <a href="status?cd=<?= $redirect; ?>&temp=pickup" style="color: #fff;"><i class="fa fa-box"></i></a> </span> <span class="text">Ready for pickup</span> </div>
                    <div class="step <?= $step4; ?>"> <span class="icon"> <a href="status?cd=<?= $redirect; ?>&temp=complete" style="color: #fff;"><i class="fas fa-hand-holding"></i></a> </span> <span class="text">Complete</span> </div>
                </div>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> 
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lack"><i class="fa fa-times"></i> Lacking Requirements</button>
                        </div>
                    </div>
                </article>
                <article class="card">
                    <div class="card-body row">
                        <?php  
                          //remarks
                          $remarks=$link->query("SELECT * From `um_remarks` Where `um_order_ref`='$redirect'");
                          $count_remarks=$remarks->num_rows;

                          if ($count_remarks == 0) {
                            echo "<span style='color: gray;'><i class='fa fa-info'></i> nothing to see here.</span>";
                          }

                          while ($marks=$remarks->fetch_array()) {
                        ?>
                        <div class="col-md-12"> 
                          <div class="alert alert-primary">
                            <h5><i class="fa fa-envelope"></i> System Remarks <small><?= date("M d Y g:i A", strtotime($marks['um_rem_date'])) ?></small></h5>
                            <i><?= $marks['um_rem_text']; ?></i>
                          </div>
                        </div>
                        <?php } ?>
                    </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="lack">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title"><i class="fa fa-times"></i> Lacking Requirements</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" enctype="multipart/form-data" action="lacking?cd=<?= $redirect; ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label style="font-style: italic;">type all lacking requirements as REMARKS</label>
                <textarea class="form-control" name="remarks" rows="3" autofocus required></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">submit & send</button>
        </div>
        </form>
      </div>
    </div>
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
        toastr.success('Updated!');
      </script>
    ";
  }else if ($mynote == "added_remarks") {
    echo "
      <script>
        toastr.success('Remarks Added!');
      </script>
    ";
  }else{
    echo "";
  }

  ?>

</body>
</html>
