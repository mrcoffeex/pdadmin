<?php  
    require_once '../../config/includes.php';
    require_once '_session.php';
        
    $searchText = clean_string($_GET['searchText']);
    include 'reportSearch.paginate.php';
    $title = "Reports search: " . $searchText;
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
                        <h1 class="m-0"><i class="nav-icon fas fa-copy"></i> <?= $title ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="searchReport" id="searchReport" placeholder="search here ..." autofocus required>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-capitalize"><i class="fas fa-copy"></i> recent reports <span class="float-right"><strong><?= countReports($searchText) ?></strong> results</span></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Reference #</th>
                                                <th>Website URL</th>
                                                <th class="text-center">Reported By</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Opt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ($report=$paginate->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?= proper_date($report['report_created']) ?></td>
                                                <td><?= $report['report_reference'] ?></td>
                                                <td><?= $report['report_link'] ?></td>
                                                <td class="text-center"><?= $report['report_email'] ?></td>
                                                <td class="text-center"><span class="badge badge-<?= getReportStatusSkin($report['report_status']) ?>"><?= getReportStatus($report['report_status']) ?></span></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#status_<?= $report['report_id'] ?>">
                                                        <i class="fa fa-sync"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_<?= $report['report_id'] ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="status_<?= $report['report_id'] ?>">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title"><i class="fa fa-edit"></i> Change Status</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" enctype="multipart/form-data" action="reportUpdate?reportId=<?= $report['report_id'] ?>" onsubmit="btnLoader(this.updateReport)">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p>Reference #: <?= $report['report_reference'] ?></p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Status</label>
                                                                            <select class="form-control" name="reportStatus" id="reportStatus" required>
                                                                                <option value="<?= $report['report_status'] ?>"><?= getReportStatus($report['report_status']) ?></option>
                                                                                <option value="0">pending</option>
                                                                                <option value="1">suspicious</option>
                                                                                <option value="2">safe</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="submit" id="updateReport" class="btn btn-warning btn-block">Update Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="delete_<?= $report['report_id'] ?>">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Delete</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="post" enctype="multipart/form-data" action="reportRemove?reportId=<?= $report['report_id'] ?>" onsubmit="btnLoader(this.removeReport)">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p class="text-center">Press the button to continue delete <span class="text-danger"><?= $report['report_reference'] ?></span>.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="submit" id="removeReport" class="btn btn-danger btn-block">Delete Report</button>
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
