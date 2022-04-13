<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">Monitoring Test Scenario</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-2 mb-3 d-flex">
        <div class="image">
          <img src="/image/man.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          <p class="text-center text-white mt-2 mb-0">{{ auth()->user()->level }}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</a>
          </li>
            @can('isAdmin')
              <li class="nav-item">
                <a href="/group" class="nav-link {{ Request::is('group*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i> Group</a>
              </li>
            @endcan
          <li class="nav-header">Master Data</li>
            @can('isSa')
              <li class="nav-item">
                <a href="/project" class="nav-link {{ Request::is('project*') ? 'active' : '' }}">
                    <i class=" nav-icon fas fa-table"></i> Project</a>
              </li>
              <li class="nav-item">
                <a href="/module" class="nav-link {{ Request::is('modul*') ? 'active' : '' }}">
                  <i class="nav-icon far fa-file-alt"></i> Module</a>
              </li>
            @endcan
            @can('isQa')
              <li class="nav-item">
                <a href="/testscenario" class="nav-link {{ Request::is('testscenario*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tasks"></i> Test Scenario</a>
              </li>
            @endcan
            <li class="nav-item">
              <a href="/errorList" class="nav-link {{ Request::is('errorList*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-bug"></i> Error List</a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>