<?php  
  require_once '../../config/includes.php';
  require_once 'session.php';

  $title = "Dashboard";

  $id_requests=$link->query("SELECT * From `um_student_record` Where `um_stu_idnum`!='' AND `um_stu_status`='0'");
  $count_req=$id_requests->num_rows;

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
            <h1 class="m-0"><i class="nav-icon fas fa-th"></i> Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= count_all_pending_requests(); ?></h3>

                <p>Pending Requests</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="requests" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= count_pickup_requests(); ?></h3>

                <p>For Pick-Up</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="pickup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <center>Order Report (Today)</center>
              </div>
              <div class="card-content">
                <canvas id="order"></canvas>
              </div>
            </div>

            
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
              <center>Purpose Metrics (Today)</center>
              </div>
              <div class="card-content">
                <canvas id="purpose" height="300"></canvas>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include 'footer.php'; ?>

</div>

  <?php include 'scripts.php'; ?>

  <script type="text/javascript">
    var ctx = document.getElementById("order").getContext('2d');
      var myChart1 = new Chart(ctx, {
          type: 'bar',
          data: {
              labels:['Diploma','TOR','Account Statement','Diploma authenticated','TOR authenticated'],
              datasets: [{
                  backgroundColor: [
                     "#5969ff",
                      "#ff407b",
                      "#25d5f2",
                      "#ffc750",
                      "#2ec551",
                      "#7040fa",
                      "#ff004e"
                  ],
                  data:[10,12,7,3,17],
              }]
          },

          options: {
            legend: {
              display: true,
              position: 'bottom',
              labels: {
                  fontColor: '#71748d',
                  fontFamily: 'Circular Std Book',
                  fontSize: 14,
              }
            },
          }
      });

      var ctx2 = document.getElementById("purpose").getContext('2d');
      var myChart2 = new Chart(ctx2, {
          type: 'pie',
          data: {
              labels:['Employment','Requirement','Other'],
              datasets: [{
                  backgroundColor: [
                     "#5969ff",
                      "#ff407b",
                      "#25d5f2",
                      "#ffc750",
                      "#2ec551",
                      "#7040fa",
                      "#ff004e"
                  ],
                  data:[10,12,7],
              }]
          },

          options: {
            legend: {
              display: true,
              position: 'bottom',
              labels: {
                  fontColor: '#71748d',
                  fontFamily: 'Circular Std Book',
                  fontSize: 14,
              }
            },
          }
      });
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
  }else{
    echo "";
  }

  ?>

</body>
</html>
