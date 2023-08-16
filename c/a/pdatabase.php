<?php  
    require_once '../../config/includes.php';
    require_once '_session.php';

    include 'pdatabase.paginate.php';
    $title = "Phishing Database";
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
                        <h1 class="m-0"><i class="nav-icon fas fa-database"></i> <?= $title ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data" action="_redirect">
                            <div class="form-group">
                                <input type="text" class="form-control" name="searchPhish" id="searchPhish" placeholder="search here ..." autofocus required>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-capitalize"><i class="fas fa-database"></i> suspicious links and URLs <span class="float-right"><strong><?= countPhish("") ?></strong> results</span></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                                <th>Reference #</th>
                                                <th>Website URL</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ($report=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?= $report['report_reference'] ?></td>
                                                <td><?= $report['report_link'] ?></td>
                                                <td class="text-center"><span class="badge badge-<?= getReportStatusSkin($report['report_status']) ?>"><?= getReportStatus($report['report_status']) ?></span></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        </section>

    </div>
  
  <?php include '_footer.php'; ?>

</div>

  <?php include '_scripts.php'; ?>
  <?php include '_alerts.php'; ?>

</body>
</html>
