<?php  
  require_once '../../config/includes.php';
  require_once '_session.php';

  $title = "Dashboard";
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
            <h1 class="m-0"><i class="nav-icon fas fa-th"></i> <?= $title ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= countPhish("") ?></h3>
                <p>Phishing Database</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="requests" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= countReports("") ?></h3>
                <p>Reports</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="pickup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
              <div class="inner">
                <h3><?= countDataloads() ?></h3>
                <p>Data Loads</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="pickup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-capitalize"><i class="fas fa-copy"></i> Most Reported</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Website URL</th>
                        <th class="text-center">Count</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                        $reportOrder=0;
                        $getTopReports=getTopReports(10);
                        while ($topReport=$getTopReports->fetch(PDO::FETCH_ASSOC)) {
                          $reportOrder++;
                      ?>
                      <tr>
                        <td><?= $reportOrder ?></td>
                        <td><?= $topReport['report_link'] ?></td>
                        <td class="text-center"><?= $topReport['occurrence_count'] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-md-6">
            <div class="card">
              <div class="card-header text-capitalize"><i class="fas fa-globe"></i> most visited sites</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Website URL</th>
                        <th class="text-center">Count</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                        $visOrder=0;
                        $getTopVisited=getTopVisitedSites(10);
                        while ($topVisited=$getTopVisited->fetch(PDO::FETCH_ASSOC)) {
                          $visOrder++;
                      ?>
                      <tr>
                        <td><?= $visOrder ?></td>
                        <td><?= $topVisited['vis_link'] ?></td>
                        <td class="text-center"><?= $topVisited['occurrence_count'] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
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

</body>
</html>
