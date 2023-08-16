<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../assets/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="profile" class="d-block"><?= $userFullname; ?> <i class="fa fa-check-circle"></i></a>
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
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pdatabase" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Phishing Database
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="reports" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Reports
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
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>