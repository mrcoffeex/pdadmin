<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../assets/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="profile" class="d-block"><?= $user_identity; ?> <i class="fa fa-check-circle"></i></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="./" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
              <span class="right badge badge-warning"><?= count_idnum_requests(); ?></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="requests" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Requests
              <span class="badge badge-info right"><?= count_all_pending_requests(); ?></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pickup" class="nav-link">
            <i class="nav-icon fas fa-hand-holding"></i>
            <p>
              For Pick-Up
              <span class="badge badge-success right"><?= count_pickup_requests(); ?></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="users" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              System Users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="documents" class="nav-link">
            <i class="nav-icon fa fa-file-alt"></i>
            <p>
              Document List
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>